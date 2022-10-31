<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_conductor')
            ->nullable()
            ->constrained('conductores')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('peso')->nullable();
            $table->string('placa')->nullable();
            $table->string('estado')->nullable();
            $table->string('fecha_registro')->nullable();
            $table->string('tiempo_registro')->nullable();
            $table->foreignId('id_tipo')
            ->nullable()
            ->constrained('tipo_vehiculo')
            ->onDelete('no action')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('vehiculos');
    }
}
