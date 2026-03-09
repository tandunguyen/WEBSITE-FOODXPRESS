<template>
	<div class="topbar d-flex align-items-center">
		<nav class="navbar navbar-expand">
			<div class="topbar-logo-header">
				<div>
					<img src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
						class="logo-icon" alt="logo icon" />
				</div>
				<div>
					<h4 class="logo-text">FoodXpress</h4>
				</div>
			</div>

			<div class="mobile-toggle-menu">
				<i class="bx bx-menu"></i>
			</div>

			<div class="search-bar flex-grow-1"></div>

			<div class="user-box dropdown">
				<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
					role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<img src="https://i.pinimg.com/736x/b4/1d/47/b41d47f6435985f87e3cde6e957b7931.jpg"
						class="user-img" alt="user avatar" />
					<div class="user-info ps-3">
						<p class="user-name mb-0">{{ ho_ten }}</p>
						<p class="designattion mb-0">Shipper</p>
					</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li>
						<router-link to="/shipper/profile">
							<a class="dropdown-item" href="/shipper/profile">
								<i class="bx bx-user"></i><span>Profile</span>
							</a>
						</router-link>
					</li>
					<li>
						<router-link to="/shipper/vi-tri-hien-tai">
							<a class="dropdown-item" href="/shipper/vi-tri-hien-tai">
								<i class="fa-solid fa-location-dot"></i><span>Vị trí hiện tại</span>
							</a>
						</router-link>
					</li>
					<li>
						<a v-on:click="logout()" class="dropdown-item" href="javascript:;">
							<i class="bx bx-log-out-circle"></i><span>Logout</span>
						</a>
					</li>
					<!-- <li>
						<a v-on:click="logoutAll()" class="dropdown-item" href="javascript:;">
							<i class="bx bx-log-out-circle"></i><span>Logout All</span>
						</a>
					</li> -->
				</ul>
			</div>
		</nav>
	</div>
</template>

<script>
import axios from "axios";

export default {
	data() {
		return {
			ho_ten: localStorage.getItem("ho_ten_shipper"),
		};
	},
	methods: {
		logout() {
			axios
				.get("http://127.0.0.1:8000/api/shipper/dang-xuat", {
					headers: {
						Authorization: "Bearer " + localStorage.getItem("shipper_login"),
					},
				})
				.then((res) => {
					if (res.data.status) {
						this.$toast.success(res.data.message);
						localStorage.removeItem("shipper_login");
						this.$router.push("/shipper/dang-nhap");
					} else {
						this.$toast.error(res.data.message);
					}
				})
				.catch((res) => {
					const list = Object.values(res.res.data.errors);
					list.forEach((v) => {
						this.$toast.error(v[0]);
					});
				});
		},
		logoutAll() {
			axios
				.get("http://127.0.0.1:8000/api/shipper/dang-xuat-tat-ca", {
					headers: {
						Authorization: "Bearer " + localStorage.getItem("shipper_login"),
					},
				})
				.then((res) => {
					if (res.data.status) {
						this.$toast.success(res.data.message);
						localStorage.removeItem("shipper_login");
						this.$router.push("/shipper/dang-nhap");
					} else {
						this.$toast.error(res.data.message);
					}
				})
				.catch((res) => {
					const list = Object.values(res.res.data.errors);
					list.forEach((v) => {
						this.$toast.error(v[0]);
					});
				});
		},
	},
};
</script>

<style scoped>
.topbar {
	background: linear-gradient(135deg, #0a3d62, #1e6091);
	color: #fff;
	padding: 10px 20px;
	box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);

	/* Bo tròn góc dưới */
}

/* Logo và chữ */
.topbar-logo-header {
	display: flex;
	align-items: center;
	gap: 10px;
}

.logo-icon {
	width: 45px;
	height: 45px;
	border-radius: 50%;
	box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
}

.logo-text {
	color: #fff;
	font-weight: 700;
	font-size: 1.2rem;
	text-transform: uppercase;
}

/* Nút menu */
.mobile-toggle-menu i {
	color: #fff;
	font-size: 1.5rem;
	cursor: pointer;
}

/* Avatar user */
.user-img {
	width: 40px;
	height: 40px;
	border-radius: 50%;
	border: 2px solid #fff;
}

/* Dropdown user */
.user-info p {
	color: #fff;
	font-size: 0.9rem;
}

.dropdown-menu {
	background-color: #1e6091;
	border-radius: 10px;
	box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

.dropdown-menu .dropdown-item {
	color: #fff !important;
	transition: 0.3s;
}

.dropdown-menu .dropdown-item:hover {
	background-color: #168aad;
}

/* Hiệu ứng hover avatar */
.user-box:hover .user-img {
	transform: scale(1.05);
	transition: 0.3s;
}
</style>
