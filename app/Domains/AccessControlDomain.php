<?php

namespace App\Domains;

class AccessControlDomain extends BaseDomain {
    
    public function __construct() {
        $this->repository = app('App\Repositories\AccessControlRepository');
    }
}