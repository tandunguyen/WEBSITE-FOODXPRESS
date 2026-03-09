<template>
    <div class="auth-bg d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow-lg p-4 rounded-4" style="max-width: 500px; width: 100%;">
            <div class="text-center mb-3">
                <img src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
                    width="110" alt="Logo" class="mb-2" />
                <h2 class="fw-bold text-primary">ĐĂNG KÝ TÀI KHOẢN</h2>
                <p class="text-muted mb-1">Tham gia ngay để thưởng thức những món ăn tuyệt vời!</p>
            </div>

            <hr class="border-warning mb-4" />

            <form>
                <div class="mb-3">
                    <label class="form-label">👤 Họ và Tên</label>
                    <input v-model="dang_ki.ho_va_ten" type="text" class="form-control"
                        placeholder="Nhập họ và tên của bạn">
                </div>

                <div class="mb-3">
                    <label class="form-label">📧 Email</label>
                    <input v-model="dang_ki.email" type="email" class="form-control" placeholder="Nhập email của bạn">
                </div>

                <div class="mb-3">
                    <label class="form-label">📱 Số Điện Thoại</label>
                    <input v-model="dang_ki.so_dien_thoai" type="number" class="form-control"
                        placeholder="Nhập số điện thoại của bạn">
                </div>

                <div class="mb-3">
                    <label class="form-label">🎂 Ngày Sinh</label>
                    <input v-model="dang_ki.ngay_sinh" type="date" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">🔒 Mật Khẩu</label>
                    <input v-model="dang_ki.password" type="password" class="form-control" placeholder="Nhập mật khẩu">
                </div>

                <div class="mb-4">
                    <label class="form-label">🔄 Xác Nhận Mật Khẩu</label>
                    <input v-model="dang_ki.re_password" type="password" class="form-control"
                        placeholder="Xác nhận mật khẩu">
                </div>

                <div class="d-grid">
                    <button @click="dangKi()" type="button" class="btn btn-primary py-2 fw-semibold">
                        🚀 Đăng Ký
                    </button>
                </div>
            </form>

            <div class="text-center mt-3">
                <p class="mb-0 text-secondary">Đã có tài khoản?
                    <router-link to="/khach-hang/dang-nhap" class="text-link fw-bold text-decoration-none">
                        Đăng Nhập
                    </router-link>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            dang_ki: {
                'email': "",
                'so_dien_thoai': "",
                'ho_va_ten': "",
                'password': "",
                're_password': "",
                'ngay_sinh': "",
            }
        }
    },

    methods: {
        dangKi() {
            axios
                .post('http://127.0.0.1:8000/api/khach-hang/register', this.dang_ki)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.dang_ki = {
                            'email': "",
                            'so_dien_thoai': "",
                            'ho_va_ten': "",
                            'password': "",
                            're_password': "",
                            'ngay_sinh': "",
                        }
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v) => {
                        this.$toast.error(v[0]);
                    });
                });
        }
    },
}
</script>

<style scoped>
/* Nền tổng thể xanh dương pha vàng */
.auth-bg {
    background: linear-gradient(135deg, #bbdefb 0%, #fff8e1 100%);
}

/* Card trắng với bóng đổ nhẹ */
.card {
    border: none;
    background-color: #ffffff;
}

/* Tiêu đề chính */
.text-primary {
    color: #1565c0 !important;
}

/* Label form */
.form-label {
    font-weight: 600;
    color: #0d47a1;
}

/* Đường kẻ vàng */
hr.border-warning {
    border-top: 2px solid #fbc02d;
}

/* Nút chính xanh dương */
.btn-primary {
    background-color: #1976d2;
    border: none;
    transition: all 0.3s ease;
    box-shadow: 0 3px 6px rgba(25, 118, 210, 0.3);
}

.btn-primary:hover {
    background-color: #0d47a1;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(25, 118, 210, 0.4);
}

/* Input focus có hiệu ứng xanh */
.form-control:focus {
    border-color: #1976d2;
    box-shadow: 0 0 6px rgba(25, 118, 210, 0.4);
}

/* Link đăng nhập màu xanh, hover vàng */
.text-link {
    color: #1976d2;
    transition: color 0.3s ease;
}

.text-link:hover {
    color: #fbc02d;
}
</style>
