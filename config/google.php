<?php

return [
    'project_1' => [
        'application_name' => env('GOOGLE_SHEETS_1_APPLICATION_NAME', ''),
        'client_id' => env('GOOGLE_SHEETS_1_CLIENT_ID', ''),
        'client_secret' => env('GOOGLE_SHEETS_1_CLIENT_SECRET', ''),
        'redirect_uri' => env('GOOGLE_SHEETS_1_REDIRECT', ''),
        'scopes' => [\Google\Service\Sheets::DRIVE, \Google\Service\Sheets::SPREADSHEETS],
        'access_type' => 'online',
        'approval_prompt' => 'auto',
        'developer_key' => env('GOOGLE_SHEETS_1_DEVELOPER_KEY', ''),
        'service' => [
            'enable' => env('GOOGLE_SERVICE_1_ENABLED', false),
            'file' => storage_path('houloul-herbalance-b2cc8a2ee6ae.json'),
        ],
    ],

    'project_2' => [
        'application_name' => env('GOOGLE_SHEETS_2_APPLICATION_NAME', ''),
        'client_id' => env('GOOGLE_SHEETS_2_CLIENT_ID', ''),
        'client_secret' => env('GOOGLE_SHEETS_2_CLIENT_SECRET', ''),
        'redirect_uri' => env('GOOGLE_SHEETS_2_REDIRECT', ''),
        'scopes' => [\Google\Service\Sheets::DRIVE, \Google\Service\Sheets::SPREADSHEETS],
        'access_type' => 'online',
        'approval_prompt' => 'auto',
        'developer_key' => env('GOOGLE_SHEETS_2_DEVELOPER_KEY', ''),
        'service' => [
            'enable' => env('GOOGLE_SERVICE_2_ENABLED', false),
            'file' => storage_path('houloul-herbalance-bio-4c521341e537.json'),
        ],
    ],
];
