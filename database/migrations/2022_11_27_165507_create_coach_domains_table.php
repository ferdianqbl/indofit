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
        Schema::create('coach_domains', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('working_days');
            $table->time('working_time_start');
            $table->time('working_time_end');
            $table->string('price');
            $table->timestamps();

            $table->bigInteger('sport_id')->unsigned()->index();
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');

            $table->uuid('coach_id')->index();
            $table->foreign('coach_id')->references('id')->on('coaches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_domains');
    }
};
