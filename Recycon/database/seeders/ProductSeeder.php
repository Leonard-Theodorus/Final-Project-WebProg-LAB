<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'item_id' => 'ITEM001',
                'product_img' => "https://modpodgerocksblog.com/wp-content/uploads/2012/01/Cell-phone-holder-from-lotion-bottle.jpg.webp",
                'product_name' => "Gantungan HP",
                'description' => "Gantungan HP dari bahan ramah lingkungan",
                'price' => 20000,
                'category' => 'Recycle'
            ],
            [
                'item_id' => 'ITEM002',
                'product_img' => "https://www.springwise.com/wp-content/uploads/2018/07/ecoBirdy_childrens-chair_springwise.jpeg",
                'product_name' => "Charlie Chair",
                'description' => "Charlie chair plastic, produksi tahun 2020",
                'price' => 50000,
                'category' => 'Second'
            ],
            [
                'item_id' => 'ITEM003',
                'product_img' => "https://thumbs.dreamstime.com/z/products-made-recycled-kraft-paperand-wood-packages-notebook-disposable-coffee-
                cup-wooden-heart-cord-concept-environmental-171409246.jpg",
                'product_name' => "Paper Craft",
                'description' => "Paper craft terbuat dari bahan ramah lingkungan",
                'price' => 70000,
                'category' => 'Recycle'
            ],
            [
                'item_id' => 'ITEM004',
                'product_img' => "https://www.temankreasi.com/asset/images/gambar/3.jpg",
                'product_name' => "Pembatas Buku",
                'description' => "Pembatas buku lucu-lucu, harga murah meriah terbuat dari bahan ramah lingkungan",
                'price' => 15000,
                'category' => 'Recycle'
            ],
            [
                'item_id' => 'ITEM005',
                'product_img' => "https://ceklist.id/wp-content/uploads/2022/02/Alat-Pembolong-Kertas-Perforator.jpg",
                'product_name' => "Pembolong Kertas",
                'description' => "Pembolong kertas bekas, kualitas original",
                'price' => 60000,
                'category' => 'Second'
            ],
            [
                'item_id' => 'ITEM006',
                'product_img' => "https://i0.wp.com/kayu-seru.com/wp-content/uploads/2020/10/Meja-Belajar-Kayu.jpg?fit=600%2C600&ssl=1",
                'product_name' => "Meja Belajar Kecil",
                'description' => "Meja belajar bekas ukuran kecil, terbuat 100% dari kayu asli",
                'price' => 100000,
                'category' => 'Second'
            ]

        ];
        DB::table('products')->insert($products);
    }
}
