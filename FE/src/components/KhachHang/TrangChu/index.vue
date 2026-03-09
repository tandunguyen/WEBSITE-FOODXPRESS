<template>
    <div class="row">
        <div id="carouselExampleControls" class="carousel slide carousel-fade pointer-event" data-bs-ride="carousel"
            data-bs-interval="2000">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleControls" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleControls" data-bs-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active rounded-4" style="background-color: #1C2331;">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <div class="container ms-5">
                                <h2 class="text-white mb-4">
                                    Chào mừng đến với <span class="text-warning me-2">FoodXpress</span>
                                    <i class="fa-solid fa-utensils text-warning"></i>
                                </h2>
                                <span class="text-white">
                                    FoodXpress là nền tảng giao đồ ăn nhanh chóng, tiện lợi và chất lượng hàng đầu.
                                    Chúng tôi mang đến trải nghiệm ẩm thực tuyệt vời – từ quán ăn đường phố
                                    đến nhà hàng cao cấp, tất cả chỉ trong một cú chạm.
                                </span>
                                <p class="mt-4">
                                    <button class="btn btn-outline-light rounded-4"><b>TÌM HIỂU NGAY</b></button>
                                </p>
                            </div>
                        </div>
                        <div class="col-6">
                            <img src="https://dep.com.vn/wp-content/uploads/2020/09/920340da97f26476b50291360aab7ed7.jpg"
                                class="d-block w-100 rounded-4" alt="FoodXpress"
                                style="width: 450px; height: 500px; object-fit: cover;">
                        </div>
                    </div>
                </div>

                <div class="carousel-item rounded-4" style="background-color: #1C2331;">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <div class="container ms-5">
                                <h2 class="text-white mb-4">
                                    Sứ mệnh của chúng tôi
                                    <i class="fa-solid fa-heart text-warning"></i>
                                </h2>
                                <span class="text-white">
                                    FoodXpress mong muốn kết nối con người qua ẩm thực.
                                    Chúng tôi cam kết mang đến dịch vụ nhanh, món ăn tươi ngon
                                    và trải nghiệm đáng nhớ cho từng khách hàng.
                                </span>
                                <p class="mt-4">
                                    <button class="btn btn-outline-light rounded-4"><b>KHÁM PHÁ NGAY</b></button>
                                </p>
                            </div>
                        </div>
                        <div class="col-6">
                            <img src="https://helio.vn/media/uploads/2023/05/23/dia-diem-am-thuc-han-quoc-dn-soul.jpg"
                                class="d-block w-100 rounded-4" alt="Sứ mệnh FoodXpress"
                                style="width: 450px; height: 500px; object-fit: cover;">
                        </div>
                    </div>
                </div>

                <div class="carousel-item rounded-4" style="background-color: #1C2331;">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <div class="container ms-5">
                                <h2 class="text-white mb-4">Khám phá ẩm thực ngay tại nhà!</h2>
                                <span class="text-white">
                                    FoodXpress sẵn sàng phục vụ bạn. Chỉ cần vài cú nhấp chuột,
                                    ẩm thực sẽ đến ngay trước cửa nhà bạn!
                                </span>
                                <p class="mt-4">
                                    <button class="btn btn-outline-light rounded-4"><b>THỬ NGAY</b></button>
                                </p>
                            </div>
                        </div>
                        <div class="col-6">
                            <img src="https://images2.thanhnien.vn/528068263637045248/2025/3/27/40d6085d666dd6338f7c-1743056550057301046068.jpg"
                                class="d-block w-100 rounded-4" alt="Khám phá ẩm thực"
                                style="width: 450px; height: 500px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-12 text-center mb-2">
            <div class="d-inline-block">
                <h2><b>ĐẶT ĐỒ ĂN DỄ DÀNG TIỆN LỢI</b></h2>
                <div class="text-center">
                    <hr class="bg-secondary mb-3" style="width: 100%; height: 3px; border: none; border-radius: 5px" />
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-5 product-grid">
                <div class="col" v-for="(card, index) in cards" :key="index">
                    <div class="card border-start border-5 radius-10" :class="card.border">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="widgets-icons rounded-circle mx-auto bg-light-primary mb-3">
                                    <img :src="card.image" alt="icon" class="rounded-circle"
                                        style="width: 50px; height: 50px" />
                                </div>
                                <h5 class="my-1">{{ card.title }}</h5>
                                <p class="mb-0 text-secondary">{{ card.desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12 text-center mb-2">
            <div class="d-inline-block">
                <h4><b>QUÁN ĂN ĐƯỢC YÊU THÍCH NHIỀU NHẤT</b></h4>
                <div class="text-center">
                    <hr class="bg-primary my-2" style="width: 100%; height: 3px; border: none; border-radius: 5px" />
                </div>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="card border-0 shadow-sm p-3 bg-white rounded-4">
                <div class="card-body">
                    <div class="search-wrapper position-relative w-100">
                        <input type="text" class="form-control ps-5 py-2 rounded-pill border-primary"
                            placeholder="Tìm kiếm quán ăn yêu thích..." v-model="searchFavorite" style="width: 100%;" />
                        <span class="position-absolute top-50 translate-middle-y text-primary"
                            style="left: 15px; font-size: 18px;">
                            <i class="bx bx-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row product-grid">
                    <template v-for="(v, k) in filteredQuanAn.slice(0, visibleQuanAn)" :key="v.id || k">
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12 d-flex mb-3">
                            <div class="card flex-fill">
                                <router-link :to="'/khach-hang/quan-an/' + v.id">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-5">
                                                <img :src="v.hinh_anh" class="img-fluid rounded-start" alt="..."
                                                    style="width: 100%;height: 100%; object-fit: cover;">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b>{{ v.ten_quan_an }}</b></h5>
                                                    <p>{{ v.dia_chi }}</p>
                                                    <p>
                                                        <i class="fa-solid fa-tags me-1"></i> Tối thiểu {{ v.toi_thieu
                                                        }}
                                                        <i class="fa-solid fa-circle-dollar-to-slot ms-3 me-1"></i> Giá
                                                        {{ v.gia }}
                                                    </p>
                                                    <div class="d-flex align-items-center mt-3">
                                                        <i class="fa-solid fa-tag text-danger me-2"></i>
                                                        <span class="text-primary"><b>Giảm hết {{ v.giam_gia
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

                    <div class="col-lg-12 text-center" v-if="!searchFavorite">
                        <button type="button" class="btn btn-lg"
                            :class="isExpandedQuanAn ? 'btn-outline-danger' : 'btn-outline-success'" style="width: 30%;"
                            @click="toggleQuanAn">
                            <i class="fa-regular fa-hand-point-up"></i>
                            {{ isExpandedQuanAn ? "Rút Gọn" : "Xem Thêm" }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-3"><b>VOUCHER HẤP DẪN KHI ĐẶT MÓN</b></h5>
                </div>
                <div class="card-body">
                    <div class="row product-grid">
                        <template v-for="(v, k) in list_voucher.slice(0, visibleVoucher)" :key="v.id || k">
                            <div class="col-lg-2 col-md-4 col-sm-6 d-flex mb-3">
                                <div class="card flex-fill">
                                    <img :src="v.hinh_anh" class="card-img-top"
                                        style="object-fit: cover; height: 110px;">
                                    <div class="card-body">
                                        <h6 class="card-title cursor-pointer mb-1">{{ v.ten_voucher }}</h6>
                                        <p class="mb-0 text-danger small">{{ v.ten_quan_an }}</p>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <div class="col-lg-12 text-center">
                            <button type="button" class="btn btn-lg"
                                :class="isExpandedVoucher ? 'btn-outline-danger' : 'btn-outline-success'"
                                style="width: 30%;" @click="toggleVoucher">
                                <i class="fa-regular fa-hand-point-up"></i>
                                {{ isExpandedVoucher ? "Rút Gọn" : "Xem Thêm" }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</template>

<script>
import axios from "axios";

export default {

    data() {
        return {
            phanLoai: [],
            quanAn: [],
            monAnData: [],
            originalMonAnData: [],
            list_voucher: [],
            searchFavorite: "",
            visibleQuanAn: 9,
            visibleVoucher: 6,
            isExpandedQuanAn: false,
            isExpandedVoucher: false,
            cards: [
                { title: "Đặt Món Nhanh", desc: "Nhận đồ ăn chỉ trong 30 phút", image: "https://hattimayukle.com/wp-content/uploads/2020/05/post-thumb-dat-do-an.jpg", border: "border-info" },
                { title: "Giao Tận Nơi", desc: "Giao đến bất cứ đâu trong thành phố Đà Nẵng", image: "https://kamereo.vn/blog/wp-content/uploads/2019/05/freepik_featured_delivery.jpg", border: "border-primary" },
                { title: "Ẩm Thực Đa Dạng", desc: "Mọi nơi trong thành phố Đà Nẵng", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9H5dbXlZ5W7DFkFi3f4aedpIkbEOPmLTH6w&s", border: "border-warning" },
                { title: "Combo Tiết Kiệm", desc: "Ưu đãi lớn mỗi ngày", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDieaxtPcpsb48Dk-R73_TGnUtuwmMUMbC6A&s", border: "border-danger" },
                { title: "Đồ Ăn Lành Mạnh", desc: "Dinh dưỡng cho cả gia đình", image: "https://img.lovepik.com/photo/50088/5320.jpg_wh860.jpg", border: "border-success" },
            ],
        };
    },
    created() {
        this.loadData();
    },
    mounted() {
        const carousel = document.querySelector('#carouselExampleControls');
        if (carousel) {
            new bootstrap.Carousel(carousel, {
                interval: 2000,
                ride: 'carousel',
                pause: false
            });
        }
    },
    computed: {
        filteredQuanAn() {
            if (!this.searchFavorite) return this.quanAn;
            const keyword = this.searchFavorite.toLowerCase();
            return this.quanAn.filter(
                (item) =>
                    item.ten_quan_an.toLowerCase().includes(keyword) ||
                    item.dia_chi.toLowerCase().includes(keyword)
            );
        },
    },
    methods: {
        loadData() {
            axios
                .get("http://127.0.0.1:8000/api/khach-hang/trang-chu/data")
                .then((res) => {
                    this.monAnData = res.data.mon_an;
                    this.originalMonAnData = res.data.mon_an;
                    this.quanAn = res.data.quan_an_yeu_thich;
                    this.list_voucher = res.data.voucher;
                    this.phanLoai = res.data.phan_loai;
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v) => this.$toast.error(v[0]));
                });
        },
        toggleQuanAn() {
            this.isExpandedQuanAn = !this.isExpandedQuanAn;
            this.visibleQuanAn = this.isExpandedQuanAn ? this.filteredQuanAn.length : 6;
        },
        toggleVoucher() {
            this.isExpandedVoucher = !this.isExpandedVoucher;
            this.visibleVoucher = this.isExpandedVoucher ? this.list_voucher.length : 6;
        },
    },
};
</script>

<style>
.dropdown-menu {
    max-height: 250px;
    width: 100%;
    overflow-y: auto;
}
</style>
