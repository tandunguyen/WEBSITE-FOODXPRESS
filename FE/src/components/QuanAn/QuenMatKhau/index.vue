<template>
    <div class="auth-wrapper d-flex align-items-center justify-content-center vh-100 bg-light">
        <div class="card shadow-lg p-4 text-center rounded-4" style="max-width: 400px; width: 100%;">

            <!-- 🔹 Logo -->
            <div class="d-flex justify-content-center mb-3">
                <img
                    src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
                    alt="Logo Quán Ăn"
                    class="logo-restaurant"
                />
            </div>

            <!-- 🔸 Bước 1: Nhập email -->
            <div v-if="step === 1">
                <h3 class="mb-3 text-warning fw-bold">Quên Mật Khẩu (Quán Ăn)</h3>
                <p class="text-muted mb-4">Nhập email đã đăng ký để nhận mã khôi phục mật khẩu.</p>

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
                        class="btn btn-warning text-white w-100 rounded-3 py-2 fw-semibold"
                        :disabled="loading"
                    >
                        <span v-if="!loading">Gửi mã xác nhận</span>
                        <span v-else>Đang gửi...</span>
                    </button>
                </form>

                <p class="mt-4 text-secondary">
                    Đã có tài khoản?
                    <a href="/quan-an/dang-nhap" class="text-warning text-decoration-none fw-semibold">
                        Đăng nhập ngay
                    </a>
                </p>
            </div>

            <!-- 🔸 Bước 2: Xác nhận mã -->
            <div v-else-if="step === 2">
                <h3 class="mb-3 text-warning fw-bold">Xác Nhận Mã</h3>
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
                        class="btn btn-warning text-white w-100 rounded-3 py-2 fw-semibold"
                        :disabled="loading"
                    >
                        <span v-if="!loading">Xác nhận</span>
                        <span v-else>Đang kiểm tra...</span>
                    </button>
                </form>

                <p class="mt-3 text-secondary small">
                    Không nhận được mã?
                    <a
                        href="#"
                        class="text-warning text-decoration-none fw-semibold"
                        @click.prevent="sendCode"
                    >
                        Gửi lại
                    </a>
                </p>
            </div>

            <!-- 🔸 Bước 3: Đặt lại mật khẩu -->
            <div v-else-if="step === 3">
                <h3 class="mb-3 text-warning fw-bold">Đặt Lại Mật Khẩu</h3>
                <p class="text-muted mb-4">Nhập mật khẩu mới để hoàn tất quá trình khôi phục.</p>

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
                        class="btn btn-warning text-white w-100 rounded-3 py-2 fw-semibold"
                        :disabled="loading"
                    >
                        <span v-if="!loading">Hoàn tất</span>
                        <span v-else>Đang cập nhật...</span>
                    </button>
                </form>
            </div>

            <!-- 🔸 Bước 4: Thành công -->
            <div v-else>
                <h3 class="mb-3 text-success fw-bold">Thành Công!</h3>
                <p class="text-muted mb-4">Mật khẩu của bạn đã được đặt lại thành công.</p>
                <a href="/quan-an/dang-nhap" class="btn btn-success w-100 rounded-3 py-2 fw-semibold">
                    Đăng nhập ngay
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ForgotPasswordQuanAn",
    data() {
        return {
            step: 1,
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
                    "http://localhost:8000/api/quan-an/quen-mat-khau/gui-ma",
                    { email: this.email }
                );

                if (res.data.status === 1) {
                    alert(res.data.message);
                    this.step = 2;
                } else {
                    alert(res.data.message || "Gửi mã thất bại!");
                }
            } catch (error) {
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
                    "http://localhost:8000/api/quan-an/quen-mat-khau/xac-thuc",
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
            } catch (error) {
                alert("Có lỗi xảy ra khi xác thực mã!");
            } finally {
                this.loading = false;
            }
        },

        async finishReset() {
            if (this.newPassword !== this.confirmPassword) {
                alert("⚠️ Mật khẩu xác nhận không khớp!");
                return;
            }

            this.loading = true;
            try {
                const res = await axios.post(
                    "http://localhost:8000/api/quan-an/quen-mat-khau/dat-lai",
                    {
                        email: this.email,
                        code: this.code,
                        password: this.newPassword,
                        password_confirmation: this.confirmPassword,
                    }
                );

                if (res.data.status === 1) {
                    alert(res.data.message);
                    this.step = 4;
                } else {
                    alert(res.data.message || "Đặt lại mật khẩu thất bại!");
                }
            } catch (error) {
                alert("Có lỗi xảy ra khi đặt lại mật khẩu!");
            } finally {
                this.loading = false;
            }
        },
    },
};
</script>

<style scoped>
.auth-wrapper {
    background: linear-gradient(to right, #fff9f0, #fff3e0);
}

.card {
    border: none;
}

/* 🔸 Logo chỉnh đẹp hơn */
.logo-restaurant {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0 4px 12px rgba(255, 152, 0, 0.4);
}

/* 🔸 Nút và màu sắc tông vàng */
.btn-warning {
    background-color: #ff9800;
    border: none;
}

.btn-warning:hover {
    background-color: #f57c00;
}

.text-warning {
    color: #ff9800 !important;
}

/* 🔸 Input focus */
.form-control:focus {
    border-color: #ff9800;
    box-shadow: 0 0 0 0.25rem rgba(255, 152, 0, 0.25);
}
</style>
