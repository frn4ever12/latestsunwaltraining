<?php

namespace App\Repositories\Interfaces;

interface OrganizationRepositoryInterface
{
    public function createOrganization(array $data);
    public function updateOrganization(array $data, $id = null);
    public function find($id);
}