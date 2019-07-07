<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Services\SystemPracticeService;

class SystemPracticeController extends Controller {

    private $systemPracticeService;
    
    public function __construct() {
        $this->systemPracticeService = app(SystemPracticeService::class);
    }
    
    /**
     * Search configurations system
     *
     * @return [array] results
     */
    public function index() {
        $systemPractices = $this->systemPracticeService->all();

        return response()->json([
            'systemPractices' => $systemPractices
        ], 201);
    }
}