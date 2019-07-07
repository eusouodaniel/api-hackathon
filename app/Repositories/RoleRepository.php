<?php

namespace App\Repositories;

class RoleRepository extends BaseRepository {

    public function __construct() {
        $this->model = app("App\Models\Role");
    }

    public function getRolesArray(string $orderBy = 'id', string $sortBy = 'asc') {
        return $this->model->orderBy($orderBy, $sortBy)->get()->toArray();
    }

    public function getRolesNameAndDescriptionArray() {
        $this->query = $this->model->orderBy('name', 'asc');

        return $this->query->pluck('description', 'name')->toArray();
    }

    public function getRolesNameArray() {
        $this->query = $this->model->orderBy('name', 'asc');

        return $this->query->pluck('description', 'id')->toArray();
    }

    public function findAllRolesExcept(array $roles) {
        return $this->model->whereNotIn('name', $roles)->get();
    }
}