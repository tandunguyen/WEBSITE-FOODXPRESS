import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import Default from './layout/wrapper/Admin/index.vue'
import Blank from './layout/wrapper/Blank/index.vue'
import Client from './layout/wrapper/Client/index.vue'
import QuanAn from './layout/wrapper/QuanAn/index.vue'
import Shipper from './layout/wrapper/Shipper/index.vue'
import Toaster from "@meforma/vue-toaster";


const app = createApp(App)

app.use(router)
app.use(Toaster, {
  position: "top-right",
});
app.component("default-layout", Default);
app.component("blank-layout", Blank);
app.component("client-layout", Client);
app.component("quan_an-layout", QuanAn);
app.component("shipper-layout", Shipper);
app.mount("#app")