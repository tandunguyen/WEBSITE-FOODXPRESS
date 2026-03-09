<template>
	<div class="nav-container primary-menu">
		<div class="mobile-topbar-header">
			<div>
				<img src="../../../assets/images/logo-icon.png" class="logo-icon" alt="logo icon" />
			</div>
			<div>
				<h4 class="logo-text">Rukada</h4>
			</div>
			<div class="toggle-icon ms-auto"><i class="bx bx-arrow-to-left"></i></div>
		</div>

		<nav class="navbar navbar-expand-xl w-100">
			<ul class="navbar-nav">
				<li class="nav-item">
					<router-link to="/shipper/don-hang">
						<a class="nav-link" href="/shipper/don-hang">
							<div class="parent-icon">
								<i class="fa-regular fa-rectangle-list"></i>
							</div>
							<div class="menu-title">Nhận đơn hàng</div>
						</a>
					</router-link>
				</li>

				<!-- <li class="nav-item">
					<router-link to="/shipper/vi-tri-hien-tai">
						<a class="nav-link" href="/shipper/vi-tri-hien-tai">
							<div class="parent-icon">
								<i class="fa-solid fa-location-dot"></i>
							</div>
							<div class="menu-title">Vị Trí Hiện Tại</div>
						</a>
					</router-link>
				</li> -->

				<li class="nav-item">
					<router-link to="/shipper/thong-ke">
						<a class="nav-link" href="/shipper/thong-ke">
							<div class="parent-icon">
								<i class="fa-solid fa-wallet"></i>
							</div>
							<div class="menu-title">Thống Kê</div>
						</a>
					</router-link>
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
.navbar {
	width: 100%;
	display: flex;
	justify-content: center;
	/* căn giữa toàn menu trong thanh */
	border-radius: 0 0 12px 12px;
}

.navbar-nav {
	display: flex;
	justify-content: center;
	/* vẫn giữ căn giữa */
	align-items: center;
	gap: 10px;
	/* giảm khoảng cách giữa các tab (gốc bạn để 50px hoặc 60px) */
	padding: 0;
	/* bỏ padding mặc định */
	margin: 0 auto;
	/* giữ giữa */
}


/* hiệu ứng chuyển động khi hover */
.nav-link {
	transition: transform 0.3s ease, color 0.3s ease;
	color: #333;
	text-align: center;
}

.nav-link:hover {
	transform: translateY(-4px);
	color: #007bff;
}

/* 🔹 Nền navbar nhẹ */
.nav-container {
	background: #e3f2fd;
	/* xanh dương nhạt dịu mắt */
	padding: 10px 0;
	border-radius: 0 0 12px 12px;
	box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
	border-radius: 0 0 12px 12px;
}

/* 🔹 Căn giữa menu */
.navbar {
	width: 100%;
	display: flex;
	justify-content: center;
}

.navbar-nav {
	display: flex;
	justify-content: center;
	align-items: center;
	gap: 25px;
	/* khoảng cách vừa phải */
	padding: 0;
	margin: 0 auto;
}

/* 🔹 Link menu */
.nav-link {
	display: flex;
	flex-direction: column;
	align-items: center;
	text-decoration: none;
	color: #1565c0;
	/* xanh dương đậm */
	font-weight: 600;
	font-size: 14px;
	padding: 8px 12px;
	border-radius: 8px;
	transition: all 0.3s ease;
}

/* 🔹 Icon */
.nav-link .parent-icon i {
	font-size: 20px;
	margin-bottom: 4px;
	color: #1976d2;
	/* xanh dương trung bình */
	transition: color 0.3s ease;
}

/* 🔹 Hover effect */
.nav-link:hover {
	background-color: #bbdefb;
	/* xanh dương nhẹ */
	color: #0d47a1;
	/* xanh đậm hơn */
	transform: translateY(-3px);
}

.nav-link:hover .parent-icon i {
	color: #0d47a1;
}

/* 🔹 Active menu */
.router-link-active .nav-link,
.router-link-exact-active .nav-link {
	background-color: #90caf9;
	/* xanh dương trung bình */
	color: #0d47a1 !important;
}

/* 🔹 Text dưới icon */
.menu-title {
	margin-top: 2px;
	text-align: center;
	font-size: 13px;
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
