<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ley', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_conductor')
            ->nullable()
            ->constrained('conductores')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('fecha_entrada')->nullable();
            $table->string('fecha_salida')->nullable();
            $table->string('cliente')->nullable();
            $table->string('producto')->nullable();
            $table->string('cargue')->nullable();
            $table->string('descargue')->nullable();
            $table->string('ciudad_entrada')->nullable();
            $table->string('ciudad_salida')->nullable();
            $table->string('peso_entrada')->nullable();
            $table->string('peso_salida')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('fecha_registro')->nullable();
            $table->string('tiempo_registro')->nullable();
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
        Schema::dropIfExists('ley');
    }
}
