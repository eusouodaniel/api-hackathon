<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Services\SystemComponentService;

class SystemComponentController extends Controller {

    private $systemComponentService;
    
    public function __construct() {
        $this->systemComponentService = app(SystemComponentService::class);
    }
    
    /**
     * Search configurations system
     *
     * @return [array] results
     */
    public function index() {
        $systemComponents = $this->systemComponentService->all();

        return response()->json([
            'systemComponents' => $systemComponents
        ], 201);
    }
}