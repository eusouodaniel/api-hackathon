<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePassword;
use App\Http\Requests\StoreUser;
use App\Models\User;

class UserController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->userDomain = app("App\Domains\UserDomain");
        $this->roleDomain = app("App\Domains\RoleDomain");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('backend.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = $this->roleDomain->findAllRolesExcept(['candidate', 'directory']);

        return view('backend.user.new', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request) {
        $return = $this->userDomain->create($request->all());

        if ($return instanceof \Exception || empty($return)) {
            return back()
                ->withInput()
                ->withErrors('Houve um erro inesperado, tente novamente mais tarde!');
        }

        return redirect()
            ->route('backend.users.index')
            ->with('success', 'Usuário cadastrado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $int
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id) {
        $user = $this->userDomain->find($id);
        $roles = $this->roleDomain->findAllRolesExcept(['candidate', 'directory']);
        
        return view('backend.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request, int $id) {
        $return = $this->userDomain->update($request->all(), $id);

        if ($return instanceof \Exception || empty($return)) {
            return back()
                ->withInput()
                ->withErrors('Houve um erro inesperado, tente novamente mais tarde!');
        }

        return redirect()
            ->route('backend.users.index')
            ->with('success', 'Usuário atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $return = $this->userDomain->delete($id);

        if (!$return) {
            return back()
                ->withInput()
                ->withErrors('Houve um erro inesperado, tente novamente mais tarde!');
        }

        return redirect()
            ->route('backend.users.index')
            ->with('success', 'Usuário removido com sucesso');
    }

    public function changePassword(StorePassword $request) {
        $result = $this->userDomain->changePassword($request->all());
        if (!$result) {
            return response()->json(500);
        }
        return response()->json(200);
    }

    public function getUsersToDataTable() {
        $users = $this->userDomain->findUsersWithoutRoles(['candidate', 'directory']);

        return $this->dataTableService->getDataTableByCollection($users)
            ->addColumn('access_level', function (User $user) {
                return is_null($user->roles()->first()) ? 'Não definido' : $user->roles()->first()->description;
            })
            ->addColumn('actions', function (User $user) {
                return view('backend.user.datatables.actions', compact('user'));
            })
            ->rawColumns(['actions'])
            ->make(true)
        ;
    }
}