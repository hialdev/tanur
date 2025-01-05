<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MerchandiseSeeder extends Seeder
{
    public function run()
    {
        DB::table('merchandises')->insert([
            [
                'title' => 'Baju Koko Premium',
                'slug' => Str::slug('Baju Koko Premium'),
                'price' => 250000,
                'tokopedia_link' => 'https://tokopedia.com/baju-koko-premium',
                'shopee_link' => 'https://shopee.com/baju-koko-premium',
                'tiktok_link' => 'https://tiktok.com/@store/baju-koko-premium',
                'image' => 'https://placehold.co/300',
                'images' => json_encode(['baju-koko1.jpg', 'baju-koko2.jpg']),
                'content' => '
                    <h2>Deskripsi Produk</h2>
                    <p>Baju Koko Premium terbuat dari bahan berkualitas tinggi yang nyaman digunakan untuk ibadah dan acara formal.</p>
                    <ul>
                        <li>Material: Katun Premium</li>
                        <li>Warna: Putih, Abu-abu, Hitam</li>
                        <li>Ukuran: S, M, L, XL</li>
                    </ul>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Gamis Wanita Elegan',
                'slug' => Str::slug('Gamis Wanita Elegan'),
                'price' => 300000,
                'tokopedia_link' => 'https://tokopedia.com/gamis-elegan',
                'shopee_link' => 'https://shopee.com/gamis-elegan',
                'tiktok_link' => 'https://tiktok.com/@store/gamis-elegan',
                'image' => 'https://placehold.co/400',
                'images' => json_encode(['gamis-elegan1.jpg', 'gamis-elegan2.jpg']),
                'content' => '
                    <h2>Keunggulan Produk</h2>
                    <p>Gamis Wanita Elegan ini dirancang khusus untuk kenyamanan saat beribadah dan menghadiri acara Islami.</p>
                    <ul>
                        <li>Material: Satin Premium</li>
                        <li>Warna: Maroon, Navy, Pink</li>
                        <li>Free Jilbab Satu Set</li>
                    </ul>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kurma Ajwa Premium',
                'slug' => Str::slug('Kurma Ajwa Premium'),
                'price' => 150000,
                'tokopedia_link' => 'https://tokopedia.com/kurma-ajwa',
                'shopee_link' => 'https://shopee.com/kurma-ajwa',
                'tiktok_link' => 'https://tiktok.com/@store/kurma-ajwa',
                'image' => 'https://placehold.co/360',
                'images' => json_encode(['kurma-ajwa1.jpg', 'kurma-ajwa2.jpg']),
                'content' => '
                    <h2>Manfaat Kurma Ajwa</h2>
                    <p>Kurma Ajwa memiliki rasa manis alami dan kaya akan nutrisi yang bermanfaat untuk kesehatan.</p>
                    <ul>
                        <li>Meningkatkan energi tubuh.</li>
                        <li>Kaya serat untuk pencernaan sehat.</li>
                        <li>Sumber vitamin dan mineral alami.</li>
                    </ul>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kain Ihram Premium',
                'slug' => Str::slug('Kain Ihram Premium'),
                'price' => 200000,
                'tokopedia_link' => 'https://tokopedia.com/kain-ihram',
                'shopee_link' => 'https://shopee.com/kain-ihram',
                'tiktok_link' => 'https://tiktok.com/@store/kain-ihram',
                'image' => 'https://placehold.co/390',
                'images' => json_encode(['kain-ihram1.jpg', 'kain-ihram2.jpg']),
                'content' => '
                    <h2>Kelebihan Kain Ihram</h2>
                    <p>Kain Ihram Premium ini dirancang untuk kenyamanan selama menjalankan ibadah haji atau umrah.</p>
                    <ul>
                        <li>Bahan lembut dan nyaman di kulit.</li>
                        <li>Menyerap keringat dengan baik.</li>
                        <li>Ukuran universal.</li>
                    </ul>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tasbih Elektrik Digital',
                'slug' => Str::slug('Tasbih Elektrik Digital'),
                'price' => 75000,
                'tokopedia_link' => 'https://tokopedia.com/tasbih-digital',
                'shopee_link' => 'https://shopee.com/tasbih-digital',
                'tiktok_link' => 'https://tiktok.com/@store/tasbih-digital',
                'image' => 'https://placehold.co/500',
                'images' => json_encode(['tasbih-digital1.jpg', 'tasbih-digital2.jpg']),
                'content' => '
                    <h2>Fitur Produk</h2>
                    <p>Tasbih Elektrik Digital memudahkan Anda menghitung zikir dengan praktis dan akurat.</p>
                    <ul>
                        <li>Display digital untuk penghitungan zikir.</li>
                        <li>Ukuran kecil dan ringan, mudah dibawa.</li>
                        <li>Material berkualitas tahan lama.</li>
                    </ul>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bingkisan Umrah Spesial',
                'slug' => Str::slug('Bingkisan Umrah Spesial'),
                'price' => 500000,
                'tokopedia_link' => 'https://tokopedia.com/bingkisan-umrah',
                'shopee_link' => 'https://shopee.com/bingkisan-umrah',
                'tiktok_link' => 'https://tiktok.com/@store/bingkisan-umrah',
                'image' => 'https://placehold.co/430',
                'images' => json_encode(['bingkisan-umrah1.jpg', 'bingkisan-umrah2.jpg']),
                'content' => '
                    <h2>Isi Bingkisan</h2>
                    <p>Bingkisan Umrah Spesial ini cocok sebagai hadiah untuk keluarga yang akan berangkat umrah.</p>
                    <ul>
                        <li>Al-Quran Saku</li>
                        <li>Kain Ihram</li>
                        <li>Air Zam-Zam 5L</li>
                    </ul>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cokelat Arab Premium',
                'slug' => Str::slug('Cokelat Arab Premium'),
                'price' => 120000,
                'tokopedia_link' => 'https://tokopedia.com/cokelat-arab',
                'shopee_link' => 'https://shopee.com/cokelat-arab',
                'tiktok_link' => 'https://tiktok.com/@store/cokelat-arab',
                'image' => 'https://placehold.co/520',
                'images' => json_encode(['cokelat-arab1.jpg', 'cokelat-arab2.jpg']),
                'content' => '
                    <h2>Kenikmatan Cokelat Arab</h2>
                    <p>Cokelat Arab Premium dengan rasa khas dan tekstur lembut, cocok untuk menemani momen berharga Anda.</p>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Minyak Wangi Kasturi',
                'slug' => Str::slug('Minyak Wangi Kasturi'),
                'price' => 100000,
                'tokopedia_link' => 'https://tokopedia.com/minyak-kasturi',
                'shopee_link' => 'https://shopee.com/minyak-kasturi',
                'tiktok_link' => 'https://tiktok.com/@store/minyak-kasturi',
                'image' => 'https://placehold.co/510',
                'images' => json_encode(['minyak-kasturi1.jpg', 'minyak-kasturi2.jpg']),
                'content' => '
                    <h2>Aroma Kasturi</h2>
                    <p>Minyak wangi kasturi dengan aroma yang menenangkan, sesuai sunnah Rasulullah SAW.</p>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
