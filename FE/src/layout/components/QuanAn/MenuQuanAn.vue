<template>
	<div class="nav-container primary-menu">
		<nav class="navbar navbar-expand-xl w-100">
			<ul class="navbar-nav">
				<!-- <li class="nav-item">
					<router-link to="/quan-an/danh-muc" class="nav-link">
						<i class="fa-solid fa-list"></i>
						<div class="menu-title">Danh Mục</div>
					</router-link>
				</li> -->

				<li class="nav-item">
					<router-link to="/quan-an/mon-an" class="nav-link">
						<i class="fa-solid fa-utensils"></i>
						<div class="menu-title">Món Ăn</div>
					</router-link>
				</li>

				<li class="nav-item">
					<router-link to="/quan-an/voucher" class="nav-link">
						<i class="fa-solid fa-ticket"></i>
						<div class="menu-title">Voucher</div>
					</router-link>
				</li>

				<li class="nav-item dropdown">
					<a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
						data-bs-toggle="dropdown">
						<i class="fa-solid fa-chart-simple"></i>
						<div class="menu-title">Thống Kê</div>
					</a>
					<ul class="dropdown-menu">
						<li><router-link to="/quan-an/thong-ke-mon-an" class="dropdown-item">
								<i class="fa-solid fa-utensils"></i>Món Ăn
							</router-link></li>
						<li><router-link to="/quan-an/thong-ke-doanh-thu" class="dropdown-item">
								<i class="fa-solid fa-money-bill-trend-up"></i>Doanh Thu
							</router-link></li>
					</ul>
				</li>
			</ul>
		</nav>

	</div>
</template>
<script>
export default {
};
</script>
<style scoped>
/* 🔸 Nền vàng nhạt dịu + bóng nhẹ */
.nav-container {
	background: linear-gradient(90deg, #fff8e1, #ffe0b2);
	padding: 12px 0;
	box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
	border-radius: 0 0 14px 14px;
}

/* 🔸 Căn giữa menu + giãn đều */
.navbar-nav {
	display: flex;
	justify-content: center;
	align-items: center;
	gap: 45px;
	width: 100%;
	margin: 0;
	padding: 0;
}

/* 🔸 Style cho từng link */
.nav-link {
	display: flex;
	flex-direction: column;
	align-items: center;
	text-decoration: none;
	color: #5d4037;
	font-weight: 600;
	font-size: 14px;
	padding: 8px 12px;
	border-radius: 10px;
	transition: all 0.3s ease;
}

/* 🔸 Icon */
.nav-link i {
	font-size: 20px;
	margin-bottom: 3px;
	color: #8d6e63;
	transition: color 0.3s ease;
}

/* 🔸 Hover có màu nhẹ + nổi mượt */
.nav-link:hover {
	background-color: #ffe0b2;
	color: #d17f00;
	transform: translateY(-3px);
}

.nav-link:hover i {
	color: #d17f00;
}

/* 🔸 Khi đang active */
.router-link-active,
.router-link-exact-active {
	background-color: #ffd180;
	color: #d17f00 !important;
	border-radius: 10px;
}

/* 🔸 Dropdown style */
.dropdown-menu {
	border-radius: 10px;
	box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
	border: none;
	background-color: #fff;
}

.dropdown-item {
	font-weight: 500;
	color: #333;
	padding: 8px 15px;
	transition: 0.3s ease;
}

.dropdown-item:hover {
	background-color: #ffe0b2;
	color: #000;
}

/* 🔸 Chữ dưới icon */
.menu-title {
	margin-top: 2px;
	text-align: center;
}

/* Bỏ màu xanh khi link active / focus */
.nav-link,
.nav-link:visited,
.nav-link:active,
.nav-link:focus {
	color: inherit !important;
	background: transparent !important;
	outline: none !important;
	text-decoration: none !important;
}

/* Nếu muốn giữ hiệu ứng hover nhẹ */
.nav-link:hover {
	background-color: rgba(0, 0, 0, 0.05);
	color: #000;
}

/* Nếu router-link-active tự thêm class khi chọn (Vue Router) */
.router-link-active .nav-link,
.router-link-exact-active .nav-link {
	background-color: transparent !important;
	color: inherit !important;
}
</style>
