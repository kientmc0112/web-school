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
        // $this->call([
        //     CategoryTableSeeder::class
        // ]);
        \App\Models\User::factory(100)->create();
        // \App\Models\Category::factory(10)->create();
        // $arrayLevel = [
        //     'Chi ủy',
        //     'Hội đồng khoa học và đào tạo',
        //     'Ban chủ nhiêm khoa',
        //     'tổ chức đoàn thể xã hội',
        //     'tổ chuyên môn',
        //     'phòng ban chức năng',
        //     'tổ liên ngành khoa học quản lí kinh tế luật',
        //     'tổ liên ngành khoa học xã hội và nhân văn',
        //     'phòng tổ chức - hành chính',
        //     'phòng kế hoạch tài chính',
        //     'tổ liên ngành học tự nhiên, công nghệ và kỹ thuật',
        //     'phòng khoa học công nghệ và hợp tác phát triển',
        //     'phòng đào tạo và công tác sinh viên',
        //     'phòng truyền thông và tuyển sinh',
        // ];

        // foreach ($arrayLevel as $key => $level) {
        //     DB::table('levels')->insert([
        //         'id' => $key + 1,
        //         'title' => $level,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // $arrayPosition = [
        //     'Chủ nhiệm khoa',
        //     'Phó chủ nhiệm khoa',
        //     'Trưởng phòng',
        //     'Phó Trưởng phòng',
        //     'Trưởng bộ phận',
        // ];

        // foreach ($arrayPosition as $key => $position) {
        //     DB::table('positions')->insert([
        //         'id' => $key + 1,
        //         'name' => $position,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }
}
