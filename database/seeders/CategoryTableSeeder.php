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
            // Cấp 1
		    [
                "id" => DBConstant::INTRODUCTION,
			    "name" => "GIỚI THIỆU",
			    "parent_id" => 0,
                "order" => 0
            ],
            [
                "id" => DBConstant::ADMISSIONS,
			    "name" => "TUYỂN SINH",
			    "parent_id" => 0,
                "order" => 1
            ],
            [
                "id" => DBConstant::EDUCATION,
			    "name" => "ĐÀO TẠO",
			    "parent_id" => 0,
                "order" => 2
            ],
            [
                "id" => DBConstant::NEWS,
			    "name" => "TIN TỨC",
			    "parent_id" => 0,
                "order" => 3
            ],
            [
                "id" => DBConstant::COOPERATION,
			    "name" => "HỢP TÁC PHÁT TRIỂN",
			    "parent_id" => 0,
                "order" => 4
            ],
            [
                "id" => DBConstant::SCIENTIFIC_RESEARCH,
			    "name" => "NGHIÊN CỨU KHOA HỌC",
			    "parent_id" => 0,
                "order" => 5
            ],
            [
                "id" => DBConstant::SIS_ALUMNI,
			    "name" => "SIS ALUMNI",
			    "parent_id" => 0,
                "order" => 6
            ],
            [
                "id" => DBConstant::SIS_STUDENT,
			    "name" => "SINH VIÊN SIS",
			    "parent_id" => 0,
                "order" => 7
            ],

            // Cấp 2
            // GIỚI THIỆU
            [
                "id" => DBConstant::INTRODUCTION . 0,
			    "name" => "Những dấu mốc trên hành trình phát triển",
			    "parent_id" => DBConstant::INTRODUCTION,
                "order" => 0
            ],
            [
                "id" => DBConstant::INTRODUCTION . 1,
			    "name" => "Tầm nhìn, sứ mệnh và giá trị cốt lõi",
			    "parent_id" => DBConstant::INTRODUCTION,
                "order" => 1
            ],
            [
                "id" => DBConstant::INTRODUCTION . 2,
			    "name" => "Thông điệp của CNK",
			    "parent_id" => DBConstant::INTRODUCTION,
                "order" => 2
            ],
            [
                "id" => DBConstant::INTRODUCTION . 3,
			    "name" => "Cơ cấu tổ chức",
			    "parent_id" => DBConstant::INTRODUCTION,
                "order" => 3
            ],
            [
                "id" => DBConstant::INTRODUCTION . 4,
			    "name" => "Tư liệu hình ảnh - video",
			    "parent_id" => DBConstant::INTRODUCTION,
                "order" => 4
            ],
            [
                "id" => DBConstant::INTRODUCTION . 5,
			    "name" => "Báo chí nói gì về VNU-SIS",
			    "parent_id" => DBConstant::INTRODUCTION,
                "order" => 5
            ],

            // TUYỂN SINH
            [
                "id" => DBConstant::ADMISSIONS . 0,
			    "name" => "Các ngành đại học chính quy",
			    "parent_id" => DBConstant::ADMISSIONS,
                "order" => 0
            ],
            [
                "id" => DBConstant::ADMISSIONS . 1,
			    "name" => "Các chuyên ngành sau đại học",
			    "parent_id" => DBConstant::ADMISSIONS,
                "order" => 1
            ],

            // ĐÀO TẠO
            [
                "id" => DBConstant::EDUCATION . 0,
			    "name" => "Cử nhân",
			    "parent_id" => DBConstant::EDUCATION,
                "order" => 0
            ],
            [
                "id" => DBConstant::EDUCATION . 1,
			    "name" => "Thạc sĩ",
			    "parent_id" => DBConstant::EDUCATION,
                "order" => 1
            ],
            [
                "id" => DBConstant::EDUCATION . 2,
			    "name" => "Tiến sĩ",
			    "parent_id" => DBConstant::EDUCATION,
                "order" => 2
            ],
            [
                "id" => DBConstant::EDUCATION . 3,
			    "name" => "Luận văn - Luận án",
			    "parent_id" => DBConstant::EDUCATION,
                "order" => 3
            ],
            [
                "id" => DBConstant::EDUCATION . 4,
			    "name" => "Công tác sinh viên",
			    "parent_id" => DBConstant::EDUCATION,
                "order" => 4
            ],

            // TIN TỨC
            [
                "id" => DBConstant::NEWS . 0,
			    "name" => "Tin về ĐHQGHN",
			    "parent_id" => DBConstant::NEWS,
                "order" => 0
            ],
            [
                "id" => DBConstant::NEWS . 1,
			    "name" => "Tin nội bộ",
			    "parent_id" => DBConstant::NEWS,
                "order" => 1
            ],
            [
                "id" => DBConstant::NEWS . 2,
			    "name" => "Tin chuyên ngành",
			    "parent_id" => DBConstant::NEWS,
                "order" => 2
            ],
            [
                "id" => DBConstant::NEWS . 3,
			    "name" => "Thông cáo báo chí",
			    "parent_id" => DBConstant::NEWS,
                "order" => 3
            ],
            [
                "id" => DBConstant::NEWS . 4,
			    "name" => "Tin tuyển dụng",
			    "parent_id" => DBConstant::NEWS,
                "order" => 4
            ],

            // HỢP TÁC PHÁT TRIỂN
            [
                "id" => DBConstant::COOPERATION . 0,
			    "name" => "Thông tin hợp tác phát triển",
			    "parent_id" => DBConstant::COOPERATION,
                "order" => 0
            ],
            [
                "id" => DBConstant::COOPERATION . 1,
			    "name" => "Đối tác trong nước và quốc tế",
			    "parent_id" => DBConstant::COOPERATION,
                "order" => 1
            ],
            [
                "id" => DBConstant::COOPERATION . 2,
			    "name" => "Chương trình đào tạo quốc tế",
			    "parent_id" => DBConstant::COOPERATION,
                "order" => 2
            ],

            // NGHIÊN CỨU KHOA HỌC
            [
                "id" => DBConstant::SCIENTIFIC_RESEARCH . 0,
			    "name" => "Tài nguyên số",
			    "parent_id" => DBConstant::SCIENTIFIC_RESEARCH,
                "order" => 0
            ],
            [
                "id" => DBConstant::SCIENTIFIC_RESEARCH . 1,
			    "name" => "Danh mục đề tài nghiên cứu",
			    "parent_id" => DBConstant::SCIENTIFIC_RESEARCH,
                "order" => 1
            ],

            // SIS ALUMNI
            [
                "id" => DBConstant::SIS_ALUMNI . 0,
			    "name" => "Hoạt động của CLB",
			    "parent_id" => DBConstant::SIS_ALUMNI,
                "order" => 0
            ],
            [
                "id" => DBConstant::SIS_ALUMNI . 1,
			    "name" => "Ban Chủ nhiệm của CLB",
			    "parent_id" => DBConstant::SIS_ALUMNI,
                "order" => 1
            ],
            [
                "id" => DBConstant::SIS_ALUMNI . 2,
			    "name" => "Thành viên tiêu biểu",
			    "parent_id" => DBConstant::SIS_ALUMNI,
                "order" => 2
            ],
            [
                "id" => DBConstant::SIS_ALUMNI . 3,
			    "name" => "Tuyển dụng của cựu học viên",
			    "parent_id" => DBConstant::SIS_ALUMNI,
                "order" => 3
            ],

            // SINH VIÊN SIS
            [
                "id" => DBConstant::SIS_STUDENT . 0,
			    "name" => "Đoàn - Hội",
			    "parent_id" => DBConstant::SIS_STUDENT,
                "order" => 0
            ],
            [
                "id" => DBConstant::SIS_STUDENT . 1,
			    "name" => "Các hoạt động tình nguyện",
			    "parent_id" => DBConstant::SIS_STUDENT,
                "order" => 1
            ],
            [
                "id" => DBConstant::SIS_STUDENT . 2,
			    "name" => "Các Câu lạc bộ",
			    "parent_id" => DBConstant::SIS_STUDENT,
                "order" => 2
            ],
            [
                "id" => DBConstant::SIS_STUDENT . 3,
			    "name" => "Đời sống sinh viên",
			    "parent_id" => DBConstant::SIS_STUDENT,
                "order" => 3
            ],

            // Cấp 3
            // Các ngành đại học chính quy
            [
                "id" => DBConstant::ADMISSIONS . 0 . 0,
			    "name" => "Cử nhân Quản trị thương hiệu (BBM)",
			    "parent_id" => DBConstant::ADMISSIONS . 0,
                "order" => 0
            ],
            [
                "id" => DBConstant::ADMISSIONS . 0 . 1,
			    "name" => "Cử nhân Quản trị tài nguyên di sản (HRM)",
			    "parent_id" => DBConstant::ADMISSIONS . 0,
                "order" => 1
            ],

            // Các chuyên ngành sau đại học
            [
                "id" => DBConstant::ADMISSIONS . 1 . 0,
			    "name" => "Thạc sĩ Biến đổi khí hậu",
			    "parent_id" => DBConstant::ADMISSIONS . 1,
                "order" => 0
            ],
            [
                "id" => DBConstant::ADMISSIONS . 1 . 1,
			    "name" => "Thạc sĩ Khoa học bền vững",
			    "parent_id" => DBConstant::ADMISSIONS . 1,
                "order" => 1
            ],
            [
                "id" => DBConstant::ADMISSIONS . 1 . 2,
			    "name" => "Thạc sĩ Quản lí phát triển đô thị",
			    "parent_id" => DBConstant::ADMISSIONS . 1,
                "order" => 2
            ],
            [
                "id" => DBConstant::ADMISSIONS . 1 . 3,
			    "name" => "Thạc sĩ Di sản học",
			    "parent_id" => DBConstant::ADMISSIONS . 1,
                "order" => 3
            ],
            [
                "id" => DBConstant::ADMISSIONS . 1 . 4,
			    "name" => "Tiến sĩ Biến đổi khí hậu và phát triển bền vững",
			    "parent_id" => DBConstant::ADMISSIONS . 1,
                "order" => 4
            ],

            // Cử nhân
            [
                "id" => DBConstant::EDUCATION . 0 . 0,
			    "name" => "Cử nhân Quản trị thương hiệu (BBM)",
			    "parent_id" => DBConstant::EDUCATION . 0,
                "order" => 0
            ],
            [
                "id" => DBConstant::EDUCATION . 0 . 1,
			    "name" => "Cử nhân Quản trị tài nguyên di sản (HRM)",
			    "parent_id" => DBConstant::EDUCATION . 0,
                "order" => 1
            ],
            [
                "id" => DBConstant::EDUCATION . 0 . 2,
			    "name" => "Hoạt động của sinh viên",
			    "parent_id" => DBConstant::EDUCATION . 0,
                "order" => 2
            ],

            // Thạc sĩ
            [
                "id" => DBConstant::EDUCATION . 1 . 0,
			    "name" => "Thạc sĩ Biến đổi khí hậu",
			    "parent_id" => DBConstant::EDUCATION . 1,
                "order" => 0
            ],
            [
                "id" => DBConstant::EDUCATION . 1 . 1,
			    "name" => "Thạc sĩ Khoa học bền vững",
			    "parent_id" => DBConstant::EDUCATION . 1,
                "order" => 1
            ],
            [
                "id" => DBConstant::EDUCATION . 1 . 2,
			    "name" => "Thạc sĩ Quản lí phát triển đô thị",
			    "parent_id" => DBConstant::EDUCATION . 1,
                "order" => 2
            ],
            [
                "id" => DBConstant::EDUCATION . 1 . 3,
			    "name" => "Thạc sĩ Di sản học",
			    "parent_id" => DBConstant::EDUCATION . 1,
                "order" => 3
            ],
            [
                "id" => DBConstant::EDUCATION . 1 . 4,
			    "name" => "Thực địa liên ngành",
			    "parent_id" => DBConstant::EDUCATION . 1,
                "order" => 4
            ],

            // Tiến sĩ
            [
                "id" => DBConstant::EDUCATION . 2 . 0,
			    "name" => "Tiến sĩ Biến đổi khí hậu và phát triển bền vững",
			    "parent_id" => DBConstant::EDUCATION . 2,
                "order" => 0
            ],

            // Công tác sinh viên
            [
                "id" => DBConstant::EDUCATION . 4 . 0,
			    "name" => "Biểu mẫu",
			    "parent_id" => DBConstant::EDUCATION . 4,
                "order" => 0
            ],
            [
                "id" => DBConstant::EDUCATION . 4 . 1,
			    "name" => "Văn bản liên quan",
			    "parent_id" => DBConstant::EDUCATION . 4,
                "order" => 1
            ],

            // Tài nguyên số
            [
                "id" => DBConstant::SCIENTIFIC_RESEARCH . 0 . 0,
			    "name" => "Luận văn, luận án",
			    "parent_id" => DBConstant::SCIENTIFIC_RESEARCH . 0,
                "order" => 0
            ],
            [
                "id" => DBConstant::SCIENTIFIC_RESEARCH . 0 . 1,
			    "name" => "Các công trình khoa học",
			    "parent_id" => DBConstant::SCIENTIFIC_RESEARCH . 0,
                "order" => 1
            ],

	    ];

	    DB::table('categories')->insert($data);
    }
}
