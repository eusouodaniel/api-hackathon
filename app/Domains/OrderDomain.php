<?php

namespace App\Domains;

class OrderDomain extends BaseDomain {
    
    public function __construct() {
        $this->repository = app('App\Repositories\OrderRepository');
    }

    public function create(array $dataRequest) {
        \DB::beginTransaction();

        try {
            $order = $this->repository->create($dataRequest);

            \DB::commit();
            return $order;
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::error($e);
            return $e;
        }
    }

    public function update(array $dataRequest, int $id) {
        \DB::beginTransaction();
        try {
            $order = $this->repository->find($id);

            if (!$order) {
                throw new \Exception('Pedido não encontrado para edição');
            }

            $this->repository->update($dataRequest, $id);

            \DB::commit();
            return $order;
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::error($e);
            return false;
        }
    }

}