import axios from "axios";
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
export default function (to, from, next) {
  var token = localStorage.getItem("shipper_login");
  axios
    .get("http://127.0.0.1:8000/api/shipper/check-token", {
      headers: {
        Authorization: "Bearer " + token,
      },
    })
    .then((res) => {
      if (res.data.status) {
        localStorage.setItem("ho_ten_shipper", res.data.ho_ten);
        next();
      } else {
        toaster.error(res.data.message);
        next("/shipper/dang-nhap");
      }
    });
  // var check = localStorage.getItem('nhan_vien_login');
  // if(check == 1) {
  //     next();
  // } else {
  //     next('/admin/dang-nhap');
  // }
}
