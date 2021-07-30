<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->unsigned();
            $table->date('day_date');
            $table->string('start')->nullable();
            $table->string('finish')->nullable();
            $table->text('ot')->nullable();
            $table->text('project_no')->nullable();
            $table->text('activity')->nullable();
            $table->string('location')->nullable();
            $table->text('cek')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
