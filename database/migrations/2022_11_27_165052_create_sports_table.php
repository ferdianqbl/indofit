<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('sports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('sports')->insert(
            array(
                array('id' => 1, 'name' => 'Sepakbola'),
                array('id' => 2, 'name' => 'Basket'),
                array('id' => 3, 'name' => 'Tennis'),
                array('id' => 4, 'name' => 'Badminton'),
                array('id' => 5, 'name' => 'Yoga')
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sports');
    }
};
