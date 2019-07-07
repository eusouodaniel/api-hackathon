<?php

namespace App\Repositories;

class VacancyRepository extends BaseRepository {

    public function __construct() {
        $this->model = app("App\Models\Vacancy");
    }
}