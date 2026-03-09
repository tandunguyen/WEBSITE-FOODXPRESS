<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="mb-0 mt-2">Vị Trí Hiện Tại</h5>
                        </div>
                        <div class="col-lg-6 text-end">
                            <button class="btn btn-primary" v-on:click="getCurrentLocation()">Refresh</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <div id="map" style="width: 100%; height: 500px;"></div>
                        </div>
                    </div>
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
            currentLocation: null,
            isLoading: true,
        };
    },

    mounted() {
        this.initMap();
        setTimeout(() => {
            this.getCurrentLocation();
        }, 1000);
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
        },

        async getCurrentLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                   async (position) => {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;
                        this.map.setView([lat, lng], 16);
                        if (this.currentLocation) {
                            this.map.removeLayer(this.currentLocation);
                        }
                        this.currentLocation = L.marker([lat, lng]).addTo(this.map)

                        var address = await this.getAddressFromLatLng(lat, lng);
                        if (address) {
                            this.currentLocation.bindPopup('<b>Bạn đang ở đây!</b><br>'+ address).openPopup();
                        }
                    },
                    (error) => {
                        this.$toast.error('Không thể lấy vị trí hiện tại. Hãy bật định vị GPS hoặc cho phép quyền truy cập.');
                    }
                );
            }

        },
        async getAddressFromLatLng(lat, lng) {
            try {
                const response = await fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`, {
                    headers: {
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();

                if (data && data.display_name) {
                    console.log('Địa chỉ:', data.display_name);
                    return data.display_name;
                } else {
                    console.warn('Không tìm thấy địa chỉ.');
                    return null;
                }
            } catch (error) {
                console.error('Lỗi khi lấy địa chỉ:', error);
                return null;
            }
        }
    }
}
</script>
<style></style>