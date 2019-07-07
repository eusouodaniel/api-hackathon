<?php

namespace App\Repositories;

class ConfigurationRepository extends BaseRepository{
    
    public function __construct() {
        $this->model = app("App\Models\Configuration");
    }
}