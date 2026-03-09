<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="mt-2">Thống Kê Thu Nhập</h5>
                        </div>
                        <div class="col-lg-6 text-end">
                            <h5 class="mt-2">Tổng Thu Nhập: <span class="text-danger">{{ formatVND(tong_tien) }}</span></h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <label for="">Từ ngày</label>
                            <input type="date" class="form-control mt-2 mb-2" v-model="payload.day_begin">
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <label for="">Đến ngày</label>
                            <input type="date" class="form-control mt-2" v-model="payload.day_end">
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <label for="">&nbsp;</label>
                            <button class="btn btn-primary w-100 mt-2" v-on:click="getDataThongKe()">Thống Kê</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="text-center align-middle">
                                            <th>#</th>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Tổng Tiền Hàng</th>
                                            <th>Phí Ship</th>
                                            <th>Ngày Giao</th>
                                            <th>Địa Chỉ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-for="(item, index) in list_data" :key="index">
                                            <tr class="align-middle">
                                                <th class="text-center">{{ index + 1 }}</th>
                                                <td class="text-center">{{ item.ma_don_hang }}</td>
                                                <td class="text-end">{{ formatVND(item.tong_tien) }}</td>
                                                <td class="text-end">{{ formatVND(item.phi_ship) }}</td>
                                                <td class="text-center">{{ item.ngay_giao }}</td>
                                                <td>{{ item.dia_chi }}</td>
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
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            payload     : {},
            list_data   : [],
            tong_tien   : 0,
        }
    },
    mounted() {
        this.payload.day_begin = new Date().toISOString().slice(0, 10);
        this.payload.day_end = new Date().toISOString().slice(0, 10);
        this.getDataThongKe();
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number,)
        },
        getDataThongKe() {
            axios.post('http://127.0.0.1:8000/api/shipper/don-hang/thong-ke', this.payload, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("shipper_login"),
                },
            })
                 .then((res) => {
                    this.list_data = res.data.data;
                    this.tong_tien = this.list_data.reduce((sum, item) => sum + (item.phi_ship || 0), 0);
                 })
        }
    },
}
</script>
<style>
    
</style>