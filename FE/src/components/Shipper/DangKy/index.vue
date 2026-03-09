<template>
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
            <div class="col mx-auto">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <div class="border p-4 rounded-4 bg-light">
                            <div class="text-center mb-3">
                                <img src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
                                    width="130" alt="Logo" />
                                <h3 class="fw-bold text-primary mt-2">ĐĂNG KÝ SHIPPER</h3>
                            </div>

                            <hr class="mb-4" />

                            <div class="form-body">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label fw-semibold">Họ Và Tên</label>
                                        <input v-model="them_shipper.ho_va_ten" type="text"
                                            class="form-control rounded-3" />
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label fw-semibold">Email</label>
                                        <input v-model="them_shipper.email" type="email"
                                            class="form-control rounded-3" />
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label fw-semibold">Số Điện Thoại</label>
                                        <input v-model="them_shipper.so_dien_thoai" type="text"
                                            class="form-control rounded-3" />
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label fw-semibold">CCCD</label>
                                        <input v-model="them_shipper.cccd" type="text" class="form-control rounded-3" />
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label fw-semibold">Mật Khẩu</label>
                                        <input v-model="them_shipper.password" type="password"
                                            class="form-control rounded-3" />
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label fw-semibold">Nhập Lại Mật Khẩu</label>
                                        <input v-model="them_shipper.re_password" type="password"
                                            class="form-control rounded-3" />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Quận Huyện</label>
                                        <select class="form-select rounded-3" v-model="them_shipper.id_quan_huyen">
                                            <template v-for="(value, index) in list_quan_huyen" :key="index">
                                                <option :value="value.id">{{ value.ten_quan_huyen }}</option>
                                            </template>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Địa chỉ thường trú</label>
                                        <textarea v-model="them_shipper.dia_chi"
                                            class="form-control rounded-3"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="button" v-on:click="dangKyShipper()"
                                                class="btn btn-primary text-white fw-semibold py-2 rounded-3">
                                                <i class="bx bx-user"></i> Đăng Ký
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <router-link to="/shipper/dang-nhap">
                                            <button type="button"
                                                class="btn btn-outline-primary w-100 fw-semibold py-2 rounded-3">
                                                <i class="fa-solid fa-arrow-left"></i> Quay Lại Đăng Nhập
                                            </button>
                                        </router-link>
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
import axios from "axios";

export default {
    data() {
        return {
            list_quan_huyen: [],
            them_shipper: {},
        };
    },

    mounted() {
        this.loadDataQuanHuyen();
    },

    methods: {
        loadDataQuanHuyen() {
            axios.get("http://127.0.0.1:8000/api/admin/quan-huyen/data-open").then((res) => {
                this.list_quan_huyen = res.data.data;
            });
        },

        dangKyShipper() {
            axios
                .post("http://127.0.0.1:8000/api/shipper/dang-ky", this.them_shipper)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.them_shipper = {};
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
    background: linear-gradient(to right, #e3f2fd, #bbdefb);
}

.card {
    border: none;
}

.btn-primary {
    background-color: #1976d2;
    border: none;
}

.btn-primary:hover {
    background-color: #0d47a1;
}

.btn-outline-primary {
    border-color: #1976d2;
    color: #1976d2;
}

.btn-outline-primary:hover {
    background-color: #1976d2;
    color: white;
}

.text-primary {
    color: #1976d2 !important;
}

.form-label {
    color: #0d47a1;
}
</style>
