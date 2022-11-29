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
        Schema::create('domain_block_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('block_request_id')->index();
            $table->foreignId('domain_id')->constrained()->restrictOnDelete();
            $table->unsignedTinyInteger('state')->default(0)->index();
            $table->foreignId('block_control_list_id')->constrained()->restrictOnDelete();

            $table->unsignedTinyInteger('level_1_decision')->nullable();
            $table->timestamp('level_1_decision_at');
            $table->unsignedBigInteger('level_1_user_id');
            $table->text('level_1_comments')->nullable();

            $table->unsignedTinyInteger('level_2_decision')->nullable();
            $table->timestamp('level_2_decision_at');
            $table->unsignedBigInteger('level_2_user_id');
            $table->text('level_2_comments')->nullable();

            $table->timestamp('revoked_at')->nullable();
            $table->unsignedBigInteger('revoked_by_user_id')->nullable();
            $table->text('revoked_comments')->nullable();

            $table->timestamp('last_reviewed_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domain_block_requests');
    }
};
