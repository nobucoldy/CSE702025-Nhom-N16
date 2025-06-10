<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuppliersTableSeeder extends Seeder
{
    public function run()
    {
        $suppliers = [
            [
                'codeSup' => 'NCC001',
                'supplier' => 'Công ty TNHH Thực phẩm Á Châu',
                'address' => 'Số 12, đường Lê Lợi, Quận 1, TP.HCM',
            ],
            [
                'codeSup' => 'NCC002',
                'supplier' => 'Công ty CP Đồ uống Quốc tế',
                'address' => 'Khu công nghiệp Biên Hòa, Đồng Nai',
            ],
            [
                'codeSup' => 'NCC003',
                'supplier' => 'Công ty TNHH Vật tư Y tế Việt Mỹ',
                'address' => 'Lô B5, Khu công nghiệp Tiên Sơn, Bắc Ninh',
            ],
            [
                'codeSup' => 'NCC004',
                'supplier' => 'Công ty Dệt may Hòa Thọ',
                'address' => 'Số 45, đường Nguyễn Văn Linh, Đà Nẵng',
            ],
            [
                'codeSup' => 'NCC005',
                'supplier' => 'Công ty CP Vật liệu xây dựng Hà Nội',
                'address' => 'Phường Minh Khai, Quận Bắc Từ Liêm, Hà Nội',
            ],
            [
                'codeSup' => 'NCC006',
                'supplier' => 'Công ty TNHH Điện tử Thành Công',
                'address' => 'Khu công nghệ cao, Quận 9, TP.HCM',
            ],
            [
                'codeSup' => 'NCC007',
                'supplier' => 'Công ty CP Phân bón Hữu cơ',
                'address' => 'Thị trấn Trâu Quỳ, Gia Lâm, Hà Nội',
            ],
            [
                'codeSup' => 'NCC008',
                'supplier' => 'Công ty TNHH Bao bì Toàn Cầu',
                'address' => 'Khu công nghiệp VSIP, Bình Dương',
            ],
            [
                'codeSup' => 'NCC009',
                'supplier' => 'Công ty Dược phẩm Trung ương 3',
                'address' => 'Số 10, đường Tôn Thất Tùng, Hà Nội',
            ],
            [
                'codeSup' => 'NCC010',
                'supplier' => 'Công ty CP Thủy sản Minh Phú',
                'address' => 'Khu công nghiệp Hải Sơn, Hải Phòng',
            ],
            [
                'codeSup' => 'NCC011',
                'supplier' => 'Công ty TNHH Gỗ công nghiệp An Cường',
                'address' => 'Khu công nghiệp Tân Phú Trung, Củ Chi, TP.HCM',
            ],
            [
                'codeSup' => 'NCC012',
                'supplier' => 'Công ty CP Nhựa Thiếu niên Tiền Phong',
                'address' => 'Số 1, đường Lý Thường Kiệt, Hà Nội',
            ],
            [
                'codeSup' => 'NCC013',
                'supplier' => 'Công ty TNHH Điện máy Xanh',
                'address' => 'Số 128, đường Trần Quang Khải, TP.HCM',
            ],
            [
                'codeSup' => 'NCC014',
                'supplier' => 'Công ty CP Sữa Việt Nam (Vinamilk)',
                'address' => 'Số 10, đường Tân Trào, Quận 7, TP.HCM',
            ],
            [
                'codeSup' => 'NCC015',
                'supplier' => 'Công ty TNHH Acecook Việt Nam',
                'address' => 'Khu công nghiệp Tân Phú Trung, Củ Chi, TP.HCM',
            ],
            [
                'codeSup' => 'NCC016',
                'supplier' => 'Công ty CP Bia Sài Gòn - Miền Trung',
                'address' => 'Số 1, đường Nguyễn Chí Thanh, Đà Nẵng',
            ],
            [
                'codeSup' => 'NCC017',
                'supplier' => 'Công ty TNHH Giấy Vĩnh Tiến',
                'address' => 'Khu công nghiệp Bình Chiểu, Thủ Đức, TP.HCM',
            ],
            [
                'codeSup' => 'NCC018',
                'supplier' => 'Công ty CP Đường Biên Hòa',
                'address' => 'Khu công nghiệp Biên Hòa 1, Đồng Nai',
            ],
            [
                'codeSup' => 'NCC019',
                'supplier' => 'Công ty TNHH Xăng dầu Shell Việt Nam',
                'address' => 'Tòa nhà Lim Tower, Quận 3, TP.HCM',
            ],
            [
                'codeSup' => 'NCC020',
                'supplier' => 'Công ty CP Phân bón Bình Điền',
                'address' => 'Số 07, đường Đồng Khởi, TP.HCM',
            ],
        ];

        foreach ($suppliers as $supplier) {
            DB::table('suppliers')->insert([
                'codeSup' => $supplier['codeSup'],
                'supplier' => $supplier['supplier'],
                'address' => $supplier['address'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}