WEBSITE-FOODXPRESS

Giới thiệu
**Website-FoodXpress** là hệ thống đặt đồ ăn trực tuyến cho phép người dùng tìm kiếm món ăn, đặt hàng và quản lý đơn hàng một cách tiện lợi.
Dự án được xây dựng nhằm mục đích học tập và thực hành phát triển hệ thống web fullstack.

---
Công nghệ sử dụng

Frontend
* Vue.js
* HTML, CSS, JavaScript
* Axios

Backend
* PHP (Laravel)
* RESTful API

Database
* MySQL / SQL Server
  
---
Chức năng chính

Người dùng
* Đăng ký / Đăng nhập
* Xem danh sách món ăn
* Tìm kiếm món ăn
* Thêm vào giỏ hàng
* Đặt hàng
* Xem lịch sử đơn hàng

Quản trị (Admin)
* Quản lý món ăn
* Quản lý đơn hàng
* Quản lý người dùng
---

Cấu trúc thư mục

```
WEBSITE-FOODXPRESS
│── FE/        # Frontend (Vue.js)
│── BE/        # Backend (Laravel / PHP)
│── README.md
```

---

Hướng dẫn cài đặt

Clone project

```bash
git clone https://github.com/tandunguyen/WEBSITE-FOODXPRESS.git
cd WEBSITE-FOODXPRESS
```

---

Chạy Backend

```bash
cd BE
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

Chạy Frontend

```bash
cd FE
npm install
npm run dev
```

---

API
Backend cung cấp các API RESTful cho:

* Authentication
* Products
* Orders
* Users
---

Demo


---
Mục tiêu dự án

* Hiểu cách xây dựng hệ thống fullstack
* Làm việc với API giữa frontend và backend
* Áp dụng kiến thức đã học vào thực tế
---

Liên hệ
* Email: nguyentandung02012004@gmail.com
* GitHub: https://github.com/tandunguyen

---

## Ghi chú
Dự án phục vụ mục đích học tập, có thể chưa tối ưu và sẽ được cải thiện trong tương lai.
