<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsListsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // Food products
            [
                'codePro' => 'SP001',
                'name' => 'Mì ăn liền Hảo Hảo tôm chua cay',
                'codeSup' => 'NCC015', // Acecook Việt Nam
            ],
            [
                'codePro' => 'SP002',
                'name' => 'Bánh gạo One One vị rong biển',
                'codeSup' => 'NCC001', // Thực phẩm Á Châu
            ],
            [
                'codePro' => 'SP003',
                'name' => 'Sữa tươi Vinamilk có đường 180ml',
                'codeSup' => 'NCC014', // Vinamilk
            ],
            [
                'codePro' => 'SP004',
                'name' => 'Nước mắm Nam Ngư loại 1',
                'codeSup' => 'NCC010', // Thủy sản Minh Phú
            ],
            [
                'codePro' => 'SP005',
                'name' => 'Dầu ăn Neptune loại 1 lít',
                'codeSup' => 'NCC001', // Thực phẩm Á Châu
            ],
            [
                'codePro' => 'SP006',
                'name' => 'Bia Saigon Special chai 330ml',
                'codeSup' => 'NCC016', // Bia Sài Gòn
            ],
            [
                'codePro' => 'SP007',
                'name' => 'Đường trắng Biên Hòa gói 1kg',
                'codeSup' => 'NCC018', // Đường Biên Hòa
            ],
            [
                'codePro' => 'SP008',
                'name' => 'Bột giặt Omo hương nắng mới',
                'codeSup' => 'NCC008', // Bao bì Toàn Cầu
            ],
            [
                'codePro' => 'SP009',
                'name' => 'Kẹo dẻo Hồng Hà vị trái cây',
                'codeSup' => 'NCC001', // Thực phẩm Á Châu
            ],
            [
                'codePro' => 'SP010',
                'name' => 'Nước ngọt Coca Cola chai 1.5 lít',
                'codeSup' => 'NCC002', // Đồ uống Quốc tế
            ],
            // Household products
            [
                'codePro' => 'SP011',
                'name' => 'Bàn chải đánh răng P/S',
                'codeSup' => 'NCC012', // Nhựa Thiếu niên Tiền Phong
            ],
            [
                'codePro' => 'SP012',
                'name' => 'Giấy cuộn Vĩnh Tiến',
                'codeSup' => 'NCC017', // Giấy Vĩnh Tiến
            ],
            [
                'codePro' => 'SP013',
                'name' => 'Bỉm trẻ em Bobby',
                'codeSup' => 'NCC006', // Điện tử Thành Công
            ],
            [
                'codePro' => 'SP014',
                'name' => 'Nước rửa chén Sunlight',
                'codeSup' => 'NCC008', // Bao bì Toàn Cầu
            ],
            [
                'codePro' => 'SP015',
                'name' => 'Bột canh Hải Châu',
                'codeSup' => 'NCC010', // Thủy sản Minh Phú
            ],
            // Personal care
            [
                'codePro' => 'SP016',
                'name' => 'Dầu gội Clear Men',
                'codeSup' => 'NCC013', // Điện máy Xanh
            ],
            [
                'codePro' => 'SP017',
                'name' => 'Sữa tắm Lifebuoy',
                'codeSup' => 'NCC013', // Điện máy Xanh
            ],
            [
                'codePro' => 'SP018',
                'name' => 'Kem đánh răng Colgate',
                'codeSup' => 'NCC012', // Nhựa Thiếu niên Tiền Phong
            ],
            [
                'codePro' => 'SP019',
                'name' => 'Băng vệ sinh Diana',
                'codeSup' => 'NCC003', // Vật tư Y tế Việt Mỹ
            ],
            [
                'codePro' => 'SP020',
                'name' => 'Nước muối sinh lý Natri Clorid 0.9%',
                'codeSup' => 'NCC009', // Dược phẩm Trung ương 3
            ],
        ];

        foreach ($products as $product) {
            DB::table('products_lists')->insert([
                'codePro' => $product['codePro'],
                'name' => $product['name'],
                'codeSup' => $product['codeSup'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}