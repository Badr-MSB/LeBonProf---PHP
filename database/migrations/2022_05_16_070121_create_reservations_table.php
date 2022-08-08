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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('id_post');
            $table->integer('id_student')->nullable($value = true);
            $table->integer('student_confirmed');
            $table->integer('id_tuteur')->nullable($value = true);
            $table->integer('tuteur_confirmed');
            $table->integer('id_lieu')->nullable($value = true);
            $table->integer('lieu_confirmed');
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
        Schema::dropIfExists('reservations');
    }
};
