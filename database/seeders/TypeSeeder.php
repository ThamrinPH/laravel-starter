<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'name'=>'U.S. Dollar',
            'of'=>'currency',
            'description'=>"American's currency",
            'status'=>1
        ]);

        Type::create([
            'name'=>'Rupiah',
            'of'=>'currency',
            'description'=>"Indonesian's currency",
            'status'=>1
        ]);

        Type::create([
            'name'=>'km',
            'of'=>'measurement',
            'description'=>"kilo-metre, metric system 2D length unit measurement",
            'status'=>1
        ]);

        Type::create([
            'name'=>'hm',
            'of'=>'measurement',
            'description'=>"hecto-metre, metric system 2D length unit measurement",
            'status'=>1
        ]);

        Type::create([
            'name'=>'m',
            'of'=>'measurement',
            'description'=>"metre metric, system length 2D unit measurement",
            'status'=>1
        ]);

        Type::create([
            'name'=>'cm',
            'of'=>'measurement',
            'description'=>"centi-metre, metric system 2D length unit measurement",
            'status'=>1
        ]);

        Type::create([
            'name'=>'mm',
            'of'=>'measurement',
            'description'=>"milli-metre, metric system 2D length unit measurement",
            'status'=>1
        ]);

        Type::create([
            'name'=>'kg',
            'of'=>'measurement',
            'description'=>"kilo-gram, metric system weight unit measurement",
            'status'=>1
        ]);

        Type::create([
            'name'=>'hg',
            'of'=>'measurement',
            'description'=>"hecto-gram, metric system weight unit measurement",
            'status'=>1
        ]);

        Type::create([
            'name'=>'gr',
            'of'=>'measurement',
            'description'=>"metre metric, system length 2D unit measurement",
            'status'=>1
        ]);

        Type::create([
            'name'=>'cg',
            'of'=>'measurement',
            'description'=>"centi-gram, metric system weight unit measurement",
            'status'=>1
        ]);

        Type::create([
            'name'=>'mg',
            'of'=>'measurement',
            'description'=>"milli-gram, metric system weight unit measurement",
            'status'=>1
        ]);
    }
}
