<?php

namespace App\Repositories;

use App\Models\TrainingApplication;
use App\Repositories\Interfaces\TrainingApplicationRepositoryInterface;

class TrainingApplicationRepository implements TrainingApplicationRepositoryInterface
{
    protected $model;

    public function __construct(TrainingApplication $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $query = $this->model->latest();

        if (!empty(request()->input('name_np'))) {
            $query->whereHas('training', function ($q) {
                $q->where('name_np', 'like', '%' . request()->input('name_np') . '%');
            });
        }

        if (!empty(request()->input('fullname_np'))) {
            $query->where('fullname_np', 'like', '%' . request()->input('fullname_np') . '%');
        }

        if (!empty(request()->input('start_miti_bs'))) {
            $query->whereDate('application_miti_bs','>=', request()->input('start_miti_bs'));
        }
        if (!empty(request()->input('end_miti_bs'))) {
            $query->whereDate('application_miti_bs','<=', request()->input('end_miti_bs'));
        }

        if (!empty(request()->input('category'))) {
            $query->whereHas('training', function ($q) {
                $q->where('category_id', request()->input('category'));
            });
        }

        if (auth()->user()->hasRole('trainee')) {
            $query->where('user_id', auth()->id());
        }

        return $query->select('id', 'application_no', 'fullname_np', 'application_miti_bs', 'training_id', 'status', 'remarks')->get();
    }

    public function find($id)
    {
       return $this->model->with(['educationDetails','experienceDetails','anyeBibaranDetails'])->findOrFail($id);

    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $trainingApplication = $this->find($id);
        $trainingApplication->update($data);
        return $trainingApplication;
    }

    public function delete($id)
    {
        $trainingApplication = $this->find($id);
        return $trainingApplication->delete();
    }
} 