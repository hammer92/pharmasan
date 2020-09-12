<?php

namespace App\Http\Controllers;

use App\Repositories\ClienteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends AppBaseController
{

    protected $clienteRepository;

    /**
     * UserController constructor.
     */
    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
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
            return $this->sendResponse($data, 'index Cliente');
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->try(function () use ($request) {
            $validator = Validator::make($request->all(), [
                'documento' => 'required|max:255',
                'nombre' => 'required|max:255',
                'correo' => 'required|email|max:255',
                'direccion' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return $this->sendValidate($validator->errors());
            }
            $data = $this->clienteRepository->create($request->all());
            return $this->sendResponse($data, 'store Cliente');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->try(function () use ($id){
            $data = $this->clienteRepository->find($id);
            return $this->sendResponse($data, 'show Cliente');
        });
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->try(function () use ($request, $id) {
            $validator = Validator::make($request->all(), [
                'documento' => 'required|max:255',
                'nombre' => 'required|max:255',
                'correo' => 'required|email|max:255',
                'direccion' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return $this->sendValidate($validator->errors());
            }

            $data = $this->clienteRepository->update($request->only(['documento', 'nombre', 'correo', 'direccion']), $id);
            return $this->sendResponse($data, 'update Cliente');
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->try(function () use ($id){
            $this->clienteRepository->delete($id);
            return $this->sendSuccess('destroy Cliente');
        });
    }
}
