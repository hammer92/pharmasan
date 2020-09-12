<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->longText('expediente')->nullable();
            $table->longText('producto')->nullable();
            $table->longText('titular')->nullable();
            $table->longText('registrosanitario')->nullable();
            $table->longText('fechaexpedicion')->nullable();
            $table->longText('fechavencimiento')->nullable();
            $table->longText('estadoregistro')->nullable();
            $table->longText('expedientecum')->nullable();
            $table->longText('consecutivocum')->nullable();
            $table->longText('cantidadcum')->nullable();
            $table->longText('descripcioncomercial')->nullable();
            $table->longText('estadocum')->nullable();
            $table->longText('fechaactivo')->nullable();
            $table->longText('fechainactivo')->nullable();
            $table->longText('muestramedica')->nullable();
            $table->longText('unidad')->nullable();
            $table->longText('atc')->nullable();
            $table->longText('descripcionatc')->nullable();
            $table->longText('viaadministracion')->nullable();
            $table->longText('concentracion')->nullable();
            $table->longText('principioactivo')->nullable();
            $table->longText('unidadmedida')->nullable();
            $table->longText('cantidad')->nullable();
            $table->longText('unidadreferencia')->nullable();
            $table->longText('formafarmaceutica')->nullable();
            $table->longText('nombrerol')->nullable();
            $table->longText('tiporol')->nullable();
            $table->longText('modalidad')->nullable();
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
        Schema::dropIfExists('medicamentos');
    }
}
