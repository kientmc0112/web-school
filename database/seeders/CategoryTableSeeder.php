<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\DBConstant;
use DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cấp 1
        $parentData = [
		    [
                "id" => DBConstant::INTRODUCTION,
			    "name" => "GIỚI THIỆU VỀ TÂM PHƯỚC",
			    "parent_id" => 0,
                "order" => 0
            ],
            [
                "id" => DBConstant::SERVICE,
			    "name" => "SẢN PHẨM VÀ DỊCH VỤ",
			    "parent_id" => 0,
                "order" => 1
            ],
            [
                "id" => DBConstant::TEAM,
			    "name" => "ĐỘI NGŨ VÀ HOẠT ĐỘNG",
			    "parent_id" => 0,
                "order" => 2
            ],
        ];
        DB::table('categories')->insert($parentData);

        // Cấp 2
        $childData = [
            // GIỚI THIỆU VỀ TÂM PHƯỚC
            [
			    "name" => "Giới thiệu chung",
			    "parent_id" => DBConstant::INTRODUCTION,
                "order" => 0
            ],
            [
			    "name" => "Tầm nhìn và sứ mệnh",
			    "parent_id" => DBConstant::INTRODUCTION,
                "order" => 1
            ],
            [
			    "name" => "Giá trị cốt lõi",
			    "parent_id" => DBConstant::INTRODUCTION,
                "order" => 2
            ],
            // SẢN PHẨM VÀ DỊCH VỤ
            [
			    "name" => "Xu hướng thế giới",
			    "parent_id" => DBConstant::SERVICE,
                "order" => 0
            ],
            [
			    "name" => "Dịch vụ của chúng tôi",
			    "parent_id" => DBConstant::SERVICE,
                "order" => 1
            ],
            [
			    "name" => "Cơ sở vật chất",
			    "parent_id" => DBConstant::SERVICE,
                "order" => 2
            ],
            // ĐỘI NGŨ VÀ HOẠT ĐỘNG
            [
			    "name" => "Cơ cấu tổ chức",
			    "parent_id" => DBConstant::TEAM,
                "order" => 0
            ],
            [
			    "name" => "Đội ngũ nhân sự",
			    "parent_id" => DBConstant::TEAM,
                "order" => 1
            ],
            [
			    "name" => "Một số hoạt động tiêu biểu",
			    "parent_id" => DBConstant::TEAM,
                "order" => 2
            ],
        ];
        DB::table('categories')->insert($childData);
    }
}
