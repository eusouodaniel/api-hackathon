<?php

namespace App\Domains;

class VacancyDomain extends BaseDomain {
    
    public function __construct() {
        $this->repository = app('App\Repositories\VacancyRepository');
        $this->fileUploadService = app('App\Services\FileUploadService');
        $this->pathPhotoStorage = 'public/vacancies/';
        $this->storagePath = 'storage/vacancies/';
    }

    public function create(array $dataRequest) {

        \DB::beginTransaction();

        try {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/".$dataRequest['ip']);
            $result = curl_exec($ch);

            curl_close($ch);

            $result = json_decode($result, true);

            $dataRequest['latitude'] = $result['lat'];
            $dataRequest['longitude'] = $result['lon'];
            $dataRequest['user_id'] = \Auth::user()->id;
            $dataRequest['status'] = 1;

            if (array_key_exists('photo', $dataRequest)) {
                $fileName = $this->fileUploadService->saveFileToPath($this->pathPhotoStorage, $dataRequest['photo']);
                $dataRequest['photo'] = $fileName;
            }
            $vacancy = $this->repository->create($dataRequest);

            \DB::commit();
            return $vacancy;
        } catch (\Exception $e) {
            if (array_key_exists('photo', $dataRequest)) {
                $this->fileUploadService->deleteFileFromPath($this->pathPhotoStorage . $dataRequest['photo']);
            }
            \DB::rollback();
            \Log::error($e);
            return $e;
        }
    }

    public function update(array $dataRequest, int $id) {
        \DB::beginTransaction();
        try {
            $vacancy = $this->repository->find($id);

            if (array_key_exists('photo', $dataRequest)) {
                if (isset($vacancy->photo)) {
                    $this->fileUploadService->deleteFileFromPath($this->storagePath . $vacancy->photo);
                }

                $fileName = $this->fileUploadService->saveFileToPath($this->pathPhotoStorage, $dataRequest['photo']);
                $dataRequest['photo'] = $fileName;
            }

            $this->repository->update($dataRequest, $id);

            \DB::commit();

            $vacancy = $this->repository->find($id);
            return $vacancy;
        } catch (\Exception $e) {
            if (array_key_exists('photo', $dataRequest)) {
                $this->fileUploadService->deleteFileFromPath($this->pathPhotoStorage . $dataRequest['photo']);
            }
            \DB::rollback();
            \Log::error($e);
            return false;
        }
    }

    public function delete(int $id): bool {
        \DB::beginTransaction();
        try {
            $vacancy = $this->repository->find($id);

            if (isset($vacancy->photo)) {
                $this->fileUploadService->deleteFileFromPath($this->pathPhotoStorage . $vacancy->photo);
            }

            $this->repository->delete($id);

            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollback();
            return false;
        }
    }
}