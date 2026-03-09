<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-xl-3">
                            <h4><i class="fa-solid fa-magnifying-glass"></i> {{ thong_tin }}</h4>
                        </div>
                        <div class="col-lg-9 col-xl-19">
                            <div class="float-lg-end">
                                <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                    <div class="col">
                                        <div class="position-relative">
                                            <input type="text" class="form-control ps-5"
                                                placeholder="Search Product..."> <span
                                                class="position-absolute top-50 product-show translate-middle-y"><i
                                                    class="bx bx-search"></i></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="btn-group" role="group"
                                            aria-label="Button group with nested dropdown">
                                            <button type="button" class="btn btn-white">Sắp Xếp</button>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='bx bx-chevron-down'></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-xxl-end"
                                                    aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item" href="#">A - Z</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Z - A</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-white">Khoảng Giá</button>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-slider"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-xxl-end " style="width: 400px;"
                                                    aria-labelledby="btnGroupDrop1">
                                                    <li>
                                                        <div class="dropdown-header">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <input class="form-control"
                                                                                placeholder="0 đ" type="text">
                                                                        </div>
                                                                        <div class="col-2" style="padding: 0px 0px">
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-6"><input class="form-control"
                                                                                placeholder="540.000 đ" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <input type="range" class="form-range"
                                                                        id="customRange1">
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <button class="btn btn-primary w-100">Áp
                                                                        Dụng</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4><b>Món Ăn</b></h4>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
                        <template v-for="(value, index) in list_mon_an" :key="index">
                            <div class="col d-flex">
                                <div class="card flex-fill">
                                    <router-link :to="'/khach-hang/don-dat-hang/' + value.id_quan_an">
                                        <img :src="value.hinh_anh" class="card-img-top"
                                            style="height: 200px; width: 100%;" />
                                        <div class="card-body">
                                            <h6 class="card-title cursor-pointer">
                                                {{ value.ten_mon_an }}
                                            </h6>
                                            <div class="clearfix">
                                                <p class="mb-0 float-start">{{ value.ten_quan_an }}</p>
                                            </div>
                                            <p class="mt-2">
                                                <del>{{ value.gia_ban }}đ</del>
                                                <strong class="ms-2">{{ value.gia_khuyen_mai }}đ</strong>
                                            </p>
                                            <div class="d-flex align-items-center mt-auto">
                                                <i class="fa-solid fa-tag text-danger me-2"></i>
                                                <span class="text-primary">-30%</span>
                                            </div>
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </template>

                    </div>
                    
                    <hr>

                    <h4><b>Quán Ăn</b></h4>
                    <div class="row product-grid">
                        <template v-for="(value, index) in list_quan_an" :key="index">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 d-flex">
                                <div class="card flex-fill">
                                    <router-link :to="'/khach-hang/quan-an/' + value.id">
                                        <div class="card-body">
                                            <div class="row g-0">
                                                <div class="col-md-5">
                                                    <img v-bind:src="value.hinh_anh" class="img-fluid rounded-start"
                                                        alt="..." style="width: 100%;height: 100%;">
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><b>
                                                                {{ value.ten_quan_an }}</b></h5>
                                                        <p>{{ value.dia_chi }}
                                                        </p>
                                                        <p><i class="fa-solid fa-tags me-1"></i> Tối thiểu {{
                                                            value.toi_thieu }} <i
                                                                class="fa-solid fa-circle-dollar-to-slot ms-3 me-1"></i>
                                                            Giá
                                                            {{ value.gia }}</p>
                                                        <div class="d-flex align-items-center mt-3">
                                                            <i class="fa-solid fa-tag text-danger me-2"></i> <span
                                                                class="text-primary"><b>Giảm hết {{ value.giam_gia
                                                                    }}</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
import axios from 'axios';

export default {
    props: ['thong_tin'],
    beforeRouteUpdate(to, from, next) {
        this.thong_tin = to.params.thong_tin;
        this.loadDataMonAn();
        next();
    },
    data() {
        return {
            thong_tin: this.$route.params.thong_tin,
            list_mon_an: [],
            list_quan_an: [],
        }
    },
    mounted() {
        this.loadDataMonAn();
    },
    methods: {
        loadDataMonAn() {
            var payload = {
                'noi_dung_tim': this.thong_tin
            };
            axios
                .post("http://127.0.0.1:8000/api/khach-hang/mon-an/tim-kiem", payload)
                .then((res) => {
                    this.list_mon_an = res.data.mon_an;
                    this.list_quan_an = res.data.quan_an;
                });
        },
    },
}
</script>
<style></style>