<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run()
    {
        DB::table('news')->insert([
            [
                'title' => 'Persiapan Ibadah Haji: Tips dan Panduan',
                'slug' => Str::slug('Persiapan Ibadah Haji: Tips dan Panduan'),
                'excerpt' => 'Panduan penting bagi jamaah yang akan menunaikan ibadah haji.',
                'image' => 'persiapan-haji.jpg',
                'content' => '
                    <h2>Persiapan Fisik dan Mental</h2>
                    <p>Ibadah haji adalah perjalanan spiritual yang memerlukan persiapan fisik dan mental. Jamaah disarankan untuk menjaga kesehatan dan memperbanyak ibadah sebelum keberangkatan.</p>
                    <ul>
                        <li>Periksa kesehatan secara rutin.</li>
                        <li>Lakukan olahraga ringan seperti jalan kaki.</li>
                        <li>Perbanyak doa dan zikir.</li>
                    </ul>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Keutamaan Ibadah Umrah di Bulan Ramadhan',
                'slug' => Str::slug('Keutamaan Ibadah Umrah di Bulan Ramadhan'),
                'excerpt' => 'Melaksanakan umrah di bulan Ramadhan memiliki pahala yang luar biasa.',
                'image' => 'umrah-ramadhan.jpg',
                'content' => '
                    <h2>Pahala Setara Haji</h2>
                    <p>Umrah di bulan Ramadhan memiliki keutamaan yang besar, bahkan disebut setara dengan pahala haji.</p>
                    <blockquote>“Umrah pada bulan Ramadhan sama dengan haji bersamaku.” (HR. Bukhari dan Muslim)</blockquote>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Manfaat Spiritual Melakukan Tawaf',
                'slug' => Str::slug('Manfaat Spiritual Melakukan Tawaf'),
                'excerpt' => 'Tawaf adalah salah satu rukun haji dan umrah yang penuh hikmah.',
                'image' => 'tawaf.jpg',
                'content' => '
                    <h2>Makna Tawaf</h2>
                    <p>Tawaf adalah simbol ketundukan kepada Allah, mengelilingi Ka’bah sebanyak tujuh kali dengan hati yang khusyuk.</p>
                    <ul>
                        <li>Menguatkan hubungan dengan Allah.</li>
                        <li>Menghapus dosa dan kesalahan.</li>
                        <li>Melatih kesabaran dan keikhlasan.</li>
                    </ul>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Panduan Ziarah di Madinah',
                'slug' => Str::slug('Panduan Ziarah di Madinah'),
                'excerpt' => 'Tempat-tempat bersejarah yang wajib dikunjungi saat di Madinah.',
                'image' => 'ziarah-madinah.jpg',
                'content' => '
                    <h2>Masjid Nabawi</h2>
                    <p>Masjid Nabawi adalah tempat paling suci kedua dalam Islam. Jangan lupa berdoa di Raudhah, salah satu tempat yang mustajab untuk berdoa.</p>
                    <h2>Makam Rasulullah</h2>
                    <p>Bershalawat dan berdoa di depan makam Rasulullah adalah bentuk penghormatan dan cinta kepada beliau.</p>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tips Menjaga Kesehatan Selama Umrah',
                'slug' => Str::slug('Tips Menjaga Kesehatan Selama Umrah'),
                'excerpt' => 'Beberapa tips penting untuk menjaga kesehatan selama menjalankan ibadah umrah.',
                'image' => 'kesehatan-umrah.jpg',
                'content' => '
                    <h2>Hindari Dehidrasi</h2>
                    <p>Minum air secara cukup, terutama di cuaca panas Arab Saudi.</p>
                    <h2>Konsumsi Makanan Bergizi</h2>
                    <p>Pastikan asupan makanan mengandung cukup protein dan vitamin untuk menjaga stamina.</p>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sejarah Ka’bah: Rumah Allah di Bumi',
                'slug' => Str::slug('Sejarah Ka’bah: Rumah Allah di Bumi'),
                'excerpt' => 'Ka’bah adalah pusat perhatian umat Islam di seluruh dunia.',
                'image' => 'sejarah-kabah.jpg',
                'content' => '
                    <h2>Ka’bah Sebagai Kiblat</h2>
                    <p>Ka’bah adalah kiblat bagi seluruh umat Islam saat melaksanakan shalat.</p>
                    <p>Sejarah Ka’bah dimulai sejak zaman Nabi Ibrahim AS yang membangun Ka’bah bersama putranya, Nabi Ismail AS.</p>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Keutamaan Puasa di Tanah Suci',
                'slug' => Str::slug('Keutamaan Puasa di Tanah Suci'),
                'excerpt' => 'Puasa di Makkah dan Madinah memiliki keutamaan khusus.',
                'image' => 'puasa-tanah-suci.jpg',
                'content' => '
                    <h2>Berpuasa di Makkah</h2>
                    <p>Berpuasa di Makkah memberikan pahala yang berlipat ganda.</p>
                    <h2>Pahala di Madinah</h2>
                    <p>Rasulullah SAW bersabda bahwa Madinah adalah tempat yang diberkahi, termasuk ibadah puasa di dalamnya.</p>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Keutamaan Berdoa di Multazam',
                'slug' => Str::slug('Keutamaan Berdoa di Multazam'),
                'excerpt' => 'Multazam adalah salah satu tempat mustajab untuk berdoa.',
                'image' => 'doa-multazam.jpg',
                'content' => '
                    <h2>Keutamaan Multazam</h2>
                    <p>Multazam terletak di antara Hajar Aswad dan pintu Ka’bah. Tempat ini dipercaya sebagai lokasi mustajab untuk berdoa.</p>
                    <blockquote>“Antara Rukun Hajar Aswad dan pintu Ka’bah terdapat tempat mustajab untuk berdoa.” (HR. Ahmad)</blockquote>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
