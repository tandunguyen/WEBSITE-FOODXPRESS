<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mt-2"><b>DANH SÁCH VOUCHER</b></h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Thêm voucher
                    </button>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover ">
                        <thead>
                            <tr class="text-center table-primary">
                                <th class="text-center">#</th>
                                <th class="text-center">Mã Code</th>
                                <th class="text-center">Tên Voucher</th>
                                <th class="text-center">Hình Ảnh</th>
                                <th class="text-center">Thời Gian Bắt Đầu</th>
                                <th class="text-center">Thời Gian Kết Thúc</th>
                                <th class="text-center">Loại Giảm</th>
                                <th class="text-center">Số Giảm Giá</th>
                                <th class="text-center">Số Tiền Tối Đa</th>
                                <th class="text-center">Đơn Hàng Tối Thiểu</th>
                                <th class="text-center">Tình Trạng</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, index) in list_ma_giam_gia" :key="index">
                                <tr>
                                    <th class="align-middle text-center">{{ index + 1 }}</th>
                                    <td class="align-middle">{{ value.ma_code }}</td>
                                    <td class="align-middle">{{ value.ten_voucher }}</td>
                                    <td class="align-middle">
                                        <img :src="value.hinh_anh" style="height: 50px;" alt="">
                                    </td>
                                    <td class="align-middle text-center">{{ value.thoi_gian_bat_dau }}</td>
                                    <td class="align-middle text-center">{{ value.thoi_gian_ket_thuc }}</td>
                                    <td class="align-middle">
                                        <template v-if="value.loai_giam == 0">
                                            Tiền Mặt
                                        </template>
                                        <template v-else>
                                            Giảm %
                                        </template>
                                    </td>
                                    <td class="align-middle text-end">
                                        <template v-if="value.loai_giam == 0">
                                            {{ formatVND(value.so_giam_gia) }}
                                        </template>
                                        <template v-else>
                                            {{ value.so_giam_gia }} %
                                        </template>
                                    </td>
                                    <td class="align-middle text-end">{{ formatVND(value.so_tien_toi_da) }}</td>
                                    <td class="align-middle text-end">{{ formatVND(value.don_hang_toi_thieu) }}</td>
                                    <td class="align-middle text-center" v-on:click="changeStatus(value)">
                                        <button v-if="value.tinh_trang == 1" class="btn btn-info"
                                            style="color: white;">Hiển thị</button>
                                        <button v-else class="btn btn-secondary">Tạm
                                            tắt</button>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button v-on:click="Object.assign(edit_ma_giam_gia, value)"
                                            class="btn btn-success me-2" data-bs-toggle="modal"
                                            data-bs-target="#updateModal">Cập nhật</button>
                                        <button v-on:click="del_ma_giam_gia = value" class="btn btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#delModal">Xóa</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Voucher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-2 col-6">
                            <label>Mã Code</label>
                            <input type="text" class="form-control mt-2" v-model="them_ma_giam_gia.ma_code">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Tên Voucher</label>
                            <input type="text" class="form-control mt-2" v-model="them_ma_giam_gia.ten_voucher">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Hình Ảnh</label>
                            <input type="text" class="form-control mt-2" v-model="them_ma_giam_gia.hinh_anh">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Thời Gian Bắt Đầu</label>
                            <input type="date" class="form-control mt-2" v-model="them_ma_giam_gia.thoi_gian_bat_dau">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Thời Gian Kết Thúc</label>
                            <input type="date" class="form-control mt-2" v-model="them_ma_giam_gia.thoi_gian_ket_thuc">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Loại Giảm</label>
                            <select class="form-select mt-2" v-model="them_ma_giam_gia.loai_giam">
                                <option value="0">Giảm %</option>
                                <option value="1">Tiền Mặt</option>
                            </select>
                        </div>
                        <div class="mb-2 col-6">
                            <label>Số Giảm Giá</label>
                            <input type="number" class="form-control mt-2" v-model="them_ma_giam_gia.so_giam_gia">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Số Tiền Tối Đa</label>
                            <input type="number" class="form-control mt-2" v-model="them_ma_giam_gia.so_tien_toi_da">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Đơn Hàng Tối Thiểu</label>
                            <input type="number" class="form-control mt-2"
                                v-model="them_ma_giam_gia.don_hang_toi_thieu">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Tình trạng</label>
                            <select class="form-select mt-2" v-model="them_ma_giam_gia.tinh_trang">
                                <option value="1">Hiển Thị</option>
                                <option value="0">Tạm Tắt</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" v-on:click="themMoiMaGiamGia()"
                        data-bs-dismiss="modal">Thêm Mới</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Voucher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-2 col-6">
                            <label>Mã Code</label>
                            <input v-model="edit_ma_giam_gia.ma_code" type="text" class="form-control mt-2">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Tên Voucher</label>
                            <input type="text" class="form-control mt-2" v-model="edit_ma_giam_gia.ten_voucher">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Hình Ảnh</label>
                            <input type="text" class="form-control mt-2" v-model="edit_ma_giam_gia.hinh_anh">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Thời Gian Bắt Đầu</label>
                            <input v-model="edit_ma_giam_gia.thoi_gian_bat_dau" type="date" class="form-control mt-2">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Thời Gian Kết Thúc</label>
                            <input v-model="edit_ma_giam_gia.thoi_gian_ket_thuc" type="date" class="form-control mt-2">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Loại Giảm</label>
                            <select v-model="edit_ma_giam_gia.loai_giam" class="form-select mt-2">
                                <option value="0">Giảm %</option>
                                <option value="1">Tiền Mặt</option>
                            </select>
                        </div>
                        <div class="mb-2 col-6">
                            <label>Số Giảm Giá</label>
                            <input v-model="edit_ma_giam_gia.so_giam_gia" type="number" class="form-control mt-2">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Số Tiền Tối Đa</label>
                            <input v-model="edit_ma_giam_gia.so_tien_toi_da" type="number" class="form-control mt-2">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Đơn Hàng Tối Thiểu</label>
                            <input v-model="edit_ma_giam_gia.don_hang_toi_thieu" type="number"
                                class="form-control mt-2">
                        </div>
                        <div class="mb-2 col-6">
                            <label>Tình trạng</label>
                            <select v-model="edit_ma_giam_gia.tinh_trang" class="form-select mt-2">
                                <option value="1">Hiển Thị</option>
                                <option value="0">Tạm Tắt</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" v-on:click="capNhatMaGiamGia()"
                        data-bs-dismiss="modal">Cập
                        nhật</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Voucher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Bạn có chắc muốn xóa Voucher <b class="text-danger">{{ del_ma_giam_gia.ma_code }}</b> này
                        không?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" v-on:click="xoaMaGiamGia()"
                        data-bs-dismiss="modal">Xác
                        nhận</button>
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
            list_ma_giam_gia: [],
            them_ma_giam_gia: {
                'ma_code': '',
                'thoi_gian_bat_dau': '',
                'thoi_gian_ket_thuc': '',
                'loai_giam': '',
                'so_giam_gia': 0,
                'so_tien_toi_da': 0,
                'don_hang_toi_thieu': 0,
                'tinh_trang': ''
            },
            edit_ma_giam_gia: {
                'ma_code': '',
                'thoi_gian_bat_dau': '',
                'thoi_gian_ket_thuc': '',
                'loai_giam': '',
                'so_giam_gia': '',
                'so_tien_toi_da': '',
                'don_hang_toi_thieu': '',
                'tinh_trang': ''
            },
            del_ma_giam_gia: {},
        }
    },
    mounted() {
        this.loadData();
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number,)
        },
        loadData() {
            axios
                .get('http://127.0.0.1:8000/api/admin/voucher/data', {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then((res) => {
                    this.list_ma_giam_gia = res.data.data;
                });
        },
        themMoiMaGiamGia() {
            axios
                .post('http://127.0.0.1:8000/api/admin/voucher/create', this.them_ma_giam_gia, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.them_ma_giam_gia = {
                            'ma_code': '',
                            'thoi_gian_bat_dau': '',
                            'thoi_gian_ket_thuc': '',
                            'loai_giam': '',
                            'so_giam_gia': '',
                            'so_tien_toi_da': '',
                            'don_hang_toi_thieu': '',
                            'tinh_trang': ''
                        },
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
        capNhatMaGiamGia() {
            axios
                .post('http://127.0.0.1:8000/api/admin/voucher/update', this.edit_ma_giam_gia, {
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
        xoaMaGiamGia() {
            axios
                .post('http://127.0.0.1:8000/api/admin/voucher/delete', this.del_ma_giam_gia, {
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
                .post("http://127.0.0.1:8000/api/admin/voucher/change-status", value, {
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
    },
}
</script>
<style></style>