<?php
return [
    'welcome' => 'Chào mừng bạn đến với Website!',
    'role' => [
        'admin' => 'Admin',
        'sp_admin' => 'Super Admin',
    ],
    'sex' => [
        'male' => "Nam",
        'female' => 'Nữ',
    ],
    'user' => [
        'label' => [
            'title_form' => 'Danh sách người dùng',
            'name' => 'Họ và tên',
            'email' => 'Đia chỉ email',
            'password' => 'Mật khẩu',
            'role' => 'Quyền hạn',
            'user_list' => 'Danh sách nhân sự',
            'option' => 'Tùy chọn',
            'department' => 'Khoa',
            'phone' => 'Số điện thoại',
            'facebook' => 'Facebook',
            'sex' => 'Giới tính',
            'profile' => 'Cập nhật thông tin',
            'date_of_birth' => 'Ngày sinh',
        ],
        'placeholder' => [
            'name' => 'Nhập họ và tên',
            'email' => 'Nhập đia chỉ email',
            'password' => 'Nhập mật khẩu',
            'phone' => 'Nhập số điện thoại',
            'role' => 'Chọn quyền hạn',
            'facebook' => 'Nhập link facebook',
        ],
        'button' => [
            'submit' => 'Lưu',
            'reset' => 'Reset',
        ],
    ],
    'departments' => [
        'label' => [
            'title_form' => 'Danh sách khoa',
            'name' => 'Tên khoa',
            'department_list' => 'Danh sách khoa',
            'option' => 'Tùy chọn'
        ],
        'placeholder' => [
            'name' => 'Nhập tên khoa',
        ],
        'button' => [
            'submit' => 'Lưu',
            'reset' => 'Reset',
        ],
    ],
    'category' => [
        'validate' => [
            'name_required' => 'Tên trống!!! Bạn vui lòng nhập đầy đủ dữ liệu!!!'
        ]
    ],
    'post' => [
        'validate' => [
            'title_required' => 'Tiêu đề trống!!! Bạn vui lòng nhập đầy đủ dữ liệu!!!',
            'category_required' => 'Danh mục trống!!! Bạn vui lòng nhập đầy đủ dữ liệu!!!',
            'thumbnail_required' => 'Thumbail trống!!! Bạn vui lòng nhập đầy đủ dữ liệu!!!',
            'thumbnail_image' => 'Thumbnail phải là một ảnh!!!'
        ]
    ]
];