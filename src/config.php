<?php

return [
    'db-conncet' => [
        'driver'    => 'mysql',
        'host'      => 'mysql',
        'database'  => 'solomono1',
        'username'  => 'root',
        'password'  => 'root',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ],

    'seeders' => [
        'categories' => [
            ['name' => 'TV'],
            ['name' => 'Laptops'],
            ['name' => 'Tablets'],
            ['name' => 'Smartphones'],
        ],

        'products' => [
            ['date' => '2023-09-01', 'price' => 100.01, 'name' => 'Product 1'],
            ['date' => '2023-09-02', 'price' => 200.02, 'name' => 'Product 2'],
            ['date' => '2023-09-03', 'price' => 300.03, 'name' => 'Product 3'],
            ['date' => '2023-09-04', 'price' => 400.04, 'name' => 'Product 4'],
            ['date' => '2023-09-05', 'price' => 500.05, 'name' => 'Product 5'],

            ['date' => '2023-09-06', 'price' => 600.06, 'name' => 'Product 6'],
            ['date' => '2023-09-07', 'price' => 700.07, 'name' => 'Product 7'],
            ['date' => '2023-09-08', 'price' => 800.08, 'name' => 'Product 8'],
            ['date' => '2023-09-09', 'price' => 900.09, 'name' => 'Product 9'],
            ['date' => '2023-09-10', 'price' => 1000.10, 'name' => 'Product 10'],
        ],
    ]
];
