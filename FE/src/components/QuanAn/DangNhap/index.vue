<template>
    <div class="auth-wrapper d-flex align-items-center justify-content-center vh-100 bg-light">
        <div class="card shadow-lg p-4 rounded-4" style="max-width: 420px; width: 100%;">
            <div class="text-center mb-3">
                <img src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
                    alt="Logo Quán Ăn" class="logo mb-2" />
                <h3 class="fw-bold text-warning mt-2">ĐĂNG NHẬP QUÁN ĂN</h3>
            </div>

            <hr />

            <div class="form-body">
                <div class="mb-3 text-start">
                    <label class="form-label">Email</label>
                    <input v-model="user.email" @keyup.enter="Login()" type="email" class="form-control rounded-3"
                        placeholder="Nhập Email" />
                </div>

                <div class="mb-2 text-start">
                    <label class="form-label">Mật khẩu</label>
                    <input v-model="user.password" @keyup.enter="Login()" type="password" class="form-control rounded-3"
                        placeholder="Nhập Mật Khẩu" />
                </div>

                <!-- 🔹 Link quên mật khẩu -->
                <div class="text-end mb-3">
                    <router-link to="/quan-an/quen-mat-khau" class="text-decoration-none">
                        <small class="text-warning fw-semibold">Quên mật khẩu?</small>
                    </router-link>
                </div>

                <!-- 🔹 Nút đăng nhập -->
                <div class="d-grid mb-3">
                    <button @click="Login()" type="button"
                        class="btn btn-warning text-white rounded-3 py-2 fw-semibold">
                        Đăng Nhập
                    </button>
                </div>

                <!-- 🔹 Đăng ký -->
                <div class="text-center">
                    <p class="mb-0 text-secondary">
                        Bạn chưa có tài khoản?
                        <router-link to="/quan-an/dang-ky" class="text-warning fw-bold text-decoration-none">
                            Đăng ký
                        </router-link>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "DangNhapQuanAn",
    data() {
        return {
            user: {
                email: "",
                password: "",
            },
        };
    },
    methods: {
        Login() {
            axios
                .post("http://127.0.0.1:8000/api/quan-an/dang-nhap", this.user)
                .then((res) => {
                    if (res.data.status) {
                        localStorage.setItem("quan_an_login", res.data.token);
                        this.$toast.success(res.data.message);
                        this.$router.push("/quan-an/profile");
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
.auth-wrapper {
    background: linear-gradient(to right, #fff9f0, #fff3e0);
}

.card {
    border: none;
}

.logo {
    width: 120px;
    height: auto;
    border-radius: 16px;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
}

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

.text-warning:hover {
    text-decoration: underline;
}
</style>
