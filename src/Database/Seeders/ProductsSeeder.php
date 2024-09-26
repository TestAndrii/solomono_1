<?php

namespace Solomono\test1\Database\Seeders;


use Solomono\test1\Database\DB;

class ProductsSeeder
{
    private static $table = 'products';

    public static function run()
    {
        $products = config('seeders.' . self::$table);

        if (!is_array($products)) {
            return;
        }

        for ($index = 0; $index < count($products); $index++) {
            $product = $products[$index];

            if (!self::getTable()->where($product)->exists()) {
                $product['category_id'] = DB::table('categories')
                    ->select('id')
                    ->inRandomOrder()
                    ->first()
                    ->id;

                self::getTable()->insert($product);
            }
        }
    }

    private static function getTable()
    {
        return DB::table(self::$table);
    }
}
