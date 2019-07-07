<?php

namespace App\Domains;

class ConfigurationDomain extends BaseDomain{
    
    public function __construct() {
        $this->repository = app("App\Repositories\ConfigurationRepository");
        $this->fileUploadService = app("App\Services\FileUploadService");
        $this->pathPhotoStorage = 'public/configurations/';
        $this->storagePath = 'storage/configurations/';
    }

    public function find(int $id) {
        return $this->repository->find($id);
    }

    public function first() {
        return $this->repository->first();
    }

    public function update(array $dataRequest, int $id) {
        \DB::beginTransaction();
        try{

            $configuration = $this->repository->find($id);

            if (array_key_exists('logo', $dataRequest)) {
                if (isset($configuration->logo)) {
                    $this->fileUploadService->deleteFileFromPath($this->storagePath . $configuration->logo);
                }

                $uploadedFilePath = $this->fileUploadService->saveFileToPath($this->pathPhotoStorage, $dataRequest['logo']);
                $dataRequest['logo'] = $uploadedFilePath;
            }

            if (array_key_exists('icon', $dataRequest)) {
                if (isset($configuration->icon)) {
                    $this->fileUploadService->deleteFileFromPath($this->storagePath . $configuration->icon);
                }

                $uploadedFilePath = $this->fileUploadService->saveFileToPath($this->pathPhotoStorage, $dataRequest['icon']);
                $dataRequest['icon'] = $uploadedFilePath;
            }

            $this->repository->update($dataRequest, $id);

            \DB::commit();
            return $configuration;
        } catch(\Exception $e) {
            \DB::rollback();
            \Log::error($e);
            return false;
        }
    }
}