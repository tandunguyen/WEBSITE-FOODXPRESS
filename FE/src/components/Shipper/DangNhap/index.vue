<template>
    <div class="auth-wrapper d-flex align-items-center justify-content-center vh-100 bg-light-blue">
        <div class="card shadow-lg p-4 rounded-4" style="max-width: 420px; width: 100%;">
            <div class="text-center mb-3">
                <img src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
                    width="130" alt="Logo Shipper" class="mb-2" />
                <h3 class="fw-bold text-primary">ĐĂNG NHẬP SHIPPER</h3>
            </div>

            <hr class="border-primary opacity-100" />

            <div class="form-body mt-3">
                <div class="mb-3 text-start">
                    <label class="form-label text-primary">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent text-primary border-end-0">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input v-model="user.email" @keyup.enter="Login()" type="email"
                            class="form-control border-start-0" placeholder="Nhập Email" />
                    </div>
                </div>

                <div class="mb-2 text-start">
                    <label class="form-label text-primary">Mật khẩu</label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent text-primary border-end-0">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input v-model="user.password" @keyup.enter="Login()" type="password"
                            class="form-control border-start-0" placeholder="Nhập Mật Khẩu" />
                    </div>
                </div>

                <!-- 🔹 Quên mật khẩu -->
                <div class="text-end mb-3">
                    <router-link to="/shipper/quen-mat-khau" class="text-decoration-none">
                        <small class="text-primary fw-semibold">Quên mật khẩu?</small>
                    </router-link>
                </div>

                <!-- 🔹 Nút đăng nhập -->
                <div class="d-grid mb-3">
                    <button @click="Login()" type="button"
                        class="btn btn-primary text-white rounded-3 py-2 fw-semibold">
                        <i class="fa-solid fa-lock-open me-1"></i> Đăng Nhập
                    </button>
                </div>

                <!-- 🔹 Đăng ký -->
                <div class="text-center">
                    <p class="mb-0 text-secondary">
                        Bạn chưa có tài khoản?
                        <router-link to="/shipper/dang-ky" class="text-primary fw-bold text-decoration-none">
                            Đăng ký
                        </router-link>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "DangNhapShipper",
    data() {
        return {
            user: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        Login() {
            axios
                .post("http://127.0.0.1:8000/api/shipper/dang-nhap", this.user)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        localStorage.setItem('shipper_login', res.data.token);
                        this.$router.push('/shipper/profile');
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        }
    },
}
</script>

<style scoped>
/* 🌊 Tông nền xanh nhẹ */
.bg-light-blue {
    background: linear-gradient(to right, #e3f2fd, #bbdefb);
}

.card {
    border: none;
}

/* 🔹 Màu chính xanh dương */
.text-primary {
    color: #2196f3 !important;
}

/* 🔹 Viền input focus */
.form-control:focus {
    border-color: #2196f3;
    box-shadow: 0 0 0 0.25rem rgba(33, 150, 243, 0.25);
}

/* 🔹 Nút xanh */
.btn-primary {
    background-color: #2196f3;
    border: none;
}

.btn-primary:hover {
    background-color: #1976d2;
}

/* 🔹 Link */
.text-primary:hover {
    text-decoration: underline;
}
</style>
