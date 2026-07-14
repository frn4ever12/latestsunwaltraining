<?php

namespace App\Services;


use Illuminate\Support\Facades\DB;
use App\Traits\FileUploadTrait;
use App\Models\Samachar;

class SamacharService
{
    use FileUploadTrait;
    public function store(array $data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['document'])) {
                $data['document'] = $this->uploadImage($data['document'], 'samachar/document/');
            }

            $samachar = Samachar::create($data);


            DB::commit();
            return $samachar;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(array $data, $samachar)
    {
        try {
            DB::beginTransaction();
         if (isset($data['document'])) {
                $oldDocument = $samachar->document;
                $data['document'] = $this->uploadImage($data['document'], 'samachar/document/');
                $this->deleteOldImage($oldDocument);
            }

            $samachar = $samachar->update($data);

            DB::commit();
            return $samachar;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($samachar)
    {
        try {
            DB::beginTransaction();
             $oldDocument = $samachar->document;

            $samachar = $samachar->delete();
            $this->deleteOldImage($oldDocument);

            DB::commit();
            return $samachar;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    
}
