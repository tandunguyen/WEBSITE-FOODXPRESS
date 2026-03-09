import { createRouter, createWebHistory } from "vue-router"; // cài vue-router: npm install vue-router@next --save
import checkNhanVienLogin from "./checkNhanVienLogin";
import checkKhachHang from "./checkKhachHang";
import checkQuanAn from "./checkQuanAn";
import checkShipper from "./checkShipper";
const routes = [
	// Admin
	{
		path: "/admin/khach-hang",
		component: () => import("../components/Admin/KhachHang/index.vue"),
		beforeEnter: checkNhanVienLogin,
	},
	{
		path: "/admin/trang-chu",
		component: () => import("../components/Admin/TrangChu/index.vue"),
		beforeEnter: checkNhanVienLogin,
	},
	{
		path: "/admin/danh-sach-don-dat",
		component: () => import("../components/Admin/DanhSachDonDat/index.vue"),
		beforeEnter: checkNhanVienLogin,
	},
	{
		path: "/admin/quan-an",
		component: () => import("../components/Admin/QuanAn/index.vue"),
		beforeEnter: checkNhanVienLogin,
	},
	{
		path: "/admin/shipper",
		component: () => import("../components/Admin/Shipper/index.vue"),
		beforeEnter: checkNhanVienLogin,
	},
	{
		path: "/admin/voucher",
		component: () => import("../components/Admin/Voucher/index.vue"),
		beforeEnter: checkNhanVienLogin,
	},
	{
		path: "/admin/phan-quyen",
		component: () => import("../components/Admin/PhanQuyen/index.vue"),
		beforeEnter: checkNhanVienLogin,
	},
	{
		path: "/admin/admins",
		component: () => import("../components/Admin/NhanVien/index.vue"),
		beforeEnter: checkNhanVienLogin,
	},
	{
		path: "/admin/profile",
		component: () => import("../components/Admin/Profile/index.vue"),
		beforeEnter: checkNhanVienLogin,
	},
	{
		path: "/admin/thong-ke-khach-hang",
		component: () => import("../components/Admin/ThongKe/KhachHang/index.vue"),
		beforeEnter: checkNhanVienLogin,
	},
	{
		path: "/admin/thong-ke-quan-an",
		component: () => import("../components/Admin/ThongKe/QuanAn/index.vue"),
		beforeEnter: checkNhanVienLogin,
	},
	{
		path: "/admin/dang-nhap",
		component: () => import("../components/Admin/DangNhap/index.vue"),
		meta: { layout: "blank" },
	},

	//  Khách Hàng
	{
		path: "/",
		component: () => import("../components/KhachHang/TrangChu/index.vue"),
		meta: { layout: "client" },
	},
	{
		path: "/khach-hang/dang-nhap",
		component: () => import("../components/KhachHang/DangNhap/index.vue"),
		meta: { layout: "blank" },
	},
	{
		path: "/khach-hang/profile",
		component: () => import("../components/KhachHang/Profile/index.vue"),
		meta: { layout: "client" },
		beforeEnter: checkKhachHang,
	},
	{
		path: "/khach-hang/dang-ky",
		component: () => import("../components/KhachHang/DangKi/index.vue"),
		meta: { layout: "blank" },
	},
	{
		path: "/khach-hang/quen-mat-khau",
		component: () => import("../components/KhachHang/QuenMatKhau/index.vue"),
		meta: { layout: "blank" },
	},
	{
		path: "/khach-hang/list-quan-an",
		component: () => import("../components/KhachHang/QuanAn/index.vue"),
		meta: { layout: "client" },
		beforeEnter: checkKhachHang,
	},
	{
		path: "/khach-hang/mon-an",
		component: () => import("../components/KhachHang/MonAn/index.vue"),
		meta: { layout: "client" },
		//beforeEnter: checkKhachHang,
	},
	{
		path: "/khach-hang/quan-an/:id_quan",
		component: () => import("../components/KhachHang/DonDatHang/index.vue"),
		meta: { layout: "client" },
		props: true,
		beforeEnter: checkKhachHang,
	},
	{
		path: "/khach-hang/don-hang",
		component: () => import("../components/KhachHang/DonHang/index.vue"),
		meta: { layout: "client" },
		beforeEnter: checkKhachHang,
	},

	{
		path: '/tim-kiem/:thong_tin',
		component: () => import('../components/KhachHang/TimKiem/index.vue'),
		meta: { layout: 'client' },
		name: 'name_tim_kiem',
		props: true
	},

	// Quán Ăn
	{
		path: "/quan-an/dang-ky",
		component: () => import("../components/QuanAn/DangKy/index.vue"),
		meta: { layout: "blank" },
	},
	{
		path: "/quan-an/dang-nhap",
		component: () => import("../components/QuanAn/DangNhap/index.vue"),
		meta: { layout: "blank" },
	},
	{
		path: "/quan-an/quen-mat-khau",
		component: () => import("../components/QuanAn/QuenMatKhau/index.vue"),
		meta: { layout: "blank" },
	},
	{
		path: "/quan-an/don-hang",
		component: () => import("../components/QuanAn/DongHang/index.vue"),
		meta: { layout: "quan_an" },
	},
	{
		path: "/quan-an/test",
		component: () => import("../components/QuanAn/Test/index.vue"),
		meta: { layout: "quan_an" },
	},
	{
		path: "/quan-an/profile",
		component: () => import("../components/QuanAn/Profile/index.vue"),
		meta: { layout: "quan_an" },
		beforeEnter: checkQuanAn,
	},
	{
		path: "/quan-an/danh-muc",
		component: () => import("../components/QuanAn/DanhMuc/index.vue"),
		meta: { layout: "quan_an" },
		beforeEnter: checkQuanAn,
	},
	{
		path: "/quan-an/mon-an",
		component: () => import("../components/QuanAn/MonAn/index.vue"),
		meta: { layout: "quan_an" },
		beforeEnter: checkQuanAn,
	},

	{
		path: "/quan-an/voucher",
		component: () => import("../components/QuanAn/Voucher/index.vue"),
		meta: { layout: "quan_an" },
		beforeEnter: checkQuanAn,
	},
	{
		path: "/quan-an/thong-ke-mon-an",
		component: () => import("../components/QuanAn/ThongKe/MonAn/index.vue"),
		meta: { layout: "quan_an" },
		beforeEnter: checkQuanAn,
	},
	{
		path: "/quan-an/thong-ke-doanh-thu",
		component: () => import("../components/QuanAn/ThongKe/DoanhThu/index.vue"),
		meta: { layout: "quan_an" },
		beforeEnter: checkQuanAn,
	},
	{
		path: "/quan-an/dia-diem-kinh-doanh",
		component: () => import("../components/QuanAn/Config/index.vue"),
		meta: { layout: "quan_an" },
		beforeEnter: checkQuanAn,
	},
	// Shipper
	{
		path: "/shipper/dang-ky",
		component: () => import("../components/Shipper/DangKy/index.vue"),
		meta: { layout: "blank" },
	},
	{
		path: "/shipper/dang-nhap",
		component: () => import("../components/Shipper/DangNhap/index.vue"),
		meta: { layout: "blank" },
	},
	{
		path: "/shipper/quen-mat-khau",
		component: () => import("../components/Shipper/QuenMatKhau/index.vue"),
		meta: { layout: "blank" },
	},
	{
		path: "/shipper/don-hang",
		component: () => import("../components/Shipper/DonHang/index.vue"),
		meta: { layout: "shipper" },
	},
	{
		path: "/shipper/profile",
		component: () => import("../components/Shipper/Profile/index.vue"),
		meta: { layout: "shipper" },
		beforeEnter: checkShipper,
	},
	{
		path: "/shipper/vi-tri-hien-tai",
		component: () => import("../components/Shipper/ViTriHienTai/index.vue"),
		meta: { layout: "shipper" },
		beforeEnter: checkShipper,
	},
	{
		path: "/shipper/vi-tien",
		component: () => import("../components/Shipper/ViTien/index.vue"),
		meta: { layout: "shipper" },
		beforeEnter: checkShipper,
	},
	{
		path: "/shipper/thong-ke",
		component: () => import("../components/Shipper/ThongKe/index.vue"),
		meta: { layout: "shipper" },
		beforeEnter: checkShipper,
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes: routes,
});

export default router;
