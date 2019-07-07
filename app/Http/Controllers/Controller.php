<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use View;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $this->dataTableService = app("App\Services\DataTableService");
        $this->configurationDomain = app("App\Domains\ConfigurationDomain");

        $configuration = $this->configurationDomain->first();

        View::share('configuration', $configuration);
    }
}
