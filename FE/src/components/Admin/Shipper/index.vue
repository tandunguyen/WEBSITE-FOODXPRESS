<template>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mt-2"><b>Danh Sách Shipper</b></h4>
                    <button data-bs-toggle="modal" data-bs-target="#themMoiModal" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i> Thêm Mới Shipper
                    </button>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="text-center table-primary">
                                <tr>
                                    <th class="align-middle text-center">#</th>
                                    <th class="align-middle text-center">Họ Và Tên</th>
                                    <th class="align-middle text-center">Số Điện Thoại</th>
                                    <th class="align-middle text-center">Email</th>
                                    <th class="align-middle text-center">CMMD</th>
                                    <th class="align-middle text-center">Trạng Thái</th>
                                    <th class="align-middle text-center">Tình Trạng</th>
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, index) in list_shipper" :key="index">
                                    <tr>
                                        <th class="align-middle text-center">{{ index + 1 }}</th>
                                        <td class="align-middle text-center">
                                            {{ value.ho_va_ten }}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{ value.so_dien_thoai }}
                                        </td>
                                        <td class="align-middle">{{ value.email }}</td>
                                        <td class="align-middle text-center">{{ value.cccd }}</td>
                                        <td class="align-middle text-center" v-on:click="changeStatus(value)">
                                            <button v-if="value.is_open == 0" class="btn btn-success w-100">
                                                Hoạt Động
                                            </button>
                                            <button v-else class="btn btn-danger w-100">
                                                Đã Chặn
                                            </button>
                                        </td>
                                        <td class="align-middle text-center" v-on:click="changeActive(value)">
                                            <button v-if="value.is_active == 1" class="btn btn-success w-100">
                                                Đã Kích Hoạt
                                            </button>
                                            <button v-else class="btn btn-warning w-100" style="color: white;">
                                                Chưa Kích Hoạt
                                            </button>
                                        </td>

                                        <td class="align-middle text-center">
                                            <button v-on:click="Object.assign(update_shipper, value)"
                                                data-bs-toggle="modal" data-bs-target="#capNhatModal"
                                                class="btn btn-primary text-center me-2">
                                                Cập Nhật
                                            </button>
                                            <button v-on:click="Object.assign(del_shipper, value)"
                                                data-bs-toggle="modal" data-bs-target="#xoaModal"
                                                class="btn btn-danger text-center">
                                                Xóa
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Thêm Mới-->
    <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                        Thêm Mới Shipper
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Họ Và Tên</label>
                                <input v-model="create_shipper.ho_va_ten" type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Số Điện Thoại</label>
                                <input v-model="create_shipper.so_dien_thoai" type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Email</label>
                                <input v-model="create_shipper.email" type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Chứng Minh Nhân Dân/Căn Cước Công Dân</label>
                                <input v-model="create_shipper.cccd" type="number" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Nhập Mật Khẩu</label>
                                <input v-model="create_shipper.password" type="password" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Nhập Lại Mật Khẩu</label>
                                <input v-model="create_shipper.re_password" type="password" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Địa Chỉ</label>
                                <input v-model="create_shipper.dia_chi" type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Quận Huyện</label>
                                <select class="form-select" v-model="create_shipper.id_quan_huyen">
                                    <template v-for="(value, index) in list_quan_huyen" :key="index">
                                        <option v-bind:value="value.id">{{ value.ten_quan_huyen }}
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Trạng Thái</label>
                                <select v-model="create_shipper.is_active" class="form-select">
                                    <option value="1">Đã Kích Hoạt</option>
                                    <option value="0">Chưa Kích Hoạt</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Tình Trạng</label>
                                <select v-model="create_shipper.is_open" class="form-select">
                                    <option value="1">Đã Chặn</option>
                                    <option value="0">Hoạt Động</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="createShipper()">
                        Xác Nhận
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cập Nhật-->
    <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                        Cập Nhật Shipper
                        <span class="">{{ update_shipper.ho_va_ten }}</span>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Họ Và Tên</label>
                                <input v-model="update_shipper.ho_va_ten" type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Số Điện Thoại</label>
                                <input v-model="update_shipper.so_dien_thoai" type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Email</label>
                                <input v-model="update_shipper.email" type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Chứng Minh Nhân Dân/Căn Cước Công Dân</label>
                                <input v-model="update_shipper.cccd" type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Địa Chỉ</label>
                                <input v-model="update_shipper.dia_chi" type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Quận Huyện</label>
                                <select class="form-select" v-model="update_shipper.id_quan_huyen">
                                    <template v-for="(value, index) in list_quan_huyen" :key="index">
                                        <option v-bind:value="value.id">{{ value.ten_quan_huyen }}
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Trạng Thái</label>
                                <select v-model="update_shipper.is_active" class="form-select">
                                    <option value="1">Đã Kích Hoạt</option>
                                    <option value="0">Chưa Kích Hoạt</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="mb-1">Tình Trạng</label>
                                <select v-model="update_shipper.is_open" class="form-select">
                                    <option value="1">Đã Chặn</option>
                                    <option value="0">Hoạt Động</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="updateShipper()">
                        Xác Nhận
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Xóa-->
    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Xóa Shipper <span class="text-danger">{{ del_shipper.ho_va_ten }}</span>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white">
                                <i class="bx bxs-message-square-x"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-white">
                                    Xác Nhận xóa Shipper {{ del_shipper.ho_va_ten }}
                                </h6>
                                <div class="text-white">
                                    LƯU Ý: Không thể khôi phục khi đã ấn xác nhận xóa!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" @click="deleteShipper()">
                        Xác Nhận Xóa
                    </button>
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
            list_shipper: [],
            list_tinh_thanh: [],
            list_quan_huyen: [],
            create_shipper: {},
            del_shipper: {},
            update_shipper: {},
            tim_kiem: {},
        };
    },
    mounted() {
        this.loadDataShipper();
        this.loadDataTinhThanh();
        this.loadDataQuanHuyen();
    },
    methods: {
        timKiem() {
            axios
                .post("http://127.0.0.1:8000/api/admin/shipper/tim-kiem", this.tim_kiem, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("nhan_vien_login")
                    }
                })
                .then((res) => {
                    if (res.data.status == false) {
                        toaster.error(res.data.message)
                    }
                    this.list_shipper = res.data.data;
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
        loadDataShipper() {
            axios
                .get('http://127.0.0.1:8000/api/admin/shipper/data', {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(res => {
                    this.list_shipper = res.data.data;
                })
        },
        createShipper() {
            axios
                .post('http://127.0.0.1:8000/api/admin/shipper/create', this.create_shipper, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(res => {
                    this.create_shipper = {};
                    this.$toast.success(res.data.message);
                    this.loadDataShipper();
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        updateShipper() {
            axios
                .post('http://127.0.0.1:8000/api/admin/shipper/update', this.update_shipper, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(res => {
                    this.update_shipper = {};
                    this.$toast.success(res.data.message);
                    this.loadDataShipper();
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },

        deleteShipper() {
            axios
                .post('http://127.0.0.1:8000/api/admin/shipper/delete', this.del_shipper, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(res => {
                    this.$toast.success(res.data.message);
                    this.loadDataShipper();
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
                .post("http://127.0.0.1:8000/api/admin/shipper/change-status", value, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.loadDataShipper();
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
                .post("http://127.0.0.1:8000/api/admin/shipper/active", value, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.loadDataShipper();
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
    }
};
</script>
<style></style>