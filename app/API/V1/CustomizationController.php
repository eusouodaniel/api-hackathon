<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;

class CustomizationController extends Controller {

    public function __construct() {
        $this->configurationService = app("App\Domains\ConfigurationDomain");
    }
    
    /**
     * Search configurations system
     *
     * @return [array] results
     */
    public function index() {
        $configuration = $this->configurationService->first();

        return response()->json([
            'message' => 'Successfully returns!',
            'configuration' => $configuration,
        ], 201);
    }
}