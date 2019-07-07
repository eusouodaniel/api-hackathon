<?php

namespace App\Domains;

use Illuminate\Support\Facades\Log;
use DB;

abstract class BaseDomain {

    protected $repository;

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes) {
        return $this->repository->create($attributes);
    }

    /**
     * @param array $attributes
     * @param int $id
     * @return bool
     */
    public function update(array $attributes, int $id) {
        return $this->repository->update($attributes, $id);
    }

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc') {
        return $this->repository->all($columns, $orderBy, $sortBy);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id) {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findOneOrFail(int $id) {
        return $this->repository->findOrFail($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function findBy(array $data) {
        return $this->repository->findBy($data);
    }

    /**
     * @param array $params
     * @param mixed $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function first() {
        return $this->repository->first();
    }

    /**
     * @param array $data
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginateArrayResults(array $data, int $perPage = 10) {
        $page = request()->get('page', 1);
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(
            array_slice($data, $offset, $perPage, false),
            count($data),
            $perPage,
            $page,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data) {
        return $this->repository->findOneBy($data);
    }

    /**
     * @param array $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findOneByOrFail(array $data) {
        return $this->repository->findOneByOrFail($data);
    }

    /**
     * @param array $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findMany(array $data) {
        return $this->repository->findMany($data);
    }

    /**
     * @param array $params
     * @param mixed $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function firstOrCreate(array $params, $data = []) {
        return $this->repository->firstOrCreate($params, $data);
    }

    /**
     * @param array $params
     * @param mixed $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function firstOrNew(array $params, $data = []) {
        return $this->repository->firstOrNew($params, $data);
    }

    /**
     * @param array $data
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage = 10) {
        return $this->repository->paginate($perPage);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool {
        return $this->repository->delete($id);
    }

    public function convertDateForEn($dateOld) {
        if ($dateOld) {
            $date = date('Y-m-d', strtotime(str_replace('/', '-', $dateOld)));
        }

        return $date;
    }
}