<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Work;
use App\Models\Type;
use Faker\Generator as Faker;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50; $i++) {
            $new_work = new Work();
            $new_work->title = $faker->sentence();
            $new_work->slug = Work::generateSlug($new_work->title);
            $new_work->image = $faker->imageUrl(200, 480, 'animals', true, 'dogs', true);
            $new_work->text = $faker->text(300);
            $new_work->creation_date = date('Y/m/d');
            $new_work->type_id = Type::inRandomOrder()->first()->id;
            $new_work->save();
        }

    }
}
