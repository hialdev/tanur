<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $applications = [
            [
                'code' => 'SSO',
                'name' => 'sso',
                'url' => 'http://sso.tanur.test',
            ],
            [
                'code' => 'ACC',
                'name' => 'account',
                'url' => 'http://acc.tanur.test',
            ],
            [
                'code' => 'STOCK',
                'name' => 'Stock',
                'url' => 'http://stock.tanur.test',
            ],
            [
                'code' => 'ACCOUNTING',
                'name' => 'Accounting',
                'url' => 'http://calc.tanur.test',
            ],
        ];

        foreach ($applications as $app) {
            Application::firstOrCreate(
                ['code' => $app['code']], // Cek jika data sudah ada berdasarkan kode
                $app // Data yang akan disimpan jika belum ada
            );
        }

        $this->command->info('Applications created successfully.');
    }
}
