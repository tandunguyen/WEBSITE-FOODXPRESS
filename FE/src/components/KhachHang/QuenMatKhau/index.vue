<template>
    <div class="auth-wrapper d-flex align-items-center justify-content-center vh-100 bg-gradient">
        <div class="card shadow-lg p-4 text-center rounded-4" style="max-width: 420px; width: 100%;">
            <div class="d-flex justify-content-center">
                <img src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
                     width="130" alt="Logo" class="mb-3" />
            </div>

            <!-- Bước 1: Nhập Email -->
            <div v-if="step === 1">
                <h3 class="mb-3 text-primary">🔑 Quên Mật Khẩu</h3>
                <p class="text-muted mb-4">Nhập email để nhận mã xác nhận khôi phục mật khẩu.</p>
                <form @submit.prevent="sendCode">
                    <div class="mb-3 text-start">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control rounded-3"
                            placeholder="Nhập email của bạn"
                            v-model="email"
                            required
                        />
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary w-100 rounded-3 py-2"
                        :disabled="loading"
                    >
                        <span v-if="!loading">
                            <i class="fa-solid fa-envelope me-2"></i> Gửi mã xác nhận
                        </span>
                        <span v-else>
                            Đang gửi...
                        </span>
                    </button>
                </form>
                <p class="mt-4 text-secondary">
                    Đã có tài khoản?
                    <a href="/khach-hang/dang-nhap" class="text-link text-decoration-none fw-semibold">
                        Đăng nhập ngay
                    </a>
                </p>
            </div>

            <!-- Bước 2: Nhập mã xác nhận -->
            <div v-else-if="step === 2">
                <h3 class="mb-3 text-primary">📩 Xác Nhận Mã</h3>
                <p class="text-muted mb-4">Nhập mã xác nhận đã gửi đến email của bạn.</p>
                <form @submit.prevent="verifyCode">
                    <div class="mb-3 text-start">
                        <label class="form-label">Mã xác nhận</label>
                        <input
                            type="text"
                            class="form-control rounded-3 text-center"
                            maxlength="6"
                            v-model="code"
                            placeholder="Nhập mã gồm 6 số"
                            required
                        />
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary w-100 rounded-3 py-2"
                        :disabled="loading"
                    >
                        <span v-if="!loading">
                            <i class="fa-solid fa-check me-2"></i> Xác nhận
                        </span>
                        <span v-else>
                            Đang kiểm tra...
                        </span>
                    </button>
                </form>
                <p class="mt-3 text-secondary small">
                    Không nhận được mã?
                    <a href="#" class="text-link text-decoration-none" @click.prevent="sendCode">
                        Gửi lại
                    </a>
                </p>
            </div>

            <!-- Bước 3: Đặt lại mật khẩu -->
            <div v-else-if="step === 3">
                <h3 class="mb-3 text-primary">🔒 Đặt Lại Mật Khẩu</h3>
                <p class="text-muted mb-4">Nhập mật khẩu mới và xác nhận để hoàn tất.</p>
                <form @submit.prevent="finishReset">
                    <div class="mb-3 text-start">
                        <label class="form-label">Mật khẩu mới</label>
                        <input
                            type="password"
                            class="form-control rounded-3"
                            placeholder="Nhập mật khẩu mới"
                            v-model="newPassword"
                            required
                        />
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label">Xác nhận mật khẩu</label>
                        <input
                            type="password"
                            class="form-control rounded-3"
                            placeholder="Nhập lại mật khẩu"
                            v-model="confirmPassword"
                            required
                        />
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary w-100 rounded-3 py-2"
                        :disabled="loading"
                    >
                        <span v-if="!loading">
                            <i class="fa-solid fa-unlock-keyhole me-2"></i> Hoàn tất
                        </span>
                        <span v-else>
                            Đang cập nhật...
                        </span>
                    </button>
                </form>
            </div>

            <!-- Bước 4: Thành công -->
            <div v-else>
                <h3 class="mb-3 text-success">🎉 Thành Công!</h3>
                <p class="text-muted mb-4">Mật khẩu của bạn đã được đặt lại thành công.</p>
                <a href="/khach-hang/dang-nhap" class="btn btn-success w-100 rounded-3 py-2">
                    Đăng nhập ngay
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ForgotFlow",
    data() {
        return {
            step: 1,            // 1: nhập email, 2: nhập mã, 3: nhập mật khẩu, 4: hoàn thành
            email: "",
            code: "",
            newPassword: "",
            confirmPassword: "",
            loading: false,
        };
    },
    methods: {
        async sendCode() {
            if (!this.email) {
                alert("Vui lòng nhập email!");
                return;
            }

            this.loading = true;
            try {
                const res = await axios.post(
                    "http://localhost:8000/api/khach-hang/quen-mat-khau/gui-ma",
                    { email: this.email }
                );

                if (res.data.status === 1) {
                    alert(res.data.message);
                    this.step = 2;
                } else {
                    alert(res.data.message || "Gửi mã thất bại!");
                }
            } catch (e) {
                alert("Có lỗi xảy ra khi gửi mã quên mật khẩu!");
            } finally {
                this.loading = false;
            }
        },

        async verifyCode() {
            if (!this.code) {
                alert("Vui lòng nhập mã xác nhận!");
                return;
            }

            this.loading = true;
            try {
                const res = await axios.post(
                    "http://localhost:8000/api/khach-hang/quen-mat-khau/xac-thuc",
                    {
                        email: this.email,
                        code: this.code,
                    }
                );

                if (res.data.status === 1) {
                    alert("Mã xác nhận hợp lệ, vui lòng nhập mật khẩu mới.");
                    this.step = 3;
                } else {
                    alert(res.data.message || "Mã xác nhận không đúng!");
                }
            } catch (e) {
                alert("Có lỗi xảy ra khi xác thực mã!");
            } finally {
                this.loading = false;
            }
        },

        async finishReset() {
            if (this.newPassword !== this.confirmPassword) {
                alert("❌ Mật khẩu xác nhận không khớp!");
                return;
            }

            this.loading = true;
            try {
                const res = await axios.post(
                    "http://localhost:8000/api/khach-hang/quen-mat-khau/dat-lai",
                    {
                        email: this.email,
                        code: this.code,
                        password: this.newPassword,
                        password_confirmation: this.confirmPassword,
                    }
                );

                if (res.data.status === 1) {
                    alert(res.data.message);
                    this.step = 4; // màn hình hoàn thành
                } else {
                    alert(res.data.message || "Đặt lại mật khẩu thất bại!");
                }
            } catch (e) {
                alert("Có lỗi xảy ra khi đặt lại mật khẩu!");
            } finally {
                this.loading = false;
            }
        },
    },
};
</script>

<style scoped>
/* 🌈 Nền gradient xanh dương + vàng nhạt */
.bg-gradient {
    background: linear-gradient(135deg, #bbdefb 0%, #fff8e1 100%);
}

/* Thẻ card */
.card {
    border: none;
    background-color: #ffffff;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 16px rgba(25, 118, 210, 0.2);
}

/* Tiêu đề chính */
.text-primary {
    color: #1565c0 !important;
}

/* Label input */
.form-label {
    font-weight: 600;
    color: #0d47a1;
}

/* Nút chính */
.btn-primary {
    background-color: #1976d2;
    border: none;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #0d47a1;
    transform: translateY(-2px);
}

/* Nút thành công */
.btn-success {
    background-color: #43a047;
    border: none;
}

.btn-success:hover {
    background-color: #2e7d32;
}

/* Link màu xanh dương, hover vàng */
.text-link {
    color: #1976d2;
    transition: color 0.3s ease;
}

.text-link:hover {
    color: #fbc02d !important;
}

/* Input focus */
.form-control:focus {
    border-color: #1976d2;
    box-shadow: 0 0 5px rgba(25, 118, 210, 0.4);
}
</style>
