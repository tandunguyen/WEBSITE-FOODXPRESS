<template>
	<div class="nav-container primary-menu">
		<div class="mobile-topbar-header">
			<div>
				<img src="../../../assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
			</div>
			<div>
				<h4 class="logo-text">Rukada</h4>
			</div>
			<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
		</div>

		<nav class="navbar navbar-expand-xl w-100">
			<ul class="navbar-nav justify-content-center flex-grow-1">
				<li class="nav-item">
					<router-link to="/">
						<a class="nav-link" href="/">
							<div class="parent-icon"><i class="fa-solid fa-home"></i></div>
							<div class="menu-title">Trang Chủ</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/khach-hang/mon-an">
						<a class="nav-link" href="/khach-hang/mon-an">
							<div class="parent-icon"><i class="fa-solid fa-utensils"></i></div>
							<div class="menu-title">Món Ăn</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/khach-hang/list-quan-an">
						<a class="nav-link" href="/khach-hang/list-quan-an">
							<div class="parent-icon"><i class="fa-solid fa-shop"></i></div>
							<div class="menu-title">Quán Ăn</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/khach-hang/don-hang">
						<a class="nav-link" href="/khach-hang/don-hang">
							<div class="parent-icon"><i class="fa-solid fa-file-invoice"></i></div>
							<div class="menu-title">Đơn Hàng</div>
						</a>
					</router-link>
				</li>
			</ul>
		</nav>
		<div class="row">
			<div class="col-lg-12">
				<ChatBox />
			</div>
		</div>
	</div>
</template>

<script>
import ChatBox from '../../../components/chat/ChatBox.vue';
export default {
	components: {
		ChatBox,
	},
};
</script>

<style scoped>
/* --- Căn giữa toàn bộ menu --- */
.navbar-nav {
	justify-content: center !important;
	text-align: center;
	gap: 50px;
	/* khoảng cách giữa các mục */
}

/* --- Item layout --- */
.nav-item {
	display: flex;
	align-items: center;
}

/* --- Liên kết menu --- */
.nav-link {
	display: flex;
	flex-direction: column;
	align-items: center;
	padding: 10px 20px;
	transition: 0.3s;
	text-decoration: none;
}

/* --- Hover hiệu ứng --- */
.nav-link:hover {
	transform: translateY(-3px);
}

/* --- Icon & text --- */
.parent-icon {
	font-size: 18px;
}

.menu-title {
	font-size: 14px;
	font-weight: 500;
	margin-top: 3px;
}

/* --- Logo --- */
.logo-icon {
	width: 40px;
	height: 40px;
	border-radius: 50%;
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
