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
        Schema::create('people', function (Blueprint $table) {
            $table->id()->index();
            $table->string('name')->index();
            $table->string('surname')->index();
            $table->integer('age');
            $table->string('gender');
            $table->string('postal_code');
            $table->string('city');
            $table->string('street');
            $table->string('house_number');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('persons');
    }
};
