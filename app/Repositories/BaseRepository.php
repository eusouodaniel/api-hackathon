<?php

namespace App\Repositories;

use App\Contracts\Repository\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @codeCoverageIgnore
 */
abstract class BaseRepository implements BaseRepositoryInterface {

    public $query;
    public $relationship;

    /**
     * BaseRepository constructor.
     */
    public function __construct() {
        $this->model = app("Illuminate\Database\Eloquent\Model");
        $this->relationship = array();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes) {
        return $this->model->create($attributes);
    }

    /**
     * @param array $attributes
     * @param int $id
     * @return bool
     */
    public function update(array $attributes, int $id) {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc') {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id) {
        return $this->model->find($id);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findOneOrFail(int $id) {
        return $this->model->findOrFail($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function findBy(array $data) {
        return $this->model->where($data)->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data) {
        return $this->model->where($data)->get()->first();
    }

    /**
     * @param array $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findOneByOrFail(array $data) {
        return $this->model->where($data)->firstOrFail();
    }

    /**
     * @param array $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findMany(array $data) {
        return $this->model->findMany($data);
    }

    /**
     * @param array $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function first() {
        return $this->model->firstOrFail();
    }

    /**
     * @param array $params
     * @param mixed $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function firstOrCreate(array $params, $data = []) {
        return $this->model->firstOrCreate($params, $data);
    }

    /**
     * @param array $params
     * @param mixed $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function firstOrNew(array $params, $data = []) {
        return $this->model->firstOrNew($params, $data);
    }

    public function paginate(int $perPage = 10) {
        return $this->model->orderBy('id', 'ASC')->paginate($perPage);
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
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool {
        return $this->model->find($id)->delete();
    }

    public function applyRelationshipQuery() {
        if (count($this->relationship) > 0) {
            $this->query->with($this->relationship);
        }

        return $this->query;
    }
}