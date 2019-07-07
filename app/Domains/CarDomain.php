<?php

namespace App\Domains;

use Sinesp\Sinesp;

class CarDomain extends BaseDomain {
    
    public function __construct() {
        $this->repository = app('App\Repositories\CarRepository');
    }

    public function create(array $dataRequest) {
        \DB::beginTransaction();

        try {
            $vehicle = new Sinesp;
            $vehicle->buscar($dataRequest['board']);
            $dataRequest['status'] = 0;
            if ($vehicle->existe()) {
                $dataRequest['status'] = 1;
            }

            $dataRequest['user_id'] = \Auth::user()->id;
            $car = $this->repository->create($dataRequest);

            \DB::commit();
            return $car;
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::error($e);
            return $e;
        }
    }

    public function update(array $dataRequest, int $id) {
        \DB::beginTransaction();
        try {
            $car = $this->repository->find($id);

            if (!$car) {
                throw new \Exception('Usuario não encontrado para edição');
            }

            $this->repository->update($dataRequest, $id);

            \DB::commit();
            return $car;
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::error($e);
            return false;
        }
    }

    public function delete(int $id): bool {
        \DB::beginTransaction();
        try {

            $this->repository->delete($id);

            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollback();
            return false;
        }
    }
}