<?php
return [
    'welcome' => 'Welcome to Website!',
    'user' => [
        'email_require' => 'email is required',
        'password_require' => 'password is required',
        'role_require' => 'role is required',
    ],
    'category' => [
        'validate' => [
            'name_required' => 'name is required'
        ]
    ],
    'post' => [
        'validate' => [
            'title_required' => 'Title is required',
            'category_required' => 'Category is required',
            'thumbnail_required' => 'Thumbnail is required',
            'thumbnail_image' => 'Thumbnail must be an image'
        ]
    ]
];