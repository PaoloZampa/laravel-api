<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = 
        [
            ['Front End', 'text-bg-info'],
            ['Back End', 'text-bg-danger'],
            ['Full Stack', 'text-bg-success']   
        ];

        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type[0];
            $new_type->color = $type[1];
            $new_type->slug = Str::slug($new_type->name, '-');
            $new_type->save(); 
        }
    }
}
