<template>
	<div class="nav-container primary-menu">
		<div class="mobile-topbar-header">
			<div>
				<img src="https://i.pinimg.com/736x/78/4d/19/784d19602be7f1d070b6a13001b7fc5c.jpg" class="logo-icon"
					alt="logo icon">
			</div>
			<div>
				<h4 class="logo-text">Admin</h4>
			</div>
			<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
		</div>
		<nav class="navbar navbar-expand-xl w-100">
			<ul class="navbar-nav justify-content-center flex-grow-1 gap-2">
				<li class="nav-item dropdown">
					<a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
						data-bs-toggle="dropdown">
						<div class="parent-icon"><i class="fa-solid fa-users"></i></div>
						<div class="menu-title">Quản lý tài khoản người dùng</div>
					</a>
					<ul class="dropdown-menu">
						<router-link to="/admin/admins">
							<li><a class="dropdown-item" href=""><i class="fa-solid fa-user-tie"></i>Admin</a></li>
						</router-link>
						<router-link to="/admin/khach-hang">
							<li><a class="dropdown-item" href=""><i class="fa-solid fa-user-tag"></i>Khách Hàng</a></li>
						</router-link>
						<router-link to="/admin/shipper">
							<li><a class="dropdown-item" href=""><i class="fa-solid fa-truck-fast"></i>Shippers</a></li>
						</router-link>
					</ul>
				</li>

				<li class="nav-item">
					<router-link to="/admin/quan-an" class="nav-link">
						<div class="parent-icon"><i class="fa-solid fa-utensils"></i></div>
						<div class="menu-title">Quán ăn</div>
					</router-link>
				</li>
				<li class="nav-item dropdown">
					<a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
						data-bs-toggle="dropdown">
						<div class="parent-icon"><i class="fa-solid fa-chart-simple"></i></div>
						<div class="menu-title">Thống Kê</div>
					</a>
					<ul class="dropdown-menu">
						<router-link to="/admin/thong-ke-khach-hang">
							<li><a class="dropdown-item" href=""><i class="fa-solid fa-user"></i>Khách Hàng</a></li>
						</router-link>
						<router-link to="/admin/thong-ke-quan-an">
							<li><a class="dropdown-item" href=""><i class="fa-solid fa-utensils"></i>Quán Ăn</a></li>
						</router-link>
					</ul>
				</li>
				<li class="nav-item">
					<router-link to="/admin/phan-quyen" class="nav-link">
						<div class="parent-icon"><i class="fa-solid fa-gears"></i></div>
						<div class="menu-title">Phân Quyền</div>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/voucher" class="nav-link">
						<div class="parent-icon"><i class="fa-solid fa-ticket"></i></div>
						<div class="menu-title">Voucher</div>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/danh-sach-don-dat" class="nav-link">
						<div class="parent-icon"><i class="fa-solid fa-bell-concierge"></i></div>
						<div class="menu-title">Các đơn đặt hàng</div>
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
.nav-container.primary-menu {
	background: linear-gradient(135deg, #0a3d62, #1e6091);
	color: #fff;
	box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
	border-radius: 0 0 12px 12px;
	padding: 15px 20px;
}

/* Navbar căn giữa */
.navbar-nav {
	justify-content: center;
	text-align: center;
	align-items: center;
	gap: 15px;
}

/* Item menu */
.nav-item {
	transition: all 0.3s ease;
}

/* Link menu */
.nav-link {
	color: #fff;
	display: flex;
	flex-direction: column;
	align-items: center;
	padding: 12px 18px;
	border-radius: 10px;
	transition: all 0.3s ease;
	text-decoration: none;
}

/* Hover menu */
.nav-link:hover {
	background: rgba(255, 255, 255, 0.15);
	transform: translateY(-3px);
	box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2);
}

/* Icon */
.nav-link i {
	font-size: 1.5rem;
	margin-bottom: 6px;
}

/* Tiêu đề */
.menu-title {
	font-size: 1rem;
	font-weight: 600;
	letter-spacing: 0.5px;
}

/* Dropdown */
.dropdown-menu {
	background-color: #1e6091;
	border-radius: 10px;
	box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
	padding: 0;
}

.dropdown-menu .dropdown-item {
	color: #fff;
	padding: 10px 20px;
	transition: background 0.3s ease;
}

.dropdown-menu .dropdown-item:hover {
	background-color: #168aad;
}

/* Logo */
.logo-icon {
	width: 55px;
	height: 55px;
	border-radius: 50%;
	box-shadow: 0 0 12px rgba(255, 255, 255, 0.2);
}

.logo-text {
	color: #fff;
	font-weight: 700;
	font-size: 1.2rem;
	margin-top: 4px;
	text-transform: uppercase;
}

/* Toggle icon */
.toggle-icon i {
	color: #fff;
	font-size: 1.7rem;
}

/* Bỏ màu nền khi active/focus */
.navbar-nav .nav-link,
.navbar-nav .nav-link:focus,
.navbar-nav .nav-link:active,
.navbar-nav .router-link-active {
	background-color: transparent !important;
	color: #fff !important;
	box-shadow: none !important;
}

/* Tiêu đề menu nhỏ */
.menu-title {
	font-size: 0.6rem;
	/* giảm xuống 0.75rem */
	font-weight: 600;
	letter-spacing: 0.5px;
}

/* Dropdown item chữ nhỏ */
.dropdown-menu .dropdown-item {
	font-size: 0.75rem;
	/* giảm xuống 0.75rem */
	color: #fff;
	padding: 6px 12px;
	/* giảm padding để cân đối */
	transition: background 0.3s ease;
}
</style>
