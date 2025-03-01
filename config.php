<?php
return [
    'upload_base_dir' => $_SERVER['DOCUMENT_ROOT'] . '/jm-uploads/',
    'upload_base_url' => '/jm-uploads/',
    'allowed_types' => ['image/jpeg', 'image/png'],
    'max_file_size' => 5 * 1024 * 1024, // 5MB
    'thumbnail_size' => [150, 150],
];
