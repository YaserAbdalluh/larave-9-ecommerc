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
        Schema::table('users_tabele', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string(column:'phone')->nullable();
            $table->string(column:'store_name')->nullable();
            $table->string(column:'location')->nullable();
            $table->string(column:'product_type')->nullable();
            $table->foreignId(column:'prod_id')->nullable()->constrained();
        });
    }
};
