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
        $data = [
		    [
                "id" => DBConstant::INTRODUCTION,
			    "name" => "GIỚI THIỆU",
			    "parent_id" => 0
            ],
            [
                "id" => DBConstant::ADMISSIONS,
			    "name" => "TUYỂN SINH",
			    "parent_id" => 0
            ],
            [
                "id" => DBConstant::EDUCATION,
			    "name" => "ĐÀO TẠO",
			    "parent_id" => 0
            ],
            [
                "id" => DBConstant::NEWS,
			    "name" => "TIN TỨC",
			    "parent_id" => 0
            ],
            [
                "id" => DBConstant::COOPERATION,
			    "name" => "HỢP TÁC PHÁT TRIỂN",
			    "parent_id" => 0
            ],
            [
                "id" => DBConstant::DIGITAL_RESOURCES,
			    "name" => "TÀI NGUYÊN SỐ",
			    "parent_id" => 0
            ],

            // GIỚI THIỆU
            [
                "id" => DBConstant::INTRODUCTION . 0,
			    "name" => "Những dấu mốc trên hành trình phát triển",
			    "parent_id" => DBConstant::INTRODUCTION
            ],
            [
                "id" => DBConstant::INTRODUCTION . 1,
			    "name" => "Tầm nhìn, sứ mệnh và giá trị cốt lõi",
			    "parent_id" => DBConstant::INTRODUCTION
            ],
            [
                "id" => DBConstant::INTRODUCTION . 2,
			    "name" => "Thông điệp của CNK",
			    "parent_id" => DBConstant::INTRODUCTION
            ],
            [
                "id" => DBConstant::INTRODUCTION . 3,
			    "name" => "Cơ cấu tổ chức",
			    "parent_id" => DBConstant::INTRODUCTION
            ],
            [
                "id" => DBConstant::INTRODUCTION . 4,
			    "name" => "Tư liệu hình ảnh - video",
			    "parent_id" => DBConstant::INTRODUCTION
            ],
            [
                "id" => DBConstant::INTRODUCTION . 5,
			    "name" => "Báo chí nói gì về VNU-SIS",
			    "parent_id" => DBConstant::INTRODUCTION
            ],

            // TUYỂN SINH
            [
                "id" => DBConstant::ADMISSIONS . 0,
			    "name" => "Các ngành đại học chính quy",
			    "parent_id" => DBConstant::ADMISSIONS
            ],
            [
                "id" => DBConstant::ADMISSIONS . 1,
			    "name" => "Các chuyên ngành sau đại học",
			    "parent_id" => DBConstant::ADMISSIONS
            ],

            // ĐÀO TẠO
            [
                "id" => DBConstant::EDUCATION . 0,
			    "name" => "Cử nhân",
			    "parent_id" => DBConstant::EDUCATION
            ],
            [
                "id" => DBConstant::EDUCATION . 1,
			    "name" => "Thạc sĩ",
			    "parent_id" => DBConstant::EDUCATION
            ],
            [
                "id" => DBConstant::EDUCATION . 2,
			    "name" => "Tiến sĩ",
			    "parent_id" => DBConstant::EDUCATION
            ],
            [
                "id" => DBConstant::EDUCATION . 3,
			    "name" => "Luận văn - Luận án",
			    "parent_id" => DBConstant::EDUCATION
            ],
            [
                "id" => DBConstant::EDUCATION . 4,
			    "name" => "Công tác sinh viên",
			    "parent_id" => DBConstant::EDUCATION
            ],

            // TIN TỨC
            [
                "id" => DBConstant::NEWS . 0,
			    "name" => "Tin về ĐHQGHN",
			    "parent_id" => DBConstant::NEWS
            ],
            [
                "id" => DBConstant::NEWS . 1,
			    "name" => "Tin nội bộ",
			    "parent_id" => DBConstant::NEWS
            ],
            [
                "id" => DBConstant::NEWS . 2,
			    "name" => "Tin chuyên ngành",
			    "parent_id" => DBConstant::NEWS
            ],
            [
                "id" => DBConstant::NEWS . 3,
			    "name" => "Thông cáo báo chí",
			    "parent_id" => DBConstant::NEWS
            ],
            [
                "id" => DBConstant::NEWS . 4,
			    "name" => "Tin tuyển dụng",
			    "parent_id" => DBConstant::NEWS
            ],

            // HỢP TÁC PHÁT TRIỂN
            [
                "id" => DBConstant::COOPERATION . 0,
			    "name" => "Thông tin hợp tác phát triển",
			    "parent_id" => DBConstant::COOPERATION
            ],
            [
                "id" => DBConstant::COOPERATION . 1,
			    "name" => "Đối tác trong nước và quốc tế",
			    "parent_id" => DBConstant::COOPERATION
            ],
            [
                "id" => DBConstant::COOPERATION . 2,
			    "name" => "Chương trình đào tạo quốc tế",
			    "parent_id" => DBConstant::COOPERATION
            ],

            // TÀI NGUYÊN SỐ
            [
                "id" => DBConstant::DIGITAL_RESOURCES . 0,
			    "name" => "Luận văn, luận án",
			    "parent_id" => DBConstant::DIGITAL_RESOURCES
            ],
            [
                "id" => DBConstant::DIGITAL_RESOURCES . 1,
			    "name" => "Các công trình khoa học",
			    "parent_id" => DBConstant::DIGITAL_RESOURCES
            ],

            // Các ngành đại học chính quy
            [
                "id" => DBConstant::ADMISSIONS . 0 . 0,
			    "name" => "Cử nhân Quản trị thương hiệu (BBM)",
			    "parent_id" => DBConstant::ADMISSIONS . 0
            ],
            [
                "id" => DBConstant::ADMISSIONS . 0 . 1,
			    "name" => "Cử nhân Quản trị tài nguyên di sản (HRM)",
			    "parent_id" => DBConstant::ADMISSIONS . 0
            ],

            // Các chuyên ngành sau đại học
            [
                "id" => DBConstant::ADMISSIONS . 1 . 0,
			    "name" => "Thạc sĩ Biến đổi khí hậu",
			    "parent_id" => DBConstant::ADMISSIONS . 1
            ],
            [
                "id" => DBConstant::ADMISSIONS . 1 . 1,
			    "name" => "Thạc sĩ Khoa học bền vững",
			    "parent_id" => DBConstant::ADMISSIONS . 1
            ],
            [
                "id" => DBConstant::ADMISSIONS . 1 . 2,
			    "name" => "Thạc sĩ Quản lí phát triển đô thị",
			    "parent_id" => DBConstant::ADMISSIONS . 1
            ],
            [
                "id" => DBConstant::ADMISSIONS . 1 . 3,
			    "name" => "Thạc sĩ Di sản học",
			    "parent_id" => DBConstant::ADMISSIONS . 1
            ],
            [
                "id" => DBConstant::ADMISSIONS . 1 . 4,
			    "name" => "Tiến sĩ Biến đổi khí hậu và phát triển bền vững",
			    "parent_id" => DBConstant::ADMISSIONS . 1
            ],

            // Cử nhân
            [
                "id" => DBConstant::EDUCATION . 0 . 0,
			    "name" => "Cử nhân Quản trị thương hiệu (BBM)",
			    "parent_id" => DBConstant::EDUCATION . 0
            ],
            [
                "id" => DBConstant::EDUCATION . 0 . 1,
			    "name" => "Cử nhân Quản trị tài nguyên di sản (HRM)",
			    "parent_id" => DBConstant::EDUCATION . 0
            ],
            [
                "id" => DBConstant::EDUCATION . 0 . 2,
			    "name" => "Hoạt động của sinh viên",
			    "parent_id" => DBConstant::EDUCATION . 0
            ],

            // Thạc sĩ
            [
                "id" => DBConstant::EDUCATION . 1 . 0,
			    "name" => "Thạc sĩ Biến đổi khí hậu",
			    "parent_id" => DBConstant::EDUCATION . 1
            ],
            [
                "id" => DBConstant::EDUCATION . 1 . 1,
			    "name" => "Thạc sĩ Khoa học bền vững",
			    "parent_id" => DBConstant::EDUCATION . 1
            ],
            [
                "id" => DBConstant::EDUCATION . 1 . 2,
			    "name" => "Thạc sĩ Quản lí phát triển đô thị",
			    "parent_id" => DBConstant::EDUCATION . 1
            ],
            [
                "id" => DBConstant::EDUCATION . 1 . 3,
			    "name" => "Thạc sĩ Di sản học",
			    "parent_id" => DBConstant::EDUCATION . 1
            ],
            [
                "id" => DBConstant::EDUCATION . 1 . 4,
			    "name" => "Thực địa liên ngành",
			    "parent_id" => DBConstant::EDUCATION . 1
            ],

            // Tiến sĩ
            [
                "id" => DBConstant::EDUCATION . 2 . 0,
			    "name" => "Tiến sĩ Biến đổi khí hậu và phát triển bền vững",
			    "parent_id" => DBConstant::EDUCATION . 2
            ],

            // Công tác sinh viên
            [
                "id" => DBConstant::EDUCATION . 4 . 0,
			    "name" => "Biểu mẫu",
			    "parent_id" => DBConstant::EDUCATION . 4
            ],
            [
                "id" => DBConstant::EDUCATION . 4 . 1,
			    "name" => "Văn bản liên quan",
			    "parent_id" => DBConstant::EDUCATION . 4
            ],

	    ];

	    DB::table('categories')->insert($data);
    }
}
