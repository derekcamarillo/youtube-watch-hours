<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->string('title')->nullable()->after('link');
            $table->integer('daily_limit')->default(0)->after('seconds');
            $table->string('gender')->nullable()->default('all')->after('daily_limit');
            $table->string('country')->nullable()->default('all')->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->dropColumn('title');
            $table->dropColumn('daily_limit');
            $table->dropColumn('gender');
            $table->dropColumn('country');
        });
    }
}
