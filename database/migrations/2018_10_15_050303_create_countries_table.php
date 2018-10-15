<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id')->unsigened();
            $table->char('iso', 30)->comment();
            $table->string('iso3', 30)->comment('English country name');
            $table->string('fips', 30)->comment('Full English country name');
            $table->string('country_name', 100)->comment('English country name)');
            $table->string('continent', 4)->comment('Continent code)');
            $table->string('currency_code', '5')->nullable();
            $table->string('currency_name', '45')->nullable();
            $table->string('phone_prefix')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('languages', 45)->nullable();
            $table->string('geonameid', 45)->nullable();
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
        Schema::dropIfExists('countries');
    }
}
