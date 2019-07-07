<?php

namespace App\Domains;

use Hash;

class UserDomain extends BaseDomain {
    
    public function __construct() {
        $this->repository = app('App\Repositories\UserRepository');
        $this->roleDomain = app('App\Domains\RoleDomain');
        $this->fileUploadService = app('App\Services\FileUploadService');
        $this->pathPhotoStorage = 'public/users/';
        $this->storagePath = 'storage/users/';
    }

    public function create(array $dataRequest) {
        \DB::beginTransaction();

        try {
            if (!array_key_exists('password', $dataRequest)) {
                throw new \Exception('Campo senha não encontrado');
            }
            
            $dataRequest['password_token'] = Hash::make($dataRequest['password']);
            $dataRequest['password'] = Hash::make($dataRequest['password']);

            if (array_key_exists('photo', $dataRequest)) {
                $fileName = $this->fileUploadService->saveFileToPath($this->pathPhotoStorage, $dataRequest['photo']);
                $dataRequest['photo'] = $fileName;
            }

            if (array_key_exists('birth_date', $dataRequest)) {
                $dataRequest['birth_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $dataRequest['birth_date'])));
            }

            if (array_key_exists('zip_code', $dataRequest)) {
                $dataRequest['zip_code'] = str_replace(".", "", $dataRequest['zip_code']);
                $dataRequest['zip_code'] = str_replace("-", "", $dataRequest['zip_code']);
            }
            $user = $this->repository->create($dataRequest);

            if (array_key_exists('roles', $dataRequest)) {
                $user->assignRole($dataRequest['roles']);
            }

            \DB::commit();
            return $user;
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
            $user = $this->repository->find($id);

            if (!$user) {
                throw new \Exception('Usuario não encontrado para edição');
            }

            if (!empty($dataRequest['password'])) {
                $dataRequest['password'] = Hash::make($dataRequest['password']);
            } else {
                $dataRequest = array_except($dataRequest, array('password'));
            }

            if (array_key_exists('photo', $dataRequest)) {
                if (isset($user->photo)) {
                    $this->fileUploadService->deleteFileFromPath($this->storagePath . $user->photo);
                }

                $fileName = $this->fileUploadService->saveFileToPath($this->pathPhotoStorage, $dataRequest['photo']);
                $dataRequest['photo'] = $fileName;
            }

            if (array_key_exists('birth_date', $dataRequest)) {
                $dataRequest['birth_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $dataRequest['birth_date'])));
            }

            $this->repository->update($dataRequest, $id);

            \DB::commit();

            $user = $this->repository->find($id);

            if (array_key_exists('roles', $dataRequest)) {
                $user->syncRoles($dataRequest['roles']);
            }

            return $user;
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
            $user = $this->repository->find($id);

            if (isset($user->photo)) {
                $this->fileUploadService->deleteFileFromPath($this->pathPhotoStorage . $user->photo);
            }

            $this->repository->delete($id);

            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollback();
            return false;
        }
    }

    public function changePassword(array $dataRequest) {
        \DB::beginTransaction();
        try {
            $user = $this->repository->find($dataRequest['id']);
            $user->password = bcrypt($dataRequest['password']);
            $user->save();

            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \Log::error($e);
            \DB::rollback();
            return false;
        }
    }

    public function findUsersWithRoles(array $roles) {
        return $this->repository->findUsersWithRoles($roles);
    }

    public function findUsersWithoutRoles(array $roles) {
        return $this->repository->findUsersWithoutRoles($roles);
    }

    public function getByRole($role){
        return $this->repository->getByRole($role);
    }
}