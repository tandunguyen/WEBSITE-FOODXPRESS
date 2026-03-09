<template>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mt-2"><b>DANH SÁCH QUÁN ĂN</b></h4>
                    <div>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#themmMoiModal">
                            <i class="fa-solid fa-plus me-1"></i> Thêm mới
                        </button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-2">

                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="align-middle text-center text-nowrap text-center table-primary">
                                    <th>#</th>
                                    <th>Mã Số Thuế</th>
                                    <th>Tên Quán Ăn</th>
                                    <th>Email</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Giờ mở cửa</th>
                                    <th>Giờ Đóng Cửa</th>
                                    <th>Địa Chỉ</th>
                                    <th>Quận Huyện</th>
                                    <th>Tỉnh Thành</th>
                                    <th>Trạng Thái</th>
                                    <th>Kích Hoạt</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle text-nowrap" v-for="(value, index) in list_quan" :key="index">
                                    <th class="text-center">{{ index + 1 }}</th>
                                    <td>{{ value.ma_so_thue }}</td>
                                    <td>{{ value.ten_quan_an }}</td>
                                    <td>{{ value.email }}</td>
                                    <td>{{ value.so_dien_thoai }}</td>
                                    <td class="text-center">{{ value.gio_mo_cua }}</td>
                                    <td class="text-center">{{ value.gio_dong_cua }}</td>
                                    <td>{{ value.dia_chi }}</td>
                                    <td>{{ value.ten_quan_huyen }}</td>
                                    <td>{{ value.ten_tinh_thanh }}</td>
                                    <td v-on:click="changeStatus(value)" class="text-center">
                                        <button class="btn btn-success w-100" v-if="value.tinh_trang == 1">Hoạt
                                            động</button>
                                        <button class="btn btn-warning w-100" v-else style="color: white;">Tạm
                                            dừng</button>
                                    </td>
                                    <td v-on:click="changeActive(value)" class="text-center">
                                        <button class="btn btn-info w-100" v-if="value.is_active == 1"
                                            style="color: white;">Đã Kích
                                            hoạt</button>
                                        <button class="btn btn-secondary w-100" v-else>Chưa kích hoạt</button>
                                    </td>
                                    <td class="text-center">
                                        <button v-on:click="Object.assign(quan_an_edit, value)"
                                            class="btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#updateModal" style="color: white;">Cập nhật</button>
                                        <button v-on:click="Object.assign(quan_an_delete, value)" class="btn btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal Thêm Mới -->
        <div class="modal fade" id="themmMoiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới Quán Ăn</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6">
                                <label>Tên Quán Ăn</label>
                                <input v-model="quan_an_create.ten_quan_an" type="text" class="form-control"
                                    placeholder="Nhập Tên Quán Ăn">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Email</label>
                                <input v-model="quan_an_create.email" type="text" class="form-control"
                                    placeholder="Nhập Email">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Số Điện Thoại</label>
                                <input v-model="quan_an_create.so_dien_thoai" type="text" class="form-control"
                                    placeholder="Nhập Số điện thoại">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Password</label>
                                <input v-model="quan_an_create.password" type="text" class="form-control"
                                    placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Nhập Lại Password</label>
                                <input v-model="quan_an_create.re_password" type="text" class="form-control"
                                    placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Mã Số Thuế</label>
                                <input v-model="quan_an_create.ma_so_thue" type="text" class="form-control"
                                    placeholder="Nhập mã số thuế">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Giờ mở cửa</label>
                                <input v-model="quan_an_create.gio_mo_cua" type="time" class="form-control"
                                    placeholder="Nhập giờ mở cửa">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Giờ đóng cửa</label>
                                <input v-model="quan_an_create.gio_dong_cua" type="time" class="form-control"
                                    placeholder="Nhập giờ đóng cửa">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Địa Chỉ</label>
                                <input v-model="quan_an_create.dia_chi" type="text" class="form-control"
                                    placeholder="Nhập Địa Chỉ">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Quận Huyện</label>
                                <select class="form-select" v-model="quan_an_create.id_quan_huyen">
                                    <template v-for="(value, index) in list_quan_huyen" :key="index">
                                        <option v-bind:value="value.id">{{ value.ten_quan_huyen }}
                                        </option>
                                    </template>
                                </select>
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Tình trạng</label>
                                <select class="form-select" v-model="quan_an_create.tinh_trang">
                                    <option value="1">Hoạt đông</option>
                                    <option value="1">Tạm dừng</option>
                                </select>
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Kích hoạt</label>
                                <select class="form-select" v-model="quan_an_create.is_active">
                                    <option value="1">Kích hoạt</option>
                                    <option value="0">Chưa kích hoạt</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" v-on:click="themMoiQuanAn()"
                            data-bs-dismiss="modal">Xác
                            Nhận</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Tài Khoản</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            Bạn có chắc chắn muốn xóa voucher <b>{{ quan_an_delete.ten_quan_an }}</b>
                            này chứ
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button v-on:click="xoaQuanAn()" type="button" class="btn btn-primary"
                            data-bs-dismiss="modal">Xác
                            Nhận</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Tài Khoản</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6">
                                <label>Tên Quán Ăn</label>
                                <input v-model="quan_an_edit.ten_quan_an" type="text" class="form-control"
                                    placeholder="Nhập Tên Quán Ăn">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Email</label>
                                <input v-model="quan_an_edit.email" type="text" class="form-control"
                                    placeholder="Nhập Email">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Số Điện Thoại</label>
                                <input v-model="quan_an_edit.so_dien_thoai" type="text" class="form-control"
                                    placeholder="Nhập Số điện thoại">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Mã Số Thuế</label>
                                <input v-model="quan_an_edit.ma_so_thue" type="text" class="form-control"
                                    placeholder="Nhập mã số thuế">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Giờ mở cửa</label>
                                <input v-model="quan_an_edit.gio_mo_cua" type="time" class="form-control"
                                    placeholder="Nhập giờ mở cửa">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Giờ đóng cửa</label>
                                <input v-model="quan_an_edit.gio_dong_cua" type="time" class="form-control"
                                    placeholder="Nhập giờ đóng cửa">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Địa Chỉ</label>
                                <input v-model="quan_an_edit.dia_chi" type="text" class="form-control"
                                    placeholder="Nhập Địa Chỉ">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Quận Huyện</label>
                                <select class="form-select" v-model="quan_an_edit.id_quan_huyen">
                                    <template v-for="(value, index) in list_quan_huyen" :key="index">
                                        <option v-bind:value="value.id">{{ value.ten_quan_huyen }}
                                        </option>
                                    </template>
                                </select>
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Tình trạng</label>
                                <select class="form-select" v-model="quan_an_edit.tinh_trang">
                                    <option value="0">Hoạt đông</option>
                                    <option value="1">Tạm dừng</option>
                                </select>
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label>Kích hoạt</label>
                                <select class="form-select" v-model="quan_an_edit.is_active">
                                    <option value="1">Kích hoạt</option>
                                    <option value="0">Chưa kích hoạt</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="capNhatQuanAn()" type="button" class="btn btn-primary"
                            data-bs-dismiss="modal">Xác
                            Nhận</button>
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
                'email': "",
                'password': "",
                'ma_so_thue': "",
                'ten_quan_an': "",
                'dia_chi': "",
                'so_dien_thoai': "",
                'toa_do_x': "",
                'toa_do_y': "",
                'tinh_trang': "",
                'is_active': "",
                'gio_mo_cua': "",
                'gio_dong_cua': "",
                'id_quan_huyen': "",
                'id_tinh_thanh': "",
            },
            quan_an_edit: {},
            quan_an_delete: {},
            list_quan: [],
            list_tinh_thanh: [],
            list_quan_huyen: [],
            tim_kiem: {},
        }
    },
    mounted() {
        this.layDataQuanAn();
        this.loadDataTinhThanh();
        this.loadDataQuanHuyen();
    },
    methods: {
        timKiem() {
            axios
                .post("http://127.0.0.1:8000/api/admin/quan-an/tim-kiem", this.tim_kiem, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("nhan_vien_login")
                    }
                })
                .then((res) => {
                    if (res.data.status == false) {
                        toaster.error(res.data.message)
                    }
                    this.list_quan = res.data.data;
                });
        },
        loadDataTinhThanh() {
            axios
                .get('http://127.0.0.1:8000/api/admin/tinh-thanh/data-open', {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then((res) => {
                    this.list_tinh_thanh = res.data.data;
                })
        },
        loadDataQuanHuyen() {
            axios
                .get('http://127.0.0.1:8000/api/admin/quan-huyen/data-open', {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then((res) => {
                    this.list_quan_huyen = res.data.data;
                })
        },
        layDataQuanAn() {
            axios
                .get('http://127.0.0.1:8000/api/admin/quan-an/data', {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(res => {
                    this.list_quan = res.data.data;
                })
        },
        themMoiQuanAn() {
            axios
                .post('http://127.0.0.1:8000/api/admin/quan-an/create', this.quan_an_create, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(res => {
                    this.quan_an_create = {};
                    this.$toast.success(res.data.message);
                    this.layDataQuanAn();
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        xoaQuanAn() {
            axios
                .post('http://127.0.0.1:8000/api/admin/quan-an/delete', this.quan_an_delete, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(res => {
                    this.$toast.success(res.data.message);
                    this.layDataQuanAn();
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        capNhatQuanAn() {
            axios
                .post('http://127.0.0.1:8000/api/admin/quan-an/update', this.quan_an_edit, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(res => {
                    this.$toast.success(res.data.message);
                    this.layDataQuanAn();
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
                .post("http://127.0.0.1:8000/api/admin/quan-an/change-status", value, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.layDataQuanAn();
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
        changeActive(value) {
            axios
                .post("http://127.0.0.1:8000/api/admin/quan-an/change-active", value, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.layDataQuanAn();
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
}
</script>
<style></style>