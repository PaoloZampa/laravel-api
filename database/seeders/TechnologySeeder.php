<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = 
        [
            ['HTML', 'text-bg-primary'],
            ['CSS', 'text-bg-secondary'],
            ['Bootstrap', 'text-bg-success'],
            ['JavaScript', 'text-bg-danger'],
            ['VueJS', 'text-bg-warning'],
            ['Vite', 'text-bg-success'],
            ['SASS', 'text-bg-light'],
            ['PHP', 'text-bg-dark'],
            ['MySQL', 'text-bg-primary'],
            ['Laravel', 'text-bg-secondary'],
        ];

        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->name = $technology[0];
            $new_technology->color = $technology[1];
            $new_technology->slug = Str::slug($new_technology->name, '-');
            $new_technology->save(); 
        }
    }
}
