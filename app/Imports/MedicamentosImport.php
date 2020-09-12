<?php

namespace App\Imports;

use App\Medicamento;
use Maatwebsite\Excel\Concerns\ToModel;

class MedicamentosImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Medicamento([
                "expediente" => $row[0],
                "producto" => $row[1],
                "titular" => $row[2],
                "registrosanitario" => $row[3],
                "fechaexpedicion" => $row[4],
                "fechavencimiento" => $row[5],
                "estadoregistro" => $row[6],
                "expedientecum" => $row[7],
                "consecutivocum" => $row[8],
                "cantidadcum" => $row[9],
                "descripcioncomercial" => $row[10],
                "estadocum" => $row[11],
                "fechaactivo" => $row[12],
                "fechainactivo" => $row[13],
                "muestramedica" => $row[14],
                "unidad" => $row[15],
                "atc" => $row[16],
                "descripcionatc" => $row[17],
                "viaadministracion" => $row[18],
                "concentracion" => $row[19],
                "principioactivo" => $row[20],
                "unidadmedida" => $row[21],
                "cantidad" => $row[22],
                "unidadreferencia" => $row[23],
                "formafarmaceutica" => $row[24],
                "nombrerol" => $row[25],
                "tiporol" => $row[26],
                "modalidad" => $row[27],
            ]
        );
    }
}
