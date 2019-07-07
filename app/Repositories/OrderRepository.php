<?php

namespace App\Repositories;

class OrderRepository extends BaseRepository {

    public function __construct() {
        $this->model = app("App\Models\Order");
    }
}