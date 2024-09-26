<?php

namespace Solomono\test1\Database\Seeders;


use Solomono\test1\Database\DB;

class CategoriesSeeder
{
    private static $table = 'categories';

    public static function run()
    {
        $data = config('seeders.' . self::$table);

        if (!is_array($data)) {
            return;
        }

        foreach ($data as $d) {
            if (!self::getTable()->where($d)->exists()) {
                self::getTable()->insert($d);
            }
        }
    }

    private static function getTable()
    {
        return DB::table(self::$table);
    }
}
