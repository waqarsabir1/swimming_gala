<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblracesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblraces', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('length');
            $table->integer('status');
            $table->date('start_date'); 
            $table->time('start_time'); 
            $table->date('end_date'); 
            $table->time('end_time'); 
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
        Schema::dropIfExists('tblraces');
    }
}
