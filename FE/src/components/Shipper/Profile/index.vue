<template>
    <div class="page-content">
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="position-relative">
                                        <img src="https://i.pinimg.com/736x/b4/1d/47/b41d47f6435985f87e3cde6e957b7931.jpg"
                                            alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                        <button
                                            class="btn btn-light btn-sm rounded-circle position-absolute bottom-0 end-0">
                                            <i class="fa-solid fa-camera"></i>
                                        </button>
                                    </div>
                                    <div class="mt-3">
                                        <h4>{{ user.ho_va_ten }}</h4>
                                        <p class="text-secondary mb-1">Shipper</p>
                                        <p class="text-muted font-size-sm">
                                            <i class="fa-solid fa-circle text-success me-1"></i>
                                            Đang hoạt động
                                        </p>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <i class="fa-solid fa-envelope text-primary me-2"></i>
                                            Email
                                        </h6>
                                        <span class="text-secondary">{{ user.email }}</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <i class="fa-solid fa-phone text-primary me-2"></i>
                                            Số điện thoại
                                        </h6>
                                        <span class="text-secondary">{{ user.so_dien_thoai }}</span>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="border rounded-3 p-4 mb-4">
                                    <h5 class="mb-4 text-primary">
                                        <i class="fa-regular fa-user me-2"></i>
                                        Thông tin cá nhân
                                    </h5>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Họ và tên</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <input v-model="user.ho_va_ten" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <input v-model="user.email" disabled type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Số điện thoại</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <input v-model="user.so_dien_thoai" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Địa chỉ</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <input v-model="user.dia_chi" type="text" class="form-control">
                                        </div>
                                        <div class="col-lg-12 text-end mt-3">
                                            <button type="button" class="btn btn-primary px-4"
                                                v-on:click="updateProfile()">
                                                <i class="fa-regular fa-floppy-disk me-2"></i>
                                                Lưu thay đổi
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="border rounded-3 p-4">
                                    <h5 class="mb-4 text-primary">
                                        <i class="fa-solid fa-lock me-2"></i>
                                        Đổi mật khẩu
                                    </h5>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mật khẩu hiện tại</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <input v-model="doi_mat_khau.mat_khau_cu" type="password"
                                                class="form-control" placeholder="Nhập mật khẩu hiện tại">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mật khẩu mới</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <input v-model="doi_mat_khau.mat_khau_moi" type="password"
                                                class="form-control" placeholder="Nhập mật khẩu mới">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Xác nhận mật khẩu</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <input v-model="doi_mat_khau.xac_nhan_mat_khau_moi" type="password"
                                                class="form-control" placeholder="Nhập lại mật khẩu mới">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 d-flex justify-content-end">
                                            <button v-on:click="doiMatKhau()" type="button" class="btn btn-primary px-4">
                                                <i class="fa-solid fa-key"></i>
                                                Đổi Mật Khẩu
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
            user: {},
            doi_mat_khau: {
                mat_khau_cu: "",
                mat_khau_moi: "",
                xac_nhan_mat_khau: ""
            }
        }
    },
    mounted() {
        this.layThongTinLogin();
    },
    methods: {
        doiMatKhau() {
            axios
                .post("http://127.0.0.1:8000/api/shipper/doi-mat-khau", this.doi_mat_khau, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("shipper_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status == 1) {
                        this.$toast.success(res.data.message);
                        this.doi_mat_khau = {
                            mat_khau_cu: '',
                            mat_khau_moi: '',
                            xac_nhan_mat_khau_moi: ''
                        }
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
        },

        updateProfile() {
            axios
                .post("http://127.0.0.1:8000/api/shipper/update-profile", this.user, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("shipper_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status == 1) {
                        this.$toast.success(res.data.message);
                        this.doi_mat_khau = {
                            mat_khau_cu: '',
                            mat_khau_moi: '',
                            xac_nhan_mat_khau_moi: ''
                        }
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
        },

        layThongTinLogin() {
            var token = localStorage.getItem("shipper_login");
            axios
                .get("http://127.0.0.1:8000/api/shipper/data-login", {
                    headers: {
                        Authorization: "Bearer " + token,
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.user = res.data.data;
                    } else {
                        toaster.error(res.data.message);
                    }
                });
        }
    },
}
</script>
<style></style>