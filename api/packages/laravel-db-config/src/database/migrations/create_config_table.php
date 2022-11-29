<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('model');
            $table->string('key');
            $table->unsignedTinyInteger('config_type');
            $table->string('str_value')->nullable();
            $table->unsignedTinyInteger('bool_value')->nullable();
            $table->unsignedBigInteger('int_value')->nullable();
            $table->unsignedFloat('float_value')->nullable();
            $table->text('text_value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
};
