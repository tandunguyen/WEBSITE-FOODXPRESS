<template>
	<div class="topbar d-flex align-items-center">
		<nav class="navbar navbar-expand">
			<!-- Logo + tên thương hiệu -->
			<div class="topbar-logo-header">
				<div>
					<img src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
						class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">FoodXpress</h4>
				</div>
			</div>

			<!-- Thông tin người dùng -->
			<div class="user-box dropdown ms-auto">
				<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
					role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<img :src="avatar ? avatar : 'https://cdn.iconscout.com/icon/free/png-256/free-avatar-icon-download-in-svg-png-gif-file-formats--user-boy-avatars-flat-icons-pack-people-456322.png'"
						class="user-img" alt="user avatar">
					<div class="user-info ps-3">
						<p class="user-name mb-0">{{ ho_ten }}</p>
						<p class="designattion mb-0">Khách hàng</p>
					</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li>
						<router-link to="/khach-hang/profile">
							<a class="dropdown-item" href="/khach-hang/profile"><i
									class="bx bx-user"></i><span>Profile</span></a>
						</router-link>
					</li>
					<li><a @click="logout()" class="dropdown-item" href="javascript:;"><i
								class='bx bx-log-out-circle'></i><span>Logout</span></a></li>
					<!-- <li><a @click="logoutAll()" class="dropdown-item" href="javascript:;"><i
								class='bx bx-log-out-circle'></i><span>Logout All</span></a></li> -->
				</ul>
			</div>
		</nav>
	</div>
</template>

<script>
import axios from 'axios';
export default {
	data() {
		return {
			ho_ten: localStorage.getItem('ho_ten_khach_hang'),
			avatar: localStorage.getItem('avatar')
		}
	},
	methods: {
		logout() {
			axios.get('http://127.0.0.1:8000/api/khach-hang/dang-xuat', {
				headers: { Authorization: "Bearer " + localStorage.getItem("khach_hang_login") },
			})
				.then(res => {
					if (res.data.status) {
						this.$toast.success(res.data.message);
						localStorage.removeItem('khach_hang_login');
						this.$router.push('/khach-hang/dang-nhap');
					} else {
						this.$toast.error(res.data.message);
					}
				});
		},
		logoutAll() {
			axios.get('http://127.0.0.1:8000/api/khach-hang/dang-xuat-tat-ca', {
				headers: { Authorization: "Bearer " + localStorage.getItem("khach_hang_login") },
			})
				.then(res => {
					if (res.data.status) {
						this.$toast.success(res.data.message);
						localStorage.removeItem('khach_hang_login');
						this.$router.push('/khach-hang/dang-nhap');
					} else {
						this.$toast.error(res.data.message);
					}
				});
		},
	}
}
</script>

<style scoped>
.topbar {
	background: linear-gradient(90deg, #ff7e00, #ffb347);
	color: #fff;
	width: 100vw;
	margin-left: calc(50% - 50vw);
	padding: 10px 60px;
	box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
	border-bottom: 3px solid rgba(255, 255, 255, 0.25);
	z-index: 1000;
}

.topbar-logo-header {
	display: flex;
	align-items: center;
	gap: 10px;
}

.logo-icon {
	width: 48px;
	height: 48px;
	border-radius: 50%;
	box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
}

.logo-text {
	font-weight: 800;
	font-size: 1.4rem;
	color: #fff;
	letter-spacing: 1px;
	text-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
}

.navbar {
	width: 100%;
	justify-content: space-between;
}

/* User box */
.user-box {
	display: flex;
	align-items: center;
}

.user-img {
	width: 42px;
	height: 42px;
	border-radius: 50%;
	object-fit: cover;
	box-shadow: 0 0 6px rgba(255, 255, 255, 0.4);
}

.user-info p {
	margin: 0;
	line-height: 1.2;
	color: #fff;
}

.user-name {
	font-weight: 600;
}

.designattion {
	font-size: 0.8rem;
	opacity: 0.9;
}

/* Dropdown */
.dropdown-menu {
	border-radius: 10px;
	background: #fff;
	box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.dropdown-item {
	color: #333;
	transition: 0.3s;
}

.dropdown-item:hover {
	background-color: #ff7e00;
	color: #fff;
}

/* Responsive */
@media (max-width: 991px) {
	.topbar {
		flex-direction: column;
		padding: 8px 20px;
	}

	.navbar {
		flex-direction: column;
		align-items: flex-start;
	}
}
</style>
