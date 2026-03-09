<template>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm p-3 mb-4 bg-white rounded-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8 col-sm-12 mb-2">
                            <div class="search-wrapper position-relative w-100">
                                <input type="text" class="form-control ps-5 py-2 rounded-pill border-primary"
                                    placeholder="Nhập tên quán, đường, phường, quận hoặc thành phố..."
                                    v-model="searchQuery" />
                                <span class="position-absolute top-50 translate-middle-y text-primary"
                                    style="left: 15px; font-size: 18px;">
                                    <i class="bx bx-search"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 mb-2">
                            <select class="form-select border-primary rounded-pill py-2" v-model="selectedDistrict">
                                <option value="">Tất cả quận</option>
                                <option v-for="(district, i) in list_quan" :key="i" :value="district">
                                    {{ district }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row product-grid">
        <template v-for="(v, k) in filteredQuanAn" :key="k">
            <div class="col-xl-4 col-lg-6 col-md-6 col-12 d-flex">
                <div class="card flex-fill border-0 shadow-sm hover-card">
                    <router-link :to="'/khach-hang/quan-an/' + v.id" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-5">
                                    <img :src="v.hinh_anh" class="img-fluid rounded-start" alt="..."
                                        style="width: 100%; height: 100%; object-fit: cover;" />
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold text-primary">
                                            {{ v.ten_quan_an }}
                                        </h5>
                                        <p class="text-muted mb-1">{{ v.dia_chi }}</p>
                                        <p class="mb-1">
                                            <i class="fa-solid fa-tags me-1 text-warning"></i>
                                            Tối thiểu {{ formatVND(v.gia_min) }}
                                            <i class="fa-solid fa-circle-dollar-to-slot ms-3 me-1 text-success"></i>
                                            Giá {{ formatVND(v.gia_max) }}
                                        </p>
                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-solid fa-tag text-danger me-2"></i>
                                            <span class="text-success fw-semibold">Giảm hết {{ v.giam_gia }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </template>

        <div v-if="filteredQuanAn.length === 0" class="text-center text-muted my-4">
            <i class="fa-solid fa-circle-exclamation me-2"></i>Không tìm thấy quán ăn nào phù hợp.
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            list_quan_an: [],
            list_quan: [
                "Hải Châu",
                "Thanh Khê",
                "Sơn Trà",
                "Ngũ Hành Sơn",
                "Liên Chiểu",
                "Cẩm Lệ",
                "Hòa Vang",
            ],
            searchQuery: "",
            selectedDistrict: "",
        };
    },
    mounted() {
        this.loadData();
    },
    computed: {
        filteredQuanAn() {
            let result = this.list_quan_an;

            if (this.searchQuery) {
                const q = this.searchQuery.toLowerCase();
                result = result.filter(
                    (item) =>
                        item.ten_quan_an.toLowerCase().includes(q) ||
                        item.dia_chi.toLowerCase().includes(q)
                );
            }

            if (this.selectedDistrict) {
                const district = this.selectedDistrict.toLowerCase().trim();
                result = result.filter((item) =>
                    item.dia_chi.toLowerCase().includes(`quận ${district}`) ||
                    item.dia_chi.toLowerCase().includes(district)
                );
            }

            return result;
        },
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat("vi-VN", {
                style: "currency",
                currency: "VND",
            }).format(number);
        },
        loadData() {
            axios
                .get("http://127.0.0.1:8000/api/khach-hang/quan-an/data", {
                    headers: {
                        Authorization:
                            "Bearer " + localStorage.getItem("khach_hang_login"),
                    },
                })
                .then((res) => {
                    this.list_quan_an = res.data.data;
                })
                .catch((err) => {
                    if (err.response?.data?.errors) {
                        const list = Object.values(err.response.data.errors);
                        list.forEach((v) => {
                            this.$toast.error(v[0]);
                        });
                    } else {
                        this.$toast.error("Không thể tải dữ liệu quán ăn!");
                    }
                });
        },
    },
};
</script>

<style scoped>
.search-wrapper input {
    transition: all 0.3s ease;
}

.search-wrapper input:focus {
    border-color: #1976d2;
    box-shadow: 0 0 8px rgba(25, 118, 210, 0.3);
}

.hover-card {
    transition: all 0.25s ease;
}

.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(25, 118, 210, 0.2);
}
</style>
