<?php

namespace Solomono\test1\Models;

use Solomono\test1\Database\DB;

class Product
{
    protected static string $tableName = 'products';
    protected static $table;

    public function __construct()
    {
        self::$table = self::getTable();
    }

    public static function getTable()
    {
        return DB::table(self::$tableName);
    }

    public static function getProducts()
    {
        return self::getTable()->get();
    }

    public static function countProducts($category_id)
    {
        return self::getTable()->where("category_id", $category_id)->count();
    }
}
