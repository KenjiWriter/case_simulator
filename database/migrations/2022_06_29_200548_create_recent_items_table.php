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
        Schema::create('recent_items', function (Blueprint $table) {
            $table->id();
            $table->string('ItemName');
            $table->string('ItemCase');
            $table->string('ItemPrice');
            $table->string('ItemChances');
            $table->string('ItemOwner');
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
        Schema::dropIfExists('recent_items');
    }
};
