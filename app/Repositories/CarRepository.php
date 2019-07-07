<?php

namespace App\Repositories;

class CarRepository extends BaseRepository{
    
    public function __construct() {
        $this->model = app("App\Models\Car");
    }
}