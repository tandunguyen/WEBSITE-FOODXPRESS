<template>
    <footer class="footer text-dark">
        <div class="container py-5">
            <div class="row">
                <!-- Logo + Giới thiệu -->
                <div class="col-md-4 mb-4 text-center">
                    <img src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
                        alt="logo" class="logo-footer mb-3">
                    <h5 class="fw-bold text-uppercase text-orange">FoodXpress</h5>
                    
                </div>

                <!-- Liên hệ -->
                <div class="col-md-4 mb-4">
                    <h6 class="fw-bold text-uppercase mb-3 text-orange">Liên hệ</h6>
                    <p class="mb-1"><i class="fas fa-user me-2 text-orange"></i>Nguyễn Hữu Phúc (GV hướng dẫn)</p>
                    <p class="mb-1"><i class="fas fa-envelope me-2 text-orange"></i>nguyenhuuphuc6@dtu.edu.vn</p>
                    <p class="mb-1"><i class="fas fa-phone me-2 text-orange"></i>0905 094 972</p>
                    <p class="mb-1"><i class="fas fa-map-marker-alt me-2 text-orange"></i>Khoa CNTT – Đại học Duy Tân,
                        Đà Nẵng</p>
                </div>

                <!-- Thành viên nhóm -->
                <div class="col-md-4 mb-4">
                    <h6 class="fw-bold text-uppercase mb-3 text-orange">Thành viên nhóm</h6>
                    <p class="mb-1"><i class="fas fa-user me-2 text-orange"></i>Nguyễn Tấn Dũng (Scrum Master) – 0798
                        767 279</p>
                    <p class="mb-1"><i class="fas fa-user me-2 text-orange"></i>Trần Nguyễn Minh Công – 0702 553 568</p>
                    <p class="mb-1"><i class="fas fa-user me-2 text-orange"></i>Dương Đình Hiếu – 0857 856 797</p>
                    <p class="mb-1"><i class="fas fa-user me-2 text-orange"></i>Nguyễn Đức Mạnh – 0773 324 048</p>
                </div>
            </div>
        </div>

        <!-- Dòng cuối -->
        <div class="text-center p-3 footer-bottom">
            © 2025 FoodXpress | Duy Tan University | CS_445_O_GD2_Nhom4
        </div>
    </footer>
</template>

<script>
export default {}
</script>

<style scoped>
.footer {
    background: linear-gradient(135deg, #ff7e00, #ffb347);
    color: #fff;
    font-family: "Roboto", sans-serif;
}

.text-orange {
    color: #fff;
    text-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
}

.logo-footer {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.4);
}

.footer h6 {
    border-bottom: 2px solid rgba(255, 255, 255, 0.4);
    display: inline-block;
    padding-bottom: 5px;
}

.footer p {
    color: #fff;
    line-height: 1.6;
}

.footer-bottom {
    background: rgba(0, 0, 0, 0.15);
    font-size: 0.9rem;
    color: #fff;
}
</style>
