<template>
    <div class="auth-wrapper d-flex align-items-center justify-content-center vh-100 bg-light">
        <div class="card shadow-lg p-4 text-center rounded-4" style="max-width: 420px; width: 100%;">

            <!-- Logo -->
            <div class="d-flex justify-content-center mb-3">
                <img
                    src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
                    alt="Logo Shipper"
                    class="logo-shipper"
                />
            </div>

            <!-- 🔵 Bước 1: Nhập Email -->
            <div v-if="step === 1">
                <h3 class="mb-3 text-primary fw-bold">Quên Mật Khẩu (Shipper)</h3>
                <p class="text-muted mb-4">Nhập email để nhận mã khôi phục.</p>

                <form @submit.prevent="sendCode">
                    <div class="mb-3 text-start">
                        <label class="form-label">Email</label>
                        <input
                            v-model="email"
                            type="email"
                            class="form-control rounded-3"
                            placeholder="Nhập email"
                            required
                        />
                    </div>

                    <button
                        class="btn btn-primary w-100 py-2 rounded-3 fw-semibold"
                        type="submit"
                        :disabled="loading"
                    >
                        <span v-if="!loading">Gửi mã xác nhận</span>
                        <span v-else>Đang gửi...</span>
                    </button>
                </form>

                <p class="mt-4 text-secondary">
                    Đã có tài khoản?
                    <router-link to="/shipper/dang-nhap" class="text-primary fw-semibold">
                        Đăng nhập ngay
                    </router-link>
                </p>
            </div>

            <!-- 🔵 Bước 2: Nhập mã xác nhận -->
            <div v-else-if="step === 2">
                <h3 class="mb-3 text-primary fw-bold">Xác Nhận Mã</h3>
                <p class="text-muted mb-4">Vui lòng nhập mã gồm 6 số đã gửi đến email.</p>

                <form @submit.prevent="verifyCode">
                    <div class="mb-3 text-start">
                        <label class="form-label">Mã xác nhận</label>
                        <input
                            v-model="code"
                            type="text"
                            maxlength="6"
                            class="form-control rounded-3 text-center"
                            placeholder="Nhập mã 6 số"
                            required
                        />
                    </div>

                    <button
                        class="btn btn-primary w-100 py-2 rounded-3 fw-semibold"
                        type="submit"
                        :disabled="loading"
                    >
                        <span v-if="!loading">Xác nhận</span>
                        <span v-else>Đang kiểm tra...</span>
                    </button>
                </form>

                <p class="mt-3 text-secondary small">
                    Không nhận được mã?
                    <a href="#" class="text-primary fw-semibold" @click.prevent="sendCode">
                        Gửi lại
                    </a>
                </p>
            </div>

            <!-- 🔵 Bước 3: Nhập mật khẩu mới -->
            <div v-else-if="step === 3">
                <h3 class="mb-3 text-primary fw-bold">Đặt Lại Mật Khẩu</h3>
                <p class="text-muted mb-4">Nhập mật khẩu mới để hoàn tất.</p>

                <form @submit.prevent="finishReset">
                    <div class="mb-3 text-start">
                        <label class="form-label">Mật khẩu mới</label>
                        <input
                            v-model="newPassword"
                            type="password"
                            class="form-control rounded-3"
                            placeholder="Nhập mật khẩu mới"
                            required
                        />
                    </div>

                    <div class="mb-3 text-start">
                        <label class="form-label">Xác nhận mật khẩu</label>
                        <input
                            v-model="confirmPassword"
                            type="password"
                            class="form-control rounded-3"
                            placeholder="Nhập lại mật khẩu"
                            required
                        />
                    </div>

                    <button
                        class="btn btn-primary w-100 py-2 rounded-3 fw-semibold"
                        type="submit"
                        :disabled="loading"
                    >
                        <span v-if="!loading">Hoàn tất</span>
                        <span v-else>Đang cập nhật...</span>
                    </button>
                </form>
            </div>

            <!-- 🔵 Bước 4: Thành công -->
            <div v-else>
                <h3 class="mb-3 text-success fw-bold">Thành Công!</h3>
                <p class="text-muted mb-4">Mật khẩu đã được đặt lại thành công.</p>

                <router-link to="/shipper/dang-nhap" class="btn btn-success w-100 rounded-3 py-2 fw-semibold">
                    Đăng nhập ngay
                </router-link>
            </div>

        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "QuenMatKhauShipper",
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
                    "http://localhost:8000/api/shipper/quen-mat-khau/gui-ma",
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
                    "http://localhost:8000/api/shipper/quen-mat-khau/xac-thuc",
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
                alert("❌ Mật khẩu xác nhận không khớp!");
                return;
            }

            this.loading = true;
            try {
                const res = await axios.post(
                    "http://localhost:8000/api/shipper/quen-mat-khau/dat-lai",
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
    background: linear-gradient(to right, #e3f2fd, #bbdefb);
}

.card {
    border: none;
}

.logo-shipper {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    box-shadow: 0 4px 12px rgba(25, 118, 210, 0.4);
}

.btn-primary {
    background-color: #1976d2;
    border: none;
}

.btn-primary:hover {
    background-color: #0d47a1;
}

.text-primary {
    color: #1976d2 !important;
}

.form-label {
    color: #0d47a1;
}

.form-control:focus {
    border-color: #1976d2;
    box-shadow: 0 0 0 0.25rem rgba(25, 118, 210, 0.25);
}
</style>
