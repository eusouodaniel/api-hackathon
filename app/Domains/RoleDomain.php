<?php

namespace App\Domains;

class RoleDomain extends BaseDomain {

    public function __construct() {
        $this->repository = app("App\Repositories\RoleRepository");
    }

    public function getRolesArray(string $orderBy = 'id', string $sortBy = 'asc') {
        return $this->repository->getRolesArray($orderBy, $sortBy);
    }

    public function getRolesFieldForm($columns = array('*')) {
        $roles = $this->repository->all($columns);
        $dataRole = array();

        foreach ($roles as $role) {
            $dataRole[$role->name] = $role->description;
        }

        return $dataRole;
    }

    public function getAllRolesNameArray() {
        $roles = $this->repository->getRolesNameArray();

        return $roles;
    }

    public function getRolesNameArray($columnName) {
        return $this->repository->getRolesNameArray($columnName);
    }

    public function findAllRolesExcept(array $roles) {
        return $this->repository->findAllRolesExcept($roles);
    }
}