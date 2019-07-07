<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Order;
use App\Http\Requests\StoreOrder;

class OrderController extends Controller {
    
    public function __construct() {
        $this->orderDomain = app("App\Domains\OrderDomain");
    }

    /**
     * Register user and create token
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @return [string] message
     */
    public function create(StoreOrder $request) {
        $dataRequest['vacancy_id'] = $request->vacancy_id;
        $dataRequest['user_id'] = $request->user_id;
        $this->orderDomain->create($dataRequest);

        return response()->json([
            'message' => 'Successfully created order!'
        ], 201);
    }
  
    /**
     * Register user and create token
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @return [string] message
     */
     public function update(StoreOrder $request, $id) {
        $dataRequest['vacancy_id'] = $request->vacancy_id;
        $dataRequest['user_id'] = $request->user_id;
        $this->orderDomain->update($dataRequest, $id);

        return response()->json([
            'message' => 'Successfully updated order!'
        ], 201);
    }
}