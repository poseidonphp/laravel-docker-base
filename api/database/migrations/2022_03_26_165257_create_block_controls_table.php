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
        Schema::create('block_controls', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('block_control_type_id');
            $table->string('name');
            $table->jsonb('control_props')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('block_controls');
    }
};
