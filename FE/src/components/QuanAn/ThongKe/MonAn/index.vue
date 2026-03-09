<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
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
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6>Biểu Đồ</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            
                        </div>
                        <div class="col-lg-6">
                            <Bar
                                v-if="is_loading == true"
                                id="my-chart-id"
                                :options="chartOptions"
                                :data="chartData"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-2">THỐNG KÊ MÓN ĂN BÁN CHẠY</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead>
                                <tr class="table-danger text-center">
                                    <th>#</th>
                                    <th>Tên Món Ăn</th>
                                    <th>Số Lượng Đã Bán</th>
                                    <th>Tổng Doanh Thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, index) in list_thong_ke" :key="index">
                                    <tr>
                                        <th class="text-center">{{ index + 1 }}</th>
                                        <td class="">{{value.ten_mon_an}}</td>
                                        <td class="text-center">{{value.so_luong_ban}}</td>
                                        <td class="text-end">{{formatVND(value.tong_tien)}}</td>
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
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)
import axios from 'axios'

export default {
    components: {
        Bar
    },
    data() {
        return {
            chartData: {
                labels: [ 'January', 'February', 'March' ],
                datasets: [
                    { 
                        data: [40, 20, 12] , 
                        backgroundColor: [ '#FF6384', '#36A2EB', '#FFCE56' ]}
                ]
            },
            chartOptions: {
                responsive: true
            },
            is_loading: false,
            payload: {
                day_begin : '',
                day_end   : '',
            },
            list_thong_ke: [],
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
        getDataThongKe() 
        {
            this.is_loading = false;
            axios.post('http://127.0.0.1:8000/api/quan-an/thong-ke/mon-an', this.payload, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                },
            })
            .then((res) => {
                this.list_thong_ke              = res.data.data;
                this.chartData.labels           = res.data.list_mon_an;
                this.chartData.datasets[0].data = res.data.list_so_luong;
                this.is_loading = true;
            })
        }
    }
}
</script>
<style></style>
