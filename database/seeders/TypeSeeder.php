<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        Schema::disableForeignKeyConstraints();
        Type::truncate();
    
        for ($i=0; $i < 4; $i++) { 
            $type = new Type();

            $type-> title=$faker->word() ;
            $type->slug = Str::of($type->title)->slug('-');
            $type->save();
        }
        
        Schema::enableForeignKeyConstraints();
    }
}
