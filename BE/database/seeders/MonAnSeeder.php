<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonAnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mon_ans')->delete();

        DB::table('mon_ans')->truncate();

        DB::table('mon_ans')->insert([


            ['id' => '1', 'ten_mon_an' => 'Cafe Dừa', 'slug_mon_an' => 'cafe-dua', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Cafe đậm đà hòa quyện với vị béo ngọt của nước cốt dừa tươi, tạo nên hương vị độc đáo và hấp dẫn.', 'id_quan_an' => '11', 'tinh_trang' => '1', 'hinh_anh' => 'https://myvietcoffee.com/wp-content/uploads/2024/10/cach-lam-ca-phe-nuoc-cot-dua.jpg', 'id_danh_muc' => '17'],

            ['id' => '2', 'ten_mon_an' => 'Cafe Máy', 'slug_mon_an' => 'cafe-may', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Cafe được pha bằng máy chuyên dụng, giữ trọn hương vị đậm đà và thơm ngon của hạt cafe nguyên chất.', 'id_quan_an' => '11', 'tinh_trang' => '1', 'hinh_anh' => 'https://anhthomay.com/wp-content/uploads/2024/03/46983405.jpg', 'id_danh_muc' => '17'],

            ['id' => '3', 'ten_mon_an' => 'Cafe Sữa', 'slug_mon_an' => 'cafe-sua', 'gia_ban' => '17000', 'gia_khuyen_mai' => '12000', 'mo_ta' => 'Hương vị cafe truyền thống Việt Nam, đậm đà cùng vị ngọt béo của sữa đặc, tạo nên thức uống quen thuộc mà ai cũng yêu thích.', 'id_quan_an' => '11', 'tinh_trang' => '1', 'hinh_anh' => 'https://www.cubes-asia.com/storage/blogs/2024-12/cong-thuc-lam-ca-phe-sua-pha-may-chuan-cho.jpeg', 'id_danh_muc' => '17'],

            ['id' => '4', 'ten_mon_an' => 'Cafe Muối', 'slug_mon_an' => 'cafe-muoi', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Sự kết hợp độc đáo giữa cafe đậm đà với vị mặn nhẹ của muối, tạo nên hương vị lạ miệng và hấp dẫn.', 'id_quan_an' => '11', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tuoitre.vn/471584752817336320/2023/8/16/ca-phe-muoi-1692166818071338553380.png', 'id_danh_muc' => '17'],

            ['id' => '5', 'ten_mon_an' => 'Nước Chanh', 'slug_mon_an' => 'nuoc-chanh', 'gia_ban' => '15000', 'gia_khuyen_mai' => '10000', 'mo_ta' => 'Thức uống giải khát từ chanh tươi, vị chua ngọt thanh mát, giúp giải nhiệt hiệu quả trong những ngày nóng.', 'id_quan_an' => '11', 'tinh_trang' => '1', 'hinh_anh' => 'https://media.vov.vn/sites/default/files/styles/large/public/2024-10/uong_nuoc_chanh_qua_nhieu_1.jpg', 'id_danh_muc' => '19'],

            // ['id' => '6', 'ten_mon_an' => 'Nước Cam Ép', 'slug_mon_an' => 'nuoc-cam', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Nước ép từ cam tươi nguyên chất, giàu vitamin C, vị chua ngọt tự nhiên, thơm mát và bổ dưỡng.', 'id_quan_an' => '2', 'tinh_trang' => '1', 'hinh_anh' => 'https://i.pinimg.com/736x/e1/2f/04/e12f04e59f41d77b623c621364198088.jpg', 'id_danh_muc' => '19'],

            // ['id' => '7', 'ten_mon_an' => 'Nước Ép Cà Rốt', 'slug_mon_an' => 'nuoc-ep-ca-rot', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Nước ép từ cà rốt tươi, giàu vitamin A, tốt cho mắt và da, vị ngọt tự nhiên, thanh mát và bổ dưỡng.', 'id_quan_an' => '2', 'tinh_trang' => '1', 'hinh_anh' => 'https://banhcuonnamviet.com/upload/product/epcarot-6565.jpg', 'id_danh_muc' => '19'],

            // ['id' => '8', 'ten_mon_an' => 'Nước Ép Thơm', 'slug_mon_an' => 'nuoc-ep-thom', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Nước ép từ dứa (thơm) tươi, vị chua ngọt hài hòa, thơm mát và giàu enzyme bromelain tốt cho tiêu hóa.', 'id_quan_an' => '2', 'tinh_trang' => '1', 'hinh_anh' => 'https://login.medlatec.vn//ImagePath/images/20230420/20230420_Nuoc-ep-dua-co-chua-nhieu-vitamin-va-khoang-chat-.jpg', 'id_danh_muc' => '19'],


            // ['id' => '9', 'ten_mon_an' => 'Lục Trà Chanh ', 'slug_mon_an' => 'luc-tra-chanh', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Trà xanh thơm mát kết hợp với vị chua thanh của chanh tươi, tạo nên thức uống giải khát hoàn hảo cho mùa hè.', 'id_quan_an' => '3', 'tinh_trang' => '1', 'hinh_anh' => 'https://congthucphache.com/wp-content/uploads/2021/10/z2829041305457_465d871cb818145dda9be6542ba95731.jpg', 'id_danh_muc' => '18'],

            // ['id' => '10', 'ten_mon_an' => 'Lục Trà Xoài', 'slug_mon_an' => 'luc-tra-xoai', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Trà xanh thơm ngon kết hợp với vị ngọt thanh của xoài chín, tạo nên hương vị nhiệt đới hấp dẫn.', 'id_quan_an' => '3', 'tinh_trang' => '1', 'hinh_anh' => 'https://congthucphache.com/wp-content/uploads/2021/10/z2847484529074_9f315bdce3a01f84745b61a47fa600fd.jpg', 'id_danh_muc' => '18'],

            // ['id' => '11', 'ten_mon_an' => 'Matcha Đá Xay', 'slug_mon_an' => 'matcha-da-xay', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Thức uống từ bột trà xanh Nhật Bản xay cùng đá, vị đắng nhẹ của matcha hòa quyện với vị ngọt, mát lạnh, sánh mịn.', 'id_quan_an' => '3', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2022/03/16/1420535/cach-lam-matcha-da-xay-kem-ngon-beo-ngay-don-gian-tai-nha-202203160109187743.jpg', 'id_danh_muc' => '16'],

            // ['id' => '12', 'ten_mon_an' => 'Socola Đá Xay', 'slug_mon_an' => 'socola-da-xay', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Đồ uống đá xay từ socola nguyên chất, vị ngọt đậm đà, béo ngậy và mát lạnh, thơm nồng hương socola.', 'id_quan_an' => '3', 'tinh_trang' => '1', 'hinh_anh' => 'https://noithatcaphe.vn/images/2022/07/15/socola-da-xay-1.jpg', 'id_danh_muc' => '16'],



            // ['id' => '13', 'ten_mon_an' => 'Phin Sữa Đá', 'slug_mon_an' => 'phin-sua-da', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Cafe được pha từ phin truyền thống, kết hợp với sữa đặc và đá, tạo nên hương vị đậm đà, ngọt béo đặc trưng của cafe Việt Nam.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://thuytinhgiare.com/wp-content/uploads/2023/07/hinh-anh-ly-cafe-phin_4.jpg', 'id_danh_muc' => '17'],

            // ['id' => '14', 'ten_mon_an' => 'Phin Đen Đá', 'slug_mon_an' => 'phin-den-da', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Cafe đen đậm đà được pha từ phin truyền thống, kết hợp với đá, mang đến vị đắng đặc trưng và hương thơm nồng nàn.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://cafesongao.com/wp-content/uploads/2021/07/ca-phe-den-da.png', 'id_danh_muc' => '17'],

            // ['id' => '15', 'ten_mon_an' => 'Bạc Xỉu', 'slug_mon_an' => 'bac-xiu', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Thức uống đặc trưng của Sài Gòn với cafe, sữa đặc và sữa tươi, tạo nên vị ngọt béo hài hòa, ít đắng hơn cafe sữa thông thường.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'http://thuytinhgiare.com/wp-content/uploads/2023/07/hinh-anh-ly-cafe-bac-xiu_16.jpg', 'id_danh_muc' => '17'],

            // ['id' => '16', 'ten_mon_an' => 'Freeze Trà Xanh', 'slug_mon_an' => 'freeze-tra-xanh', 'gia_ban' => '50000', 'gia_khuyen_mai' => '45000', 'mo_ta' => 'Đồ uống đá xay mát lạnh từ trà xanh, vị thanh nhẹ, thơm mát và sảng khoái, phù hợp cho những ngày nóng bức.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://dvpmarket.com/resources/uploads/images/2018/07/Freeze-tra-xanh-tuoi-mat-thom-ngon-1.jpg', 'id_danh_muc' => '18'],

            // ['id' => '17', 'ten_mon_an' => 'Freeze Socola', 'slug_mon_an' => 'freeze-socola', 'gia_ban' => '50000', 'gia_khuyen_mai' => '45000', 'mo_ta' => 'Thức uống đá xay từ socola đậm đà, mát lạnh, béo ngậy và thơm nồng hương socola, topping kem tươi béo ngọt.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://recipes.net/wp-content/uploads/portal_files/recipes_net_posts/2021-06/freeze-easy-chocolate-shake-recipe.png', 'id_danh_muc' => '18'],

            // ['id' => '18', 'ten_mon_an' => 'Classic Phin Freeze', 'slug_mon_an' => 'classic-phin-freeze', 'gia_ban' => '50000', 'gia_khuyen_mai' => '45000', 'mo_ta' => 'Thức uống đá xay từ cafe phin truyền thống, kết hợp với kem tươi, mang đến hương vị cafe đậm đà cùng độ mát lạnh sảng khoái.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://www.highlandscoffee.com.vn/vnt_upload/product/06_2023/HLC_New_logo_5.1_Products__CLASSIC_FREEZE_PHINDI.jpg', 'id_danh_muc' => '18'],

            ['id' => '19', 'ten_mon_an' => 'Cơm Tấm Sườn', 'slug_mon_an' => 'com-tam-suon', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Cơm tấm thơm ngon với miếng sườn nướng thấm vị, ăn kèm đồ chua, mỡ hành và nước mắm chua ngọt đặc trưng.', 'id_quan_an' => '5', 'tinh_trang' => '1', 'hinh_anh' => 'https://lamsonfood.com/wp-content/uploads/2022/02/com-tam-duoc-nhieu-nguoi-yeu-thich.jpg', 'id_danh_muc' => '22'],

            ['id' => '20', 'ten_mon_an' => 'Cơm Tấm Sườn Nướng', 'slug_mon_an' => 'com-tam-suon-nuong', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Cơm tấm với sườn nướng thơm lừng, vị ngọt của thịt kết hợp với mùi thơm của than hoa, ăn kèm đồ chua và nước mắm.', 'id_quan_an' => '5', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2021/08/09/1373996/tu-lam-com-tam-suon-trung-don-gian-thom-ngon-nhu-ngoai-hang-202201071248422991.jpg', 'id_danh_muc' => '22'],

            ['id' => '21', 'ten_mon_an' => 'Cơm Gà Xé', 'slug_mon_an' => 'com-ga-xe', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Cơm trắng thơm ngon với thịt gà luộc xé nhỏ, thấm vị, ăn kèm rau răm, hành phi và nước mắm chua ngọt đặc biệt.', 'id_quan_an' => '5', 'tinh_trang' => '1', 'hinh_anh' => 'https://phugiafood.com/wp-content/uploads/2021/11/Com-ga-xe-phay-1-1024x768.jpg', 'id_danh_muc' => '20'],

            ['id' => '22', 'ten_mon_an' => 'Cơm Chiên Dương Châu', 'slug_mon_an' => 'com-chien-duong-chau', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Cơm chiên với nhiều loại nguyên liệu như thịt xá xíu, trứng, đậu Hà Lan, cà rốt... tạo nên món ăn đầy màu sắc và hương vị đặc trưng.', 'id_quan_an' => '5', 'tinh_trang' => '1', 'hinh_anh' => 'https://i.ytimg.com/vi/ZbSbc9Z8K6E/maxresdefault.jpg', 'id_danh_muc' => '23'],

            ['id' => '23', 'ten_mon_an' => 'Cơm Đùi Gà Quay', 'slug_mon_an' => 'com-dui-ga-quay', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Cơm trắng thơm ngon ăn kèm đùi gà quay giòn bên ngoài, mềm ngọt bên trong, thấm vị gia vị đặc trưng, phục vụ cùng nước mắm chua ngọt.', 'id_quan_an' => '5', 'tinh_trang' => '1', 'hinh_anh' => 'https://hoangviettravel.vn/wp-content/uploads/2024/11/com-tho-da-nang2.jpg', 'id_danh_muc' => '23'],

            ['id' => '24', 'ten_mon_an' => 'Cơm Cánh Gà Quay', 'slug_mon_an' => 'com-canh-ga-quay', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Cơm trắng thơm ngon ăn kèm cánh gà quay giòn thơm, thấm vị gia vị, da giòn thịt mềm, phục vụ cùng nước mắm chua ngọt.', 'id_quan_an' => '5', 'tinh_trang' => '1', 'hinh_anh' => 'https://burgerking.vn/media/catalog/product/cache/1/image/1800x/040ec09b1e35df139433887a97daa66f/g/a/ga_nuong_sot_bbq.jpg', 'id_danh_muc' => '23'],

            ['id' => '25', 'ten_mon_an' => 'Cơm Chiên Trứng', 'slug_mon_an' => 'com-chien-trung', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Cơm chiên với trứng tươi, hạt cơm tơi xốp, thơm mùi trứng và dậy mùi hành phi, đơn giản nhưng đầy hương vị.', 'id_quan_an' => '5', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2019/06/05/1171265/cach-lam-com-chien-trung-hat-com-toi-khong-bi-nhao-202203031523399671.jpg', 'id_danh_muc' => '23'],

            ['id' => '26', 'ten_mon_an' => 'Cơm Chiên Heo Quay', 'slug_mon_an' => 'com-chien-heo-quay', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Cơm chiên thơm ngon với thịt heo quay giòn bùi, thấm vị, kết hợp với các loại rau củ tạo nên món ăn đầy hương vị.', 'id_quan_an' => '5', 'tinh_trang' => '1', 'hinh_anh' => 'https://img-global.cpcdn.com/recipes/1f3479b6cd02e393/680x482cq70/c%C6%A1m-rang-th%E1%BB%8Bt-heo-quay-lowcarb-recipe-main-photo.jpg', 'id_danh_muc' => '23'],

            ['id' => '27', 'ten_mon_an' => 'Cơm Cá Kho', 'slug_mon_an' => 'com-ca-kho', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Cơm trắng thơm ngon ăn kèm cá kho tộ đậm đà, thịt cá mềm thấm vị ngọt caramel và đậm đà nước kho.', 'id_quan_an' => '5', 'tinh_trang' => '1', 'hinh_anh' => 'https://vuongquocruou.vn/wp-content/uploads/2021/08/ca-nau-ruou-vang-thom-ngon.jpg', 'id_danh_muc' => '20'],

            ['id' => '28', 'ten_mon_an' => 'Cơm Sườn Non', 'slug_mon_an' => 'com-suon-non', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Cơm trắng thơm ngon ăn kèm sườn non kho mềm, thấm vị đậm đà, ngọt thịt, phục vụ kèm nước kho béo ngậy.', 'id_quan_an' => '5', 'tinh_trang' => '1', 'hinh_anh' => 'https://i.ytimg.com/vi/VuZoI4WRW9Q/maxresdefault.jpg', 'id_danh_muc' => '20'],

            ['id' => '29', 'ten_mon_an' => 'Cơm Tôm Rim', 'slug_mon_an' => 'com-tom-rim', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Cơm trắng thơm ngon ăn kèm tôm rim mặn ngọt, thấm vị gia vị, vỏ tôm giòn thơm, thịt tôm ngọt đậm đà.', 'id_quan_an' => '5', 'tinh_trang' => '1', 'hinh_anh' => 'https://product.hstatic.net/1000245833/product/c_m_t_m_rim_master.jpg', 'id_danh_muc' => '20'],

            ['id' => '38', 'ten_mon_an' => 'Bún Thịt Nướng ', 'slug_mon_an' => 'bun-thit-nuong', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Bún trắng mềm ăn với thịt heo nướng thơm lừng, rau sống, đồ chua và nước mắm chua ngọt đặc trưng, tạo nên hương vị trọn vẹn của món ăn Việt Nam.', 'id_quan_an' => '7', 'tinh_trang' => '1', 'hinh_anh' => 'https://static.vinwonders.com/production/bun-thit-nuong-ha-noi-4.jpg', 'id_danh_muc' => '8'],

            ['id' => '39', 'ten_mon_an' => 'Bún Thập Cẩm', 'slug_mon_an' => 'bun-thap-cam', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Bún trắng mềm ăn kèm nhiều loại thịt, hải sản và rau sống, đồ chua, chan với nước mắm chua ngọt đặc trưng, đa dạng hương vị trong một tô.', 'id_quan_an' => '7', 'tinh_trang' => '1', 'hinh_anh' => 'https://gcs.tripi.vn/public-tripi/tripi-feed/img/473849IIz/bun-rieu-ba-kieu-1042342.jpg', 'id_danh_muc' => '8'],

            // ['id' => '40', 'ten_mon_an' => 'Bún Mắm', 'slug_mon_an' => 'bun-mam', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Bún với nước dùng đặc trưng từ mắm cá linh, ăn kèm thịt heo, tôm, mực và rau sống, vị đậm đà, thơm nồng đặc trưng của miền Tây Nam Bộ.', 'id_quan_an' => '10', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.vntrip.vn/cam-nang/wp-content/uploads/2016/12/huong-vi-thom-ngon-kho-quen-cua-mon-bun-mam-nem-da-nang-953-5.jpg', 'id_danh_muc' => '8'],

            ['id' => '41', 'ten_mon_an' => 'Nước Ép Cà Rốt', 'slug_mon_an' => 'nuoc-ep-ca-rot', 'gia_ban' => '20000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Nước ép từ cà rốt tươi nguyên chất, giàu vitamin A và các chất chống oxy hóa, vị ngọt tự nhiên, tốt cho sức khỏe và làn da.', 'id_quan_an' => '11', 'tinh_trang' => '1', 'hinh_anh' => 'https://matika.vn/wp-content/uploads/2022/09/cach-lam-nuoc-ep-ca-rot-ngon-nd.jpg', 'id_danh_muc' => '19'],

            ['id' => '42', 'ten_mon_an' => 'Nước Dừa', 'slug_mon_an' => 'nuoc-dua', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Nước dừa tươi nguyên chất, vị ngọt thanh mát, giàu điện giải tự nhiên, giúp giải khát và bổ sung năng lượng hiệu quả.', 'id_quan_an' => '11', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2020/06/22/1264775/nuoc-dua-de-duoc-bao-lau-cach-bao-nuoc-dua-dung-202006221624116259.jpg', 'id_danh_muc' => '19'],

            ['id' => '43', 'ten_mon_an' => 'Nước Ép Dưa Hấu', 'slug_mon_an' => 'nuoc-ep-dua-hau', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Nước ép từ dưa hấu tươi ngọt, giàu nước và chất chống oxy hóa, vị ngọt mát tự nhiên, giúp giải nhiệt hiệu quả trong mùa nóng.', 'id_quan_an' => '11', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2020/10/23/1301299/5-cach-lam-nuoc-ep-dua-hau-cuc-ngon-don-gian-tai-nha-202010231109233490.jpg', 'id_danh_muc' => '19'],

            ['id' => '44', 'ten_mon_an' => 'Nước Mía', 'slug_mon_an' => 'nuoc-mia', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Nước ép từ cây mía tươi, vị ngọt thanh mát, không pha thêm đường, giúp giải khát và bổ sung năng lượng nhanh chóng.', 'id_quan_an' => '11', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.nhathuoclongchau.com.vn/unsafe/800x0/https://cms-prod.s3-sgn09.fptcloud.com/nuoc_mia_co_tac_dung_gi_doi_voi_suc_khoe_1_3faa508da1.jpg', 'id_danh_muc' => '19'],

            ['id' => '45', 'ten_mon_an' => 'Trà Sữa Trân Châu Đường Đen', 'slug_mon_an' => 'tra-sua-tran-chau-duong-den', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Trà sữa thơm ngon kết hợp với trân châu đường đen dẻo ngọt, hương vị đậm đà của đường đen tạo nên thức uống hấp dẫn không thể cưỡng lại.', 'id_quan_an' => '12', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2022/01/21/1412109/huong-dan-cach-lam-tra-sua-tran-chau-duong-den-202201211537260116.jpg', 'id_danh_muc' => '16'],

            ['id' => '46', 'ten_mon_an' => 'Trà Sữa Truyền Thống', 'slug_mon_an' => 'tra-sua-truyen-thong', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Trà đen thơm ngon kết hợp với sữa béo ngậy, vị ngọt vừa phải, là thức uống quen thuộc và được yêu thích của nhiều người.', 'id_quan_an' => '12', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2021/08/10/1374160/hoc-2-cach-pha-tra-sua-truyen-thong-thom-ngon-chuan-vi-ai-cung-me-202203031716377004.jpg', 'id_danh_muc' => '16'],

            ['id' => '47', 'ten_mon_an' => 'Trà Sữa Bạc Hà', 'slug_mon_an' => 'tra-sua-bac-ha', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Trà sữa với hương vị bạc hà the mát, kết hợp với sữa béo ngậy, tạo cảm giác sảng khoái và thơm ngon khó cưỡng.', 'id_quan_an' => '12', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.nguyenkimmall.com/images/detailed/747/6-tra-sua-bac-ha.jpg.jpg', 'id_danh_muc' => '16'],

            ['id' => '48', 'ten_mon_an' => 'Trà Sữa Khoai Môn', 'slug_mon_an' => 'tra-sua-khoai-mon', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Trà sữa với hương vị khoai môn béo ngậy, ngọt nhẹ, màu tím đặc trưng, là sự kết hợp hoàn hảo giữa trà, sữa và khoai môn.', 'id_quan_an' => '12', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2021/11/04/1395665/cach-lam-tra-sua-khoai-mon-thom-ngon-chuan-vi-202111041038558095.jpg', 'id_danh_muc' => '16'],

            ['id' => '49', 'ten_mon_an' => 'Trà Sữa Sương Sáo', 'slug_mon_an' => 'tra-sua-suong-sao', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Trà sữa thơm ngon kết hợp với sương sáo dai mềm, tạo cảm giác thú vị khi thưởng thức, vừa ngọt vừa mát lạnh.', 'id_quan_an' => '12', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2021/09/CookRecipe/Avatar/tra-sua-suong-sao-bang-bot-beo-thumbnail-1.jpg', 'id_danh_muc' => '16'],

            ['id' => '50', 'ten_mon_an' => 'Trà Chanh Nhãn', 'slug_mon_an' => 'tra-chanh-nhan', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Trà thơm kết hợp với vị chua thanh của chanh và vị ngọt mọng nước của nhãn, tạo nên thức uống thanh mát, thơm ngon.', 'id_quan_an' => '12', 'tinh_trang' => '1', 'hinh_anh' => 'https://longnhanbamai.com/wp-content/uploads/2018/08/Cach-pha-tra-nhan-ngon.jpg', 'id_danh_muc' => '18'],

            ['id' => '51', 'ten_mon_an' => 'Trà Chanh Bạc Hà', 'slug_mon_an' => 'tra-chanh-bac-ha', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Trà thơm kết hợp với vị chua thanh của chanh và hương bạc hà the mát, tạo nên thức uống sảng khoái, giải nhiệt tuyệt vời.', 'id_quan_an' => '12', 'tinh_trang' => '1', 'hinh_anh' => 'https://assets.unileversolutions.com/v1/1188476.jpg', 'id_danh_muc' => '18'],

            ['id' => '52', 'ten_mon_an' => 'Trà Chanh Gừng Sả', 'slug_mon_an' => 'tra-chanh-gung-xa', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Trà thơm kết hợp với vị chua thanh của chanh, vị cay nồng của gừng và hương thơm của sả, tạo nên thức uống ấm áp và thơm lừng.', 'id_quan_an' => '12', 'tinh_trang' => '1', 'hinh_anh' => 'https://images.baodantoc.vn/uploads/2020/Th%C3%A1ng%202/Ng%C3%A0y%2017/tra-sa-e1571990437260.jpg', 'id_danh_muc' => '18'],

            ['id' => '53', 'ten_mon_an' => 'Cơm Chay', 'slug_mon_an' => 'com-chay', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Cơm trắng thơm ngon ăn kèm các món chay từ rau củ và đậu, được chế biến cầu kỳ, đảm bảo đầy đủ dinh dưỡng và hương vị hấp dẫn.', 'id_quan_an' => '13', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdnphoto.dantri.com.vn/VatjkpCGL1EBMPma9e-lk1UQSGg=/thumb_w/960/2021/05/16/chay-09-1621125202654.jpg', 'id_danh_muc' => '20'],

            ['id' => '54', 'ten_mon_an' => 'Bánh Canh Chay', 'slug_mon_an' => 'banh-canh-chay', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Bánh canh với sợi bánh dày và dai, nước dùng chay ngọt thanh từ rau củ, ăn kèm các loại rau nấm và đậu hũ, thơm ngon bổ dưỡng.', 'id_quan_an' => '13', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2020/11/CookRecipe/GalleryStep/thanh-pham-622.jpg', 'id_danh_muc' => '2'],

            ['id' => '55', 'ten_mon_an' => 'Mì Quảng Chay', 'slug_mon_an' => 'mi-quang-chay', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Mì Quảng với sợi mì dẹp vàng, nước dùng chay đặc sánh, ăn kèm rau sống, đậu phộng và bánh tráng nướng, hương vị đậm đà phong cách miền Trung.', 'id_quan_an' => '13', 'tinh_trang' => '1', 'hinh_anh' => 'https://beptruong.edu.vn/wp-content/uploads/2022/10/mi-quang-chay-voi-vi-thanh-dam.jpg', 'id_danh_muc' => '47'],

            // ['id' => '56', 'ten_mon_an' => 'Cà Ri Chay', 'slug_mon_an' => 'ca-ri-chay', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Cà ri chay với nước súp đặc sánh từ nước cốt dừa và gia vị cà ri, ăn kèm khoai tây, cà rốt, đậu và nấm, thơm ngon đậm đà.', 'id_quan_an' => '14', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2020/07/10/1269276/cach-nau-ca-ri-chay-thom-ngon-hap-dan-don-gian-tai-nha-202206041935524617.jpg', 'id_danh_muc' => '10'],

            // ['id' => '57', 'ten_mon_an' => 'Bánh Kem', 'slug_mon_an' => 'banh-kem', 'gia_ban' => '150000', 'gia_khuyen_mai' => '145000', 'mo_ta' => 'Bánh kem tươi mềm mịn, được trang trí đẹp mắt với kem tươi và trái cây tươi, ngọt vừa phải, thích hợp cho các dịp sinh nhật và lễ kỷ niệm.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2020/12/CookProduct/1260-1200x643-68.jpg', 'id_danh_muc' => '31'],

            // ['id' => '58', 'ten_mon_an' => 'Bánh Su Kem', 'slug_mon_an' => 'banh-su-kem', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Bánh su vỏ ngoài giòn xốp, bên trong là lớp kem tươi béo ngậy, ngọt vừa phải, tạo nên sự hài hòa giữa vị giòn và mềm mịn.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2021/06/CookRecipe/Avatar/banh-su-kem-thumbnail.jpg', 'id_danh_muc' => '31'],

            // ['id' => '59', 'ten_mon_an' => 'Cafe Sữa', 'slug_mon_an' => 'cafe-sua', 'gia_ban' => '12000', 'gia_khuyen_mai' => '7000', 'mo_ta' => 'Cafe đậm đà kết hợp với sữa đặc tạo nên vị ngọt béo hài hòa, thức uống truyền thống của người Việt, phù hợp mọi thời điểm trong ngày.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://lyoncoffee.com.vn/wp-content/uploads/hinh-anh-ly-ca-phe-dep-nhat-15.jpg', 'id_danh_muc' => '17'],

            // ['id' => '60', 'ten_mon_an' => 'Đen Đá', 'slug_mon_an' => 'den-da', 'gia_ban' => '15000', 'gia_khuyen_mai' => '10000', 'mo_ta' => 'Cafe đen nguyên chất pha với đá, giữ trọn vị đắng đặc trưng và hương thơm nồng nàn của hạt cafe, thức uống dành cho người yêu thích vị đắng thuần túy.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://product.hstatic.net/1000075078/product/1639377797_ca-phe-den-da_6f4766ec0f8b4e929a8d916ae3c13254.jpg', 'id_danh_muc' => '17'],

            ['id' => '61', 'ten_mon_an' => 'Bánh Mì Heo Quay', 'slug_mon_an' => 'banh-mi-heo-quay', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Bánh mì giòn ngoài mềm trong với nhân thịt heo quay giòn bì, ăn kèm rau sống, đồ chua và sốt mayonnaise, hương vị đậm đà khó cưỡng.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2021/09/06/1380700/cach-lam-banh-mi-heo-quay-thom-ngon-cho-bua-sang-dinh-duong-202201041047079624.jpg', 'id_danh_muc' => '6'],

            ['id' => '62', 'ten_mon_an' => 'Bánh Mì Ốp La', 'slug_mon_an' => 'banh-mi-op-la', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Bánh mì giòn ngoài mềm trong với nhân trứng ốp la vàng óng, lòng đào béo ngậy, ăn kèm rau sống, đồ chua và sốt mayonnaise, bữa sáng hoàn hảo.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://hstatic.net/759/1000071759/1/2016/2-22/banh-mi-op-la_master.jpg', 'id_danh_muc' => '6'],

            ['id' => '63', 'ten_mon_an' => 'Bánh Mì Chảo', 'slug_mon_an' => 'banh-mi-chao', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Bánh mì giòn nướng ăn kèm với trứng, thịt và rau củ được chiên trong chảo nóng, thơm ngon béo ngậy, bữa sáng đầy năng lượng.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://i-giadinh.vnecdn.net/2023/11/03/Buoc-8-Thanh-pham-1-8-2421-1698986152.jpg', 'id_danh_muc' => '6'],

            // ['id' => '64', 'ten_mon_an' => 'Nước Dừa', 'slug_mon_an' => 'nuoc-dua', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Nước dừa tươi nguyên chất, vị ngọt thanh mát, giàu điện giải tự nhiên, giúp giải khát và bổ sung năng lượng, đặc biệt tốt trong những ngày nóng.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://media.vov.vn/sites/default/files/styles/large/public/2023-08/20200513_094457_911488_loi-ich-cua-nuoc-du.max-1800x1800.jpg', 'id_danh_muc' => '19'],

            // ['id' => '65', 'ten_mon_an' => 'Nước Dừa Trân châu', 'slug_mon_an' => 'nuoc-dua-tran-chau', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Nước dừa tươi nguyên chất kết hợp với trân châu đen dẻo dai, tạo nên thức uống vừa thanh mát vừa có độ ngọt và dai thú vị khi thưởng thức.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2021/05/CookRecipe/Avatar/nuoc-dua-tran-chau-dua-thumbnail-1.jpg', 'id_danh_muc' => '19'],

            // ['id' => '66', 'ten_mon_an' => 'Dừa Kem Sữa', 'slug_mon_an' => 'dua-kem-sua', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Thức uống từ nước dừa và cơm dừa non xay mịn với sữa và đường, tạo nên món kem sữa dừa mát lạnh, béo ngậy và thơm ngon.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2020/03/25/1244397/cach-lam-kem-dua-thom-ngon-tai-nha-bang-may-xay-sinh-to-202003251607205717.jpg', 'id_danh_muc' => '33'],

            // ['id' => '67', 'ten_mon_an' => 'Cacao nóng', 'slug_mon_an' => 'cacao-nong', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Thức uống nóng từ bột cacao nguyên chất, sữa và đường, tạo nên hương vị đậm đà, thơm nồng, ấm áp, phù hợp cho những ngày se lạnh.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://vietblend.vn/wp-content/uploads/2016/10/0a99b4cc1da4fbfaa2b5.jpg', 'id_danh_muc' => '13'],

            // ['id' => '68', 'ten_mon_an' => 'Cacao đá', 'slug_mon_an' => 'cacao-da', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Thức uống từ bột cacao nguyên chất, sữa và đường, phục vụ với đá, tạo nên hương vị đậm đà, thơm nồng nhưng mát lạnh, giải khát hiệu quả.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2021/11/CookRecipe/Avatar/ca-cao-da-thumbnail.png', 'id_danh_muc' => '13'],

            // ['id' => '69', 'ten_mon_an' => 'Cacao kem trứng', 'slug_mon_an' => 'cacao-kem-trung', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Thức uống từ bột cacao nguyên chất kết hợp với lớp kem trứng béo ngậy bên trên, tạo nên hương vị đặc biệt thơm ngon và hấp dẫn.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2021/10/CookRecipe/Avatar/cacao-trung-thumbnail.jpg', 'id_danh_muc' => '13'],

            ['id' => '70', 'ten_mon_an' => 'Chè Thái ', 'slug_mon_an' => 'che-thai', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Chè với nhiều loại thạch, trái cây, đậu và nước cốt dừa, hương vị ngọt béo hài hòa với vị chua nhẹ, là món tráng miệng giải nhiệt tuyệt vời.', 'id_quan_an' => '17', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2021/09/08/1381072/cach-lam-che-thai-sau-rieng-thom-ngon-an-la-ghien-202109081353585993.jpg', 'id_danh_muc' => '32'],

            ['id' => '71', 'ten_mon_an' => 'Chè Thái Sầu', 'slug_mon_an' => 'che-thai-sau', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Chè Thái kết hợp với sầu riêng béo ngậy, tạo nên hương vị đặc biệt thơm ngon, béo ngậy và hấp dẫn, là phiên bản nâng cấp của chè Thái truyền thống.', 'id_quan_an' => '17', 'tinh_trang' => '1', 'hinh_anh' => 'https://beptruong.edu.vn/wp-content/uploads/2018/06/mon-che-thai-sau-rieng.jpg', 'id_danh_muc' => '32'],

            ['id' => '72', 'ten_mon_an' => 'Chè Bưởi', 'slug_mon_an' => 'che-buoi', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Chè với cùi bưởi được sơ chế kỹ để loại bỏ vị đắng, nấu với đường và nước cốt dừa, tạo nên món tráng miệng thanh mát, thơm ngon.', 'id_quan_an' => '17', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2022/11/20/1488962/cach-nau-che-buoi-sai-gon-thom-sanh-dac-gion-ngon-tai-nha-202211210039464329.jpg', 'id_danh_muc' => '32'],

            ['id' => '73', 'ten_mon_an' => 'Dừa Dầm', 'slug_mon_an' => 'dua-dam', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Cơm dừa non được cắt sợi, trộn với sữa đặc, đá bào và thạch, tạo nên món tráng miệng mát lạnh, ngọt thanh và thơm mùi dừa tự nhiên.', 'id_quan_an' => '17', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2021/12/24/1406445/cach-lam-che-dua-dam-ngon-chuan-vi-hai-phong-tai-nha-202112240108007211.jpg', 'id_danh_muc' => '32'],

            ['id' => '74', 'ten_mon_an' => 'Dừa Sữa', 'slug_mon_an' => 'dua-sua', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Thức uống từ nước dừa tươi kết hợp với sữa đặc và đá, tạo nên hương vị ngọt thanh, béo ngậy và thơm mùi dừa tự nhiên.', 'id_quan_an' => '17', 'tinh_trang' => '1', 'hinh_anh' => 'https://media.vneconomy.vn/images/upload/2021/04/21/sua-dua-15568650864101847268277.jpg', 'id_danh_muc' => '15'],

            ['id' => '75', 'ten_mon_an' => 'Sườn Bì Chả', 'slug_mon_an' => 'suon-bi-cha', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Cơm tấm với sườn nướng thơm ngon, bì heo giòn dai và chả trứng béo ngậy, ăn kèm đồ chua và nước mắm chua ngọt đặc trưng.', 'id_quan_an' => '1', 'tinh_trang' => '1', 'hinh_anh' => 'https://media-cdn.tripadvisor.com/media/photo-s/0a/cd/29/30/com-t-m-su-n-bi-ch-p.jpg', 'id_danh_muc' => '22'],

            ['id' => '76', 'ten_mon_an' => 'Sườn Bì ', 'slug_mon_an' => 'suon-bi', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Cơm tấm với sườn nướng thơm ngon và bì heo giòn dai, ăn kèm đồ chua và nước mắm chua ngọt đặc trưng, hương vị đậm đà.', 'id_quan_an' => '1', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2021/08/16/1375565/cach-nau-com-tam-suon-bi-cha-tai-nha-ngon-nhu-ngoai-tiem-202108162216045436.jpg', 'id_danh_muc' => '22'],

            ['id' => '77', 'ten_mon_an' => 'Sườn Chả', 'slug_mon_an' => 'suon-cha', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Cơm tấm với sườn nướng thơm ngon và chả trứng béo ngậy, ăn kèm đồ chua và nước mắm chua ngọt đặc trưng, hương vị đậm đà.', 'id_quan_an' => '1', 'tinh_trang' => '1', 'hinh_anh' => 'https://comtambason.com/wp-content/uploads/2020/12/Suon-cha.png', 'id_danh_muc' => '22'],

            ['id' => '78', 'ten_mon_an' => 'Súp Cua', 'slug_mon_an' => 'sup-cua', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Súp với thịt cua tươi ngon, trứng, nấm và bắp, đặc sánh và thơm ngon, là món khai vị hoàn hảo cho bữa ăn.', 'id_quan_an' => '19', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2021/03/CookRecipe/GalleryStep/thanh-pham-353.jpg', 'id_danh_muc' => '9'],

            ['id' => '79', 'ten_mon_an' => 'Súp Bột Báng', 'slug_mon_an' => 'sup-bot-bang', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Súp với bột báng trong suốt, dai mềm, nấu cùng thịt, trứng và nấm, tạo nên món súp đặc biệt thơm ngon và hấp dẫn.', 'id_quan_an' => '19', 'tinh_trang' => '1', 'hinh_anh' => 'https://thanhnien.mediacdn.vn/Uploaded/2014/Pictures201402/Thanh_Luan/2/botbang.jpg', 'id_danh_muc' => '9'],

            ['id' => '80', 'ten_mon_an' => 'Óc Heo Chưng', 'slug_mon_an' => 'oc-heo', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Óc heo được chưng với gừng, hành và gia vị, tạo nên món ăn mềm mịn, béo ngậy và thơm ngon, giàu dinh dưỡng.', 'id_quan_an' => '19', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2021/06/CookProduct/Oc-Heo-chung-gung-hanh-1200x676.jpg', 'id_danh_muc' => '44'],

            // ['id' => '81', 'ten_mon_an' => 'Cháo Lòng', 'slug_mon_an' => 'chao-long', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Cháo nấu với lòng heo, dồi, tiết và các bộ phận nội tạng khác, thơm ngon đậm đà, ăn kèm hành phi, tiêu và rau răm.', 'id_quan_an' => '20', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2021/08/31/1379186/cong-thuc-mon-chao-long-doi-huyet-thom-ngon-hap-dan-kho-cuong-202201201119382365.jpg', 'id_danh_muc' => '44'],

            // ['id' => '82', 'ten_mon_an' => 'Lòng Trộn', 'slug_mon_an' => 'long-tron', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Các loại lòng heo được luộc chín, thái nhỏ và trộn với rau thơm, đồ chua, gia vị, tạo nên món ăn chua cay mặn ngọt hài hòa.', 'id_quan_an' => '20', 'tinh_trang' => '1', 'hinh_anh' => 'https://imgamp.phunutoday.vn/files/dataimages/201608/11/original/cach-lam-mon-goi-long-heo-tron-chua-cay-thom-ngon-tai-nha-phunutodayvn_1470934242.jpg', 'id_danh_muc' => '44'],

            // ['id' => '83', 'ten_mon_an' => 'Lòng Nướng', 'slug_mon_an' => 'long-nuong', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Các loại lòng heo được tẩm ướp gia vị và nướng trên than hoa, thơm lừng, giòn dai và đậm đà, ăn kèm rau sống và nước chấm.', 'id_quan_an' => '20', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2020/10/CookProduct/61-1200x676.jpg', 'id_danh_muc' => '8'],

            // ['id' => '84', 'ten_mon_an' => 'Lòng Hấp', 'slug_mon_an' => 'long-hap', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Các loại lòng heo được hấp với gừng và hành, giữ nguyên hương vị tự nhiên, mềm ngon, ăn kèm rau thơm và nước chấm đặc biệt.', 'id_quan_an' => '20', 'tinh_trang' => '1', 'hinh_anh' => 'https://pastaxi-manager.onepas.vn/content/uploads/articles/thanhmai/long-heo-hap-gung/long-heo-hap-gung%C4%83.jpg', 'id_danh_muc' => '44'],


            // ///Bun Mam Van//
            ['id' => '85', 'ten_mon_an' => 'Bún Mắm Đặc Biệt', 'slug_mon_an' => 'bun-mam-dac-biet', 'gia_ban' => '45000', 'gia_khuyen_mai' => '40000', 'mo_ta' => 'Tô bún mắm đậm đà với đầy đủ tôm, mực, chả, heo quay và rau sống tươi ngon, hương vị chuẩn miền Tây.', 'id_quan_an' => '18', 'tinh_trang' => '1', 'hinh_anh' => 'https://media.vietnamplus.vn/images/7255a701687d11cb8c6bbc58a6c807851168d93752e4882494e1522f79da527a396dcebb0ba3be8face2b3a2b17d38e84f9efb0c8972265f49d8f86164867992/bun-mam-9921.jpg', 'id_danh_muc' => '50'],

            ['id' => '86', 'ten_mon_an' => 'Bún Mắm Tôm Thịt', 'slug_mon_an' => 'bun-mam-tom-thit', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Kết hợp giữa tôm tươi và thịt ba chỉ luộc, nước mắm nêm thơm lừng và rau sống giòn mát.', 'id_quan_an' => '18', 'tinh_trang' => '1', 'hinh_anh' => 'https://photo.znews.vn/w660/Uploaded/qhj_pwqvdvicbu/2019_05_27/changhomecook.jpg', 'id_danh_muc' => '50'],

            ['id' => '87', 'ten_mon_an' => 'Bún Mắm Cá Kèo', 'slug_mon_an' => 'bun-mam-ca-keo', 'gia_ban' => '45000', 'gia_khuyen_mai' => '40000', 'mo_ta' => 'Bún mắm nấu cùng cá kèo tươi, rau đắng và húng quế, vị mặn ngọt cay cay đặc trưng miền Tây.', 'id_quan_an' => '18', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn-i.vtcnews.vn/resize/th/upload/2024/11/17/bun-mam-2-22513159.jpg', 'id_danh_muc' => '50'],

            ['id' => '88', 'ten_mon_an' => 'Bún Mắm Lẩu', 'slug_mon_an' => 'bun-mam-lau', 'gia_ban' => '80000', 'gia_khuyen_mai' => '75000', 'mo_ta' => 'Lẩu bún mắm sôi sùng sục với tôm, mực, cá, thịt và nhiều loại rau miền Tây, thơm ngon hấp dẫn.', 'id_quan_an' => '18', 'tinh_trang' => '1', 'hinh_anh' => 'https://i.vietgiaitri.com/2022/4/30/cach-nau-lau-mam-mien-tay-don-gian-ma-ngon-ngat-ngay-23b-6425476.jpg', 'id_danh_muc' => '50'],

            ['id' => '89', 'ten_mon_an' => 'Bún Mắm Thịt Quay', 'slug_mon_an' => 'bun-mam-thit-quay', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Bún mắm với thịt heo quay da giòn rụm, chan nước mắm nêm đậm đà, ăn kèm rau sống tươi.', 'id_quan_an' => '18', 'tinh_trang' => '1', 'hinh_anh' => 'https://giaohienthitquay.com/wp-content/uploads/2022/08/bun-mam-nem-thit-quay-nuoc-sot-1024x1024.jpg', 'id_danh_muc' => '50'],

            ['id' => '90', 'ten_mon_an' => 'Bún Mắm Chay', 'slug_mon_an' => 'bun-mam-chay', 'gia_ban' => '35000', 'gia_khuyen_mai' => '30000', 'mo_ta' => 'Phiên bản chay thanh đạm với đậu hũ, nấm, cà tím và nước mắm chay thơm dịu, hương vị vẫn đậm đà.', 'id_quan_an' => '18', 'tinh_trang' => '1', 'hinh_anh' => 'https://i.ytimg.com/vi/-FCM4MLez1s/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLDqX8HVx8PK_4ax-5v8sl79Dl0QHA', 'id_danh_muc' => '50'],

            ['id' => '91', 'ten_mon_an' => 'Bún Mắm Tôm Mực', 'slug_mon_an' => 'bun-mam-tom-muc', 'gia_ban' => '45000', 'gia_khuyen_mai' => '40000', 'mo_ta' => 'Sự kết hợp hải sản tươi sống: tôm, mực và nước mắm nêm sánh quyện, đậm vị biển.', 'id_quan_an' => '18', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.realtech.com.vn/uploads/gostay/news/2846/bun-mam-mien-tay-tai-ha-noi-bun-mam-chu-8.jpg', 'id_danh_muc' => '50'],

            ['id' => '92', 'ten_mon_an' => 'Bún Mắm Thập Cẩm', 'slug_mon_an' => 'bun-mam-thap-cam', 'gia_ban' => '48000', 'gia_khuyen_mai' => '43000', 'mo_ta' => 'Tô bún đầy đặn với đủ loại topping: tôm, mực, chả, heo quay, cá lóc và rau sống.', 'id_quan_an' => '18', 'tinh_trang' => '1', 'hinh_anh' => 'https://luhanhvietnam.com.vn/du-lich/vnt_upload/news/10_2021/bun-mam-nem-da-nang_1.jpg', 'id_danh_muc' => '50'],

            ['id' => '93', 'ten_mon_an' => 'Bún Mắm Heo Quay Tôm', 'slug_mon_an' => 'bun-mam-heo-quay-tom', 'gia_ban' => '42000', 'gia_khuyen_mai' => '38000', 'mo_ta' => 'Tôm tươi, thịt heo quay vàng giòn và nước mắm nêm cay nồng tạo nên hương vị khó quên.', 'id_quan_an' => '18', 'tinh_trang' => '1', 'hinh_anh' => 'https://cafefcdn.com/203337114487263232/2022/10/11/photo-3-166547441341258748961.jpg', 'id_danh_muc' => '50'],

            ['id' => '94', 'ten_mon_an' => 'Nước Ép Cam Cà Rốt', 'slug_mon_an' => 'nuoc-ep-cam-ca-rot', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Thức uống giải khát bổ dưỡng từ cam tươi và cà rốt, giúp đẹp da, tăng sức đề kháng.', 'id_quan_an' => '18', 'tinh_trang' => '1', 'hinh_anh' => 'https://sunhouse.com.vn/pic/news/images/nuoc-ep-ca-rot-mix-voi-tao.jpg', 'id_danh_muc' => '50'],

            ['id' => '95', 'ten_mon_an' => 'Nước Dừa', 'slug_mon_an' => 'nuoc-dua', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Nước dừa tươi nguyên chất, vị ngọt thanh mát, giàu điện giải tự nhiên, giúp giải khát và bổ sung năng lượng hiệu quả.', 'id_quan_an' => '18', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2020/06/22/1264775/nuoc-dua-de-duoc-bao-lau-cach-bao-nuoc-dua-dung-202006221624116259.jpg', 'id_danh_muc' => '50'],

            ['id' => '96', 'ten_mon_an' => 'Nước Ép Dưa Hấu', 'slug_mon_an' => 'nuoc-ep-dua-hau', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Nước ép từ dưa hấu tươi ngọt, giàu nước và chất chống oxy hóa, vị ngọt mát tự nhiên, giúp giải nhiệt hiệu quả trong mùa nóng.', 'id_quan_an' => '18', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2020/10/23/1301299/5-cach-lam-nuoc-ep-dua-hau-cuc-ngon-don-gian-tai-nha-202010231109233490.jpg', 'id_danh_muc' => '50'],

            ['id' => '97', 'ten_mon_an' => 'Nước Mía', 'slug_mon_an' => 'nuoc-mia', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Nước ép từ cây mía tươi, vị ngọt thanh mát, không pha thêm đường, giúp giải khát và bổ sung năng lượng nhanh chóng.', 'id_quan_an' => '1', 'tinh_trang' => '18', 'hinh_anh' => 'https://cdn.nhathuoclongchau.com.vn/unsafe/800x0/https://cms-prod.s3-sgn09.fptcloud.com/nuoc_mia_co_tac_dung_gi_doi_voi_suc_khoe_1_3faa508da1.jpg', 'id_danh_muc' => '50'],
            // Hải sản cua biển


            ['id' => '98', 'ten_mon_an' => 'Tôm Nướng Muối Ớt', 'slug_mon_an' => 'tom-nuong-muoi-ot', 'gia_ban' => '85000', 'gia_khuyen_mai' => '75000', 'mo_ta' => 'Tôm tươi nướng than hoa cùng muối ớt cay nồng, thơm phức, thịt ngọt và dai tự nhiên.', 'id_quan_an' => '2', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.giaoducthoidai.vn/images/b4508baace0d9fe4c8bbd296e259642e92e25ce498fd3c500e124ae16c57135442b01315a067c405311bbdae01b688bb4701867cadc096f98d1f51060b1795c4/tomnuongmuoiot2_JAEI.jpg', 'id_danh_muc' => '49'],

            ['id' => '99', 'ten_mon_an' => 'Mực Nướng Sa Tế', 'slug_mon_an' => 'muc-nuong-sa-te', 'gia_ban' => '90000', 'gia_khuyen_mai' => '80000', 'mo_ta' => 'Mực tươi ướp sa tế đậm vị, nướng chín vàng trên than hồng, dậy mùi hấp dẫn.', 'id_quan_an' => '2', 'tinh_trang' => '1', 'hinh_anh' => 'https://chefdzung.com.vn/uploads/images/meo-10.jpg', 'id_danh_muc' => '49'],

            ['id' => '100', 'ten_mon_an' => 'Nghêu Hấp Sả', 'slug_mon_an' => 'ngheu-hap-sa', 'gia_ban' => '70000', 'gia_khuyen_mai' => '60000', 'mo_ta' => 'Nghêu tươi hấp cùng sả, gừng và lá chanh, nước dùng thanh ngọt, thơm nức mũi.', 'id_quan_an' => '2', 'tinh_trang' => '1', 'hinh_anh' => 'https://amthuchailuaq3.com/upload/product/307628186302.jpg', 'id_danh_muc' => '49'],

            ['id' => '101', 'ten_mon_an' => 'Sò Huyết Rang Me', 'slug_mon_an' => 'so-huyet-rang-me', 'gia_ban' => '85000', 'gia_khuyen_mai' => '75000', 'mo_ta' => 'Sò huyết tươi rang cùng nước sốt me chua ngọt, đậm vị, kích thích vị giác.', 'id_quan_an' => '2', 'tinh_trang' => '1', 'hinh_anh' => 'https://www.vietwave.com.vn/bwrestaurant/upload/files/monan/s%C3%B2%20huy%E1%BA%BFt%20rang%20me.jpg', 'id_danh_muc' => '49'],

            ['id' => '102', 'ten_mon_an' => 'Hàu Nướng Phô Mai', 'slug_mon_an' => 'hau-nuong-pho-mai', 'gia_ban' => '95000', 'gia_khuyen_mai' => '85000', 'mo_ta' => 'Hàu sữa tươi nướng béo ngậy với lớp phô mai tan chảy, thơm lừng và bổ dưỡng.', 'id_quan_an' => '2', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.zsoft.solutions/poseidon-web/app/media/Nau-an/04.2023/10042024-hau-nuong-pho-mai-buffet-poseidon-1.jpg', 'id_danh_muc' => '49'],

            ['id' => '103', 'ten_mon_an' => 'Cá Chẽm Hấp Xì Dầu', 'slug_mon_an' => 'ca-chem-hap-xi-dau', 'gia_ban' => '120000', 'gia_khuyen_mai' => '105000', 'mo_ta' => 'Cá chẽm phi lê hấp cùng xì dầu và gừng, thịt mềm ngọt, giữ nguyên hương vị tự nhiên.', 'id_quan_an' => '2', 'tinh_trang' => '1', 'hinh_anh' => 'https://barona.vn/storage/meo-vat/160/ca-hap-xi-dau.jpg', 'id_danh_muc' => '49'],

            ['id' => '104', 'ten_mon_an' => 'Ghẹ Rang Muối', 'slug_mon_an' => 'ghe-rang-muoi', 'gia_ban' => '130000', 'gia_khuyen_mai' => '115000', 'mo_ta' => 'Ghẹ tươi rang muối giòn rụm, thơm phức, lớp vỏ vàng ruộm và vị mặn vừa miệng.', 'id_quan_an' => '2', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2020/03/17/1242643/2-cach-lam-ghe-rang-gay-nghien-nham-nhi-ngay-cuoi-tuan-3.jpg', 'id_danh_muc' => '49'],

            ['id' => '105', 'ten_mon_an' => 'Ốc Hương Nướng Mỡ Hành', 'slug_mon_an' => 'oc-huong-nuong-mo-hanh', 'gia_ban' => '95000', 'gia_khuyen_mai' => '85000', 'mo_ta' => 'Ốc hương tươi nướng mỡ hành béo ngậy, rưới đậu phộng rang tạo vị thơm bùi hấp dẫn.', 'id_quan_an' => '2', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2021/10/16/1390864/2-cach-lam-oc-huong-nuong-sieu-ngon-chieu-long-cac-thuc-khach-kho-tinh-202110161431138267.jpg', 'id_danh_muc' => '49'],

            ['id' => '106', 'ten_mon_an' => 'Tôm Tích Rang Muối Ớt', 'slug_mon_an' => 'tom-tich-rang-muoi-ot', 'gia_ban' => '150000', 'gia_khuyen_mai' => '135000', 'mo_ta' => 'Tôm tích tươi được chiên giòn, rang muối ớt cay mặn hấp dẫn, thịt chắc ngọt tự nhiên.', 'id_quan_an' => '2', 'tinh_trang' => '1', 'hinh_anh' => 'https://hstatic.net/244/1000030244/10/2015/8-4/tom-tit-rang-muoi.jpg', 'id_danh_muc' => '49'],

            ['id' => '107', 'ten_mon_an' => 'Lẩu Hải Sản Chua Cay', 'slug_mon_an' => 'lau-hai-san-chua-cay', 'gia_ban' => '220000', 'gia_khuyen_mai' => '200000', 'mo_ta' => 'Lẩu hải sản với tôm, mực, cá, nghêu tươi ngon, nước dùng chua cay đậm đà kiểu Thái.', 'id_quan_an' => '2', 'tinh_trang' => '1', 'hinh_anh' => 'https://haisanloccantho.com/wp-content/uploads/2024/10/cach-nau-lau-hai-san-chua-cay-scaled.jpg', 'id_danh_muc' => '49'],

            // Mì Quảng Hải Phòng
            ['id' => '108', 'ten_mon_an' => 'Mỳ Quảng Tôm Thịt', 'slug_mon_an' => 'my-quang-tom-thit', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Mỳ Quảng truyền thống với tôm và thịt heo, sợi mì vàng óng dai nhẹ, nước dùng đậm đà và rau sống tươi mát.', 'id_quan_an' => '3', 'tinh_trang' => '1', 'hinh_anh' => 'https://www.hoidaubepaau.com/wp-content/uploads/2015/12/mi-quang-tom-thit.jpg', 'id_danh_muc' => '47'],

            ['id' => '109', 'ten_mon_an' => 'Mỳ Quảng Gà', 'slug_mon_an' => 'my-quang-ga', 'gia_ban' => '42000', 'gia_khuyen_mai' => '38000', 'mo_ta' => 'Mỳ Quảng gà ta thả vườn, thịt săn chắc, nước dùng vàng óng thơm nghệ, ăn kèm bánh tráng mè nướng.', 'id_quan_an' => '3', 'tinh_trang' => '1', 'hinh_anh' => 'https://statics.vinpearl.com/mi-quang-ga-2_1635278013.jpg', 'id_danh_muc' => '47'],

            ['id' => '110', 'ten_mon_an' => 'Mỳ Quảng Ếch', 'slug_mon_an' => 'my-quang-ech', 'gia_ban' => '45000', 'gia_khuyen_mai' => '40000', 'mo_ta' => 'Mỳ Quảng nấu cùng thịt ếch dai ngọt, đậm đà vị đồng quê, ăn kèm rau sống và ớt xanh cay nồng.', 'id_quan_an' => '3', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2020/07/CookProductThumb/Untitled-1-620x620-89.jpg', 'id_danh_muc' => '47'],

            ['id' => '111', 'ten_mon_an' => 'Mỳ Quảng Bò', 'slug_mon_an' => 'my-quang-bo', 'gia_ban' => '48000', 'gia_khuyen_mai' => '43000', 'mo_ta' => 'Thịt bò mềm, thơm nức, nấu cùng nước lèo vị nghệ và đậu phộng rang, ăn cùng sợi mì dai nhẹ và rau sống.', 'id_quan_an' => '3', 'tinh_trang' => '1', 'hinh_anh' => 'https://miquanganhhai.vn/wp-content/uploads/2024/12/mi_quang_bo_anh_hai.jpg', 'id_danh_muc' => '47'],

            ['id' => '112', 'ten_mon_an' => 'Mỳ Quảng Sườn Non', 'slug_mon_an' => 'my-quang-suon-non', 'gia_ban' => '45000', 'gia_khuyen_mai' => '40000', 'mo_ta' => 'Sườn non hầm mềm trong nước dùng nghệ, sợi mì vàng dai, vị béo và thơm nồng đặc trưng.', 'id_quan_an' => '3', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn2.fptshop.com.vn/unsafe/Uploads/images/tin-tuc/173552/Originals/nau-mi-quang-suon-11.jpg', 'id_danh_muc' => '47'],

            ['id' => '113', 'ten_mon_an' => 'Mỳ Quảng Chay', 'slug_mon_an' => 'my-quang-chay', 'gia_ban' => '35000', 'gia_khuyen_mai' => '30000', 'mo_ta' => 'Phiên bản chay thanh đạm với đậu hũ, nấm và nước dùng rau củ thơm ngọt tự nhiên.', 'id_quan_an' => '3', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.eva.vn/upload/3-2024/images/hank/mi-quang-chay-vua-ngon-lai-thom-phuc-cho-dip-le-vu-lan-cua-me-dam-sai-gon-_0__n-1723558924-86-width780height800.jpg', 'id_danh_muc' => '47'],

            ['id' => '114', 'ten_mon_an' => 'Mỳ Quảng Cá Lóc', 'slug_mon_an' => 'my-quang-ca-loc', 'gia_ban' => '43000', 'gia_khuyen_mai' => '38000', 'mo_ta' => 'Cá lóc đồng tươi, nấu cùng nước lèo thơm nghệ, đậm đà hương vị Quảng Nam.', 'id_quan_an' => '3', 'tinh_trang' => '1', 'hinh_anh' => 'https://statics.vinpearl.com/cach-nau-mi-quang-ca-loc-thumb_1631783642.jpg', 'id_danh_muc' => '47'],

            ['id' => '115', 'ten_mon_an' => 'Mỳ Quảng Thịt Quay', 'slug_mon_an' => 'my-quang-thit-quay', 'gia_ban' => '45000', 'gia_khuyen_mai' => '40000', 'mo_ta' => 'Thịt heo quay da giòn, nước lèo sánh đậm, ăn cùng mì vàng, đậu phộng và bánh tráng nướng.', 'id_quan_an' => '3', 'tinh_trang' => '1', 'hinh_anh' => 'https://miquanganhhai.vn/wp-content/uploads/2024/12/mi_quang_suon_heo_anh_hai.jpg', 'id_danh_muc' => '47'],

            ['id' => '116', 'ten_mon_an' => 'Mỳ Quảng Thập Cẩm', 'slug_mon_an' => 'my-quang-thap-cam', 'gia_ban' => '48000', 'gia_khuyen_mai' => '43000', 'mo_ta' => 'Đầy đủ topping: tôm, thịt, trứng cút, sườn non, chan nước lèo đặc trưng, vị đậm đà hấp dẫn.', 'id_quan_an' => '3', 'tinh_trang' => '1', 'hinh_anh' => 'https://daubepgiadinh.vn/wp-content/uploads/2017/12/mi-quang-thit-heo.jpg', 'id_danh_muc' => '47'],

            ['id' => '117', 'ten_mon_an' => 'Mỳ Quảng Tôm Ếch', 'slug_mon_an' => 'my-quang-tom-ech', 'gia_ban' => '47000', 'gia_khuyen_mai' => '42000', 'mo_ta' => 'Kết hợp tôm tươi và thịt ếch dai mềm, nước dùng thơm nghệ, hương vị độc đáo chỉ có ở miền Trung.', 'id_quan_an' => '3', 'tinh_trang' => '1', 'hinh_anh' => 'https://hoiancreativecity.com/uploads/images/TNB-55044.jpg', 'id_danh_muc' => '47'],



            //Bún bà ân

            ['id' => '118', 'ten_mon_an' => 'Bún Chả Cá Đà Nẵng', 'slug_mon_an' => 'bun-cha-ca-da-nang', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Bún chả cá đặc sản Đà Nẵng với chả cá hấp và chiên, nước lèo trong, vị ngọt thanh của xương cá.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2021/09/CookRecipe/Avatar/bun-cha-ca-nha-trang-thumbnail.jpg', 'id_danh_muc' => '50'],

            ['id' => '119', 'ten_mon_an' => 'Bún Chả Cá Nha Trang', 'slug_mon_an' => 'bun-cha-ca-nha-trang', 'gia_ban' => '42000', 'gia_khuyen_mai' => '38000', 'mo_ta' => 'Chả cá Nha Trang thơm dai, nước lèo ninh từ đầu cá và xương, ăn cùng rau sống tươi giòn.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn2.fptshop.com.vn/unsafe/1920x0/filters:format(webp):quality(75)/2023_10_26_638339521137217131_cach-nau-bun-cha-ca.jpg', 'id_danh_muc' => '50'],

            ['id' => '120', 'ten_mon_an' => 'Bún Chả Cá Thập Cẩm', 'slug_mon_an' => 'bun-cha-ca-thap-cam', 'gia_ban' => '45000', 'gia_khuyen_mai' => '40000', 'mo_ta' => 'Tô bún đầy đặn với chả cá chiên, hấp, trứng cút, rau sống và nước lèo đậm đà hương cá.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://www.cet.edu.vn/wp-content/uploads/2018/09/bun-cha-ca-nha-trang.jpg', 'id_danh_muc' => '50'],

            ['id' => '121', 'ten_mon_an' => 'Bún Chả Cá Nấu Măng', 'slug_mon_an' => 'bun-cha-ca-nau-mang', 'gia_ban' => '43000', 'gia_khuyen_mai' => '38000', 'mo_ta' => 'Bún chả cá nấu với măng chua, vị chua dịu dễ ăn, nước dùng ngọt thanh, chả cá dai ngon.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://bazantravel.com/cdn/medias/uploads/81/81421-bun-cha-ca-nha-trang-700x525.jpg', 'id_danh_muc' => '50'],

            ['id' => '122', 'ten_mon_an' => 'Bún Chả Cá Nấu Dứa', 'slug_mon_an' => 'bun-cha-ca-nau-dua', 'gia_ban' => '42000', 'gia_khuyen_mai' => '38000', 'mo_ta' => 'Bún chả cá nấu cùng dứa tươi, tạo vị ngọt tự nhiên và mùi thơm đặc trưng hấp dẫn.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://media-cdn-v2.laodong.vn/storage/newsportal/2024/8/6/1376827/Bun-Ca-3.jpg', 'id_danh_muc' => '50'],

            ['id' => '123', 'ten_mon_an' => 'Bún Chả Cá Nấu Chua', 'slug_mon_an' => 'bun-cha-ca-nau-chua', 'gia_ban' => '43000', 'gia_khuyen_mai' => '38000', 'mo_ta' => 'Nước lèo chua chua thanh thanh, chả cá dai mềm, thêm cà chua và dứa cho vị đậm đà.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://thietbibepinoxcongnghiep.com/wp-content/uploads/2020/12/cach-nau-bun-cha-ca-quy-nhon.jpg', 'id_danh_muc' => '50'],

            ['id' => '124', 'ten_mon_an' => 'Bún Chả Cá Hấp', 'slug_mon_an' => 'bun-cha-ca-hap', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Chả cá hấp mềm thơm, nước dùng trong, vị ngọt tự nhiên, ăn cùng bún và rau sống tươi.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://i.ex-cdn.com/giadinhonline.vn/files/content/2019/08/20/bun-cha-ca-ngon-1624.jpg', 'id_danh_muc' => '50'],

            ['id' => '125', 'ten_mon_an' => 'Bún Chả Cá Chiên', 'slug_mon_an' => 'bun-cha-ca-chien', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Chả cá chiên vàng giòn, nước dùng ngọt xương, ăn cùng bún tươi và rau thơm hấp dẫn.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://static.vinwonders.com/2022/05/bun-cha-ca-da-nang-5.jpg', 'id_danh_muc' => '50'],

            ['id' => '126', 'ten_mon_an' => 'Bún Chả Cá Chay', 'slug_mon_an' => 'bun-cha-ca-chay', 'gia_ban' => '35000', 'gia_khuyen_mai' => '30000', 'mo_ta' => 'Phiên bản chay với chả cá chay từ đậu hũ và rong biển, nước lèo rau củ thanh đạm dễ ăn.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://duonggiahotel.vn/wp-content/uploads/2023/11/bun-cha-ca-da-nang-7.jpg', 'id_danh_muc' => '50'],

            ['id' => '127', 'ten_mon_an' => 'Bún Chả Cá Lóc', 'slug_mon_an' => 'bun-cha-ca-loc', 'gia_ban' => '43000', 'gia_khuyen_mai' => '38000', 'mo_ta' => 'Chả cá và cá lóc đồng kết hợp, nước dùng đậm vị cá, thêm rau sống và ớt tỏi cay nồng.', 'id_quan_an' => '4', 'tinh_trang' => '1', 'hinh_anh' => 'https://duonggiahotel.vn/wp-content/uploads/2023/11/bun-cha-ca-da-nang-7.jpg', 'id_danh_muc' => '50'],

            /////////////////////////////////////////////////////////



            // Bánh xèo


            ['id' => '128', 'ten_mon_an' => 'Bánh Xèo Tôm Thịt', 'slug_mon_an' => 'banh-xeo-tom-thit', 'gia_ban' => '35000', 'gia_khuyen_mai' => '30000', 'mo_ta' => 'Bánh xèo giòn rụm với nhân tôm tươi và thịt ba chỉ, ăn kèm rau sống và nước chấm chua ngọt.', 'id_quan_an' => '6', 'tinh_trang' => '1', 'hinh_anh' => 'https://www.cet.edu.vn/wp-content/uploads/2019/11/banh-xeo-mien-bac.jpg', 'id_danh_muc' => '3'],

            ['id' => '129', 'ten_mon_an' => 'Bánh Xèo Mực', 'slug_mon_an' => 'banh-xeo-muc', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Bánh xèo nhân mực tươi giòn giòn, đậm vị biển, vỏ bánh vàng ươm thơm phức.', 'id_quan_an' => '6', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2020/12/CookProduct/11-1200x676.jpg', 'id_danh_muc' => '3'],

            ['id' => '130', 'ten_mon_an' => 'Bánh Xèo Thịt Bò', 'slug_mon_an' => 'banh-xeo-thit-bo', 'gia_ban' => '38000', 'gia_khuyen_mai' => '34000', 'mo_ta' => 'Bánh xèo nhân thịt bò ướp đậm đà, kết hợp giá đỗ và hành lá, chiên vàng giòn hấp dẫn.', 'id_quan_an' => '6', 'tinh_trang' => '1', 'hinh_anh' => 'https://nghebep.com/wp-content/uploads/2020/10/banh-xeo.jpg', 'id_danh_muc' => '3'],

            ['id' => '131', 'ten_mon_an' => 'Bánh Xèo Hải Sản', 'slug_mon_an' => 'banh-xeo-hai-san', 'gia_ban' => '45000', 'gia_khuyen_mai' => '40000', 'mo_ta' => 'Bánh xèo hải sản với tôm, mực, thịt và giá đỗ, thơm béo, vỏ bánh vàng giòn bắt mắt.', 'id_quan_an' => '6', 'tinh_trang' => '1', 'hinh_anh' => 'https://mia.vn/media/uploads/blog-du-lich/thuong-thuc-banh-xeo-mien-tay-1713968410.jpg', 'id_danh_muc' => '3'],

            ['id' => '132', 'ten_mon_an' => 'Bánh Xèo Chay', 'slug_mon_an' => 'banh-xeo-chay', 'gia_ban' => '30000', 'gia_khuyen_mai' => '27000', 'mo_ta' => 'Bánh xèo chay nhân nấm, đậu hũ và giá đỗ, vỏ bánh mỏng giòn, nước chấm chay thanh nhẹ.', 'id_quan_an' => '6', 'tinh_trang' => '1', 'hinh_anh' => 'https://helio.vn/media/uploads/2022/10/06/dia-chi-quan-banh-xeo-da-nang-ngon3.jpg', 'id_danh_muc' => '3'],

            ['id' => '133', 'ten_mon_an' => 'Bánh Xèo Thịt Heo Quay', 'slug_mon_an' => 'banh-xeo-thit-heo-quay', 'gia_ban' => '42000', 'gia_khuyen_mai' => '38000', 'mo_ta' => 'Bánh xèo nhân thịt heo quay da giòn rụm, vị béo ngậy hòa cùng vỏ bánh vàng giòn.', 'id_quan_an' => '6', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn1260.cdn4s2.com/media/nh/357469131_741771557955336_3131534845978856518_n.jpg', 'id_danh_muc' => '3'],

            ['id' => '134', 'ten_mon_an' => 'Bánh Xèo Nấm Kim Châm', 'slug_mon_an' => 'banh-xeo-nam-kim-cham', 'gia_ban' => '32000', 'gia_khuyen_mai' => '28000', 'mo_ta' => 'Vỏ bánh giòn tan, nhân nấm kim châm thơm ngọt, ăn kèm rau sống và nước chấm chua ngọt.', 'id_quan_an' => '6', 'tinh_trang' => '1', 'hinh_anh' => 'https://www.lorca.vn/wp-content/uploads/2023/10/1-44.jpg', 'id_danh_muc' => '3'],

            ['id' => '135', 'ten_mon_an' => 'Bánh Xèo Bò Lá Lốt', 'slug_mon_an' => 'banh-xeo-bo-la-lot', 'gia_ban' => '42000', 'gia_khuyen_mai' => '38000', 'mo_ta' => 'Sự kết hợp độc đáo giữa bánh xèo giòn rụm và bò lá lốt nướng thơm lừng, đậm đà hương vị.', 'id_quan_an' => '6', 'tinh_trang' => '1', 'hinh_anh' => 'https://haithin.com/data/cms-image/AmThuc/banh-xeo/banh-xeo-mien-tayct2a.jpg', 'id_danh_muc' => '3'],

            ['id' => '136', 'ten_mon_an' => 'Bánh Xèo Tôm Nhảy', 'slug_mon_an' => 'banh-xeo-tom-nhay', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Đặc sản Bình Định bánh xèo tôm nhảy nóng hổi, tôm tươi vừa bắt lên, giòn ngon khó cưỡng.', 'id_quan_an' => '6', 'tinh_trang' => '1', 'hinh_anh' => 'https://www.cet.edu.vn/wp-content/uploads/2019/11/cach-lam-banh-xeo-mien-trung.jpg', 'id_danh_muc' => '3'],

            ['id' => '137', 'ten_mon_an' => 'Bánh Xèo Mini', 'slug_mon_an' => 'banh-xeo-mini', 'gia_ban' => '30000', 'gia_khuyen_mai' => '27000', 'mo_ta' => 'Bánh xèo mini nhỏ xinh, chiên giòn, dễ ăn, rất thích hợp cho trẻ em và bữa ăn nhẹ.', 'id_quan_an' => '6', 'tinh_trang' => '1', 'hinh_anh' => 'https://media.cooky.vn/images/blog-2016/2-cach-lam-banh-xeo-thom-ngon-va-su-khac-nhau-giua-banh-xeo-mien-nam-banh-xeo-mien-trung-2.jpg', 'id_danh_muc' => '3'],

            //////////////////////////////////////////////////////////////////////////
            // Quán ốc

            ['id' => '138', 'ten_mon_an' => 'Ốc Hương Nướng Muối Ớt', 'slug_mon_an' => 'oc-huong-nuong-muoi-ot', 'gia_ban' => '95000', 'gia_khuyen_mai' => '85000', 'mo_ta' => 'Ốc hương tươi nướng trên than hoa cùng muối ớt cay nồng, thịt ốc giòn dai và thơm phức.', 'id_quan_an' => '8', 'tinh_trang' => '1', 'hinh_anh' => 'https://www.huongnghiepaau.com/wp-content/uploads/2018/01/33702fafe493ac4046540634dd269336.jpg', 'id_danh_muc' => '19'],

            ['id' => '139', 'ten_mon_an' => 'Ốc Móng Tay Xào Rau Muống', 'slug_mon_an' => 'oc-mong-tay-xao-rau-muong', 'gia_ban' => '85000', 'gia_khuyen_mai' => '75000', 'mo_ta' => 'Ốc móng tay xào rau muống tỏi thơm lừng, vị giòn của ốc hòa cùng vị rau tươi ngon.', 'id_quan_an' => '8', 'tinh_trang' => '1', 'hinh_anh' => 'https://beptruong.edu.vn/wp-content/uploads/2018/06/mon-oc-mong-tay-xao-rau-muong.jpg', 'id_danh_muc' => '19'],

            ['id' => '140', 'ten_mon_an' => 'Ốc Len Xào Dừa', 'slug_mon_an' => 'oc-len-xao-dua', 'gia_ban' => '90000', 'gia_khuyen_mai' => '80000', 'mo_ta' => 'Ốc len béo ngậy xào cùng nước cốt dừa thơm béo, là món đặc sản miền Tây hấp dẫn khó cưỡng.', 'id_quan_an' => '8', 'tinh_trang' => '1', 'hinh_anh' => 'https://i.ytimg.com/vi/yk3eM_exu6U/maxresdefault.jpg', 'id_danh_muc' => '19'],

            ['id' => '141', 'ten_mon_an' => 'Ốc Giác Trộn Gỏi', 'slug_mon_an' => 'oc-giac-tron-goi', 'gia_ban' => '95000', 'gia_khuyen_mai' => '85000', 'mo_ta' => 'Thịt ốc giác giòn sần sật trộn cùng xoài xanh và rau răm, vị chua cay mặn ngọt cân bằng hoàn hảo.', 'id_quan_an' => '8', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2021/08/20/1376526/cach-lam-goi-xoai-oc-giac-gion-ngon-doi-vi-cho-bua-an-cuoi-tuan-202108201157181171.jpg', 'id_danh_muc' => '19'],

            ['id' => '142', 'ten_mon_an' => 'Ốc Mít Luộc Sả', 'slug_mon_an' => 'oc-mit-luoc-sa', 'gia_ban' => '70000', 'gia_khuyen_mai' => '65000', 'mo_ta' => 'Ốc mít tươi luộc cùng sả và lá chanh, chấm nước mắm gừng cay nồng, hương vị dân dã khó quên.', 'id_quan_an' => '8', 'tinh_trang' => '1', 'hinh_anh' => 'https://chefdzung.com.vn/uploads/images/album/oc-mit-luoc.-45k.jpg', 'id_danh_muc' => '19'],

            ['id' => '143', 'ten_mon_an' => 'Ốc Bươu Nướng Tiêu Xanh', 'slug_mon_an' => 'oc-buou-nuong-tieu-xanh', 'gia_ban' => '90000', 'gia_khuyen_mai' => '80000', 'mo_ta' => 'Ốc bươu nướng tiêu xanh, thịt ốc dai ngọt, quyện vị cay nồng của tiêu tạo cảm giác ấm nồng.', 'id_quan_an' => '8', 'tinh_trang' => '1', 'hinh_anh' => 'https://i-giadinh.vnecdn.net/2022/11/22/Thanh-pham-1-1-6930-1669103895.jpg', 'id_danh_muc' => '19'],

            ['id' => '144', 'ten_mon_an' => 'Ốc Hấp Sả Ớt', 'slug_mon_an' => 'oc-hap-sa-ot', 'gia_ban' => '80000', 'gia_khuyen_mai' => '70000', 'mo_ta' => 'Ốc tươi hấp cùng sả và ớt đỏ, giữ nguyên độ ngọt của thịt ốc, thơm nức mũi và cay nhẹ.', 'id_quan_an' => '8', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn2.fptshop.com.vn/unsafe/2023_12_16_638383485165167502_oc-hap-sa.jpg', 'id_danh_muc' => '19'],

            ['id' => '145', 'ten_mon_an' => 'Ốc Đinh Xào Sa Tế', 'slug_mon_an' => 'oc-dinh-xao-sa-te', 'gia_ban' => '85000', 'gia_khuyen_mai' => '75000', 'mo_ta' => 'Ốc đinh giòn giòn xào cùng sa tế cay nồng, đậm vị, rất bắt bia và phù hợp cho các buổi tụ họp.', 'id_quan_an' => '8', 'tinh_trang' => '1', 'hinh_anh' => 'https://storage.googleapis.com/onelife-public/blog.onelife.vn/2021/10/cach-lam-oc-djinh-xao-sa-ot-mon-khai-vi-734611399497.jpg', 'id_danh_muc' => '19'],

            ['id' => '146', 'ten_mon_an' => 'Ốc Mỡ Xào Me', 'slug_mon_an' => 'oc-mo-xao-me', 'gia_ban' => '90000', 'gia_khuyen_mai' => '80000', 'mo_ta' => 'Ốc mỡ xào me chua ngọt đậm đà, thêm sả ớt phi thơm, là món “must try” tại quán ốc.', 'id_quan_an' => '8', 'tinh_trang' => '1', 'hinh_anh' => 'https://anhoquan.com/upload/product/2-7517.jpg', 'id_danh_muc' => '19'],


            // Quán bánh đậpp
            ['id' => '148', 'ten_mon_an' => 'Bánh Đập Hội An', 'slug_mon_an' => 'banh-dap-hoi-an', 'gia_ban' => '25000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Đặc sản Hội An – bánh đập gồm bánh ướt và bánh tráng nướng kẹp lại, chấm mắm nêm cay nồng đậm đà.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://mia.vn/media/uploads/blog-du-lich/diem-mat-goi-ten-dia-diem-ban-banh-dap-hoi-an-ngon-dam-da-huong-vi-xu-quang-07-1619421523.jpg', 'id_danh_muc' => '19'],

            ['id' => '149', 'ten_mon_an' => 'Bánh Đập Hến Xào', 'slug_mon_an' => 'banh-dap-hen-xao', 'gia_ban' => '30000', 'gia_khuyen_mai' => '27000', 'mo_ta' => 'Bánh đập giòn rụm ăn kèm hến xào hành tỏi thơm nức, mắm nêm cay mặn hòa quyện hoàn hảo.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://photo.znews.vn/w660/Uploaded/ngotno/2020_03_03/hen2_1.jpg', 'id_danh_muc' => '19'],

            ['id' => '150', 'ten_mon_an' => 'Bánh Đập Mắm Nêm', 'slug_mon_an' => 'banh-dap-mam-nem', 'gia_ban' => '25000', 'gia_khuyen_mai' => '22000', 'mo_ta' => 'Bánh đập đơn giản với bánh ướt kẹp bánh tráng, chấm mắm nêm pha ớt tỏi, hương vị dân dã đặc trưng.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn3.ivivu.com/2014/06/banh-dap-mon-ngon-dan-da-dat-mien-trung-1-ivivu.jpg', 'id_danh_muc' => '19'],

            ['id' => '151', 'ten_mon_an' => 'Bánh Đập Thịt Heo Luộc', 'slug_mon_an' => 'banh-dap-thit-heo-luoc', 'gia_ban' => '35000', 'gia_khuyen_mai' => '30000', 'mo_ta' => 'Thịt heo luộc thái lát mỏng cuốn cùng bánh đập, rau sống và chấm mắm nêm cay nồng chuẩn vị miền Trung.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.xanhsm.com/2025/02/14853880-banh-dap-1.jpg', 'id_danh_muc' => '19'],

            ['id' => '152', 'ten_mon_an' => 'Bánh Đập Trứng Cút', 'slug_mon_an' => 'banh-dap-trung-cut', 'gia_ban' => '28000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Bánh đập giòn giòn kèm trứng cút luộc chấm mắm nêm tỏi ớt, thêm hành phi béo thơm hấp dẫn.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://mia.vn/media/uploads/blog-du-lich/banh_dap_nha_trang_mon_an_dan_da_chinh_phuc_du_khach_3-1624213414.jpg', 'id_danh_muc' => '19'],

            ['id' => '153', 'ten_mon_an' => 'Bánh Đập Chay', 'slug_mon_an' => 'banh-dap-chay', 'gia_ban' => '25000', 'gia_khuyen_mai' => '22000', 'mo_ta' => 'Phiên bản chay thanh đạm với bánh đập chấm nước tương gừng và hành phi giòn rụm.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn2.fptshop.com.vn/unsafe/Uploads/images/tin-tuc/172960/Originals/banh%20dap_hinh%201.jpg', 'id_danh_muc' => '19'],

            ['id' => '154', 'ten_mon_an' => 'Bánh Đập Nem Nướng', 'slug_mon_an' => 'banh-dap-nem-nuong', 'gia_ban' => '35000', 'gia_khuyen_mai' => '30000', 'mo_ta' => 'Bánh đập kết hợp cùng nem nướng thơm lừng, chấm mắm nêm pha tỏi ớt đậm vị, tạo trải nghiệm mới lạ.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://mia.vn/media/uploads/blog-du-lich/banh_dap_nha_trang_mon_an_dan_da_chinh_phuc_du_khach_4-1624213297.jpg', 'id_danh_muc' => '19'],

            ['id' => '155', 'ten_mon_an' => 'Xôi Chiên Thịt Băm', 'slug_mon_an' => 'xoi-chien-thit-bam', 'gia_ban' => '10000', 'gia_khuyen_mai' => '5000', 'mo_ta' => 'Xôi nếp được vo viên, bên trong có nhân thịt băm thơm ngon, chiên giòn vàng bên ngoài, dẻo bên trong.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2014/10/09/572276/bi-quyet-lam-xoi-chien-cang-an-cang-ghien--7.jpg', 'id_danh_muc' => '21'],

            ['id' => '156', 'ten_mon_an' => 'Xôi Chiên Thịt Xíu', 'slug_mon_an' => 'xoi-chien-thit-xiu', 'gia_ban' => '10000', 'gia_khuyen_mai' => '5000', 'mo_ta' => 'Xôi nếp được vo viên, bên trong có nhân thịt xá xíu thơm ngon, chiên giòn vàng bên ngoài, dẻo bên trong.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.mediamart.vn/images/news/mach-bn-cach-lam-xoi-xa-xiu-cc-ngon-ch-vi-ni-chien-khong-du_3bb08258.jpg', 'id_danh_muc' => '21'],

            ['id' => '157', 'ten_mon_an' => 'Xôi Chiên Gà Xé Cay', 'slug_mon_an' => 'xoi-chien-ga-xe-cay', 'gia_ban' => '10000', 'gia_khuyen_mai' => '5000', 'mo_ta' => 'Xôi nếp được vo viên, bên trong có nhân gà xé trộn gia vị cay thơm, chiên giòn vàng bên ngoài, dẻo bên trong.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://daubepgiadinh.vn/wp-content/uploads/2018/05/hinh-xoi-ga-xe-600x400.jpg', 'id_danh_muc' => '21'],

            ['id' => '158', 'ten_mon_an' => 'Xôi Chiên Chà Bông', 'slug_mon_an' => 'xoi-chien-cha-bong', 'gia_ban' => '10000', 'gia_khuyen_mai' => '5000', 'mo_ta' => 'Xôi nếp được vo viên, bên trong có nhân chà bông thơm ngon, chiên giòn vàng bên ngoài, dẻo bên trong, vị mặn ngọt hài hòa.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2021/08/CookRecipe/Avatar/xoi-chien-cha-bong-mo-hanh-thumbnail-1.jpg', 'id_danh_muc' => '21'],

            ['id' => '159', 'ten_mon_an' => 'Cá Viên Chiên', 'slug_mon_an' => 'ca-vien-chien', 'gia_ban' => '10000', 'gia_khuyen_mai' => '5000', 'mo_ta' => 'Cá viên được chiên vàng giòn, thơm mùi cá biển, dai ngon, ăn kèm tương ớt cay ngọt đặc trưng, là món ăn vặt yêu thích của nhiều người.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://www.cet.edu.vn/wp-content/uploads/2018/04/ca-vien-chien.jpg', 'id_danh_muc' => '28'],

            ['id' => '160', 'ten_mon_an' => 'Tôm Viên Chiên', 'slug_mon_an' => 'tom-vien-chien', 'gia_ban' => '10000', 'gia_khuyen_mai' => '5000', 'mo_ta' => 'Tôm viên được chiên vàng giòn, thơm mùi tôm biển, dai ngon, ăn kèm tương ớt cay ngọt đặc trưng, là món ăn vặt hấp dẫn.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://navicdn.com/nakk/images_article/2018/10/23/cach-lam-tom-vien-4.jpg', 'id_danh_muc' => '28'],

            ['id' => '161', 'ten_mon_an' => 'Bò Viên Chiên', 'slug_mon_an' => 'bo-vien-chien', 'gia_ban' => '10000', 'gia_khuyen_mai' => '5000', 'mo_ta' => 'Bò viên được chiên vàng giòn, thơm mùi thịt bò, dai ngon, ăn kèm tương ớt cay ngọt đặc trưng, là món ăn vặt được nhiều người yêu thích.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2021/08/21/1376755/cach-lam-bo-vien-chay-thom-ngon-chuan-vi-an-cung-bun-pho-deu-ngon-202201040958095687.jpg', 'id_danh_muc' => '28'],

            ['id' => '162', 'ten_mon_an' => 'Xúc Xích Chiên', 'slug_mon_an' => 'xuc-xich-chien', 'gia_ban' => '10000', 'gia_khuyen_mai' => '5000', 'mo_ta' => 'Xúc xích được chiên vàng giòn bên ngoài, thơm ngon bên trong, ăn kèm tương ớt cay ngọt, là món ăn vặt phổ biến và được ưa chuộng.', 'id_quan_an' => '9', 'tinh_trang' => '1', 'hinh_anh' => 'https://food.ibin.vn/images/data/product/do-an-nhe/xuc-xich-chien.jpg', 'id_danh_muc' => '28'],

            // Quán Bánh Cuốn Tiến Hưng
            ['id' => '163', 'ten_mon_an' => 'Bánh Cuốn Thịt Heo', 'slug_mon_an' => 'banh-cuon-thit-heo', 'gia_ban' => '30000', 'gia_khuyen_mai' => '27000', 'mo_ta' => 'Bánh cuốn nhân thịt heo xay, hành phi thơm lừng, ăn kèm nước mắm chua ngọt và rau sống.', 'id_quan_an' => '14', 'tinh_trang' => '1', 'hinh_anh' => 'https://bqn.1cdn.vn/2024/08/03/baodanang.vn-dataimages-202408-original-_images1745142_img_1136.jpg', 'id_danh_muc' => '2'],

            ['id' => '164', 'ten_mon_an' => 'Bánh Cuốn Trứng', 'slug_mon_an' => 'banh-cuon-trung', 'gia_ban' => '32000', 'gia_khuyen_mai' => '29000', 'mo_ta' => 'Lớp bánh mỏng mịn cuộn trứng lòng đào béo ngậy, ăn cùng nước chấm cay nhẹ và chả lụa.', 'id_quan_an' => '14', 'tinh_trang' => '1', 'hinh_anh' => 'https://banhcuonnamviet.com/thumbs/540x540x1/upload/product/img8713-6319.jpg', 'id_danh_muc' => '2'],

            ['id' => '165', 'ten_mon_an' => 'Bánh Cuốn Chả Lụa', 'slug_mon_an' => 'banh-cuon-cha-lua', 'gia_ban' => '28000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Bánh cuốn mềm mịn ăn kèm chả lụa và nước mắm pha vừa vị, tạo nên món ăn sáng quen thuộc.', 'id_quan_an' => '14', 'tinh_trang' => '1', 'hinh_anh' => 'https://namkinhfarm.com/wp-content/uploads/2023/11/banh-cuon.webp', 'id_danh_muc' => '2'],

            ['id' => '166', 'ten_mon_an' => 'Bánh Cuốn Nhân Mộc Nhĩ', 'slug_mon_an' => 'banh-cuon-moc-nhi', 'gia_ban' => '27000', 'gia_khuyen_mai' => '24000', 'mo_ta' => 'Nhân thịt heo xay trộn mộc nhĩ, hành khô thơm phức, bánh cuốn tráng mỏng mịn, ăn kèm nước chấm.', 'id_quan_an' => '14', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.zsoft.solutions/poseidon-web/app/media/Kham-pha-am-thuc/11.2023/241123-banh-cuon-buffet-poseidon-3.jpg', 'id_danh_muc' => '2'],

            ['id' => '167', 'ten_mon_an' => 'Bánh Cuốn Đặc Biệt', 'slug_mon_an' => 'banh-cuon-dac-biet', 'gia_ban' => '35000', 'gia_khuyen_mai' => '32000', 'mo_ta' => 'Phần bánh cuốn đầy đặn gồm trứng, thịt, chả, giá và hành phi, phù hợp cho bữa sáng đủ năng lượng.', 'id_quan_an' => '14', 'tinh_trang' => '1', 'hinh_anh' => 'https://cafefcdn.com/203337114487263232/2023/2/6/photo-12-16756819003051743090099.jpg', 'id_danh_muc' => '2'],

            ['id' => '168', 'ten_mon_an' => 'Chả Quế', 'slug_mon_an' => 'cha-que', 'gia_ban' => '15000', 'gia_khuyen_mai' => '12000', 'mo_ta' => 'Miếng chả quế thơm nồng mùi quế, chiên vàng nhẹ, ăn kèm bánh cuốn hoặc riêng với nước mắm tỏi ớt.', 'id_quan_an' => '14', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn2.fptshop.com.vn/unsafe/Uploads/images/tin-tuc/163090/Originals/cha-que-7.jpg', 'id_danh_muc' => '2'],

            ['id' => '169', 'ten_mon_an' => 'Bánh Cuốn Thanh Chay', 'slug_mon_an' => 'banh-cuon-thanh-chay', 'gia_ban' => '25000', 'gia_khuyen_mai' => '22000', 'mo_ta' => 'Phiên bản chay với nhân nấm mèo, đậu hũ và cà rốt, thanh đạm nhưng vẫn thơm ngon, dễ ăn.', 'id_quan_an' => '14', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.hstatic.net/files/200000700229/article/banh-cuon-chay-thumb_da84674002434eb5acac442d31466d7a.jpg', 'id_danh_muc' => '2'],

            ['id' => '170', 'ten_mon_an' => 'Nước Mắm Tỏi Ớt Đặc Biệt', 'slug_mon_an' => 'nuoc-mam-toi-ot', 'gia_ban' => '5000', 'gia_khuyen_mai' => '0', 'mo_ta' => 'Nước mắm pha tỏi ớt chua ngọt theo công thức riêng, giúp tăng hương vị cho món bánh cuốn.', 'id_quan_an' => '14', 'tinh_trang' => '1', 'hinh_anh' => 'https://vanbest.vn/Data/MamSaSung/images/Buoc-3-7087-1645170658.jpg', 'id_danh_muc' => '2'],

            ['id' => '171', 'ten_mon_an' => 'Bánh Cuốn Hành Phi', 'slug_mon_an' => 'banh-cuon-hanh-phi', 'gia_ban' => '27000', 'gia_khuyen_mai' => '24000', 'mo_ta' => 'Bánh cuốn nóng hổi rắc hành phi giòn rụm, dậy mùi thơm hấp dẫn, chấm nước mắm tỏi ớt.', 'id_quan_an' => '14', 'tinh_trang' => '1', 'hinh_anh' => 'https://media.suckhoecong.vn/Images/2025/04/27/14-21134317-250427211343.png', 'id_danh_muc' => '2'],

            ['id' => '172', 'ten_mon_an' => 'Bánh Cuốn Chả Cốm', 'slug_mon_an' => 'banh-cuon-cha-com', 'gia_ban' => '32000', 'gia_khuyen_mai' => '29000', 'mo_ta' => 'Bánh cuốn kết hợp chả cốm mềm dẻo, thơm mùi cốm non, mang hương vị đặc trưng Hà Nội.', 'id_quan_an' => '14', 'tinh_trang' => '1', 'hinh_anh' => 'https://image.phunuonline.com.vn/news/2019/20190919/fckimage/165248_70017728-237254287210157-1482581981404332032-n-18122878.jpg', 'id_danh_muc' => '2'],


            // Quán Bánh Mì
            ['id' => '173', 'ten_mon_an' => 'Bánh Mì Thịt Nguội', 'slug_mon_an' => 'banh-mi-thit-nguoi', 'gia_ban' => '20000', 'gia_khuyen_mai' => '18000', 'mo_ta' => 'Ổ bánh mì giòn rụm kẹp thịt nguội, chả lụa, dưa leo, đồ chua và nước tương đặc trưng.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://tamlong.com.vn/wp-content/uploads/day-lam-banh-mi-thit-nguoi-tai-tphcm-3.jpg', 'id_danh_muc' => '6'],

            ['id' => '174', 'ten_mon_an' => 'Bánh Mì Trứng Ốp La', 'slug_mon_an' => 'banh-mi-trung-op-la', 'gia_ban' => '18000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Ổ bánh mì nóng hổi với trứng ốp la lòng đào, rắc tí tiêu và nước tương đậm đà.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://anhquanbakery.com/uploads/product/full_bm8ewt13-1270-banh-mi-op-la-2-trung.jpg', 'id_danh_muc' => '6'],

            ['id' => '175', 'ten_mon_an' => 'Bánh Mì Gà Xé', 'slug_mon_an' => 'banh-mi-ga-xe', 'gia_ban' => '20000', 'gia_khuyen_mai' => '18000', 'mo_ta' => 'Bánh mì kẹp gà xé sợi, pate, rau thơm và tương ớt, thơm ngon và hấp dẫn.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2021/01/CookRecipe/Avatar/banh-mi-ga-truyen-thong-thumbnail.jpg', 'id_danh_muc' => '6'],

            ['id' => '176', 'ten_mon_an' => 'Bánh Mì Xíu Mại', 'slug_mon_an' => 'banh-mi-xiu-mai', 'gia_ban' => '22000', 'gia_khuyen_mai' => '20000', 'mo_ta' => 'Ổ bánh mì giòn ăn kèm xíu mại nóng hổi, nước sốt đậm đà, hành ngò thơm lừng.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn3.ivivu.com/2019/11/banh-mi-xiu-mai-trung-muoi-la-mieng-o-tphcm-ivivu-1.jpg', 'id_danh_muc' => '6'],

            ['id' => '177', 'ten_mon_an' => 'Bánh Mì Bò Nướng', 'slug_mon_an' => 'banh-mi-bo-nuong', 'gia_ban' => '25000', 'gia_khuyen_mai' => '22000', 'mo_ta' => 'Ổ bánh mì kẹp thịt bò nướng mềm thơm, ăn cùng rau và nước sốt đặc biệt.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://xebanhangtop1.vn/wp-content/uploads/2023/08/banh-mi-thit-bo-nuong-2.jpg', 'id_danh_muc' => '6'],

            // Bánh bao
            ['id' => '178', 'ten_mon_an' => 'Bánh Bao Thịt Trứng Cút', 'slug_mon_an' => 'banh-bao-thit-trung-cut', 'gia_ban' => '15000', 'gia_khuyen_mai' => '12000', 'mo_ta' => 'Bánh bao nhân thịt heo trứng cút, vỏ mềm mịn, nóng hổi, thích hợp cho bữa sáng.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.eva.vn/upload/3-2023/images/2023-07-13/1689215492-446-cach-lam-banh-bao-nhan-thit-trung-cut-tai-nha-cuc-ngon-xop-mem-khong-bi-cung-1-1689215346-606-width700height560-1689215492-width700height560.jpg', 'id_danh_muc' => '6'],

            // Bánh ngọt
            ['id' => '179', 'ten_mon_an' => 'Bánh Su Kem', 'slug_mon_an' => 'banh-su-kem', 'gia_ban' => '10000', 'gia_khuyen_mai' => '8000', 'mo_ta' => 'Bánh su kem nhân sữa béo ngậy, vỏ mềm, thơm mùi bơ và vani, rất được yêu thích.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://gcs.tripi.vn/public-tripi/tripi-feed/img/473667ffg/tiem-banh-su-kem-ngon-va-hut-khach-nhat-o-da-nang-966482.jpg', 'id_danh_muc' => '28'],

            ['id' => '180', 'ten_mon_an' => 'Bánh Donut Socola', 'slug_mon_an' => 'banh-donut-socola', 'gia_ban' => '12000', 'gia_khuyen_mai' => '10000', 'mo_ta' => 'Bánh donut phủ socola thơm lừng, ngọt nhẹ, mềm xốp – món tráng miệng cực hút giới trẻ.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://file.hstatic.net/200000079049/file/lam-banh-donut_f0fd523d1a074c94b7ba3c85bbb028e8.jpg', 'id_danh_muc' => '28'],

            // Đồ uống
            ['id' => '181', 'ten_mon_an' => 'Sữa Hộp Vinamilk', 'slug_mon_an' => 'sua-hop-vinamilk', 'gia_ban' => '10000', 'gia_khuyen_mai' => '8000', 'mo_ta' => 'Sữa hộp Vinamilk 180ml bổ dưỡng, thơm ngon, cung cấp năng lượng cho ngày mới.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://bizweb.dktcdn.net/100/514/431/products/sua-tuoi-tiet-trung-it-duong-vinamilk-100-sua-tuoi-hop-1-lit-202403281408504668.jpg?v=1726281444490', 'id_danh_muc' => '28'],

            ['id' => '182', 'ten_mon_an' => 'Nước Suối Aquafina', 'slug_mon_an' => 'nuoc-suoi-aquafina', 'gia_ban' => '8000', 'gia_khuyen_mai' => '6000', 'mo_ta' => 'Nước suối tinh khiết Aquafina 500ml, vị thanh mát, thích hợp khi đi học, đi làm.', 'id_quan_an' => '15', 'tinh_trang' => '1', 'hinh_anh' => 'https://images-handler.kamereo.vn/supplier/654/PRODUCT_IMAGE/05163eb7-3a28-40c8-a10b-02abb6bd2a3f.jpg', 'id_danh_muc' => '28'],


            // 🍜 Quán Bánh Canh
            ['id' => '183', 'ten_mon_an' => 'Bánh Canh Chả Cá', 'slug_mon_an' => 'banh-canh-cha-ca', 'gia_ban' => '30000', 'gia_khuyen_mai' => '27000', 'mo_ta' => 'Tô bánh canh chả cá Đà Nẵng với nước dùng ngọt thanh từ xương, chả cá dai ngon chuẩn vị miền Trung.', 'id_quan_an' => '10', 'tinh_trang' => '1', 'hinh_anh' => 'https://phamnghia.vn/wp-content/uploads/2024/03/8-2.png', 'id_danh_muc' => '28'],

            ['id' => '184', 'ten_mon_an' => 'Bánh Canh Giò Heo', 'slug_mon_an' => 'banh-canh-gio-heo', 'gia_ban' => '35000', 'gia_khuyen_mai' => '32000', 'mo_ta' => 'Bánh canh với giò heo hầm mềm, nước lèo đậm đà, hành lá và tiêu cay nồng hấp dẫn.', 'id_quan_an' => '10', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn2.fptshop.com.vn/unsafe/Uploads/images/tin-tuc/169299/Originals/banh-canh-gio-heo-1.jpg', 'id_danh_muc' => '28'],

            ['id' => '185', 'ten_mon_an' => 'Bánh Canh Cua', 'slug_mon_an' => 'banh-canh-cua', 'gia_ban' => '40000', 'gia_khuyen_mai' => '37000', 'mo_ta' => 'Bánh canh cua sền sệt, thịt cua tươi, gạch cua béo ngậy, nước lèo ngọt đậm hương vị biển.', 'id_quan_an' => '10', 'tinh_trang' => '1', 'hinh_anh' => 'https://mia.vn/media/uploads/blog-du-lich/banh-canh-cua-5-1739886217.jpg', 'id_danh_muc' => '28'],

            ['id' => '186', 'ten_mon_an' => 'Bánh Canh Cá Lóc', 'slug_mon_an' => 'banh-canh-ca-loc', 'gia_ban' => '32000', 'gia_khuyen_mai' => '29000', 'mo_ta' => 'Tô bánh canh cá lóc nóng hổi với thịt cá tươi ngọt, nước lèo trong thanh vị, hành phi thơm nức.', 'id_quan_an' => '10', 'tinh_trang' => '1', 'hinh_anh' => 'https://statics.vinpearl.com/banh-canh-ca-loc-da-nang-4_1701862936.jpg', 'id_danh_muc' => '28'],

            ['id' => '187', 'ten_mon_an' => 'Bánh Canh Tôm Thịt', 'slug_mon_an' => 'banh-canh-tom-thit', 'gia_ban' => '35000', 'gia_khuyen_mai' => '32000', 'mo_ta' => 'Bánh canh kết hợp tôm tươi và thịt heo, nước dùng béo ngậy và dậy mùi tiêu hành.', 'id_quan_an' => '10', 'tinh_trang' => '1', 'hinh_anh' => 'https://photo.znews.vn/w660/Uploaded/spivpdiv/2021_09_16/227329956_10159354576722649_6304000075704861363_n_1.jpeg', 'id_danh_muc' => '28'],

            ['id' => '188', 'ten_mon_an' => 'Bánh Canh Hầm Xương', 'slug_mon_an' => 'banh-canh-ham-xuong', 'gia_ban' => '33000', 'gia_khuyen_mai' => '30000', 'mo_ta' => 'Nước dùng hầm từ xương ống ngọt tự nhiên, sợi bánh canh dai mềm, ăn kèm hành và tiêu cay.', 'id_quan_an' => '10', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/kien-thuc/cach-nau-banh-canh-bot-loc-xuong-heo/cach-nau-banh-canh-bot-loc-xuong-heo-6.jpg', 'id_danh_muc' => '28'],

            // Quẩy ăn kèm
            ['id' => '189', 'ten_mon_an' => 'Quẩy Nóng', 'slug_mon_an' => 'quay-nong', 'gia_ban' => '7000', 'gia_khuyen_mai' => '5000', 'mo_ta' => 'Quẩy vàng giòn, nóng hổi, ăn kèm bánh canh hoặc cháo đều ngon tuyệt.', 'id_quan_an' => '10', 'tinh_trang' => '1', 'hinh_anh' => 'https://cuonnroll.com/wp-content/uploads/2018/07/cuonnroll-cach-lam-quay-nong1.jpg.webp', 'id_danh_muc' => '28'],

            // Nước uống
            ['id' => '190', 'ten_mon_an' => 'Trà Đá Ly', 'slug_mon_an' => 'tra-da-ly', 'gia_ban' => '3000', 'gia_khuyen_mai' => '0', 'mo_ta' => 'Ly trà đá mát lạnh giúp giải nhiệt, dùng kèm món bánh canh thêm trọn vị.', 'id_quan_an' => '10', 'tinh_trang' => '1', 'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1NfA7JZ6Kc6AkaB_iqcqeii__RMXZVAH3UQ&s', 'id_danh_muc' => '28'],

            ['id' => '191', 'ten_mon_an' => 'Sữa Đậu Nành', 'slug_mon_an' => 'sua-dau-nanh', 'gia_ban' => '10000', 'gia_khuyen_mai' => '8000', 'mo_ta' => 'Ly sữa đậu nành thơm béo, thanh mát, thích hợp dùng buổi sáng hoặc tối.', 'id_quan_an' => '10', 'tinh_trang' => '1', 'hinh_anh' => 'https://dayphache.edu.vn/wp-content/uploads/2015/05/cd66a7a18d37d7e5dd969c249e9a1ecb.jpg', 'id_danh_muc' => '28'],

            ['id' => '192', 'ten_mon_an' => 'Nước Suối Lavie', 'slug_mon_an' => 'nuoc-suoi-lavie', 'gia_ban' => '8000', 'gia_khuyen_mai' => '6000', 'mo_ta' => 'Chai nước suối Lavie 500ml tinh khiết, bổ sung nước cho cơ thể mọi lúc.', 'id_quan_an' => '10', 'tinh_trang' => '1', 'hinh_anh' => 'https://product.hstatic.net/1000141988/product/lavie_500_ml_3397317a276b4cca9164357bd17ae96a_master.png', 'id_danh_muc' => '28'],


            // 🥗 Quán Chay
            ['id' => '193', 'ten_mon_an' => 'Cơm Chay Thập Cẩm', 'slug_mon_an' => 'com-chay-thap-cam', 'gia_ban' => '35000', 'gia_khuyen_mai' => '32000', 'mo_ta' => 'Phần cơm chay gồm đậu hũ, chả chay, rau củ xào và nấm kho tiêu, thanh đạm mà đầy đủ dinh dưỡng.', 'id_quan_an' => '13', 'tinh_trang' => '1', 'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5zAA_M_iQY9jd8jSCtre3nnScCbQthhBTYw&s', 'id_danh_muc' => '28'],

            ['id' => '194', 'ten_mon_an' => 'Bún Huế Chay', 'slug_mon_an' => 'bun-hue-chay', 'gia_ban' => '30000', 'gia_khuyen_mai' => '27000', 'mo_ta' => 'Tô bún Huế chay thơm ngon với nước dùng từ rau củ, chả chay, đậu hũ và sa tế cay nhẹ.', 'id_quan_an' => '13', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/kien-thuc/cach-nau-bun-bo-hue-chay/cach-nau-bun-bo-hue-chay-3.jpg', 'id_danh_muc' => '28'],

            ['id' => '195', 'ten_mon_an' => 'Mì Xào Chay', 'slug_mon_an' => 'mi-xao-chay', 'gia_ban' => '28000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Mì xào với rau củ, nấm, đậu hũ và xốt đậu nành, đậm vị mà không ngán.', 'id_quan_an' => '13', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn2.fptshop.com.vn/unsafe/1920x0/filters:format(webp):quality(75)/2023_12_24_638390071277807708_mi-xao-chay.jpg', 'id_danh_muc' => '28'],

            ['id' => '196', 'ten_mon_an' => 'Đậu Hũ Sốt Nấm', 'slug_mon_an' => 'dau-hu-sot-nam', 'gia_ban' => '25000', 'gia_khuyen_mai' => '22000', 'mo_ta' => 'Đậu hũ mềm mịn sốt cùng nấm đông cô và rau củ, nước sốt đậm đà, ăn cùng cơm nóng.', 'id_quan_an' => '13', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2021/08/04/1372963/cach-lam-dau-hu-non-sot-nam-dong-co-thom-ngon-cho-bua-com-thanh-tinh-202108042232462235.jpg', 'id_danh_muc' => '28'],

            // Nước giải khát
            ['id' => '197', 'ten_mon_an' => 'Nước Sâm Rong Biển', 'slug_mon_an' => 'nuoc-sam-rong-bien', 'gia_ban' => '12000', 'gia_khuyen_mai' => '10000', 'mo_ta' => 'Nước sâm rong biển thanh mát, giúp giải nhiệt và thanh lọc cơ thể.', 'id_quan_an' => '13', 'tinh_trang' => '1', 'hinh_anh' => 'https://beptruong.edu.vn/wp-content/uploads/2019/01/sam-rong-bien.jpg', 'id_danh_muc' => '28'],

            ['id' => '198', 'ten_mon_an' => 'Trà Chanh Mật Ong', 'slug_mon_an' => 'tra-chanh-mat-ong', 'gia_ban' => '15000', 'gia_khuyen_mai' => '12000', 'mo_ta' => 'Trà chanh mật ong thơm dịu, vị chua ngọt hài hòa, giúp tỉnh táo và làm mát cơ thể.', 'id_quan_an' => '13', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn2.fptshop.com.vn/unsafe/2024_2_28_638446795384564175_batch_huong-dan-pha-tra-chanh-mat-ong.jpg', 'id_danh_muc' => '28'],

            ['id' => '199', 'ten_mon_an' => 'Sữa Hạt Óc Chó', 'slug_mon_an' => 'sua-hat-oc-cho', 'gia_ban' => '18000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Ly sữa hạt óc chó thơm béo, bổ dưỡng, cung cấp năng lượng lành mạnh cho cơ thể.', 'id_quan_an' => '13', 'tinh_trang' => '1', 'hinh_anh' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYoxgbVwR2QfGHSj8AFawvG4G6s7LSXvhZ2A&s', 'id_danh_muc' => '28'],


            // 🍗 Quán Gà Jollibee
            ['id' => '200', 'ten_mon_an' => 'Gà Rán Giòn Cay', 'slug_mon_an' => 'ga-ran-gion-cay', 'gia_ban' => '45000', 'gia_khuyen_mai' => '42000', 'mo_ta' => 'Miếng gà rán Jollibee giòn tan, vị cay nhẹ đặc trưng, lớp da vàng ruộm hấp dẫn.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2018/12/18/1138838/cung-thuc-hien-mon-ga-cay-han-quoc-cuc-ky-dua-com-202209051440125046.jpg', 'id_danh_muc' => '41'],

            ['id' => '201', 'ten_mon_an' => 'Gà Rán Truyền Thống', 'slug_mon_an' => 'ga-ran-truyen-thong', 'gia_ban' => '42000', 'gia_khuyen_mai' => '40000', 'mo_ta' => 'Miếng gà rán truyền thống giòn bên ngoài, mềm ngọt bên trong, hương vị quen thuộc của Jollibee.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://heemangchicken.vn/public/upload/sanpham/Changnamchicken6897.jpg', 'id_danh_muc' => '41'],

            ['id' => '202', 'ten_mon_an' => 'Gà Sốt Cay Ngọt', 'slug_mon_an' => 'ga-sot-cay-ngot', 'gia_ban' => '48000', 'gia_khuyen_mai' => '45000', 'mo_ta' => 'Gà chiên giòn phủ lớp sốt cay ngọt đậm đà, kích thích vị giác, ăn kèm cơm hoặc khoai.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2021/08/CookRecipe/GalleryStep/thanh-pham-1617.jpg', 'id_danh_muc' => '41'],

            ['id' => '203', 'ten_mon_an' => 'Cơm Gà Sốt Tiêu Đen', 'slug_mon_an' => 'com-ga-sot-tieu-den', 'gia_ban' => '50000', 'gia_khuyen_mai' => '47000', 'mo_ta' => 'Phần cơm nóng hổi với miếng gà rán giòn rưới sốt tiêu đen đậm đà đặc trưng Jollibee.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://product.hstatic.net/200000523823/product/com_ga_sot_tieu_den__lon__e73362e0a04c480eabf72b6c93f7a7fc_master.jpg', 'id_danh_muc' => '48'],

            ['id' => '204', 'ten_mon_an' => 'Combo Gà Rán + Khoai + Nước', 'slug_mon_an' => 'combo-ga-ran-khoai-nuoc', 'gia_ban' => '75000', 'gia_khuyen_mai' => '70000', 'mo_ta' => 'Combo tiện lợi gồm 1 miếng gà rán, khoai tây chiên giòn và nước ngọt tươi mát.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://product.hstatic.net/200000605103/product/combo-s2_66360023ebd34eb6a9ebb2cb42fe9564.png', 'id_danh_muc' => '41'],

            ['id' => '205', 'ten_mon_an' => 'Nước Dừa Trân châu', 'slug_mon_an' => 'nuoc-dua-tran-chau', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Nước dừa tươi nguyên chất kết hợp với trân châu đen dẻo dai, tạo nên thức uống vừa thanh mát vừa có độ ngọt và dai thú vị khi thưởng thức.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2021/05/CookRecipe/Avatar/nuoc-dua-tran-chau-dua-thumbnail-1.jpg', 'id_danh_muc' => '19'],

            ['id' => '206', 'ten_mon_an' => 'Dừa Kem Sữa', 'slug_mon_an' => 'dua-kem-sua', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Thức uống từ nước dừa và cơm dừa non xay mịn với sữa và đường, tạo nên món kem sữa dừa mát lạnh, béo ngậy và thơm ngon.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2020/03/25/1244397/cach-lam-kem-dua-thom-ngon-tai-nha-bang-may-xay-sinh-to-202003251607205717.jpg', 'id_danh_muc' => '33'],

            ['id' => '207', 'ten_mon_an' => 'Cacao nóng', 'slug_mon_an' => 'cacao-nong', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Thức uống nóng từ bột cacao nguyên chất, sữa và đường, tạo nên hương vị đậm đà, thơm nồng, ấm áp, phù hợp cho những ngày se lạnh.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://vietblend.vn/wp-content/uploads/2016/10/0a99b4cc1da4fbfaa2b5.jpg', 'id_danh_muc' => '13'],

            ['id' => '208', 'ten_mon_an' => 'Cacao đá', 'slug_mon_an' => 'cacao-da', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Thức uống từ bột cacao nguyên chất, sữa và đường, phục vụ với đá, tạo nên hương vị đậm đà, thơm nồng nhưng mát lạnh, giải khát hiệu quả.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2021/11/CookRecipe/Avatar/ca-cao-da-thumbnail.png', 'id_danh_muc' => '13'],

            ['id' => '209', 'ten_mon_an' => 'Cacao kem trứng', 'slug_mon_an' => 'cacao-kem-trung', 'gia_ban' => '20000', 'gia_khuyen_mai' => '15000', 'mo_ta' => 'Thức uống từ bột cacao nguyên chất kết hợp với lớp kem trứng béo ngậy bên trên, tạo nên hương vị đặc biệt thơm ngon và hấp dẫn.', 'id_quan_an' => '16', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/2021/10/CookRecipe/Avatar/cacao-trung-thumbnail.jpg', 'id_danh_muc' => '13'],

            // sabichuong

            ['id' => '210', 'ten_mon_an' => 'Cơm Tấm Sườn', 'slug_mon_an' => 'com-tam-suon', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Cơm tấm thơm ngon với miếng sườn nướng thấm vị, ăn kèm đồ chua, mỡ hành và nước mắm chua ngọt đặc trưng.', 'id_quan_an' => '1', 'tinh_trang' => '1', 'hinh_anh' => 'https://lamsonfood.com/wp-content/uploads/2022/02/com-tam-duoc-nhieu-nguoi-yeu-thich.jpg', 'id_danh_muc' => '22'],

            ['id' => '211', 'ten_mon_an' => 'Cơm Tấm Sườn Nướng', 'slug_mon_an' => 'com-tam-suon-nuong', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Cơm tấm với sườn nướng thơm lừng, vị ngọt của thịt kết hợp với mùi thơm của than hoa, ăn kèm đồ chua và nước mắm.', 'id_quan_an' => '1', 'tinh_trang' => '1', 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2021/08/09/1373996/tu-lam-com-tam-suon-trung-don-gian-thom-ngon-nhu-ngoai-hang-202201071248422991.jpg', 'id_danh_muc' => '22'],

            ['id' => '212', 'ten_mon_an' => 'Cơm Gà Xé', 'slug_mon_an' => 'com-ga-xe', 'gia_ban' => '30000', 'gia_khuyen_mai' => '25000', 'mo_ta' => 'Cơm trắng thơm ngon với thịt gà luộc xé nhỏ, thấm vị, ăn kèm rau răm, hành phi và nước mắm chua ngọt đặc biệt.', 'id_quan_an' => '1', 'tinh_trang' => '1', 'hinh_anh' => 'https://phugiafood.com/wp-content/uploads/2021/11/Com-ga-xe-phay-1-1024x768.jpg', 'id_danh_muc' => '20'],

            ['id' => '213', 'ten_mon_an' => 'Cơm Chiên Dương Châu', 'slug_mon_an' => 'com-chien-duong-chau', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Cơm chiên với nhiều loại nguyên liệu như thịt xá xíu, trứng, đậu Hà Lan, cà rốt... tạo nên món ăn đầy màu sắc và hương vị đặc trưng.', 'id_quan_an' => '1', 'tinh_trang' => '1', 'hinh_anh' => 'https://i.ytimg.com/vi/ZbSbc9Z8K6E/maxresdefault.jpg', 'id_danh_muc' => '23'],

            ['id' => '214', 'ten_mon_an' => 'Cơm Đùi Gà Quay', 'slug_mon_an' => 'com-dui-ga-quay', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Cơm trắng thơm ngon ăn kèm đùi gà quay giòn bên ngoài, mềm ngọt bên trong, thấm vị gia vị đặc trưng, phục vụ cùng nước mắm chua ngọt.', 'id_quan_an' => '1', 'tinh_trang' => '1', 'hinh_anh' => 'https://hoangviettravel.vn/wp-content/uploads/2024/11/com-tho-da-nang2.jpg', 'id_danh_muc' => '23'],

            ['id' => '215', 'ten_mon_an' => 'Cơm Cánh Gà Quay', 'slug_mon_an' => 'com-canh-ga-quay', 'gia_ban' => '40000', 'gia_khuyen_mai' => '35000', 'mo_ta' => 'Cơm trắng thơm ngon ăn kèm cánh gà quay giòn thơm, thấm vị gia vị, da giòn thịt mềm, phục vụ cùng nước mắm chua ngọt.', 'id_quan_an' => '1', 'tinh_trang' => '1', 'hinh_anh' => 'https://burgerking.vn/media/catalog/product/cache/1/image/1800x/040ec09b1e35df139433887a97daa66f/g/a/ga_nuong_sot_bbq.jpg', 'id_danh_muc' => '23'],


        ]);
    }
}
