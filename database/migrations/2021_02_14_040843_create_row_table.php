<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('row_pattern', function (Blueprint $table) {
            $table->id();
            $table->string('pattern');
            $table->integer('bl_a');
            $table->integer('tl_a');
            $table->integer('bl_b');
            $table->integer('tl_b');
            $table->integer('bl_c');
            $table->integer('tl_c');
            $table->boolean('can0');
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
        Schema::dropIfExists('row_pattern');
    }
}
