<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorHandlerController extends Controller {

	public function __construct() {
        parent::__construct();
    }

    public function errorCode403() {
        return view('errors.403');
    }

    public function errorCode404() {
    	return view('errors.404');
    }

    public function errorCode419() {
        return view('errors.419');
    }

    public function errorCode410() {
    	return view('errors.410');
    }

    public function errorCode500() {
    	return view('errors.500');
    }
}