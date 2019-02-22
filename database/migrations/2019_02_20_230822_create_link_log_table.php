<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country')->nullable();
            $table->string('browser')->nullable();
            $table->string('ip')->nullable();
            $table->unsignedInteger('link_id');
            $table->integer('users_id')->nullable();
            $table->index(["link_id"], 'fk_link_log_link1_idx');
            $table->foreign('link_id', 'fk_link_log_link1_idx')
                ->references('id')->on('link')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('link_log');
    }
}
