<?php

namespace App\Repositories;

use App\Models\Training;
use App\Repositories\Interfaces\TrainingRepositoryInterface;

class TrainingRepository implements TrainingRepositoryInterface
{
    protected $model;

    public function __construct(Training $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $query= $this->model->latest();
        if (!empty(request()->input('name_np'))) {
            $query->where('name_np', 'like', '%' . request()->input('name_np') . '%');
        }
        if (!empty(request()->input('entry_date'))) {
            $query->whereDate('start_miti_bs', '>=', request()->input('entry_date'));
        }
        if (!empty(request()->input('end_date'))) {
            $query->whereDate('end_miti_bs', '<=', request()->input('end_date'));
        }
        if (auth()->user()->hasRole('trainee')) {
            $query->where('status', 'upcoming');
        }
        if (auth()->user()->hasRole('trainer')) {
            $query->where('user_id',auth()->id());
        }
        return $query->select('id','name_np','start_samaya','status','start_miti_bs','available_seats')->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $training = $this->find($id);
        $training->update($data);
        return $training;
    }

    public function delete($id)
    {
        $training = $this->find($id);
        return $training->delete();
    }
} 