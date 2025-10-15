<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'Family', 'price' => 5000, 'unit' => 'Kg'],
            ['name' => 'Handuk', 'price' => 7000, 'unit' => 'Kg'],
            ['name' => 'Selimut Tebal', 'price' => 35000, 'unit' => 'Pcs'],
            ['name' => 'Selimut Sedang', 'price' => 25000, 'unit' => 'Pcs'],
            ['name' => 'Selimut Kecil', 'price' => 15000, 'unit' => 'Pcs'],
            ['name' => 'Bed Cover Jumbo', 'price' => 35000, 'unit' => 'Pcs'],
            ['name' => 'Bed Cover Besar', 'price' => 25000, 'unit' => 'Pcs'],
            ['name' => 'Bed Cover Kecil', 'price' => 15000, 'unit' => 'Pcs'],
            ['name' => 'Seprei', 'price' => 10000, 'unit' => 'Kg'],
            ['name' => 'Gorden', 'price' => 12000, 'unit' => 'Kg'],
            ['name' => 'Setrika Saja', 'price' => 3000, 'unit' => 'Kg'],
            ['name' => 'Cuci Saja', 'price' => 3000, 'unit' => 'Kg'],
        ];

        foreach ($services as $s) Service::create($s);
    }
}
