<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'name' => 'Patra One',
            'description' => 'Proyek perumahan segmentasi tengah di Surabaya Barat',
        ]);

        Branch::create([
            'name' => 'Patra Raya',
            'description' => 'Proyek perumahan kawasan di cerme, Gresik',
        ]);
    }
}
