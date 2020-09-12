<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AppBaseController;
use App\Repositories\MedicamentoRepository;
use App\Repositories\UserRepository;
use App\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function foo\func;

class UserController extends AppBaseController
{
    protected $userRepository;

    /**
     * UserController constructor.
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * Get authenticated user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function current(Request $request)
    {
        return $this->try(function () use ($request) {
            $user = $request->user();
            $user->acceso = $user->acceso;
            return $this->sendResponse($user, 'Datos Usuario');
        });

    }

    /**
     * Get roles user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function roles(Request $request)
    {
        return $this->try(function () use ($request) {
            $roles = Roles::all();
            return $this->sendResponse($roles, 'roles Usuario');
        });

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->try(function () {
            $data = $this->userRepository->paginate(10, [
                \DB::raw('(select nombre from roles where users.roles_id = roles.id limit 1) as rol'),
                'id', 'name', 'email', 'roles_id'
            ]);
            return $this->sendResponse($data, 'index Usuarios');
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
                'name' => 'required|max:255',
                'roles_id' => 'required|exists:roles,id',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return $this->sendValidate($validator->errors());
            }

            $data = $this->userRepository->create([
                'name' => $request['name'],
                'email' => $request['email'],
                'roles_id' => $request['roles_id'],
                'password' => bcrypt($request['password']),
            ]);
            return $this->sendResponse($data, 'store Usuarios');
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
        return $this->try(function () use ($id) {
            $data = $this->userRepository->find($id);
            return $this->sendResponse($data, 'show Usuarios');
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
                'name' => 'required|max:255',
                'roles_id' => 'required|exists:roles,id',
                'email' => 'required|email|max:255|unique:users,email,' . $id,
            ]);

            if ($validator->fails()) {
                return $this->sendValidate($validator->errors());
            }


            $data = $this->userRepository->update($request->only('name', 'email', 'roles_id'), $id);
            return $this->sendResponse($data, 'store Usuarios');
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
        return $this->try(function () use ($id) {
            $data = $this->userRepository->delete($id);
            return $this->sendSuccess('destroy Usuarios');
        });
    }
}
