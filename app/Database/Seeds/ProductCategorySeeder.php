<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class ProductCategorySeeder extends Seeder
{
public function run()
{
$data = [
[
'name' => 'Elektronik',
'description' => 'Barang-barang elektronik seperti TV, laptop,
dll.',
'created_at' => date('Y-m-d H:i:s'),
'updated_at' => date('Y-m-d H:i:s'),
],
[
'name' => 'Pakaian',
'description' => 'Kemeja, celana, jaket, dan lainnya.',
'created_at' => date('Y-m-d H:i:s'),
'updated_at' => date('Y-m-d H:i:s'),
],
[
'name' => 'Makanan',
'description' => 'Produk makanan instan dan segar.',
'created_at' => date('Y-m-d H:i:s'),
'updated_at' => date('Y-m-d H:i:s'),
],
];
$this->db->table('product_category')->insertBatch($data);
}
}