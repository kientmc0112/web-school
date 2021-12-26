<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $this->call([
            CategoryTableSeeder::class
        ]);
        // \App\Models\User::factory(100)->create();
        // \App\Models\Category::factory(10)->create();

        // for ($i=1; $i <= 100; $i++) { 
        //     DB::table('posts')->insert([
        //         'title' => $faker->text($maxNbChars = 50),
        //         'thumbnail_url' => "https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg",
        //         'category_id' => $faker->numberBetween(1,52),
        //         'content' => $faker->randomHtml(2,3),
        //         'created_by' => 1,
        //         'updated_by' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }
}
