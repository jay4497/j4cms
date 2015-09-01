<?php

return [
    'allowImageType' => ['jpg', 'jpeg', 'gif', 'png', 'bmp'],

    'allowFileType' => ['rar', 'zip', 'doc', 'docx', 'xlsx', 'xls', 'ppt', 'pptx', 'txt'],

    'maxImageSize' => 5,

    'maxFileSize' => 20,

    'waterMark' => public_path('assets/image/watermark.png'),

    'show_type' => [
        1 => 'index',
        2 => 'list',
        3 => 'page',
        4 => 'link'
    ],

    'content_type' => [
        1 => 'product',
        2 => 'news'
    ],

    'ad_type' => [
        1 => 'image',
        2 => 'code'
    ],
];