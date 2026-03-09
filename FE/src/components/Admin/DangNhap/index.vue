<template>
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="card shadow-lg radius-10 border-0">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <img src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
                                    width="150" alt="Logo" class="mb-3" />
                                <h4 class="fw-bold text-primary">ĐĂNG NHẬP ADMIN</h4>
                                <div class="underline mx-auto mb-3"></div>
                            </div>

                            <div class="form-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label fw-semibold text-primary">📧 Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-primary text-light">
                                                <i class="fa-solid fa-envelope"></i>
                                            </span>
                                            <input v-model="user.email" @keyup.enter="Login()" type="email"
                                                class="form-control border-start-0" placeholder="Nhập email của bạn">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-semibold text-primary">🔒 Mật khẩu</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-primary text-light">
                                                <i class="fa-solid fa-lock"></i>
                                            </span>
                                            <input v-model="user.password" @keyup.enter="Login()" type="password"
                                                class="form-control border-start-0" placeholder="Nhập mật khẩu">
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <div class="d-grid">
                                            <button v-on:click="Login()" class="btn btn-custom fw-bold py-2">
                                                <i class="fa-solid fa-right-to-bracket me-2"></i>
                                                Đăng Nhập
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
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
                .post("http://127.0.0.1:8000/api/admin/dang-nhap", this.user)
                .then((res) => {
                    if (res.data.status) {
                        localStorage.setItem('nhan_vien_login', res.data.token);
                        this.$toast.success(res.data.message);
                        this.$router.push('/admin/quan-an');
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v) => {
                        this.$toast.error(v[0]);
                    });
                })
        }
    }
}
</script>

<style scoped>
.card {
    border-top: 5px solid #007bff;
}

.underline {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #007bff, #ffd700);
    border-radius: 5px;
}

.btn-custom {
    background: linear-gradient(90deg, #007bff, #ffd700);
    color: #fff;
    border: none;
    transition: 0.3s;
}

.btn-custom:hover {
    background: linear-gradient(90deg, #0056b3, #ffcc00);
    transform: scale(1.03);
}

.input-group-text {
    border: none;
}

.form-control:focus {
    box-shadow: 0 0 5px #ffd700;
    border-color: #007bff;
}

.bg-light {
    background: linear-gradient(135deg, #e9f3ff 0%, #fffbe6 100%) !important;
}
</style>
