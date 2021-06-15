<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFunctionTriggerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $db = DB::connection('mysql');
        
        $pdo = $db->getPdo();
        $pdo->setAttribute( \PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        $stmt = $pdo->exec( "CREATE FUNCTION NAME_SLUG(parent_name VARCHAR(100),name VARCHAR(100))
                        RETURNS VARCHAR(100)
                        RETURN LOWER(REPLACE(CONCAT('/',parent_name,'/',name), ' ', '-'))");
        $stmt1 = $pdo->exec("CREATE TRIGGER tg_categories_insert
                        BEFORE INSERT ON categories
                        FOR EACH ROW
                        SET NEW.slug = NAME_SLUG(NEW.parent_name,NEW.name)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("drop function name_slug");
        DB::statement("drop trigger tg_danhmuc_insert");
    }
}
