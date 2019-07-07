<?php

namespace App\Repositories;

class UserRepository extends BaseRepository {

    public function __construct() {
        $this->model = app("App\Models\User");
    }

    public function findUsersWithRoles(array $roles) {
        return $this->model->role($roles)->get();
    }

    public function findUsersWithoutRoles(array $roles) {
        return $this->model->whereHas('roles', function($query) use ($roles) {
            return $query->whereNotIn('roles.name', $roles);
        })->get();
    }

    public function findUsersWithIds(array $ids) {
        return $this->model->whereIn('id', $ids)->get();
    }

    public function getByRole($role){
        $this->query = $this->model->role($role)->orderBy('first_name', 'asc');
        
        return $this->query->pluck('first_name', 'id')->toArray();
    }
}