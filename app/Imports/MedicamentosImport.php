<?php

namespace App\Imports;

use App\Medicamento;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;


class MedicamentosImport implements ToModel, WithBatchInserts, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Medicamento([
                "expediente" => $row["expediente"],
                "producto" => $row["producto"],
                "titular" => $row["titular"],
                "registrosanitario" => $row["registrosanitario"],
                "fechaexpedicion" => $row["fechaexpedicion"],
                "fechavencimiento" => $row["fechavencimiento"],
                "estadoregistro" => $row["estadoregistro"],
                "expedientecum" => $row["expedientecum"],
                "consecutivocum" => $row["consecutivocum"],
                "cantidadcum" => $row["cantidadcum"],
                "descripcioncomercial" => $row["descripcioncomercial"],
                "estadocum" => $row["estadocum"],
                "fechaactivo" => $row["fechaactivo"],
                "fechainactivo" => $row["fechainactivo"],
                "muestramedica" => $row["muestramedica"],
                "unidad" => $row["unidad"],
                "atc" => $row["atc"],
                "descripcionatc" => $row["descripcionatc"],
                "viaadministracion" => $row["viaadministracion"],
                "concentracion" => $row["concentracion"],
                "principioactivo" => $row["principioactivo"],
                "unidadmedida" => $row["unidadmedida"],
                "cantidad" => $row["cantidad"],
                "unidadreferencia" => $row["unidadreferencia"],
                "formafarmaceutica" => $row["formafarmaceutica"],
                "nombrerol" => $row["nombrerol"],
                "tiporol" => $row["tiporol"],
                "modalidad" => $row["modalidad"],
            ]
        );
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
