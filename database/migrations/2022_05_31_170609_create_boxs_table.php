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
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->text('item1')->nullable();
            $table->text('item2')->nullable();
            $table->text('item3')->nullable();
            $table->text('item4')->nullable();
            $table->text('item5')->nullable();
            $table->text('item6')->nullable();
            $table->text('item7')->nullable();
            $table->text('item8')->nullable();
            $table->text('item9')->nullable();
            $table->text('item10')->nullable();

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
        Schema::dropIfExists('boxes');
    }
};
