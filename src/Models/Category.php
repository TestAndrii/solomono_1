<?php

namespace Solomono\test1\Models;

use Solomono\test1\Database\DB;

class Category
{
    protected static string $tableName = 'categories';
    protected static $table;

    public function __construct()
    {
        self::$table = self::getTable();
    }

    public static function getTable()
    {
        return DB::table(self::$tableName);
    }

    public static function getCategories()
    {
        return self::getTable()->get();
    }
}
