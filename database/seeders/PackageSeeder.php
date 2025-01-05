<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PackageSeeder extends Seeder
{
    public function run()
    {
        DB::table('packages')->insert([
            // Package Type 1: Haji Tour
            [
                'title' => 'Haji Tour Basic',
                'slug' => Str::slug('Haji Tour Basic'),
                'image' => 'haji-tour-basic.jpg',
                'tgl_berangkat' => '2025-02-15',
                'lama_hari' => 30,
                'hotel' => 'Hotel Makkah',
                'hotel_star' => 5,
                'maskapai' => 'Garuda Indonesia',
                'bandara' => 'Soekarno-Hatta',
                'package_type_id' => 1, // Haji Tour
                'description' => 'Paket Haji Tour dengan fasilitas premium.',
                'fasilitas' => '
                    <ul>
                        <li>Pesawat Langsung Landing Jeddah</li>
                        <li>3x Umrah</li>
                        <li>Free Al Baik</li>
                        <li>Sertifikat Umrah</li>
                        <li>Air Zam-zam 5L</li>
                        <li>Free Pengiriman Perlengkapan seluruh Indonesia</li>
                    </ul>
                ',
                'itinerary' => '
                    <ol>
                        <li>Hari 1: Keberangkatan dari Bandara Soekarno-Hatta</li>
                        <li>Hari 2: Tiba di Jeddah, langsung menuju Makkah</li>
                    </ol>
                ',
                'persyaratan' => '
                    <ul>
                        <li>Paspor dengan masa berlaku minimal 8 bulan</li>
                        <li>Miningitis</li>
                    </ul>
                ',
                'sk' => '<p>Syarat dan ketentuan berlaku.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Haji Tour Exclusive',
                'slug' => Str::slug('Haji Tour Exclusive'),
                'image' => 'haji-tour-exclusive.jpg',
                'tgl_berangkat' => '2025-03-01',
                'lama_hari' => 35,
                'hotel' => 'Hotel Safa',
                'hotel_star' => 5,
                'maskapai' => 'Saudi Airlines',
                'bandara' => 'Bandara Juanda',
                'package_type_id' => 1, // Haji Tour
                'description' => 'Paket Haji dengan layanan eksklusif.',
                'fasilitas' => '
                    <ul>
                        <li>Pesawat Langsung Landing Jeddah</li>
                        <li>5x Umrah</li>
                        <li>Free Air Zam-zam</li>
                    </ul>
                ',
                'itinerary' => '
                    <ol>
                        <li>Hari 1: Keberangkatan</li>
                        <li>Hari 2: Umrah pertama</li>
                    </ol>
                ',
                'persyaratan' => '
                    <ul>
                        <li>Paspor dengan masa berlaku minimal 8 bulan</li>
                        <li>Fotocopy KTP</li>
                    </ul>
                ',
                'sk' => '<p>Syarat dan ketentuan berlaku.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Package Type 2: Umrah Efisien
            [
                'title' => 'Umrah Efisien Basic',
                'slug' => Str::slug('Umrah Efisien Basic'),
                'image' => 'umrah-efisien-basic.jpg',
                'tgl_berangkat' => '2025-04-10',
                'lama_hari' => 10,
                'hotel' => 'Hotel Medina',
                'hotel_star' => 4,
                'maskapai' => 'Etihad Airways',
                'bandara' => 'Bandara Soekarno-Hatta',
                'package_type_id' => 2, // Umrah Efisien
                'description' => 'Paket Umrah hemat biaya.',
                'fasilitas' => '
                    <ul>
                        <li>Transportasi, hotel, makanan</li>
                    </ul>
                ',
                'itinerary' => '
                    <ol>
                        <li>Hari 1: Keberangkatan</li>
                    </ol>
                ',
                'persyaratan' => '
                    <ul>
                        <li>Paspor dengan masa berlaku minimal 8 bulan</li>
                    </ul>
                ',
                'sk' => '<p>Syarat dan ketentuan berlaku.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Umrah Efisien Plus',
                'slug' => Str::slug('Umrah Efisien Plus'),
                'image' => 'umrah-efisien-plus.jpg',
                'tgl_berangkat' => '2025-05-15',
                'lama_hari' => 12,
                'hotel' => 'Hotel Medina Deluxe',
                'hotel_star' => 5,
                'maskapai' => 'Malaysia Airlines',
                'bandara' => 'Bandara Juanda',
                'package_type_id' => 2, // Umrah Efisien
                'description' => 'Paket Umrah dengan fasilitas lengkap.',
                'fasilitas' => '
                    <ul>
                        <li>Pesawat langsung, hotel berbintang</li>
                    </ul>
                ',
                'itinerary' => '
                    <ol>
                        <li>Hari 1: Keberangkatan</li>
                    </ol>
                ',
                'persyaratan' => '
                    <ul>
                        <li>Paspor dengan masa berlaku minimal 8 bulan</li>
                    </ul>
                ',
                'sk' => '<p>Syarat dan ketentuan berlaku.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Package Type 3: Haji 30 Days
            [
                'title' => 'Haji 30 Days Standard',
                'slug' => Str::slug('Haji 30 Days Standard'),
                'image' => 'haji-30-days-standard.jpg',
                'tgl_berangkat' => '2025-06-20',
                'lama_hari' => 30,
                'hotel' => 'Hotel Mina',
                'hotel_star' => 4,
                'maskapai' => 'Garuda Indonesia',
                'bandara' => 'Bandara Sultan Hasanuddin',
                'package_type_id' => 3, // Haji 30 Days
                'description' => 'Paket Haji selama 30 hari.',
                'fasilitas' => '
                    <ul>
                        <li>Transportasi, hotel, makanan</li>
                    </ul>
                ',
                'itinerary' => '
                    <ol>
                        <li>Hari 1: Keberangkatan</li>
                    </ol>
                ',
                'persyaratan' => '
                    <ul>
                        <li>Paspor dengan masa berlaku minimal 8 bulan</li>
                    </ul>
                ',
                'sk' => '<p>Syarat dan ketentuan berlaku.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Haji 30 Days Premium',
                'slug' => Str::slug('Haji 30 Days Premium'),
                'image' => 'haji-30-days-premium.jpg',
                'tgl_berangkat' => '2025-07-10',
                'lama_hari' => 30,
                'hotel' => 'Hotel Zamzam',
                'hotel_star' => 5,
                'maskapai' => 'Saudi Airlines',
                'bandara' => 'Bandara Juanda',
                'package_type_id' => 3, // Haji 30 Days
                'description' => 'Paket Haji eksklusif.',
                'fasilitas' => '
                    <ul>
                        <li>Pesawat langsung, hotel berbintang</li>
                    </ul>
                ',
                'itinerary' => '
                    <ol>
                        <li>Hari 1: Keberangkatan</li>
                    </ol>
                ',
                'persyaratan' => '
                    <ul>
                        <li>Paspor dengan masa berlaku minimal 8 bulan</li>
                    </ul>
                ',
                'sk' => '<p>Syarat dan ketentuan berlaku.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Package Type 4: Umrah Urban
            [
                'title' => 'Umrah Urban Deluxe',
                'slug' => Str::slug('Umrah Urban Deluxe'),
                'image' => 'umrah-urban-deluxe.jpg',
                'tgl_berangkat' => '2025-08-15',
                'lama_hari' => 15,
                'hotel' => 'Hotel Urban Makkah',
                'hotel_star' => 4,
                'maskapai' => 'Etihad Airways',
                'bandara' => 'Bandara Sultan Hasanuddin',
                'package_type_id' => 4, // Umrah Urban
                'description' => 'Paket Umrah gaya urban.',
                'fasilitas' => '
                    <ul>
                        <li>Transportasi, hotel, makanan</li>
                    </ul>
                ',
                'itinerary' => '
                    <ol>
                        <li>Hari 1: Keberangkatan</li>
                    </ol>
                ',
                'persyaratan' => '
                    <ul>
                        <li>Paspor dengan masa berlaku minimal 8 bulan</li>
                    </ul>
                ',
                'sk' => '<p>Syarat dan ketentuan berlaku.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Umrah Urban Exclusive',
                'slug' => Str::slug('Umrah Urban Exclusive'),
                'image' => 'umrah-urban-exclusive.jpg',
                'tgl_berangkat' => '2025-09-01',
                'lama_hari' => 15,
                'hotel' => 'Hotel Safa Urban',
                'hotel_star' => 5,
                'maskapai' => 'Saudi Airlines',
                'bandara' => 'Bandara Soekarno-Hatta',
                'package_type_id' => 4, // Umrah Urban
                'description' => 'Paket Umrah dengan layanan urban eksklusif.',
                'fasilitas' => '
                    <ul>
                        <li>Pesawat langsung, hotel berbintang</li>
                    </ul>
                ',
                'itinerary' => '
                    <ol>
                        <li>Hari 1: Keberangkatan</li>
                    </ol>
                ',
                'persyaratan' => '
                    <ul>
                        <li>Paspor dengan masa berlaku minimal 8 bulan</li>
                    </ul>
                ',
                'sk' => '<p>Syarat dan ketentuan berlaku.</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
