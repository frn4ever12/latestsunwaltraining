<?php

namespace App\Services;

use App\Repositories\Interfaces\TrainingApplicationRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Auth;

class TrainingApplicationService
{
    use FileUploadTrait;

    protected $trainingApplicationRepository;

    public function __construct(TrainingApplicationRepositoryInterface $trainingApplicationRepository)
    {
        $this->trainingApplicationRepository = $trainingApplicationRepository;
    }

    public function getAll()
    {
        return $this->trainingApplicationRepository->all();
    }

    public function store(array $data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['photo'])) {
                $data['photo'] = $this->uploadImage($data['photo'], 'application/photo/', 'private');
            }
            if (isset($data['nagrita_copy_front'])) {
                $data['nagrita_copy_front'] = $this->uploadImage($data['nagrita_copy_front'], 'application/nagrita_copy_front/', 'private');
            }
            if (isset($data['nagrita_copy_back'])) {
                $data['nagrita_copy_back'] = $this->uploadImage($data['nagrita_copy_back'], 'application/nagrita_copy_back/', 'private');
            }
            $data['user_id'] = Auth::id();
            $data['status'] = 'processing'; // Set status to processing for admin approval
            
            // Separate address data from application data
            $addressData = [
                'sthyayi_province_id' => $data['sthyayi_province_id'] ?? null,
                'sthyayi_district_id' => $data['sthyayi_district_id'] ?? null,
                'sthyayi_sthaniya_taha_id' => $data['sthyayi_sthaniya_taha_id'] ?? null,
                'sthyayi_ward_id' => $data['sthyayi_ward_id'] ?? null,
                'sthyayi_tole_name' => $data['sthyayi_tole_name'] ?? null,
                'asthyayi_province_id' => $data['asthyayi_province_id'] ?? null,
                'asthyayi_district_id' => $data['asthyayi_district_id'] ?? null,
                'asthyayi_sthaniya_taha_id' => $data['asthyayi_sthaniya_taha_id'] ?? null,
                'asthyayi_ward_id' => $data['asthyayi_ward_id'] ?? null,
                'asthyayi_tole_name' => $data['asthyayi_tole_name'] ?? null,
                'migration_certificate' => $data['migration_certificate'] ?? null,
            ];
            
            // Remove address fields from application data
            unset($data['sthyayi_province_id'], $data['sthyayi_district_id'], $data['sthyayi_sthaniya_taha_id'], 
                  $data['sthyayi_ward_id'], $data['sthyayi_tole_name'], 
                  $data['asthyayi_province_id'], $data['asthyayi_district_id'], $data['asthyayi_sthaniya_taha_id'],
                  $data['asthyayi_ward_id'], $data['asthyayi_tole_name'], $data['migration_certificate']);
            
            // Create application with only the essential data
            $application = $this->trainingApplicationRepository->store($data);
            
            // Only create theganaDetail if address data is provided
            if (!empty(array_filter($addressData))) {
                $application->theganaDetail()->create($addressData);
            }

            // Decrease available seats for the training
            $training = \App\Models\Training::find($data['training_id']);
            if ($training && $training->available_seats > 0) {
                $training->decrement('available_seats');
            }

            DB::commit();
            return $application;
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Application store error: ' . $e->getMessage());
            \Log::error('Data: ' . json_encode($data));
            throw $e;
        }
    }

    public function update(array $data, $id)
    {
        try {
            DB::beginTransaction();

            $application = $this->trainingApplicationRepository->find($id);

            if (isset($data['photo'])) {
                $oldphoto = $application->photo;
                $data['photo'] = $this->uploadImage($data['photo'], 'application/photo/', 'private');
                $this->deleteOldImage($oldphoto, 'private');
            }
            if (isset($data['nagrita_copy_front'])) {
                $oldnagrita = $application->nagrita_copy;
                $data['nagrita_copy_front'] = $this->uploadImage($data['nagrita_copy_front'], 'application/nagrita_copy_front/', 'private');
                $this->deleteOldImage($oldnagrita, 'private');
            }
            if (isset($data['nagrita_copy_back'])) {
                $oldnagrita = $application->nagrita_copy;
                $data['nagrita_copy_back'] = $this->uploadImage($data['nagrita_copy_back'], 'application/nagrita_copy_back/', 'private');
                $this->deleteOldImage($oldnagrita, 'private');
            }

            $data['user_id'] = Auth::id();
            $application = $this->trainingApplicationRepository->update($data, $id);
            $application->theganaDetail->update($data);

            DB::commit();
            return $application;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $application = $this->trainingApplicationRepository->find($id);
            
            // Increment available seats when application is deleted
            $training = $application->training;
            if ($training) {
                $training->increment('available_seats');
            }
            
            $this->deleteOldImage($application->photo, 'private');
            $this->deleteOldImage($application->nagrita_copy_front, 'private');
            $this->deleteOldImage($application->nagrita_copy_back, 'private');
            if ($application->theganaDetail && isset($application->theganaDetail->migration_certificate)) {
                $this->deleteOldImage($application->theganaDetail->migration_certificate, 'private');
            }
            if (!empty($application->educationDetails) && $application->educationDetails->count()) {
                foreach ($application->educationDetails as $detail) {
                    $this->deleteOldImage($detail->marksheet, 'private');
                    $this->deleteOldImage($detail->character_certificate, 'private');
                    $this->deleteOldImage($detail->equivalency_certificate, 'private');
                }
            }
            if (!empty($application->experienceDetails) && $application->experienceDetails->count()) {
                foreach ($application->experienceDetails as $detail) {
                    $this->deleteOldImage($detail->document, 'private');
                }
            }
            if (!empty($application->anyeBibaranDetails) && $application->anyeBibaranDetails->count()) {
                foreach ($application->anyeBibaranDetails as $detail) {
                    $this->deleteOldImage($detail->anye_document, 'private');
                }
            }
            $application = $this->trainingApplicationRepository->delete($id);

            DB::commit();
            return $application;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function find($id)
    {
        return $this->trainingApplicationRepository->find($id);
    }
}
