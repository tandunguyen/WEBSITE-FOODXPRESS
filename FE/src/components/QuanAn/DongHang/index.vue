<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mt-2">
                    <h5>DANH SÁCH ĐƠN HÀNG</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-primary align-middle text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Thời Gian Nhận Đơn</th>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Tên Khách Hàng</th>
                                    <th>Tên Shipper</th>
                                    <th>Tiền Hàng</th>
                                    <th>DS Món Ăn</th>
                                    <th>Tình Trạng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, key) in list_don_hang" :key="key">
                                    <tr class="align-middle">
                                        <td class="text-center">{{ key + 1 }}</td>
                                        <td class="text-center">{{ value.created_at }}</td>
                                        <td class="text-center">{{ value.ma_don_hang }}</td>
                                        <td>{{ value.ten_nguoi_nhan }}</td>
                                            <td>{{ value.ho_va_ten_shipper }}</td>
                                        <td class="text-end">{{ formatVND(value.tien_hang) }}</td>
                                        <td class="text-center">
                                            <button v-on:click="loadChiTiet(value)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Chi Tiết</button>
                                        </td>
                                        <td>
                                            <button v-on:click="daXong(value)" v-if="value.tinh_trang == 1"
                                                class="btn btn-warning btn-sm w-100">Đang làm</button>
                                            <button v-if="value.tinh_trang == 2" class="btn btn-success btn-sm w-100">Đã xong</button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">DANH SÁCH MẶT HÀNG</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Tên Mặt Hàng</th>
                                    <th class="text-center">Số Lượng</th>
                                    <th class="text-center">Ghi Chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, key) in list_chi_tiet" :key="key">
                                    <tr class="align-middle">
                                        <td class="text-center">{{ key + 1 }}</td>
                                        <td>{{ value.ten_mon_an }}</td>
                                        <td class="text-center">{{ value.so_luong }}</td>
                                        <td>{{ value.ghi_chu }}</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
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
            list_don_hang: [],
            list_chi_tiet: [],
        }
    },
    mounted() {
        this.loadData();
    },
    methods: {
        loadChiTiet(payload) {
            axios
                .post("http://127.0.0.1:8000/api/quan-an/don-hang/chi-tiet", payload, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then((res) => {
                    if(res.data.status) {
                        this.list_chi_tiet = res.data.data;
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
        daXong(payload) {
            axios
                .post("http://127.0.0.1:8000/api/quan-an/don-hang/da-xong", payload, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then((res) => {
                    if(res.data.status) {
                        this.$toast.success(res.data.message);
                        this.loadData();
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
        formatVND(number) {
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number,)
        },
        loadData() {
            axios
                .get("http://127.0.0.1:8000/api/quan-an/don-hang/data", {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                })
                .then((res) => {
                    this.list_don_hang = res.data.data;
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