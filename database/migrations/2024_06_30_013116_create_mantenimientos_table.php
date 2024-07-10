<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id('id_mantenimiento');
            $table->unsignedBigInteger('id_nuevat');
            $table->foreign('id_nuevat')->references('id')->on('nuevat')->onDelete('cascade');
            $table->string('tipo_mantenimiento')->nullable();
            $table->string('observacion_mantenimiento')->nullable();
            $table->string('recomendacion_mantenimiento')->nullable();
            $table->string('fecha_mantenimiento')->nullable();
            $table->string('tecnico_mantenimiento')->nullable();
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
        Schema::dropIfExists('mantenimientos');
    }
}
