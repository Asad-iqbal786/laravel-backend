<?php

return [

    // 'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'paths' => ['api/*', 
    'api/products', 
    '*'],


    // 'allowed_methods' => ['*'],
    'allowed_methods' => ['POST', 'GET', 'DELETE', 'PUT', '*'],


    'allowed_origins' => ['*'],
    // 'allowed_origins' => [
        'http://localhost:8080/',
    //     'http://localhost:8080',
    //     'https://backend.arthabour.com',
    //     'https://www.eshop.arthabour.com',
    // ],

    'allowed_origins_patterns' => [],

    // 'allowed_headers' => ['*'],
    'allowed_headers' => ['X-Custom-Header', 'Upgrade-Insecure-Requests', '*'],


    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
