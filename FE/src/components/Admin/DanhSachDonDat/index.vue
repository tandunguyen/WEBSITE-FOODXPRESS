<template>
    <div class="card border-top border-0 border-3 border-info">
        <div class="card-body">
            <div class="row align-items-center">
                <!-- 🔍 Tìm kiếm -->
                <div class="col-lg-4 col-md-12">
                    <label for="">Tìm kiếm</label>
                    <div class="input-group mt-2 mb-2">
                        <input type="text" class="form-control" placeholder="Tìm kiếm đơn đặt..."
                            v-model="searchKeyword" @keyup.enter="filterOrders" />
                        <button class="btn btn-primary" @click="filterOrders">Tìm Kiếm</button>
                    </div>
                </div>

                <!-- 📅 Lọc theo ngày -->
                <div class="col-lg-3 col-md-6">
                    <label for="">Từ ngày</label>
                    <input type="date" class="form-control mt-2 mb-2 w-100" v-model="fromDate">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label for="">Đến ngày</label>
                    <input type="date" class="form-control mt-2 mb-2" v-model="toDate">
                </div>
                <div class="col-lg-2 col-md-12">
                    <label for="">&nbsp;</label>
                    <button class="btn btn-primary w-100 mt-2" @click="filterOrders">Lọc</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 📋 Danh sách đơn hàng -->
    <div class="card">
        <div class="card-header">
            <h5 class="mt-2">DANH SÁCH ĐƠN ĐẶT HÀNG</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="align-middle">
                        <tr class="text-center table-primary">
                            <th>Mã đơn</th>
                            <th>Thời Gian Đặt Hàng</th>
                            <th>Quán Ăn</th>
                            <th>Khách Hàng</th>
                            <th>Người Nhận</th>
                            <th>Shipper</th>
                            <th>Tiền Hàng</th>
                            <th>Phí Ship</th>
                            <th>Tổng Tiền</th>
                            <th>Trạng thái</th>
                            <th>Chi Tiết Đơn Đặt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="(value, index) in filteredOrders" :key="index">
                            <tr class="align-middle">
                                <td class="align-middle text-center">{{ value.ma_don_hang }}</td>
                                <td class="align-middle text-center">{{ value.created_at }}</td>
                                <td class="align-middle">{{ value.ten_quan_an }}</td>
                                <td class="align-middle">{{ value.ho_va_ten_khach_hang }}</td>
                                <td class="align-middle">{{ value.ten_nguoi_nhan }}</td>
                                <td class="align-middle">{{ value.ho_va_ten_shipper ? value.ho_va_ten_shipper : "-" }}
                                </td>
                                <td class="align-middle text-end">{{ formatVND(value.tien_hang) }}</td>
                                <td class="align-middle text-end">{{ formatVND(value.phi_ship) }}</td>
                                <td class="align-middle text-end">{{ formatVND(value.tong_tien) }}</td>
                                <td class="align-middle text-center">
                                    <button v-if="value.tinh_trang == 0" class="btn btn-warning btn-sm w-100">Chờ xác
                                        nhận</button>
                                    <button v-if="value.tinh_trang == 1" class="btn btn-primary btn-sm w-100">Shipper đã
                                        nhận đơn</button>
                                    <button v-if="value.tinh_trang == 2" class="btn btn-info btn-sm w-100">Đang giao
                                        hàng</button>
                                    <button v-if="value.tinh_trang == 3" class="btn btn-success btn-sm w-100">Giao thành
                                        công</button>
                                    <button v-if="value.tinh_trang == 4" class="btn btn-danger btn-sm w-100">Đơn bị
                                        hủy</button>
                                </td>
                                <td class="align-middle text-center">
                                    <!-- Xem chi tiết -->
                                    <button class="btn btn-info w-100 btn-sm me-2" @click="xemChiTiet(value)"
                                        style="color: white;">
                                        <i class="fas fa-eye"></i> Chi tiết
                                    </button>
                                </td>
                                <td class="align-middle text-center">
                                    <!-- Xác nhận đơn -->
                                    <button class="btn btn-success btn-sm me-2" @click="xacNhanDonHang(value)"
                                        :disabled="value.tinh_trang !== 0">
                                        <i class="fas fa-check"></i> Xác nhận
                                    </button>

                                    <!-- Hủy đơn -->
                                    <button class="btn btn-danger btn-sm" @click="chonDonHuy(value)" 
    data-bs-toggle="modal" data-bs-target="#huyModal">
    Hủy
</button>


                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Chi tiết -->
    <div class="modal fade" id="chiTietModal" tabindex="-1" aria-labelledby="chiTietModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="chiTietModalLabel">Chi tiết đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div v-if="list_chi_tiet.length === 0" class="text-center">
                        <p>Không có chi tiết đơn hàng.</p>
                    </div>
                    <div v-else>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-secondary">
                                    <th>#</th>
                                    <th>Quán Ăn</th>
                                    <th>Tên Món Ăn</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, idx) in list_chi_tiet" :key="idx">
                                    <td>{{ idx + 1 }}</td>
                                    <td>{{ item.ten_quan_an }}</td>
                                    <td>{{ item.ten_san_pham }}</td>
                                    <td class="text-center">{{ item.so_luong }}</td>
                                    <td class="text-end">{{ formatVND(item.don_gia) }}</td>
                                    <td class="text-end">{{ formatVND(item.thanh_tien) }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5" class="text-end">Tiền hàng:</th>
                                    <th class="text-end">{{formatVND(list_chi_tiet.reduce((sum, i) => sum + i.so_luong
                                        *
                                        i.don_gia, 0)) }}</th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-end">Phí ship:</th>
                                    <th class="text-end">{{ formatVND(list_chi_tiet[0]?.phi_ship || 0) }}</th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-end">Tổng tiền:</th>
                                    <th class="text-end">{{ formatVND(list_chi_tiet[0]?.tong_tien || 0) }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hủy đơn -->
    <div class="modal fade" id="huyModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Xác nhận hủy đơn</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Bạn có chắc chắn muốn hủy đơn <b>{{ don_huy.ma_don_hang }}</b> không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-danger" @click="huyDon()">Xác nhận</button>
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
            don_huy: {},
            searchKeyword: "",
            fromDate: "",
            toDate: "",
        };
    },
    mounted() {
        this.loadData();
    },
    computed: {
        filteredOrders() {
            let orders = this.list_don_hang;

            // Filter theo từ khóa
            if (this.searchKeyword) {
                const keyword = this.searchKeyword.toLowerCase();
                orders = orders.filter(o =>
                    o.ma_don_hang?.toLowerCase().includes(keyword) ||
                    o.ten_quan_an?.toLowerCase().includes(keyword) ||
                    o.ho_va_ten_khach_hang?.toLowerCase().includes(keyword) ||
                    (o.ten_nguoi_nhan && o.ten_nguoi_nhan.toLowerCase().includes(keyword)) ||
                    (o.ho_va_ten_shipper && o.ho_va_ten_shipper.toLowerCase().includes(keyword))
                );
            }

            // Filter theo ngày
            if (this.fromDate) orders = orders.filter(o => new Date(o.created_at) >= new Date(this.fromDate));
            if (this.toDate) orders = orders.filter(o => new Date(o.created_at) <= new Date(this.toDate + 'T23:59:59'));

            return orders;
        }
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
        },

        // Load danh sách đơn hàng
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/don-hang/data', {
                headers: { Authorization: "Bearer " + localStorage.getItem("nhan_vien_login") },
            })
            .then(res => { this.list_don_hang = res.data.data; })
            .catch(() => this.$toast.error("Lỗi tải dữ liệu"));
        },

        // Xem chi tiết đơn hàng
        xemChiTiet(order) {
            axios.get(`http://127.0.0.1:8000/api/admin/don-hang/chi-tiet/${order.id}`, {
                headers: { Authorization: "Bearer " + localStorage.getItem("nhan_vien_login") },
            })
            .then(res => {
                this.list_chi_tiet = res.data.data.map(item => ({
                    ...item,
                    ten_quan_an: order.ten_quan_an,
                    phi_ship: order.phi_ship,
                    tong_tien: order.tong_tien
                }));
                const modal = new bootstrap.Modal(document.getElementById('chiTietModal'));
                modal.show();
            })
            .catch(() => this.$toast.error("Không tải được chi tiết"));
        },

        // Xác nhận đơn hàng
        xacNhanDonHang(order) {
            if (order.tinh_trang !== 0) {
                this.$toast.warning("Đơn này không thể xác nhận nữa!");
                return;
            }
            this.$swal({
                title: "Xác nhận giao đơn hàng?",
                text: "Mã đơn: " + order.ma_don_hang,
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Hủy",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post("http://127.0.0.1:8000/api/admin/don-hang/xac-nhan-don-hang",
                        { id: order.id },
                        { headers: { Authorization: "Bearer " + localStorage.getItem("nhan_vien_login") } }
                    )
                    .then(res => {
                        if (res.data.status) {
                            this.$toast.success("Đã xác nhận thành công!");
                            order.tinh_trang = 1;
                        }
                    })
                    .catch(() => this.$toast.error("Lỗi hệ thống"));
                }
            });
        },

        // Chọn đơn để hủy
        chonDonHuy(order) {
            this.don_huy = order;
        },

        // Hủy đơn hàng
        huyDon() {
            if (!this.don_huy.id) return this.$toast.warning("Chưa chọn đơn nào!");
            
            axios.post("http://127.0.0.1:8000/api/admin/don-dat/huy", 
                { id: this.don_huy.id }, 
                { headers: { Authorization: "Bearer " + localStorage.getItem("nhan_vien_login") } } 
            )
            .then(res => {
                if (res.data.status == 1) {
                    this.$toast.success("Hủy đơn hàng thành công!");
                    this.loadData();
                    const modal = bootstrap.Modal.getInstance(document.getElementById('huyModal'));
                    if(modal) modal.hide();
                } else {
                    this.$toast.error(res.data.message);
                }
            })
            .catch(err => {
                console.log(err);
                this.$toast.error("Lỗi hệ thống");
            });
        }
    }
};
</script>


<style></style>
