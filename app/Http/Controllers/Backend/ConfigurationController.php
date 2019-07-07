<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfiguration;

class ConfigurationController extends Controller{
    
    public function __construct() {
        parent::__construct();
        $this->configurationDomain = app("App\Domains\ConfigurationDomain");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $configuration = $this->configurationDomain->first();

        if($configuration){
            return redirect()
                ->route('backend.configurations.edit',array('id' => $configuration->id));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $int
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id){
        $configuration = $this->configurationDomain->find($id);

        return view('backend.configuration.edit', compact('configuration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreConfiguration  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreConfiguration $request, int $id){
        $configuration = $this->configurationDomain->update($request->all(), $id);

        if(!$configuration){
            return back()
                ->withInput()
                ->withErrors('Houve um erro inesperado, tente novamente mais tarde!');
        }

        return redirect()->route('backend.configurations.edit',array('id' => $id))
                ->with('success','Configurações atualizadas com sucesso');
    }
}