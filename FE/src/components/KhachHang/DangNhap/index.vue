<template>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <img src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
                                width="130" alt="Logo" class="mb-2" />
                            <h3 class="fw-bold text-primary">ĐĂNG NHẬP KHÁCH HÀNG</h3>
                        </div>

                        <form @submit.prevent="Login">
                            <div class="mb-3 text-start">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input v-model="user.email" type="email"
                                    class="form-control rounded-3 border-primary-subtle" id="email"
                                    placeholder="Nhập email của bạn" />
                            </div>

                            <div class="mb-3 text-start">
                                <label for="password" class="form-label fw-semibold">Mật khẩu</label>
                                <input v-model="user.password" type="password"
                                    class="form-control rounded-3 border-primary-subtle" id="password"
                                    placeholder="Nhập mật khẩu" />
                            </div>

                            <div class="mb-4 text-start">
                                <label class="form-label fw-semibold">Recaptcha</label>
                                <div class="g-recaptcha" data-sitekey="6LftzRorAAAAAFqAWCXc2BGMp7XM-RgWuryT0v7d"></div>
                            </div>

                            <button type="submit" class="btn btn-gradient w-100 py-2 mb-3 fw-semibold">
                                <i class="fa-solid fa-right-to-bracket me-2"></i>Đăng Nhập
                            </button>

                            <div class="text-center">
                                <router-link to="/khach-hang/quen-mat-khau"
                                    class="text-decoration-none small text-warning fw-semibold me-2">
                                    Quên mật khẩu
                                </router-link>
                                <span class="text-muted">|</span>
                                <router-link to="/khach-hang/dang-ky"
                                    class="text-decoration-none small text-primary fw-semibold ms-2">
                                    Đăng ký tài khoản
                                </router-link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            user: {
                email: "",
                password: "",
            },
        };
    },
    mounted() {
        const recaptchaScript = document.createElement("script");
        recaptchaScript.setAttribute("src", "https://www.google.com/recaptcha/api.js");
        recaptchaScript.onerror = () => {
            this.$toast.error("Không thể tải Recaptcha. Vui lòng thử lại sau.");
        };
        document.head.appendChild(recaptchaScript);
    },
    methods: {
        Login() {
            const code = grecaptcha.getResponse();
            if (code.length === 0) {
                this.$toast.error("Vui lòng xác minh Recaptcha.");
                return;
            }
            this.user.code = code;
            axios
                .post("http://127.0.0.1:8000/api/khach-hang/dang-nhap", this.user)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        localStorage.setItem("khach_hang_login", res.data.token);
                        this.$router.push("/khach-hang/profile");
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
    },
};
</script>

<style scoped>
body {
    background: linear-gradient(to right, #e3f2fd, #fffde7);
}

.card {
    background-color: #ffffff;
}

.btn-gradient {
    background: linear-gradient(to right, #1976d2, #ffb300);
    border: none;
    color: white;
    transition: all 0.3s ease;
}

.btn-gradient:hover {
    background: linear-gradient(to right, #1565c0, #ffa000);
    transform: translateY(-2px);
}

.text-primary {
    color: #1976d2 !important;
}

.text-warning {
    color: #ffb300 !important;
}

.form-control:focus {
    border-color: #1976d2;
    box-shadow: 0 0 5px rgba(25, 118, 210, 0.3);
}
</style>
