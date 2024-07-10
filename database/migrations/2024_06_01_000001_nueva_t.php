<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('nuevat', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_bien')->nullable();
            $table->string('codigo_anterior')->nullable();
            $table->string('identificador')->nullable();
            $table->string('nro_acta_matriz')->nullable();
            $table->string('bld_bca')->nullable();
            $table->string('bien')->nullable();
            $table->string('serie_identificacion')->nullable();
            $table->string('modelo_caracteristicas')->nullable();
            $table->string('marca_otros')->nullable();
            $table->string('critico')->nullable();
            $table->string('moneda')->nullable();
            $table->string('valor_compra')->nullable();
            $table->string('recompra')->nullable();
            $table->string('color')->nullable();
            $table->string('material')->nullable();
            $table->string('dimensiones')->nullable();
            $table->string('condicion_bien')->nullable();
            $table->string('habilitado')->nullable();
            $table->string('estado_bien')->nullable();
            $table->string('id_bodega')->nullable();
            $table->string('bodega')->nullable();
            $table->string('id_ubicacion')->nullable();
            $table->string('ubicacion_bodega')->nullable();
            $table->string('nro_cedula_ruc')->nullable();
            $table->string('custodio_actual')->nullable();
            $table->string('custodio_activo')->nullable();
            $table->string('origen_ingreso')->nullable();
            $table->string('tipo_ingreso')->nullable();
            $table->string('nro_compromiso')->nullable();
            $table->string('estado_acta')->nullable();
            $table->string('contabilizado_acta')->nullable();
            $table->string('contabilizado_bien')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('item_renglon')->nullable();
            $table->string('cuenta_contable')->nullable();
            $table->string('depreciable')->nullable();
            $table->string('fecha_creacion')->nullable();
            $table->string('fecha_ingreso')->nullable();
            $table->string('fecha_ultima_depreciacion')->nullable();
            $table->string('vida_util')->nullable();
            $table->string('fecha_termino_depreciacion')->nullable();
            $table->string('valor_contable')->nullable();
            $table->string('valor_residual')->nullable();
            $table->string('valor_en_libros')->nullable();
            $table->string('valor_depreciacion_acumulada')->nullable();
            $table->string('comodato')->nullable();
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
        Schema::dropIfExists('nuevat');
    }
};
