<?php

namespace App\Services;

use App\Repositories\Interfaces\KarmachariRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Traits\FileUploadTrait;

class KarmachariService
{
    use FileUploadTrait;

    protected $karmachariRepository;

    public function __construct(KarmachariRepositoryInterface $karmachariRepository)
    {
        $this->karmachariRepository = $karmachariRepository;
    }

    public function getAllKarmacharis()
    {
        return $this->karmachariRepository->all();
    }

    public function storeKarmachari(array $data)
    {
        DB::beginTransaction();
        try {

            if (isset($data['photo'])) {
                $data['photo'] = $this->uploadImage($data['photo'], 'karmachari/photo/', 'private');
            }

            $karmachari = $this->karmachariRepository->store($data);

            DB::commit();
            return $karmachari;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateKarmachari(array $data, $id)
    {
        DB::beginTransaction();
        try {

            $karmachari = $this->karmachariRepository->find($id);

            if (isset($data['photo'])) {
                $oldPhoto = $karmachari->photo;
                $data['photo'] = $this->uploadImage($data['photo'], 'karmachari/photo/', 'private');
                $this->deleteOldImage($oldPhoto,'private');
            }

            $karmachari = $this->karmachariRepository->update($data, $id);

            DB::commit();
            return $karmachari;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteKarmachari($id)
    {
        DB::beginTransaction();
        try {

            $karmachari = $this->karmachariRepository->find($id);
            $oldPhoto = $karmachari->photo;

            $karmachari = $this->karmachariRepository->delete($id);
            $this->deleteOldImage($oldPhoto,'private');

            DB::commit();
            return $karmachari;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function find($id)
    {
        return $this->karmachariRepository->find($id);
    }
}
