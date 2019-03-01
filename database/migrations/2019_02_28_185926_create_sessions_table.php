<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->unique();

            $table->unsignedInteger('money')->nullable();
            $table->unsignedInteger('customers')->nullable();
            $table->unsignedInteger('weather')->nullable();
            $table->unsignedInteger('day')->nullable();
            $table->unsignedInteger('lemonadePrice')->nullable();
            $table->unsignedInteger('mix')->nullable();
            $table->unsignedInteger('cups')->nullable();
            $table->unsignedInteger('mixPrice')->nullable();
            $table->unsignedInteger('cupPrice')->nullable();
            $table->unsignedInteger('buyCounter')->nullable();

            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->text('payload');
            $table->integer('last_activity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
