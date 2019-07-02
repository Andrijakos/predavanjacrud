<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pred', function (Blueprint $table) {
            $table->bigInteger('sifPred');
            $table->string('kratPred');
            $table->string('nazPred');
            $table->bigInteger('sifOrgjed');
            $table->bigInteger('upisanoStud');
            $table->bigInteger('brojSatiThedno');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pred');
    }
}
