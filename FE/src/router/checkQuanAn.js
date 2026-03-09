import axios from "axios";
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
export default function (to, from, next) {
  var token = localStorage.getItem("quan_an_login");
  axios
    .get("http://127.0.0.1:8000/api/quan-an/check-token", {
      headers: {
        Authorization: "Bearer " + token,
      },
    })
    .then((res) => {
      if (res.data.status) {
        localStorage.setItem("ten_quan_an", res.data.ten_quan_an);
        localStorage.setItem("hinh_anh", res.data.hinh_anh);
        next();
      } else {
        toaster.error(res.data.message);
        next("/quan-an/dang-nhap");
      }
    });
  // var check = localStorage.getItem('nhan_vien_login');
  // if(check == 1) {
  //     next();
  // } else {
  //     next('/admin/dang-nhap');
  // }
}
