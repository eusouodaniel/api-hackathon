<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCar;
use App\Models\Car;

class CarController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->carDomain = app("App\Domains\CarDomain");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('backend.car.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('backend.car.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCar $request) {
        
        $return = $this->carDomain->create($request->all());

        if ($return instanceof \Exception || empty($return)) {
            return back()
                ->withInput()
                ->withErrors('Houve um erro inesperado, tente novamente mais tarde!');
        }

        return redirect()
            ->route('backend.cars.index')
            ->with('success', 'Carro cadastrado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $int
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id) {
        $car = $this->carDomain->find($id);
        
        return view('backend.car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreCar  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCar $request, int $id) {
        $return = $this->carDomain->update($request->all(), $id);

        if ($return instanceof \Exception || empty($return)) {
            return back()
                ->withInput()
                ->withErrors('Houve um erro inesperado, tente novamente mais tarde!');
        }

        return redirect()
            ->route('backend.cars.index')
            ->with('success', 'Carro atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $return = $this->carDomain->delete($id);

        if (!$return) {
            return back()
                ->withInput()
                ->withErrors('Houve um erro inesperado, tente novamente mais tarde!');
        }

        return redirect()
            ->route('backend.cars.index')
            ->with('success', 'Carro removido com sucesso');
    }

    public function getCarsToDataTable() {
        $cars = $this->carDomain->all();
        if(\Auth::user()->roles()->first()->name == 'user'){
            $cars = $this->carDomain->findBy(['user_id' => \Auth::user()->roles()->first()->id]);
        }
        return $this->dataTableService->getDataTableByCollection($cars)
            ->addColumn('status', function (Car $car) {
                return is_null($car->status) ? 'Não ativo' : 'Ativado';
            })
            ->addColumn('actions', function (Car $car) {
                return view('backend.car.datatables.actions', compact('car'));
            })
            ->rawColumns(['actions'])
            ->make(true)
        ;
    }
}