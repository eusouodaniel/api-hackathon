<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrder;
use App\Models\Order;

class OrderController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->vacancyDomain = app("App\Domains\OrderDomain");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('backend.vacancy.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('backend.vacancy.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacancy $request) {
        $request['ip'] = $request->getClientIp();
        $return = $this->vacancyDomain->create($request->all());

        if ($return instanceof \Exception || empty($return)) {
            return back()
                ->withInput()
                ->withErrors('Houve um erro inesperado, tente novamente mais tarde!');
        }

        return redirect()
            ->route('backend.vacancies.index')
            ->with('success', 'Vaga cadastrada com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $int
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id) {
        $vacancy = $this->vacancyDomain->find($id);
        
        return view('backend.vacancy.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreVacancy  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVacancy $request, int $id) {
        $return = $this->vacancyDomain->update($request->all(), $id);

        if ($return instanceof \Exception || empty($return)) {
            return back()
                ->withInput()
                ->withErrors('Houve um erro inesperado, tente novamente mais tarde!');
        }

        return redirect()
            ->route('backend.vacancies.index')
            ->with('success', 'Vaga atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $return = $this->vacancyDomain->delete($id);

        if (!$return) {
            return back()
                ->withInput()
                ->withErrors('Houve um erro inesperado, tente novamente mais tarde!');
        }

        return redirect()
            ->route('backend.vacancies.index')
            ->with('success', 'Vaga removida com sucesso');
    }

    public function getVacanciesToDataTable() {
        $vacancies = $this->vacancyDomain->all();
        if(\Auth::user()->roles()->first()->name == 'user'){
            $vacancies = $this->vacancyDomain->findBy(['user_id' => \Auth::user()->roles()->first()->id]);
        }

        return $this->dataTableService->getDataTableByCollection($vacancies)
            ->addColumn('status', function (Vacancy $vacancy) {
                return is_null($vacancy->status) ? 'Não ativo' : 'Ativado';
            })
            ->addColumn('actions', function (Vacancy $vacancy) {
                return view('backend.vacancy.datatables.actions', compact('vacancy'));
            })
            ->rawColumns(['actions'])
            ->make(true)
        ;
    }
}