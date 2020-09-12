<?php

namespace App\Http\Controllers;

use App\Repositories\MedicamentoRepository;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MedicamentosExport;

class MedicamentoController extends AppBaseController
{
    protected $clienteRepository;

    /**
     * UserController constructor.
     */
    public function __construct(MedicamentoRepository $clientRepository)
    {
        $this->clienteRepository = $clientRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->try(function () {
            $data = $this->clienteRepository->paginate(10);
            return $this->sendResponse($data, 'index Medicamento');
        });
    }

    public function export()
    {
        return Excel::download(new MedicamentosExport, 'medicamento.xlsx');
    }
}
