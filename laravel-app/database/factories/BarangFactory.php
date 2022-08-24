<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DIskon>
 */
class BarangFactory extends Factory
{
    protected $model = Barang::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'gambar'=> $this->faker->imageUrl(),
            'kode_barang'=> $this->faker->randomDigit(9),
            'jenis_id'=> '1',
            'satuan_id'=> '1',
            'harga'=> $this->faker->randomDigit(),
            'deskripsi'=> $this->faker->word(),
            'tgl_perolehan'=> $this->faker->date(),
        ];
    }
}
