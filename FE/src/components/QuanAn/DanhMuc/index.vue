<template>
    <!-- them moi -->
    <div class="modal fade" id="themmoi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header ">
                    <h1 class="modal-title fs-5 " id="exampleModalLabel">Thêm Mới Danh Mục</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Tên Danh Mục</label>
                        <input v-model="addMon.ten_danh_muc" type="text" class="form-control mt-2">
                    </div>
                    <div class="mb-2">
                        <label>Slug</label>
                        <input v-model="addMon.slug_danh_muc" type="text" class="form-control mt-2">
                    </div>
                    <div class="mb-2">
                        <label>Hình Ảnh</label>
                        <input v-model="addMon.hinh_anh" type="text" class="form-control mt-2">
                    </div>
                    <div class="mb-2">
                        <label>Dạnh Mục Cha</label>
                        <select v-model="addMon.id_danh_muc_cha" class="form-control mt-2">
                            <option value="">Không Có</option>
                            <template v-for="(item, index) in listDanhMucCha" :key="index">
                                <option :value="item.id">{{ item.ten_danh_muc }}</option>
                            </template>

                        </select>
                    </div>
                    <div class="mb-2">
                        <label>Trạng Thái</label>
                        <select v-model="addMon.tinh_trang" class="form-select mt-2">
                            <option value="0">Tạm Tắt</option>
                            <option value="1">Hoạt Động</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="addMonAn()" type="button" class="btn btn-primary"
                            data-bs-dismiss="modal">Thêm Mới</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Cập Nhật -->
    <div class="modal fade" id="capnhat" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title " id="editModalLabel">Cập Nhật Danh Mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Tên Danh Mục</label>
                        <input v-model="editMon.ten_danh_muc" type="text" class="form-control mt-2">
                    </div>
                    <div class="mb-2">
                        <label>Slug</label>
                        <input v-model="editMon.slug_danh_muc" type="text" class="form-control mt-2">
                    </div>
                    <div class="mb-2">
                        <label>Hình Ảnh</label>
                        <input v-model="editMon.hinh_anh" type="text" class="form-control mt-2">
                    </div>
                    <div class="mb-2">
                        <label>Dạnh Mục Cha</label>
                        <select v-model="editMon.id_danh_muc_cha" class="form-control mt-2">
                            <option value="">Không Có</option>
                            <template v-for="(item, index) in listDanhMucCha" :key="index">
                                <option :value="item.id">{{ item.ten_danh_muc }}</option>
                            </template>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label>Tình Trạng</label>
                        <select v-model="editMon.tinh_trang" class="form-control mt-2">
                            <option value="0">Tạm Tắt</option>
                            <option value="1">Hoạt Động</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button v-on:click="updateMonAn()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Lưu
                        Thay Đổi</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Xóa -->
    <div class="modal fade" id="xoa" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title text-white" id="deleteModalLabel">Xóa Danh Mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc muốn xóa danh mục <b class="text-danger"> {{ deleteMon.ten_danh_muc }}</b> này
                    không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button v-on:click="deleteMonAn()" type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mt-2"><b>DANH SÁCH DANH MỤC</b></h6>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themmoi">Thêm Mới</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th class="align-middle text-center">#</th>
                            <th class="align-middle text-center">Tên Danh Mục</th>
                            <th class="align-middle text-center">Slug</th>
                            <th class="align-middle text-center">Hình Ảnh</th>
                            <th class="align-middle text-center">Danh Mục Cha</th>
                            <th class="align-middle text-center">Trạng Thái</th>
                            <th class="align-middle text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="(item, index) in listDanhMuc" :key="index">
                            <tr>
                                <td class="align-middle text-center">{{ index + 1 }}</td>
                                <td class="align-middle">{{ item.ten_danh_muc }}</td>
                                <td class="align-middle">{{ item.slug_danh_muc }}</td>
                                <td class="align-middle text-center">
                                    <img v-bind:src="item.hinh_anh" width="50">
                                </td>
                                <td class="align-middle text-center">
                                    {{ item.id_danh_muc_cha ? item.ten_danh_muc_cha : "Root" }}
                                </td>
                                <td class="align-middle  ">
                                    <button v-if="item.tinh_trang == 1" v-on:click="changeMonAn(item)"
                                        class="btn btn-success w-100">Hiển thị</button>
                                    <button v-else class="btn btn-danger w-100" v-on:click="changeMonAn(item)">Tạm
                                        dừng</button>
                                </td>
                                <td class="align-middle text-center text-nowrap">
                                    <button v-on:click="Object.assign(editMon, item)" class="btn btn-primary me-1"
                                        style="width: 100px;" data-bs-toggle="modal" data-bs-target="#capnhat">Cập
                                        Nhật</button>
                                    <button v-on:click="Object.assign(deleteMon, item)" data-bs-toggle="modal"
                                        data-bs-target="#xoa" class="btn btn-danger" style="width: 100px;">Xóa</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            listDanhMuc: [],
            addMon: {},
            editMon: {},
            deleteMon: {},
            change: {},
            listDanhMucCha: []
        }
    },
    mounted() {
        this.getListDanhMuc();
        this.getListDanhMucCha();
    },
    methods: {
        getListDanhMucCha() {
            axios
                .get('http://127.0.0.1:8000/api/quan-an/danh-muc/data-danh-muc-cha', {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then((response) => {
                    this.listDanhMucCha = response.data.data;
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        },
        getListDanhMuc() {
            axios
                .get('http://127.0.0.1:8000/api/quan-an/danh-muc/data', {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then((response) => {
                    this.listDanhMuc = response.data.data;
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        },
        addMonAn() {
            axios
                .post("http://127.0.0.1:8000/api/quan-an/danh-muc/create", this.addMon, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then((response) => {
                    if (response.data.status) {
                        this.getListDanhMuc();
                        this.addMon = {}
                        this.getListDanhMucCha();
                        this.$toast.success(response.data.message);
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        },
        updateMonAn() {
            axios
                .post("http://127.0.0.1:8000/api/quan-an/danh-muc/update", this.editMon, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then((response) => {
                    if (response.data.status) {
                        this.getListDanhMuc();
                        this.getListDanhMucCha();
                        this.$toast.success(response.data.message);
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        },
        deleteMonAn() {
            axios
                .post("http://127.0.0.1:8000/api/quan-an/danh-muc/delete", this.deleteMon, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then((response) => {
                    if (response.data.status) {
                        this.getListDanhMuc();
                        this.getListDanhMucCha();
                        this.$toast.success(response.data.message);
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        },
        changeMonAn(v) {
            console.log(v);
            axios
                .post("http://127.0.0.1:8000/api/quan-an/danh-muc/change", v, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then((response) => {
                    if (response.data.status) {
                        this.getListDanhMuc();
                        this.$toast.success(response.data.message);
                    } else {
                        this.$toast.error(response.data.message);
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


};
</script>
