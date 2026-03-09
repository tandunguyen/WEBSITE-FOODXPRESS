<template>

	<div class="topbar d-flex align-items-center">
		<nav class="navbar navbar-expand">
			<div class="topbar-logo-header">
				<div class="">
					<img src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
						class="logo-icon" alt="logo icon">
				</div>
				<div class="">
					<h4 class="logo-text text-danger">FoodXpress</h4>
				</div>
			</div>
			<div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
			<div class="search-bar flex-grow-1">

			</div>
			<div class="user-box dropdown">
				<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
					role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<img :src="hinh_anh" class="user-img" alt="user avatar">
					<div class="user-info ps-3">
						<p class="user-name mb-0">{{ ten_quan_an }}</p>
						<p class="designattion mb-0">Quán ăn</p>
					</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li>
						<router-link to="/quan-an/profile">
							<a class="dropdown-item" href="/quan-an/profile"><i
									class="bx bx-user"></i><span>Profile</span></a>
						</router-link>
					</li>
					<li>
						<router-link to="/quan-an/dia-diem-kinh-doanh">
							<a class="dropdown-item" href="/quan-an/dia-diem-kinh-doanh"><i
									class="fa-solid fa-location-dot"></i><span>Địa điểm kinh doanh</span></a>
						</router-link>
					</li>
					<li><a v-on:click="logout()" class="dropdown-item" href="javascript:;"><i
								class='bx bx-log-out-circle'></i><span>Logout</span></a>
					</li>
					<!-- <li><a v-on:click="logoutAll()" class="dropdown-item" href="javascript:;"><i
								class='bx bx-log-out-circle'></i><span>Logout All</span></a>
					</li> -->
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
			ten_quan_an: localStorage.getItem('ten_quan_an'),
			hinh_anh: localStorage.getItem('hinh_anh')
		}
	},
	methods: {
		logout() {
			axios.get('http://127.0.0.1:8000/api/quan-an/dang-xuat', {
				headers: {
					Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
				},
			})
				.then(res => {
					if (res.data.status) {
						this.$toast.success(res.data.message);
						localStorage.removeItem('quan_an_login');
						this.$router.push('/quan-an/dang-nhap');
					} else {
						this.$toast.error(res.data.message);
					}
				})
				.catch(res => {
					const list = Object.values(res.res.data.errors);
					list.forEach((v, i) => {
						this.$toast.error(v[0]);
					});
				});
		},
		logoutAll() {
			axios.get('http://127.0.0.1:8000/api/quan-an/dang-xuat-tat-ca', {
				headers: {
					Authorization: "Bearer " + localStorage.getItem("quan_an_login"),
				},
			})
				.then(res => {
					if (res.data.status) {
						this.$toast.success(res.data.message);
						localStorage.removeItem('quan_an_login');
						this.$router.push('/quan-an/dang-nhap');
					} else {
						this.$toast.error(res.data.message);
					}
				})
				.catch(res => {
					const list = Object.values(res.res.data.errors);
					list.forEach((v, i) => {
						this.$toast.error(v[0]);
					});
				});
		},
	}
}
</script>
<style scoped>
/* --- TOPBAR RỘNG VÀ ĐẸP --- */
.topbar {
	background: linear-gradient(90deg, #ff7b00, #ff9e00);
	/* tông cam sáng */
	color: #fff;
	width: 100vw;
	/* full chiều ngang trình duyệt */
	margin-left: calc(50% - 50vw);
	/* cho full chiều ngang cả khi có container */
	padding: 10px 60px;
	/* tăng chiều ngang, trông thoáng hơn */
	box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
	z-index: 1000;
	border-bottom: 3px solid #ff6a00;
}

/* Logo và tên */
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
	font-size: 1.3rem;
	color: #fff !important;
	letter-spacing: 1px;
}

/* Thanh navbar */
.navbar {
	width: 100%;
	justify-content: space-between;
}

/* Icon menu (mobile toggle) */
.mobile-toggle-menu i {
	font-size: 1.8rem;
	color: #fff;
	cursor: pointer;
	margin-left: 20px;
	transition: 0.3s;
}

.mobile-toggle-menu i:hover {
	transform: scale(1.1);
	color: #ffe9c6;
}

/* Ô tìm kiếm (ẩn hiện) */
.search-bar {
	max-width: 600px;
	width: 100%;
}

.search-bar-box input {
	border-radius: 10px;
	border: none;
	padding: 10px 15px;
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
	background-color: #ffb84d;
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
