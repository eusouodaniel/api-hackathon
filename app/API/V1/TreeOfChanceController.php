<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTreeOfChance;

class TreeOfChanceController extends Controller {
    
    /**
     * Search configurations system
     *
     * @return [array] results
     */
    public function index(StoreTreeOfChance $request) {

        $result = 0;
        if($request->calculation < 20){
            $result = 'Nível básico 1';
        }

        if($request->calculation >= 20 && $request->calculation < 40){
            $result = 'Nível básico 2';
        }

        if($request->calculation >= 40 && $request->calculation < 60){
            $result = 'Nível intermediário 1';
        }

        if($request->calculation >= 60 && $request->calculation < 80){
            $result = 'Nível intermediário 2';
        }

        if($request->calculation >= 80 && $request->calculation <= 100){
            $result = 'Nível avançado';
        }

        if($request->calculation > 100){
            $result = 'Sem resultados para seu perfil';
        }

        return response()->json([
            'message' => 'Successfully created tree of chance!',
            'data' => $result
        ], 201);
    }
}