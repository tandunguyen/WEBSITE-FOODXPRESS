<template>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="mt-2">Địa điểm kinh doanh hiện tại</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Giờ Mở Cửa</label>
                            <input type="time" class="form-control" placeholder="Giờ Mở Cửa"
                                v-model="quan_an.gio_mo_cua">
                        </div>
                        <div class="col-lg-6">
                            <label for="">Giờ Đóng Cửa</label>
                            <input type="time" class="form-control" placeholder="Giờ Đóng Cửa"
                                v-model="quan_an.gio_dong_cua">
                        </div>

                        <div class="col-lg-12 mt-3">
                            <label for="">Địa Chỉ</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nhập địa chỉ quán ăn"
                                    v-model="quan_an.dia_chi">
                                <span class="input-group-text bg-danger text-white" id="basic-addon2"
                                    v-on:click="search_dia_chi()">Tìm Kiếm</span>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <button class="btn btn-primary w-100" v-on:click="capNhatCauHinh()">Lưu</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="mt-2">Bản Đồ</h6>
                </div>
                <div class="card-body">
                    <div id="map" style="height: 400px;"></div>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import 'leaflet.heat';
import axios from 'axios';
export default {
    data() {
        return {
            map: null,
            selectedMarker: null,
            quan_an: {}
        };
    },
    mounted() {
        this.initMap();
        this.getDataCauHinh();
    },
    methods: {
        initMap() {
            this.map = L.map('map').setView([16.0471, 108.2068], 13); // VD: Đà Nẵng
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(this.map);
            this.map.on('click', this.onMapClick);
        },

        onMapClick(e) {
            const { lat, lng } = e.latlng;
            if (this.selectedMarker) {
                this.map.removeLayer(this.selectedMarker);
            }

            this.selectedMarker = L.marker([lat, lng]).addTo(this.map);
            this.selectedMarker.bindPopup(`Vị trí đã chọn:<br>Lat: ${lat.toFixed(6)}, Lng: ${lng.toFixed(6)}`).openPopup();
            this.quan_an.toa_do_x = lat;
            this.quan_an.toa_do_y = lng;
        },

        async search_dia_chi() {
            const address = this.quan_an.dia_chi;
            try {
                const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`, {
                    headers: {
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();

                if (data && data.length > 0) {
                    const firstResult = data[0];
                    const lat = parseFloat(firstResult.lat);
                    const lng = parseFloat(firstResult.lon);
                    this.map.setView([lat, lng], 16); // zoom 16

                    if (this.selectedMarker) {
                        this.map.removeLayer(this.selectedMarker);
                    }
                    this.selectedMarker = L.marker([lat, lng]).addTo(this.map);
                    this.quan_an.toa_do_x = lat;
                    this.quan_an.toa_do_y = lng;
                }
            } catch (error) {
                return null;
            }
        },

        capNhatCauHinh() {
            // Gửi dữ liệu đến API để cập nhật cấu hình
            axios.post('http://127.0.0.1:8000/api/quan-an/cau-hinh', this.quan_an,
                {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                }
            )
                .then((res) => {
                    this.$toast.success(res.data.message);
                })
                .catch((error) => {
                    console.error('Lỗi khi cập nhật:', error);
                });
        },

        getDataCauHinh() {
            axios.get('http://127.0.0.1:8000/api/quan-an/cau-hinh/data',
                {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
                    },
                }
            )
                .then((res) => {
                    this.quan_an = res.data.data;
                    if (this.quan_an.toa_do_x && this.quan_an.toa_do_y) {
                        // console.log(this.quan_an.toa_do_x, this.quan_an.toa_do_y);

                        if (this.selectedMarker) {
                            this.map.removeLayer(this.selectedMarker);
                        }
                        this.selectedMarker = L.marker([this.quan_an.toa_do_x, this.quan_an.toa_do_y]).addTo(this.map);
                    }
                })
        }
    }
}
</script>
<style></style>