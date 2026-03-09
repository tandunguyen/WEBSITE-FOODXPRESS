<template>
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-2">DANH SÁCH ĐƠN HÀNG ĐÃ ĐẶT</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table hover align-middle">
              <thead class="text-center align-middle">
                <tr class="table-secondary">
                  <th>Mã đơn hàng</th>
                  <th>Tên Quán Ăn</th>
                  <th>Ngày Đặt</th>
                  <th>Tiền Hàng</th>
                  <th>Phí Ship</th>
                  <th>Tổng Tiền</th>
                  <th>Trạng Thái</th>
                  <th>Shipper</th>
                  <th>Địa chỉ Nhận Hàng</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <template v-for="(value, index) in list_don_hang" :key="index">
                  <tr>
                    <th class="text-center">{{ value.ma_don_hang }}</th>
                    <td>{{ value.ten_quan_an }}</td>
                    <td class="text-center">{{ value.created_at }}</td>
                    <td class="text-end">{{ formatVND(value.tien_hang) }}</td>
                    <td class="text-end">{{ formatVND(value.phi_ship) }}</td>
                    <td class="text-end">{{ formatVND(value.tong_tien) }}</td>
                    <td class="text-center">
                      <span v-if="value.tinh_trang == 0" class="badge rounded-pill w-100 bg-warning py-1">
                        <span style="font-size: 13px;">Đơn đang chờ</span>
                      </span>
                      <span v-if="value.tinh_trang == 1" class="badge rounded-pill w-100 bg-primary py-1">
                        <span style="font-size: 13px;">Shipper đã nhận đơn</span>
                      </span>
                      <span v-if="value.tinh_trang == 2" class="badge rounded-pill w-100 bg-info py-1">
                        <span style="font-size: 13px;">Đang giao hàng</span>
                      </span>
                      <span v-if="value.tinh_trang == 3" class="badge rounded-pill w-100 bg-success py-1">
                        <span style="font-size: 13px;">Đã giao hàng</span>
                      </span>
                      <span v-if="value.tinh_trang == 4" class="badge rounded-pill w-100 bg-danger py-1">
                        <span style="font-size: 13px;">Đơn đã hủy</span>
                      </span>
                    </td>
                    <td>{{ value.ho_va_ten_shipper }}</td>
                    <td>
                      {{ value.dia_chi }}
                    </td>
                    <td class="text-center">
                      <button @click="xemChiTiet(value); Object.assign(chi_tiet, value)" type="button"
                        class="btn btn-primary btn-sm radius-30 px-4" data-bs-toggle="modal"
                        data-bs-target="#orderDetailsModal">
                        <i class="bx bx-detail me-1"></i>Chi tiết
                      </button>

                      <button v-if="value.is_thanh_toan == 0"
                        v-on:click="xemChiTiet(value); Object.assign(chi_tiet, value)" type="button"
                        class="btn btn-danger btn-sm radius-30 px-4 ms-2" data-bs-toggle="modal"
                        data-bs-target="#thanhToanModal">
                        <i class="fa-solid fa-money-bill-transfer"></i>Chưa Thanh Toán
                      </button>
                      <button v-else type="button" class="btn btn-success btn-sm radius-30 px-4 ms-2">
                        <i class="fa-solid fa-money-bill-transfer"></i>Đã Thanh Toán
                      </button>
                    </td>
                  </tr>
                </template>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="orderDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white">
          <h5 class="modal-title">
            <i class="bx bx-package fa-lg"></i>
            CHI TIẾT ĐƠN HÀNG - <b class="text-danger">{{ chi_tiet.ma_don_hang }}</b>
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">



          <!-- Chi Tiết Sản Phẩm -->
          <div class="table-responsive">
            <table class="table table-hover table-bordered mb-0">
              <thead class="">
                <tr class="align-middle table-primary text-center">
                  <th>Tên Món Ăn</th>
                  <th>Số Lượng</th>
                  <th>Đơn Giá</th>
                  <th>Ghi Chú</th>
                  <th>Thành Tiền</th>
                </tr>
              </thead>
              <tbody>
                <template v-for="(value, index) in list_chi_tiet" :key="index">
                  <tr class="align-middle">
                    <td>{{ value.ten_mon_an }}</td>
                    <td class="text-center">{{ value.so_luong }}</td>
                    <td class="text-end">{{ formatVND(value.don_gia) }}</td>
                    <td class="text-end">{{ value.ghi_chu ? value.ghi_chu : "-" }}</td>
                    <td class="text-end fw-bold">{{ formatVND(value.thanh_tien) }}</td>
                  </tr>
                </template>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bx bx-x me-1"></i>Đóng
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Thanh Toán -->
  <div class="modal fade" id="thanhToanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white" id="exampleModalLabel">
            <i class="fas fa-money-check-alt me-2"></i>Cổng Thanh Toán Online
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <div class="alert alert-info mb-4" role="alert">
            <i class="fas fa-info-circle me-2"></i>
            Quý khách vui lòng quét mã QR để thanh toán. Đơn hàng sẽ được xác nhận sau khi thanh toán thành công!
          </div>

          <div class="row g-4">
            <div class="col-lg-5">
              <div class="text-center p-3 border rounded-3 bg-light h-100 d-flex flex-column justify-content-center">
                <img src="https://img.vietqr.io/image/MB-1910061030119-qr_only.png" alt="QR Code" class="img-fluid mb-3"
                  style="max-width: 200px; margin: 0 auto;" />
                <h5 class="text-primary mb-2">Mã Đơn Hàng: {{ chi_tiet.ma_don_hang }}</h5>
                <h4 class="text-danger fw-bold">{{ formatVND(chi_tiet.tong_tien) }}</h4>
              </div>
            </div>

            <div class="col-lg-7">
              <div class="card border-0 bg-light h-100">
                <div class="card-body">
                  <div class="mb-4">
                    <h6 class="text-primary mb-3">
                      <i class="fas fa-user-circle me-2"></i>Thông Tin Người Nhận
                    </h6>
                    <div class="ps-4">
                      <div class="row mb-2">
                        <div class="col-4 text-secondary">Họ và tên:</div>
                        <div class="col-8 fw-medium">{{ chi_tiet.ten_nguoi_nhan }}</div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-4 text-secondary">Điện thoại:</div>
                        <div class="col-8 fw-medium">{{ chi_tiet.so_dien_thoai }}</div>
                      </div>
                      <div class="row">
                        <div class="col-4 text-secondary">Địa chỉ:</div>
                        <div class="col-8 fw-medium">{{ chi_tiet.dia_chi }}</div>
                      </div>
                    </div>
                  </div>

                  <div>
                    <h6 class="text-primary mb-3">
                      <i class="fas fa-money-bill-wave me-2"></i>Chi Tiết Thanh Toán
                    </h6>
                    <div class="ps-4">
                      <div class="d-flex justify-content-between mb-2">
                        <span class="text-secondary">Tiền hàng:</span>
                        <span class="fw-medium">{{ formatVND(chi_tiet.tien_hang) }}</span>
                      </div>
                      <div class="d-flex justify-content-between mb-2">
                        <span class="text-secondary">Phí ship:</span>
                        <span class="fw-medium">{{ formatVND(chi_tiet.phi_ship) }}</span>
                      </div>
                      <hr class="my-2">
                      <div class="d-flex justify-content-between">
                        <span class="fw-medium">Tổng thanh toán:</span>
                        <span class="h5 mb-0 text-danger fw-bold">{{ formatVND(chi_tiet.tong_tien) }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" @click="payNow">
            <i class="fas fa-money-check-alt me-2"></i> Xác Nhận Thanh Toán
          </button>

          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Đóng
          </button>
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
      chi_tiet: {},
      list_chi_tiet: [],
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
        .get("http://127.0.0.1:8000/api/khach-hang/don-hang/data", {
          headers: {
            Authorization: "Bearer " + localStorage.getItem("khach_hang_login"),
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
    xemChiTiet(value) {
      axios.post(
        "http://127.0.0.1:8000/api/khach-hang/don-hang/data-chi-tiet",
        { id: value.id },
        {
          headers: {
            Authorization: "Bearer " + localStorage.getItem("khach_hang_login"),
          },
        }
      )
        .then((res) => {
          if (res.data.status) {
            this.list_chi_tiet = res.data.data;
            this.chi_tiet = {
              ...value,
              phi_ship: res.data.don.phi_ship,
              tong_tien: res.data.don.tong_tien,
              tien_hang: res.data.don.tien_hang,
            };
          }
        });
    }


  },
}
</script>

<style></style>