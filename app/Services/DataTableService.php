<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

class DataTableService {

    public function __construct() {
        $this->dataTables = app("Yajra\Datatables\Datatables");
    }

    public function getDataTableByCollection(Collection $collection) {
        return $this->dataTables->collection($collection);
    }

    public function getDataTableByQueryBuilder($queryBuilder) {
        return $this->dataTables->queryBuilder($queryBuilder);
    }
}