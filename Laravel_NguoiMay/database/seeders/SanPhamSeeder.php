<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sanPhams = [
            [
                'MaThuongHieu' => 1,
                'TenSanPham' => 'Đồng Hồ Nữ Citizen Eco-Drive FE1244-72A 29.4mm',
                'GiaBan' => 7085000,
                'TonKho' => 50,
                'MoTa' => 'Đồng Hồ Tân Tân xin lưu ý thêm, dù thời gian hậu mãi có thể như nhau nhưng tuỳ các Công ty khác nhau sẽ có chất lượng dịch vụ hậu mãi khác nhau. Tại Tân Tân, đội ngũ kỹ thuật được hướng dẫn và đào tạo trực tiếp bởi các chuyên gia từ hãng và Tân Tân cũng là Trung Tâm Bảo Hành được Citizen, Bulova, Movado Group uỷ quyền tại Việt Nam, do đó đồng hồ mua tại Đồng Hồ Tân Tân bảo hành 1 lần đúng kỹ thuật sẽ an tâm sử dụng từ 5 đến 10 năm thậm chí lên đến 20 năm tuỳ theo quá trình sử dụng của mỗi người. Bạn chỉ cần lau dầu, vệ sinh máy hoặc thay pin định kỳ là có thể sử dụng thêm 1 thời gian dài.',
                'HinhAnh' => '01.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'MaThuongHieu' => 1,
                'TenSanPham' => 'Đồng Hồ Nam Citizen Series 8 870 Mechanical NA1004-10E 40.8mm',
                'GiaBan' => 49585000,
                'TonKho' => 30,
                'MoTa' => 'Tất cả các đồng hồ Citizen mua tại Đồng Hồ Tân Tân đều được bảo hành theo hai chính sách, đó là chính sách bảo hành Quốc Tế và chính sách bảo hành tại Tân Tân kể từ ngày mua trong điều kiện cho phép bảo hành.',
                'HinhAnh' => '02.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Các sản phẩm khác...
        ];

        DB::table('san_pham')->insert($sanPhams);
    }
}
