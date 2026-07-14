<?php

namespace App\Repositories\Interfaces;

interface KarmachariRepositoryInterface
{
    public function all();
    public function store(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function find($id);
} 