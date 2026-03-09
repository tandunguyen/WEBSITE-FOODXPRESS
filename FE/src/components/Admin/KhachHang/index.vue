<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mt-2"><b>Danh Sách Khách Hàng</b></h4>
                    <div>
                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#themmoiKhachhangModal">Thêm Mới</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-2 mt-2">
                        
                    </div>
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="text-center table-primary">
                                <th>#</th>
                                <th>Họ Và Tên</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Ngày Sinh</th>
                                <th>Trạng Thái</th>
                                <th>Kích Hoạt</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, index) in list_khach_hang" :key="index" class="align-middle">
                                <th class="text-center">{{ index + 1 }}</th>
                                <td>{{ value.ho_va_ten }}</td>
                                <td>{{ value.email }}</td>
                                <td class="text-center">{{ value.so_dien_thoai }}</td>
                                <td class="text-center">{{ value.ngay_sinh }}</td>
                                <td class="text-center" v-on:click="changeStatus(value)">
                                    <button class="btn btn-success me-1 w-100" v-if="value.is_block == 0">Hoạt
                                        Động</button>
                                    <button class="btn btn-danger me-1 w-100" v-else>Tạm Tắt</button>
                                </td>
                                <td class="text-center" v-on:click="changeActive(value)">
                                    <button class="btn btn-warning me-1 w-100" v-if="value.is_active == 0"
                                        style="color: white;">Chưa Kích
                                        Hoạt</button>
                                    <button class="btn btn-success me-1 w-100" v-else>Đã Kích Hoạt</button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-primary me-1"
                                        @click="Object.assign(update_khach_hang, value)" data-bs-toggle="modal"
                                        data-bs-target="#capNhatKhachhangModal">Cập Nhật</button>
                                    <button class="btn btn-danger" @click="del_khach_hang = value"
                                        data-bs-toggle="modal" data-bs-target="#xoaKhachhangModal">Xóa</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="themmoiKhachhangModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Mới Khách Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 mb-2">
                        <label>Họ và Tên</label>
                        <input type="text" class="form-control" v-model="create_khach_hang.ho_va_ten">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Email</label>
                        <input type="email" class="form-control" v-model="create_khach_hang.email">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Số Điện Thoại</label>
                        <input type="text" class="form-control" v-model="create_khach_hang.so_dien_thoai">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Ngày sinh</label>
                        <input type="date" class="form-control" v-model="create_khach_hang.ngay_sinh">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Mật Khẩu</label>
                        <input type="password" class="form-control" v-model="create_khach_hang.password">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" v-model="create_khach_hang.password">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Tình Trạng</label>
                        <select v-model="update_khach_hang.is_block" class="form-select ">
                            <option value="0">Hoạt Động</option>
                            <option value="1">Tạm Tắt</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Kích Hoạt</label>
                        <select v-model="update_khach_hang.is_active" class="form-select ">
                            <option value="1">Đã Kích Hoạt</option>
                            <option value="0">Chưa Kích Hoạt</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" @click="themMoi()" data-bs-dismiss="modal">Xác
                        Nhận</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="capNhatKhachhangModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Khách Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 mb-2">
                        <label>Họ và Tên</label>
                        <input type="text" class="form-control" v-model="update_khach_hang.ho_va_ten">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Email</label>
                        <input type="email" class="form-control" v-model="update_khach_hang.email">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Số Điện Thoại</label>
                        <input type="text" class="form-control" v-model="update_khach_hang.so_dien_thoai">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Ngày sinh</label>
                        <input type="date" class="form-control" v-model="update_khach_hang.ngay_sinh">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Tình Trạng</label>
                        <select v-model="update_khach_hang.is_block" class="form-select">
                            <option value="0">Hoạt Động</option>
                            <option value="1">Tạm Tắt</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Kích Hoạt</label>
                        <select v-model="update_khach_hang.is_active" class="form-select">
                            <option value="1">Đã Kích Hoạt</option>
                            <option value="0">Chưa Kích Hoạt</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" @click="capNhatKhachHang()"
                        data-bs-dismiss="modal">Xác
                        Nhận</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="xoaKhachhangModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa Khách Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i></div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-white">Cảnh Báo!</h6>
                                <div class="text-white">Bạn có chắc chắn xóa tài khoản <b>{{ del_khach_hang.ho_va_ten
                                        }}</b> này không!</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" @click="xoaKhachHang()" data-bs-dismiss="modal">Xác
                        Nhận</button>
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
            list_khach_hang: [],
            create_khach_hang: {
                ho_va_ten: '',
                email: '',
                so_dien_thoai: '',
                ngay_sinh: '',
                password: '',
                re_password: '',
                is_active: '',
                is_block: ''
            },
            update_khach_hang: {
                ho_va_ten: '',
                email: '',
                so_dien_thoai: '',
                ngay_sinh: '',
                is_active: '',
                is_block: ''
            },
            del_khach_hang: {},
            tim_kiem: {},
        };
    },
    mounted() {
        this.loadData();
    },
    methods: {
        timKiem() {
            axios
                .post("http://127.0.0.1:8000/api/admin/khach-hang/tim-kiem", this.tim_kiem, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("nhan_vien_login")
                    }
                })
                .then((res) => {
                    if (res.data.status == false) {
                        toaster.error(res.data.message)
                    }
                    this.list_khach_hang = res.data.data;
                });
        },
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/khach-hang/data', {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                },
            })
                .then((res) => {
                    this.list_khach_hang = res.data.data;
                });
        },
        themMoi() {
            axios
                .post('http://127.0.0.1:8000/api/admin/khach-hang/create', this.create_khach_hang, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.create_khach_hang = {
                            ho_va_ten: '',
                            email: '',
                            so_dien_thoai: '',
                            password: '',
                            re_password: '',
                            ngay_sinh: '',
                            is_active: ''
                        };
                        this.loadData();
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        capNhatKhachHang() {
            axios
                .post('http://127.0.0.1:8000/api/admin/khach-hang/update', this.update_khach_hang, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.update_khach_hang = {
                            ho_va_ten: '',
                            email: '',
                            so_dien_thoai: '',
                            ngay_sinh: '',
                            is_active: ''
                        };
                        this.loadData();
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        xoaKhachHang() {
            axios
                .post('http://127.0.0.1:8000/api/admin/khach-hang/delete', this.del_khach_hang, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.loadData();
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        changeStatus(value) {
            axios
                .post("http://127.0.0.1:8000/api/admin/khach-hang/change-status", value, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.loadData();
                        this.$toast.success(res.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        },
        changeActive(value) {
            axios
                .post("http://127.0.0.1:8000/api/admin/khach-hang/change-active", value, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.loadData();
                        this.$toast.success(res.data.message);
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
    }
};
</script>

<style></style>
