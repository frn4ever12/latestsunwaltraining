<?php

namespace App\Services;

use App\Models\Karyabidhi;
use Illuminate\Support\Facades\DB;
use App\Traits\FileUploadTrait;

class KaryabidhiService
{
    use FileUploadTrait;
    public function store(array $data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['document'])) {
                $data['document'] = $this->uploadImage($data['document'], 'karyabidhi/document/');
            }

            $karyabidhi = Karyabidhi::create($data);


            DB::commit();
            return $karyabidhi;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(array $data, $karyabidhi)
    {
        try {
            DB::beginTransaction();
            if (isset($data['document'])) {
                $oldDocument = $karyabidhi->document;
                $data['document'] = $this->uploadImage($data['document'], 'karyabidhi/document/');
                $this->deleteOldImage($oldDocument);
            }

            $karyabidhi = $karyabidhi->update($data);

            DB::commit();
            return $karyabidhi;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($karyabidhi)
    {
        try {
            DB::beginTransaction();
            $oldDocument = $karyabidhi->document;

            $karyabidhi = $karyabidhi->delete();
            $this->deleteOldImage($oldDocument);

            DB::commit();
            return $karyabidhi;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
