<?php

namespace Solomono\test1\Database\Migrations;

use Solomono\test1\Database\DB;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable
{
    private static $schema;
    private static $table = 'categories';

    public static function run()
    {
        self::setVariables();

        if (!self::$schema->hasTable(self::$table)) {
            self::$schema->create(self::$table, function (Blueprint $table) {
                $table->id();
                $table->string('name');
            });
        }
    }

    private static function setVariables()
    {
        self::$schema = DB::getCapsule()->schema();
    }
}
