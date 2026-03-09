<template>
    <div class="card">
        <div class="card-header ">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mt-2"><b>DANH SÁCH MÓN ĂN</b></h6>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#themmoi">Thêm Mới Món
                    Ăn</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover ">
                    <thead>
                        <tr class="bg-warning text-black">
                            <th class="text-center align-middle">#</th>
                            <th class="text-center align-middle">Tên Món Ăn</th>
                            <th class="text-center align-middle">Giá Bán</th>
                            <th class="text-center align-middle">Giá Khuyến Mãi</th>
                            <th class="text-center align-middle">Mô Tả</th>
                            <th class="text-center align-middle">Hình Ảnh</th>
                            <th class="text-center align-middle">Danh Mục</th>
                            <th class="text-center align-middle">Tình Trạng</th>
                            <th class="text-center align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(mon, index) in listMonAn" :key="index">
                            <th class="text-center align-middle">{{ index + 1 }}</th>
                            <td class="align-middle">{{ mon.ten_mon_an }}</td>
                            <td class="text-end align-middle">{{ formatVND(mon.gia_ban) }}</td>
                            <td class="text-end align-middle">{{ formatVND(mon.gia_khuyen_mai) }}</td>
                            <td class="align-middle">{{ truncateString(mon.mo_ta) }}</td>
                            <td class="text-center align-middle">
                                <img v-bind:src="mon.hinh_anh" alt="" style="width: 50px; height: 50px;">
                            </td>
                            <td class="align-middle"> {{ mon.ten_danh_muc }} </td>
                            <td class="align-middle">
                                <button v-on:click="changeMonAn(mon)" v-if="mon.tinh_trang == 1"
                                    class="btn w-100 btn-success">Hiển thị</button>
                                <button v-on:click="changeMonAn(mon)" v-else class="btn w-100 btn-danger">Tạm tắt</button>
                            </td>
                            <td class="text-center align-middle">
                                <button v-on:click="Object.assign(updateMon, mon)" data-bs-toggle="modal"
                                    data-bs-target="#capnhat" class="btn btn-primary me-1">Cập
                                    Nhật</button>
                                <button v-on:click="Object.assign(deleteMon, mon)" data-bs-toggle="modal"
                                    data-bs-target="#xoa" class="btn btn-danger" >Xóa</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="themmoi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Thêm Mới Món Ăn</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label>Tên Món Ăn</label>
                                <input v-model="addMon.ten_mon_an" type="text" class="form-control mt-2" v-on:keyup="slugMonAn(1)">
                            </div>
                            <div class="mb-2">
                                <label>Slug Món Ăn</label>
                                <input v-model="addMon.slug_mon_an" type="text" class="form-control mt-2" disabled>
                            </div>
                            <div class="mb-2">
                                <label>Giá Bán</label>
                                <input v-model="addMon.gia_ban" type="number" class="form-control mt-2">
                            </div>
                            <div class="mb-2">
                                <label>Giá Khuyến Mãi</label>
                                <input v-model="addMon.gia_khuyen_mai" type="number" class="form-control mt-2">
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label>Hình Ảnh</label>
                                <input v-model="addMon.hinh_anh" type="text" class="form-control mt-2">
                            </div>
                            <div class="mb-2">
                                <label>Tình Trạng</label>
                                <select v-model="addMon.tinh_trang" class="form-select mt-2">
                                    <option value="1">Còn hàng</option>
                                    <option value="0">Hết hàng</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label>Danh Mục</label>
                                <select class="form-control mt-2" v-model="addMon.id_danh_muc">
                                    <template v-for="(value, index) in listDanhMuc" :key="index">
                                        <option  v-bind:value="value.id">{{ value.ten_danh_muc }}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                       
                        <div class="mb-2">
                            <label>Mô Tả</label>
                            <textarea v-model="addMon.mo_ta" type="text" class="form-control mt-2" rows="8"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button v-on:click="addMonAn()" type="button" class="btn btn-success" data-bs-dismiss="modal">Thêm
                        Mới</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="capnhat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Cập Nhật Món Ăn</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label>Tên Món Ăn</label>
                                <input v-model="updateMon.ten_mon_an" type="text" class="form-control mt-2" v-on:keyup="slugMonAn(2)">
                            </div>
                            <div class="mb-2">
                                <label>Slug Món Ăn</label>
                                <input v-model="updateMon.slug_mon_an" type="text" class="form-control mt-2" disabled>
                            </div>
                            <div class="mb-2">
                                <label>Giá Bán</label>
                                <input v-model="updateMon.gia_ban" type="number" class="form-control mt-2">
                            </div>
                            <div class="mb-2">
                                <label>Giá Khuyến Mãi</label>
                                <input v-model="updateMon.gia_khuyen_mai" type="number" class="form-control mt-2">
                            </div>
                        </div>
                        <div class="col-lg-6">
                           
                            <div class="mb-2">
                                <label>Hình Ảnh</label>
                                <input v-model="updateMon.hinh_anh" type="text" class="form-control mt-2">
                            </div>
                            <div class="mb-2">
                                <label>Tình Trạng</label>
                                <select v-model="updateMon.tinh_trang" class="form-select mt-2">
                                    <option value="1">Còn hàng</option>
                                    <option value="0">Hết hàng</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label>Danh Mục</label>
                                <select class="form-control mt-2" v-model="updateMon.id_danh_muc">
                                    <template v-for="(value, index) in listDanhMuc" :key="index">
                                        <option  v-bind:value="value.id">{{ value.ten_danh_muc }}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-2">
                            <label>Mô Tả</label>
                            <textarea v-model="updateMon.mo_ta" type="text" class="form-control mt-2" rows="8"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button v-on:click="updateMonAn()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Cập
                        Nhật</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="xoa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Xóa Món Ăn</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa món ăn:
                    <b class="text-danger">{{ deleteMon.ten_mon_an }}</b> không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button v-on:click="deleteMonAn()" type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">Xóa</button>
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
            listMonAn   : [],
            addMon      : {},
            updateMon   : {},
            deleteMon   : {},
            listDanhMuc : [],
        }
    },
    mounted() {
        this.getMonAn();
        this.getDataDanhMuc();
    },
    methods: {
        getDataDanhMuc() {
            axios.get('http://127.0.0.1:8000/api/quan-an/danh-muc/data', {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then(res => {
                    this.listDanhMuc = res.data.data;
                })
        },

        slugMonAn(type) {
            if(type == 1) {
                this.addMon.slug_mon_an = this.convertToSlug(this.addMon.ten_mon_an);
                console.log(this.addMon.slug_mon_an);
            } else {
                this.updateMon.slug_mon_an = this.convertToSlug(this.updateMon.ten_mon_an);
            }
        },

        convertToSlug(str) {
            return str
                .toLowerCase()
                .normalize('NFD')                   // Chuyển tiếng Việt có dấu thành không dấu
                .replace(/[\u0300-\u036f]/g, '')     // Xóa các dấu nhỏ
                .replace(/[^a-z0-9\s-]/g, '')        // Xóa ký tự đặc biệt
                .trim()                              // Xóa khoảng trắng 2 đầu
                .replace(/\s+/g, '-')                // Thay khoảng trắng bằng dấu -
                .replace(/-+/g, '-');                // Gộp nhiều dấu - liên tiếp thành 1
        },

        formatVND(number) {
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number,)
        },

        truncateString(str, maxLength = 50) {
            if (str.length <= maxLength) {
                return str;
            }
            return str.slice(0, maxLength) + '...';
        },

        getMonAn() {
            axios
                .get('http://127.0.0.1:8000/api/quan-an/mon-an/data', {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then(res => {
                    this.listMonAn = res.data.data;
                })
        },
        addMonAn() {
            axios
                .post('http://127.0.0.1:8000/api/quan-an/mon-an/create', this.addMon, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then(res => {
                    this.getMonAn();
                    this.addMon = {};
                    this.$toast.success(res.data.message);
                }).catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        },
        updateMonAn() {
            axios
                .post('http://127.0.0.1:8000/api/quan-an/mon-an/update', this.updateMon, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then(res => {
                    this.getMonAn();
                    this.$toast.success(res.data.message);

                }).catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        },
        deleteMonAn() {
            axios
                .post('http://127.0.0.1:8000/api/quan-an/mon-an/delete', this.deleteMon, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then(res => {
                    this.getMonAn();
                    this.$toast.success(res.data.message);

                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        },
        changeMonAn(v) {
            axios
                .post("http://127.0.0.1:8000/api/quan-an/mon-an/change", v, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.getMonAn();
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
        }
    },
};
</script>
