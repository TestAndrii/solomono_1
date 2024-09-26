<?php

namespace Solomono\test1\Database\Seeders;


use Solomono\test1\Database\Seeders\{CategoriesSeeder, ProductsSeeder};

class DatabaseSeeder
{
    public static function run()
    {
        CategoriesSeeder::run();
        ProductsSeeder::run();
    }
}
