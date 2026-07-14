<?php

namespace App\Services;


use Illuminate\Support\Facades\DB;
use App\Traits\FileUploadTrait;
use App\Models\Notice;

class NoticeService
{
    use FileUploadTrait;
    public function store(array $data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['document'])) {
                $data['document'] = $this->uploadImage($data['document'], 'notice/document/');
            }

            $notice = Notice::create($data);


            DB::commit();
            return $notice;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(array $data, $notice)
    {
        try {
            DB::beginTransaction();
         if (isset($data['document'])) {
                $oldDocument = $notice->document;
                $data['document'] = $this->uploadImage($data['document'], 'notice/document/');
                $this->deleteOldImage($oldDocument);
            }

            $notice = $notice->update($data);

            DB::commit();
            return $notice;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($notice)
    {
        try {
            DB::beginTransaction();
             $oldDocument = $notice->document;

            $notice = $notice->delete();
            $this->deleteOldImage($oldDocument);

            DB::commit();
            return $notice;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    
}
