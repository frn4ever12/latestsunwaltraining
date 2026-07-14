<?php

namespace App\Services;

use App\Repositories\Interfaces\TrainingRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Auth;

class TrainingService
{
    use FileUploadTrait;

    protected $trainingRepository;

    public function __construct(TrainingRepositoryInterface $trainingRepository)
    {
        $this->trainingRepository = $trainingRepository;
    }

    public function getAll()
    {
        return $this->trainingRepository->all();
    }

    public function store(array $data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['document'])) {
                $data['document'] = $this->uploadImage($data['document'], 'training/document/');
            }
            $data['user_id'] = Auth::id();
            $training = $this->trainingRepository->store($data);

            DB::commit();
            return $training;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(array $data, $id)
    {
        try {
            DB::beginTransaction();

            $training = $this->trainingRepository->find($id);

            if (isset($data['document'])) {
                $oldDocument = $training->document;
                $data['document'] = $this->uploadImage($data['document'], 'training/document/');
                $this->deleteOldImage($oldDocument);
            }
            $data['user_id'] = Auth::id();
            $training = $this->trainingRepository->update($data, $id);

            DB::commit();
            return $training;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $training = $this->trainingRepository->find($id);
            $oldDocument = $training->document;

            $training = $this->trainingRepository->delete($id);
            $this->deleteOldImage($oldDocument);

            DB::commit();
            return $training;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function find($id)
    {
        return $this->trainingRepository->find($id);
    }
}
