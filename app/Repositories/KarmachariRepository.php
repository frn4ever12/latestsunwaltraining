<?php

namespace App\Repositories;

use App\Models\Karmachari;
use App\Repositories\Interfaces\KarmachariRepositoryInterface;

class KarmachariRepository implements KarmachariRepositoryInterface
{
    protected $model;

    public function __construct(Karmachari $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->latest()->get();
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
        $karmachari = $this->find($id);
        $karmachari->update($data);
        return $karmachari;
    }

    public function delete($id)
    {
        $karmachari = $this->find($id);
        return $karmachari->delete();
    }
} 