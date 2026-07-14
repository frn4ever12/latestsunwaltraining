<?php

namespace App\Repositories\Interfaces;

interface TrainingApplicationRepositoryInterface
{
    public function all();
    public function store(array $data);
    public function update(array $data, $application);
    public function delete($id);
    public function find($id);
} 