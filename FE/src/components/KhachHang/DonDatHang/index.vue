<template>
    <div class="card shadow-sm mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="https://cdn.prod.website-files.com/5acc07fc6634d231ac4bcca6/6320a0603151dde41d816976_one2_best_food_delivery_service.jpeg"
                    style="width: 100%; height: 400px; object-fit: cover;" class="img-fluid rounded-start"
                    alt="Restaurant Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title fw-bold">{{ tt_quan_an.ten_quan_an }}</h4>
                    <div class="text-muted">
                        <i class="fas fa-location-dot me-2 text-danger"></i>
                        {{ tt_quan_an.dia_chi }}
                    </div>
                    <div class="d-flex gap-3 py-3">
                        <div class="cursor-pointer">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-secondary"></i>
                        </div>
                        <div>999+ đánh giá</div>
                        <div class="text-success"><i class="fa-solid fa-circle fa-2xs"></i> Mở cửa</div>
                    </div>
                    <div class="mb-3">
                        <p>
                            <i class="fa-regular fa-clock"></i> {{ tt_quan_an.gio_mo_cua }} - {{ tt_quan_an.gio_dong_cua
                            }}
                        </p>
                    </div>
                    <hr>
                    <div class="row row-cols-auto row-cols-1 row-cols-md-3 align-items-center">

                        <div class="col">
                            <div class="row">
                                <div class="col-lg-5">
                                    <h6 class="form-label">PHÍ DỊCH VỤ </h6>
                                    <h6 class="text-danger">0.0% Phí dịch Vụ</h6>
                                </div>
                                |
                                <div class="col-lg-5">
                                    <h6 class="form-label">DỊCH VỤ BỞI </h6>
                                    <h6 class="text-danger">FOODXPRESS</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <h3 class="mb-4"><i class="fas fa-utensils me-2"></i><b class="text-danger">THỰC ĐƠN</b></h3>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="alert alert-warning border-start border-warning border-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-ticket-alt text-danger fa-2x"></i>
                                <div class="ms-3">
                                    <span class="fs-5 fw-semibold">HOME CREDIT giảm 50k cho đơn từ 100k</span>
                                </div>
                            </div>
                        </div>

                        <!-- TÌM KIẾM MÓN ĂN -->
                        <div class="position-relative mb-4">
                            <input type="text" v-model="tu_khoa" @input="timKiemMon"
                                class="form-control form-control-lg ps-5" placeholder="Tìm kiếm món ăn...">
                            <i
                                class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                        </div>

                        <h5 class="mb-3 fw-bold">Danh Sách Món Ăn</h5>
                        <template v-for="(v, k) in monAnHienThi" :key="k">
                            <div class="card mb-3 hover-shadow">
                                <div class="d-flex align-items-center p-3">
                                    <img :src="v.hinh_anh" class="me-3 rounded"
                                        style="width: 120px; height: 90px; object-fit: cover;">
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1 fw-bold">{{ v.ten_mon_an }}</h5>
                                        <p class="mb-0">
                                            <del class="text-muted">{{ v.gia_ban.toLocaleString() }}đ</del>
                                            <strong class="text-danger ms-2">{{ v.gia_khuyen_mai.toLocaleString()
                                            }}đ</strong>
                                        </p>
                                    </div>
                                    <button v-on:click="themGioHang(v.id)" class="btn btn-outline-primary">+</button>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-success py-3">
                        <h5 class="mb-0 text-white">
                            <i class="fas fa-shopping-cart me-2"></i>Đơn Hàng Đang Đặt
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center table-secondary">
                                        <th class="align-middle">Tên món</th>
                                        <th class="align-middle">Số lượng</th>
                                        <th class="align-middle">Đơn giá</th>
                                        <th class="align-middle">Ghi chú</th>
                                        <th class="align-middle">Thành Tiền</th>
                                        <th class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(v, k) in list_gio_hang" :key="k">
                                        <tr class="align-middle">
                                            <td>{{ v.ten_mon_an }}</td>
                                            <td style="width: 100px;">
                                                <input v-on:blur="updateGioHang(v)" v-model="v.so_luong" type="number"
                                                    class="form-control text-center" placeholder="1">
                                            </td>
                                            <td class="text-end">{{ formatVND(v.don_gia) }}</td>
                                            <td>
                                                <input v-on:change="updateGioHang(v)" v-model="v.ghi_chu" type="text"
                                                    class="form-control" placeholder="Ghi chú">
                                            </td>
                                            <td class="text-end">{{ formatVND(v.thanh_tien) }}</td>
                                            <td class="align-middle text-center">
                                                <button v-on:click="xoaGioHang(v)" class="btn btn-danger">Hủy</button>
                                            </td>
                                        </tr>
                                    </template>

                                    <!-- Chọn địa chỉ -->
                                    <tr class="align-middle">
                                        <th>Chọn địa chỉ nhận hàng</th>
                                        <th colspan="3">
                                            <select v-model="dia_chi.id_dia_chi_khach" v-on:change="tinhPhiShip()"
                                                class="form-control">
                                                <template v-for="(value, index) in list_dia_chi" :key="index">
                                                    <option :value="value.id">{{ value.dia_chi }} - {{
                                                        value.ten_nguoi_nhan
                                                        }} - {{ value.so_dien_thoai }}</option>
                                                </template>
                                            </select>
                                        </th>
                                        <td colspan="2"><span class="d-flex justify-content-between"><b>Phí Ship: </b>{{
                                            formatVND(phi_ship) }}</span></td>
                                    </tr>

                                    <!-- Thêm chọn voucher -->
                                    <tr class="align-middle">
                                        <th>Chọn Voucher</th>
                                        <th colspan="5">
                                            <select v-model="voucher" class="form-control">
                                                <option value="">-- Chọn voucher --</option>
                                                <option value="VC50">Giảm 50.000đ</option>
                                                <option value="VC10">Giảm 10%</option>
                                                <option value="FREESHIP">Miễn phí ship</option>
                                            </select>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th colspan="4">Tổng tiền cần thanh toán:</th>
                                        <td colspan="2" class="text-end align-middle text-danger"><b>{{
                                            formatVND(tinhTongTien())
                                                }}</b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button v-if="trang_thai == 0" disabled class="btn btn-danger w-100 mt-2">Đặt Món
                                Ăn</button>
                            <button v-on:click="xacNhan()" v-else class="btn btn-success w-100 mt-2">Đặt Món Ăn</button>
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
    props: ['id_quan'],
    data() {
        return {
            id_quan_an: this.$route.params.id_quan,
            tt_quan_an: {},
            monAnData: [],
            list_gio_hang: [],
            tong_tien: 0,
            trang_thai: 0,
            dia_chi: {
                id_quan_an: this.$route.params.id_quan,
                id_dia_chi_khach: 0,
            },
            phi_ship: 0,
            list_dia_chi: [],
            tu_khoa: '',
            voucher: '',
        }
    },
    computed: {
        monAnHienThi() {
            if (!this.tu_khoa) return this.monAnData;
            return this.monAnData.filter(v =>
                v.ten_mon_an.toLowerCase().includes(this.tu_khoa.toLowerCase())
            );
        }
    },
    mounted() {
        this.loadData();
    },
    methods: {
        timKiemMon() {
            // Không cần gọi API, chỉ lọc local
        },
        tinhTongTien() {
            let tong = this.tong_tien + this.phi_ship;
            if (this.voucher === 'VC50') tong -= 50000;
            else if (this.voucher === 'VC10') tong *= 0.9;
            else if (this.voucher === 'FREESHIP') tong -= this.phi_ship;
            return tong > 0 ? tong : 0;
        },
        xacNhan() {
            this.trang_thai = 0;
            axios
                .get('http://127.0.0.1:8000/api/khach-hang/xac-nhan-dat-hang/' + this.id_quan_an + '/' + this.dia_chi.id_dia_chi_khach, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("khach_hang_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.trang_thai = 1;
                        this.loadData();
                    } else {
                        this.$toast.error("Hệ thống bị lỗi, vui lòng thử lại sau!");
                    }
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        formatVND(number) {
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number)
        },
        loadData() {
            axios
                .get('http://127.0.0.1:8000/api/khach-hang/don-dat-hang/' + this.id_quan_an, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("khach_hang_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.tt_quan_an = res.data.quan_an;
                        this.monAnData = res.data.mon_an;
                        this.list_gio_hang = res.data.gio_hang;
                        this.tong_tien = res.data.tong_tien;
                        this.list_dia_chi = res.data.dia_chi_khach;
                    } else {
                        this.$router.push('/khach-hang/quan-an');
                    }
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
        themGioHang(id_mon_an) {
            var payload = {
                'id': id_mon_an,
            };
            axios
                .post("http://127.0.0.1:8000/api/khach-hang/don-dat-hang/create", payload, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("khach_hang_login"),
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
        updateGioHang(value) {
            axios
                .post("http://127.0.0.1:8000/api/khach-hang/don-dat-hang/update", value, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("khach_hang_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
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
            this.loadData();
        },
        xoaGioHang(value) {
            axios
                .post("http://127.0.0.1:8000/api/khach-hang/don-dat-hang/delete", value, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("khach_hang_login"),
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
        tinhPhiShip() {
            this.trang_thai = 0;
            axios
                .post("http://127.0.0.1:8000/api/khach-hang/don-dat-hang/phi-ship", this.dia_chi, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("khach_hang_login"),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.phi_ship = res.data.phi_ship;
                        this.trang_thai = 1;
                    } else {
                        this.$toast.error("Hệ thống bị lỗi, vui lòng thử lại sau!");
                    }
                })
                .catch(res => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
    },
}
</script>
