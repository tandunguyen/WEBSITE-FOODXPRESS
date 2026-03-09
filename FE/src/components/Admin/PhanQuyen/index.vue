<template>
    <div class="row">
        <div class="col-lg-4">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            Danh Sách Chức Vụ
                        </div>
                        <div class="col-lg-6 text-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themMoiModal">Thêm
                                Chức Vụ</button>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-group mt-3 w-100">
                                <input type="text" v-model="search" @keyup="searchQuyen()"
                                    class="form-control search-control border border-2 border-secondary"
                                    placeholder="Search...">
                                <span class="position-absolute top-50 search-show translate-middle-y"
                                    style="left: 15px;"><i class="bx bx-search"></i></span>
                                <button class="btn btn-outline-secondary" type="button" @click="searchQuyen()">Tìm
                                    Kiếm</button>
                            </div>
                        </div>
                        <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới Chức Vụ</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-12 mb-2">
                                            <label class="form-label">Tên Chức Vụ</label>
                                            <input v-model="create_chuc_vu.ten_chuc_vu" type="text"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary" @click="themChucVu()"
                                            data-bs-dismiss="modal">Tạo
                                            Mới</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="text-center align-middle">
                                <tr class="text-center table-primary">
                                    <th>#</th>
                                    <th>Tên Chức Vụ</th>
                                    <th>Cấp Quyền</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, index) in searchQuyen" :key="index" class="align-middle">
                                    <th class="text-center">{{ index + 1 }}</th>
                                    <td>{{ value.ten_chuc_vu }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-info text-white"
                                            @click="Object.assign(create_phan_quyen, value), layDataPhanQuyen()">Phân
                                            Quyền</button>
                                    </td>
                                    <td class="text-center">
                                        <i @click="Object.assign(update_chuc_vu, value)"
                                            class="fa-solid fa-square-pen fa-3x text-primary me-2"
                                            data-bs-toggle="modal" data-bs-target="#updateModal"></i>
                                        <i @click="Object.assign(delete_quyen, value)"
                                            class="fa-solid fa-trash fa-3x text-danger" data-bs-toggle="modal"
                                            data-bs-target="#xoaQuyenModal"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Chức Vụ</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12 mb-2">
                                        <label class="form-label">Tên Quyền</label>
                                        <input v-model="update_chuc_vu.ten_chuc_vu" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" @click="updateQuyen()"
                                        data-bs-dismiss="modal">Xác
                                        Nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="xoaQuyenModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Chức Vụ</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div
                                        class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-dark">Warning</h6>
                                                <div class="text-dark">
                                                    <p>Bạn có muốn xóa chức vụ <b class="text-danger">{{
                                                        delete_quyen.ten_chuc_vu }}</b> này
                                                        không?
                                                    </p>
                                                    <p>
                                                        <b>Lưu ý:</b> Điều này không thể hoàn tác!
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" @click="deleteChucVu()"
                                        data-bs-dismiss="modal">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header">
                    Danh Sách Chức Năng
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center table-primary">
                                        <th>#</th>
                                        <th>Tên Chức Năng</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(value, index) in list_chuc_nang" :key="index">
                                        <tr class="align-middle">
                                            <th class="text-center">{{ index + 1 }}</th>
                                            <td class="text-wrap">{{ value.ten_chuc_nang }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-success" @click="themPhanQuyen(value)">Cấp
                                                    Quyền</button>
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
        <div class="col-lg-4">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header">
                    Đang Phân Quyền Cho <b class="text-danger">{{ create_phan_quyen.ten_chuc_vu || "......" }}</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center table-primary">
                                        <th>Tên Chức Năng</th>
                                        <th>Tên Quyền</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(value, index) in list_phan_quyen" :key="index">
                                        <tr class="align-middle">
                                            <td class="text-wrap">{{ value.ten_chuc_nang }}</td>
                                            <td>{{ value.ten_chuc_vu }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-danger"
                                                    @click="deletePhanQuyen(value)">Xóa</button>
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
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            list_chuc_nang: [],
            list_chuc_vu: [],
            create_chuc_vu: {},
            update_chuc_vu: {},
            delete_quyen: {},
            create_phan_quyen: {
                chuc_nang_id: null,
            },
            list_phan_quyen: [],
            search: '',
        }
    },
    mounted() {
        this.layDataChucVu();
        this.layDataChucNang();
    },
    computed: {
        searchQuyen() {
            return this.list_chuc_vu.filter((item) => {
                return item.ten_chuc_vu.toLowerCase().includes(this.search.toLowerCase());
            });
        }
    },
    methods: {
        themChucVu() {
            axios
                .post('http://127.0.0.1:8000/api/admin/chuc-vu/create', this.create_chuc_vu, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(response => {
                    if (response.data.status) {
                        this.$toast.success(response.data.message);
                        this.create_chuc_vu = {}
                        this.layDataChucVu();
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },

        layDataChucNang() {
            axios
                .get('http://127.0.0.1:8000/api/admin/chuc-nang/data', {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(response => {
                    this.list_chuc_nang = response.data.data;
                })
        },
        layDataPhanQuyen() {
            axios
                .get('http://127.0.0.1:8000/api/admin/phan-quyen/data/' + this.create_phan_quyen.id, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(response => {
                    this.list_phan_quyen = response.data.data;
                })
        },

        layDataChucVu() {
            axios
                .get('http://127.0.0.1:8000/api/admin/chuc-vu/data', {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(response => {
                    this.list_chuc_vu = response.data.data;
                })
        },
        updateQuyen() {
            axios
                .post('http://127.0.0.1:8000/api/admin/chuc-vu/update', this.update_chuc_vu, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(response => {
                    if (response.data.status) {
                        this.$toast.success(response.data.message);
                        this.layDataChucVu();
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        deleteChucVu() {
            axios
                .post('http://127.0.0.1:8000/api/admin/chuc-vu/delete', this.delete_quyen, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(response => {
                    if (response.data.status) {
                        this.$toast.success(response.data.message);
                        this.layDataChucVu();
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        themPhanQuyen(value) {
            ``
            var payload = {
                id_chuc_nang: value.id,
                id_chuc_vu: this.create_phan_quyen.id,
            }
            axios
                .post('http://127.0.0.1:8000/api/admin/phan-quyen-chuc-vu/create', payload, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(response => {
                    if (response.data.status) {
                        this.$toast.success(response.data.message);
                        this.layDataChucNang();
                        this.layDataPhanQuyen();
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        deletePhanQuyen(value) {
            axios
                .post('http://127.0.0.1:8000/api/admin/phan-quyen-chuc-vu/delete', value, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then(response => {
                    if (response.data.status) {
                        this.$toast.success(response.data.message);
                        this.layDataPhanQuyen();
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },

    }
}
</script>

<style></style>