<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::connection('pgsql')->create('nuevaC', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_bien')->nullable();
            $table->string('codigo_bien_compuesto')->nullable();
            $table->string('tipo')->nullable();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::connection('pgsql')->dropIfExists('nuevaC');
    }
};
