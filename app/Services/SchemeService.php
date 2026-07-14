<?php

namespace App\Services;

use App\Models\Scheme;
use Illuminate\Support\Facades\DB;
use App\Traits\FileUploadTrait;

class SchemeService
{
    use FileUploadTrait;
    public function store(array $data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['document'])) {
                $data['document'] = $this->uploadImage($data['document'], 'scheme/document/');
            }

            $scheme = scheme::create($data);


            DB::commit();
            return $scheme;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(array $data, $scheme)
    {
        try {
            DB::beginTransaction();
            if (isset($data['document'])) {
                $oldDocument = $scheme->document;
                $data['document'] = $this->uploadImage($data['document'], 'scheme/document/');
                $this->deleteOldImage($oldDocument);
            }

            $scheme = $scheme->update($data);

            DB::commit();
            return $scheme;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($scheme)
    {
        try {
            DB::beginTransaction();
            $oldDocument = $scheme->document;

            $scheme = $scheme->delete();
            $this->deleteOldImage($oldDocument);

            DB::commit();
            return $scheme;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
