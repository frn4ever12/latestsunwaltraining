<?php

namespace App\Repositories;

use App\Models\Organization;
use App\Repositories\Interfaces\OrganizationRepositoryInterface;

class OrganizationRepository implements OrganizationRepositoryInterface
{

    public function createOrganization(array $data)
    {
        return Organization::create($data);
    }

    public function updateOrganization(array $data, $id = null)
    {
        if ($id) {
            $organization = Organization::find($id);
            if ($organization) {
                $organization->update($data);
                return $organization;
            }
        }
        return Organization::updateOrCreate(
            ['id' => 1],
            $data
        );
    }

    public function find($id)
    {
        return Organization::find($id);
    }
}
