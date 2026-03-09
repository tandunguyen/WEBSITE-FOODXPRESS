<template>
    <div class="container mt-3">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
            <div class="col mx-auto">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body">
                        <div class="border p-4 rounded bg-light-yellow">
                            <div class="text-center mb-3">
                                <img src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
                                    width="130" alt="Logo Quán Ăn" class="mb-2" />
                                <h3 class="fw-bold text-warning">ĐĂNG KÝ QUÁN ĂN</h3>
                            </div>

                            <div class="login-separater text-center mb-4">
                                <hr class="border-warning opacity-100">
                            </div>

                            <div class="form-body">
                                <form class="row g-3">
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                            <label class="form-label text-warning">Tên Quán Ăn</label>
                                            <input v-model="quan_an_create.ten_quan_an" type="text"
                                                class="form-control border-warning" placeholder="Nhập tên quán ăn">
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="form-label text-warning">Email</label>
                                            <input v-model="quan_an_create.email" type="email"
                                                class="form-control border-warning" placeholder="Nhập email của bạn">
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="form-label text-warning">Mật khẩu</label>
                                            <input v-model="quan_an_create.password" type="password"
                                                class="form-control border-warning" placeholder="Nhập mật khẩu">
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="form-label text-warning">Nhập lại mật khẩu</label>
                                            <input v-model="quan_an_create.re_password" type="password"
                                                class="form-control border-warning" placeholder="Nhập lại mật khẩu">
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="form-label text-warning">Số Điện Thoại</label>
                                            <input v-model="quan_an_create.so_dien_thoai" type="text"
                                                class="form-control border-warning" placeholder="Nhập số điện thoại">
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="form-label text-warning">Mã Số Thuế</label>
                                            <input v-model="quan_an_create.ma_so_thue" type="text"
                                                class="form-control border-warning" placeholder="Nhập mã số thuế">
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="form-label text-warning">Giờ mở cửa</label>
                                            <input v-model="quan_an_create.gio_mo_cua" type="time"
                                                class="form-control border-warning">
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="form-label text-warning">Giờ đóng cửa</label>
                                            <input v-model="quan_an_create.gio_dong_cua" type="time"
                                                class="form-control border-warning">
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="form-label text-warning">Địa Chỉ</label>
                                            <input v-model="quan_an_create.dia_chi" type="text"
                                                class="form-control border-warning" placeholder="Nhập địa chỉ">
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="form-label text-warning">Quận huyện</label>
                                            <select class="form-control border-warning"
                                                v-model="quan_an_create.id_quan_huyen">
                                                <option v-for="item in quan_huyen" :key="item.id" :value="item.id">{{
                                                    item.ten_quan_huyen }}</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-12 mt-4">
                                            <div class="d-grid">
                                                <button @click="dangKyQuanAn()" type="button"
                                                    class="btn btn-warning text-white fw-semibold py-2 rounded-3">
                                                    Đăng Ký
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3 text-center">
                                            <p class="mb-0 text-secondary">
                                                Bạn đã có tài khoản?
                                                <router-link to="/quan-an/dang-nhap"
                                                    class="text-warning fw-bold text-decoration-none">
                                                    Đăng Nhập
                                                </router-link>
                                            </p>
                                        </div>
                                    </div>
                                </form>
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
            quan_an_create: {
                email: "",
                password: "",
                re_password: "",
                ma_so_thue: "",
                ten_quan_an: "",
                so_dien_thoai: "",
                gio_mo_cua: "",
                gio_dong_cua: "",
                dia_chi: "",
                id_quan_huyen: "",
                is_active: "",
                tinh_trang: ""
            },
            quan_huyen: [],
        };
    },
    mounted() {
        this.getQuanHuyen();
    },
    methods: {
        dangKyQuanAn() {
            axios
                .post('http://127.0.0.1:8000/api/quan-an/dang-ky', this.quan_an_create)
                .then(res => {
                    this.quan_an_create = {};
                    this.$toast.success(res.data.message);
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach(v => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        getQuanHuyen() {
            axios.get('http://127.0.0.1:8000/api/admin/quan-huyen/data-open')
                .then(res => {
                    this.quan_huyen = res.data.data;
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach(v => {
                        this.$toast.error(v[0]);
                    });
                });
        },
    },
};
</script>

<style scoped>
.bg-light-yellow {
    background: linear-gradient(to right, #fff8e1, #ffecb3);
}

.text-warning {
    color: #ff9800 !important;
}

.btn-warning {
    background-color: #ff9800 !important;
    border: none;
}

.btn-warning:hover {
    background-color: #f57c00 !important;
}

.form-control:focus {
    border-color: #ff9800;
    box-shadow: 0 0 0 0.25rem rgba(255, 152, 0, 0.25);
}

hr.border-warning {
    border-color: #ff9800 !important;
}
</style>
