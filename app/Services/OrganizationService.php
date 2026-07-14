<?php

namespace App\Services;

use App\Repositories\Interfaces\OrganizationRepositoryInterface;
use App\Traits\FileUploadTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class OrganizationService
{
    use FileUploadTrait;
    protected $organizationRepository;

    public function __construct(OrganizationRepositoryInterface $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    public function createOrganization(array $data, ?UploadedFile $newImageFile = null)
    {
        try {
            DB::beginTransaction();

            $organization = $this->organizationRepository->createOrganization($data);

            if ($newImageFile) {
                $newImagePath = $this->uploadImage($newImageFile, 'organization/logo/');
                $organization->update(['logo' => $newImagePath]);
            }

            DB::commit();
            return $organization;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Error creating organization: " . $e->getMessage());
        }
    }

    public function updateOrganization(array $data, ?UploadedFile $newImageFile = null, $id = null)
    {
        try {
            DB::beginTransaction();
            $setting = $id ? $this->organizationRepository->find($id) : get_detail();
            
            if (!$setting) {
                throw new \Exception("Organization not found");
            }

            $oldImagePaths = [
                'logo' => $setting->logo,
            ];

            $this->organizationRepository->updateOrganization($data, $id);

            if ($newImageFile) {
                $this->deleteOldImage($oldImagePaths['logo']);
                $newImagePath = $this->uploadImage($newImageFile, 'organization/logo/');
                $setting->update(['logo' => $newImagePath]);
            }

            DB::commit();
            return $setting;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Error updating setting: " . $e->getMessage());
        }
    }
}
