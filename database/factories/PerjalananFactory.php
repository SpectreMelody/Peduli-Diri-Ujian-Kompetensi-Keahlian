<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PerjalananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "id_user"=>3,
            "tanggal"=>$this->faker->date(),
            "waktu"=>$this->faker->time(),
            "provinsi"=>$this->faker->randomElement(["Aceh","Banten","Bali","Bengkulu","DI Yogyakarta","DKI Jakarta","Gorontalo","Jambi","Jawa Barat","Jawa Tengah","Jawa Timur","Kalimantan Barat","Kalimantan Tengah","Kalimantan Timur","Kalimantan Selatan","Kalimantan Utara","Kepulauan Bangka Belitung","Kepulauan Riau","Lampung","Maluku","Maluku Utara","Nusa Tenggara Barat","Nusa Tenggara Timur","Papua","Papua Barat","Riau","Sulawesi Barat","Sulawesi Selatan","Sulawesi Tengah","Sulawesi Tenggara","Sulawesi Utara","Sumatera Barat","Sumatera Selatan","Sumatera Utara"]),
            "lokasi"=>$this->faker->address(),
            "suhu"=>$this->faker->numberBetween(20,49),
        ];
    }
}
