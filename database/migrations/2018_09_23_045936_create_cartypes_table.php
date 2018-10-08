<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('car_type');
            $table->string('franchise_number');
            $table->string('plate_number');
            $table->string('cr_number');
            $table->string('or_number');
            $table->date('lto_expiry_date');
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
        Schema::dropIfExists('cartypes');
    }
}
