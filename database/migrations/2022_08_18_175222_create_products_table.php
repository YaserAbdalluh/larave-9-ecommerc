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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cate_id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('slug');
            $table->string('status');
            $table->longText('description');
            $table->string('original_price');
            $table->string('selling_price');
            $table->string('photo');
            $table->string('photo1');
            $table->string('photo2');
            $table->string('photo3')->nullable();;
            $table->string('photo4')->nullable();;
            $table->string('photo5')->nullable();;
            $table->string('qty');
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
        Schema::dropIfExists('products');
    }
};
