<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jenis;
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
        Jenis::insert([
            ['nama_jenis' => 'Seng'],
            ['nama_jenis' => 'Semen'],
            ['nama_jenis' => 'Kawat'],
            ['nama_jenis' => 'besi'],
            ['nama_jenis' => 'Cat Kayu'],
            ['nama_jenis' => 'Cat Besi'],
            ['nama_jenis' => 'Tripleks'],
            ['nama_jenis' => 'Tehel'],
            ['nama_jenis' => 'Besi Holo'],
            ['nama_jenis' => 'Colokan'],
            ['nama_jenis' => 'Stan Colokan'],
            ['nama_jenis' => 'Saklar'],
            ['nama_jenis' => 'NCB'],
            ['nama_jenis' => 'Baut'],
            ['nama_jenis' => 'Ring'],
            ['nama_jenis' => 'Paku'],
            ['nama_jenis' => 'Tali Bambel'],
            ['nama_jenis' => 'Oli'],
            ['nama_jenis' => 'Kloset'],
            ['nama_jenis' => 'Alat Gergaji'],
            ['nama_jenis' => 'Kunci Pintu'],
            ['nama_jenis' => 'Keran Air'],
            ['nama_jenis' => 'Sambungan Pipa'],
            ['nama_jenis' => 'Pipa'],
            ['nama_jenis' => 'Hak Angin'],
            ['nama_jenis' => 'Gembok'],
            ['nama_jenis' => 'Stan Gembok'],
            ['nama_jenis' => 'Gemmo'],
            ['nama_jenis' => 'Gurindra'],
            ['nama_jenis' => 'Kattang'],
            ['nama_jenis' => 'Mesin Somel'],
            ['nama_jenis' => 'Mata Gurindra'],
            ['nama_jenis' => 'Seng Plat'],
            ['nama_jenis' => 'Mata Pemotong Tegel'],
            ['nama_jenis' => 'Obeng'],
            ['nama_jenis' => 'Dinamo'],
            ['nama_jenis' => 'Terpal'],
            ['nama_jenis' => 'Karung'],
            ['nama_jenis' => 'Pipa Besi'],
            ['nama_jenis' => 'Siku Besi'],
            ['nama_jenis' => 'Ensel Pintu'],
            ['nama_jenis' => 'Besi Horden'],
            ['nama_jenis' => 'Pintu WC'],
            ['nama_jenis' => 'Tikar Plastik'],
            ['nama_jenis' => 'Drom'],
            ['nama_jenis' => 'Jergen'],
            ['nama_jenis' => 'Kuas'],
            ['nama_jenis' => 'Gergaji Kayu'],
            ['nama_jenis' => 'Lori-Lori'],
            ['nama_jenis' => 'Kawat Pengikat Bes'],
            ['nama_jenis' => 'Baling-Baling'],
            ['nama_jenis' => 'Gergaji'],
            ['nama_jenis' => 'Mesin Babat'],
            ['nama_jenis' => 'Gundset'],
            ['nama_jenis' => 'Aplus'],
            ['nama_jenis' => 'Gunting Dahan'],
            ['nama_jenis' => 'Kunci Ring Pas'],
            ['nama_jenis' => 'Selang'],
            ['nama_jenis' => 'Tali Sikma'],
            ['nama_jenis' => 'Kape'],
            ['nama_jenis' => 'Lem Lilin'],
            ['nama_jenis' => 'Palu'],
            ['nama_jenis' => 'Pahat'],
            ['nama_jenis' => 'Pitting'],
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
