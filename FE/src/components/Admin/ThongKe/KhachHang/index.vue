<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <label for="">Từ ngày</label>
                            <input type="date" class="form-control mt-2 mb-2" v-model="day_begin">
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <label for="">Đến ngày</label>
                            <input type="date" class="form-control mt-2" v-model="day_end">
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <label for="">&nbsp;</label>
                            <button class="btn btn-primary w-100 mt-2" v-on:click="getData()">Thống Kê</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2"><b>Bảng thống kê</b></h6>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <Doughnut v-if="is_loading == true" id="my-chart-id" :options="chartOptions"
                                :data="chartData" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-2">THỐNG KÊ KHÁCH HÀNG MỚI</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead>
                                <tr class="table-danger text-center">
                                    <th>#</th>
                                    <th>Tên Khách Hàng</th>
                                    <th>Số Đơn Hàng</th>
                                    <th>Tổng Tiền Đã Đặt</th>
                                    <th>Đơn Hàng Lớn Nhất</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, index) in list_data" :key="index">
                                    <tr>
                                        <th class="text-center">{{ index + 1 }}</th>
                                        <td class="">{{ value.ho_va_ten }}</td>
                                        <td class="text-center">{{ value.tong_don_hang }}</td>
                                        <td class="text-center">{{ formatVND(value.tong_tien_tieu) }}</td>
                                        <td class="text-end">{{ formatVND(value.don_hang_max) }}</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'
import { Doughnut } from 'vue-chartjs'
import axios from 'axios'
ChartJS.register(ArcElement, Tooltip, Legend)

export default {
    components: { Doughnut },
    data() {
        return {
            chartData: {
                labels: [],
                datasets: [
                    {
                        backgroundColor: ['#f87979', '#7dcea0', '#3498db', '#17202a', '#4a235a', '#aab7b8', '#d4ac0d'],
                        data: []
                    }
                ]
            },
            chartOptions: {
                responsive: true
            },
            is_loading: false,
            list_data: [],
            day_begin: '',
            day_end: '',
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number,)
        },
        getData() {
            this.is_loading = false;
            var payload = {
                day_begin: this.day_begin,
                day_end: this.day_end,
            }
            axios
                .post('http://127.0.0.1:8000/api/admin/thong-ke/thong-ke-tien-khach-hang', payload, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("nhan_vien_login"),
                    },
                })
                .then((response) => {
                    this.chartData.labels = response.data.list_ten,
                        this.chartData.datasets[0].data = response.data.list_tien,
                        this.is_loading = true,
                        this.list_data = response.data.data
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        }
    },
}
</script>
<style></style>
