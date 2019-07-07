<?php

namespace App\Repositories;

class AccessControlRepository extends BaseRepository{
    
    public function __construct() {
        $this->model = app("App\Models\AccessControl");
    }
}