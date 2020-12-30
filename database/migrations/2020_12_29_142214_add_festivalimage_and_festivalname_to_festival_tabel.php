<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFestivalimageAndFestivalnameToFestivalTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('festivals', function (Blueprint $table) {
            $table->string('festivalName')->nullable()->after('id');
            $table->string('festivalImage')->nullable()->after('description');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('festivals', function (Blueprint $table) {
            $table->dropColumn('festivalName');
            $table->dropColumn('festivalImage');
        });
    }
}
