<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AccessControl;

class AccessControlController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->accessControlDomain = app("App\Domains\AccessControlDomain");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $accesses = $this->accessControlDomain->all();

        return view('backend.access.index', compact('accesses'));
    }

    public function getAccessesToDataTable() {
        $accesses = $this->accessControlDomain->all();

        return $this->dataTableService->getDataTableByCollection($accesses)
            ->addColumn('user', function (AccessControl $access) {
                return is_null($access->user) ? 'Não definido' : $access->user->first_name;
            })
            ->make(true)
        ;
    }
}