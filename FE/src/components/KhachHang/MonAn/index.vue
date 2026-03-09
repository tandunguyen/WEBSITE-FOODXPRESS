<template>
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div class="d-flex align-items-center">
                    <h2 class="card-title mb-0 fw-bold text-primary">Danh Sách Các Món Ăn</h2>
                </div>

                <div class="d-flex align-items-center flex-grow-1 justify-content-end gap-2">
                    <!-- Ô chọn loại món -->
                    <select v-model="selectedCategory" class="form-select border-primary rounded-4"
                        style="width: 180px;">
                        <option value="">Phân loại</option>
                        <option value="Đồ ăn">Đồ ăn</option>
                        <option value="Đồ uống">Đồ uống</option>
                    </select>

                    <!-- Ô tìm kiếm -->
                    <div class="position-relative" style="width: 350px;">
                        <input type="text" class="form-control ps-5 rounded-4 border-primary"
                            placeholder="Tìm món ăn hoặc quán..." v-model="searchQuery" />
                        <span class="position-absolute top-50 translate-middle-y text-muted" style="left: 15px;">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Danh sách món ăn -->
    <div class="row">
        <template v-for="(value, index) in filteredMonAn" :key="index">
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="card shadow-sm h-100">
                    <router-link :to="'/khach-hang/quan-an/' + value.id_quan_an">
                        <img :src="value.hinh_anh" class="card-img-top" style="height: 200px; object-fit: cover;" />
                        <div class="card-body">
                            <h6 class="card-title fw-semibold mb-2">{{ value.ten_mon_an }}</h6>
                            <p class="text-muted small mb-2">{{ value.ten_quan_an }}</p>
                            <span class="mb-0 d-flex align-items-center">
                                <del class="text-muted small">{{ formatVND(value.gia_ban) }}</del>
                                <h6 class="ms-2 text-danger mb-0 fw-bold">{{ formatVND(value.gia_khuyen_mai) }}</h6>
                            </span>
                        </div>
                    </router-link>
                </div>
            </div>
        </template>

        <!-- Không tìm thấy kết quả -->
        <div v-if="filteredMonAn.length === 0" class="text-center text-muted py-4">
            <i class="fa-solid fa-circle-exclamation me-2"></i>Không tìm thấy món ăn nào phù hợp.
        </div>

    </div>
</template>

<script>
import axios from "axios";


export default {
    data() {
        return {
            list_mon_an: [],
            searchQuery: "",
            selectedCategory: "", // Thêm biến lưu loại món
        };
    },
    mounted() {
        this.loadMonAn();
    },
    computed: {
        filteredMonAn() {
            let result = this.list_mon_an;

            // Lọc theo loại món (Đồ ăn / Đồ uống)
            if (this.selectedCategory) {
                result = result.filter(item => {
                    const name = item.ten_mon_an.toLowerCase();
                    if (this.selectedCategory === "Đồ ăn") {
                        return !(
                            name.includes("cafe") ||
                            name.includes("nước") ||
                            name.includes("trà") ||
                            name.includes("chè") ||
                            name.includes("sữa") ||
                            name.includes("cacao") ||
                            name.includes("sâm")
                        );
                    } else if (this.selectedCategory === "Đồ uống") {
                        return (
                            name.includes("cafe") ||
                            name.includes("nước") ||
                            name.includes("trà") ||
                            name.includes("chè") ||
                            name.includes("sữa") ||
                            name.includes("cacao") ||
                            name.includes("sâm")
                        );
                    }
                });
            }

            // Lọc theo ô tìm kiếm
            if (this.searchQuery) {
                const query = this.searchQuery.toLowerCase();
                result = result.filter(
                    (item) =>
                        item.ten_mon_an.toLowerCase().includes(query) ||
                        item.ten_quan_an.toLowerCase().includes(query)
                );
            }

            return result;
        },
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", {
                style: "currency",
                currency: "VND",
            }).format(number);
        },
        loadMonAn() {
            axios
                .get("http://127.0.0.1:8000/api/khach-hang/data-mon-an", {
                    headers: {
                        Authorization:
                            "Bearer " + localStorage.getItem("khach_hang_login"),
                    },
                })
                .then((res) => {
                    this.list_mon_an = res.data.data;
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v) => {
                        this.$toast.error(v[0]);
                    });
                });
        },
    },
};
</script>

<style scoped>
input.form-control {
    min-width: 220px;
    border-radius: 10px;
}

select.form-select {
    min-width: 140px;
}
</style>
