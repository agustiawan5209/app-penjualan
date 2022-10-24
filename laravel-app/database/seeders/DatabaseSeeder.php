<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jenis;
use App\Models\Katalog;
use App\Models\Satuan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            [
                'name' => 'Admin',
                'email' => 'Admin@gmail.com',
                'password' => '$2y$10$KEDhGdPP5J035czJ6jUMouuYqqhjzMmHz0qDn3qlTRRQOTg9H8sUS',
                'role_id' => '1',

            ],[
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => '$2y$10$KEDhGdPP5J035czJ6jUMouuYqqhjzMmHz0qDn3qlTRRQOTg9H8sUS',
                'role_id' => '2',
            ]
        ]);
        Satuan::insert([
            ['nama_satuan' => 'Buah'],
            ['nama_satuan' => 'Box'],
            ['nama_satuan' => 'Biji'],
        ]);
        $katalog = [
            [
                'jenis_id' => '21',
                'nama_katalog' => 'Cat Kayu',
            ],
            [
                'jenis_id' => '21',
                'nama_katalog' => 'Cat Besi',
            ],
            [
                'jenis_id' => '4',
                'nama_katalog' => 'Besi Holo',
            ],
            [
                'jenis_id' => '15',
                'nama_katalog' => 'Stan Gembok',
            ],
            [
                'jenis_id' => '16',
                'nama_katalog' => 'Mata Gurindra',
            ],
            [
                'jenis_id' => '4',
                'nama_katalog' => 'Pipa Besi',
            ],
            [
                'jenis_id' => '4',
                'nama_katalog' => 'Siku Besi',
            ],
            [
                'jenis_id' => '4',
                'nama_katalog' => 'Kawat Pengikat Besi',
            ],
            [
                'jenis_id' => '4',
                'nama_katalog' => 'Besi Horden',
            ],
            [
                'jenis_id' => '22',
                'nama_katalog' => 'Alat Gergaji',
            ],
        ];
        Jenis::insert([
            ['nama_jenis' => 'Seng'],
            ['nama_jenis' => 'Semen'],
            ['nama_jenis' => 'Kawat'],
            ['nama_jenis' => 'besi'],
            ['nama_jenis' => 'Tripleks'],
            ['nama_jenis' => 'Tehel'],
            ['nama_jenis' => 'Paku'],
            ['nama_jenis' => 'Tali Bambel'],
            ['nama_jenis' => 'Kloset'],
            ['nama_jenis' => 'Keran Air'],
            ['nama_jenis' => 'Sambungan Pipa'],
            ['nama_jenis' => 'Pipa'],
            ['nama_jenis' => 'Hak Angin'],
            ['nama_jenis' => 'Gembok'],
            ['nama_jenis' => 'Gemmo'],
            ['nama_jenis' => 'Gurindra'],
            ['nama_jenis' => 'Kattang'],
            ['nama_jenis' => 'Drom'],
            ['nama_jenis' => 'Jergen'],
            ['nama_jenis' => 'Kuas'],
            ['nama_jenis' => 'Cat'],
            ['nama_jenis' => 'Gergaji'],
        ]);
        Katalog::insert($katalog);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
