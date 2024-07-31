<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Technology::truncate();

        $technologies = ['Laravel', 'Vue.js', 'React', 'Node.js'];
        foreach ($technologies as $technology) {

            $new_tecnology = new Technology();

            $new_tecnology->title = $technology;
            $new_tecnology->slug = Str::of($technology)->slug();
            $new_tecnology->save();
        }
        Schema::enableForeignKeyConstraints();

    }
}
