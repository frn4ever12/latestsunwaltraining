<?php

namespace App\Services;

use App\Models\ArthikBarsa;
use Illuminate\Support\Facades\DB;

class ArthikBarsaService
{
    protected function handleActiveStatus($status)
    {
        if ($status == 1) {
            ArthikBarsa::where('status', 1)->update(['status' => 0]);
        }
    }
    public function prepareArthikBarsaForCreation()
    {
        return new ArthikBarsa();
    }
    public function getAllArthikBarsas()
    {
        return ArthikBarsa::latest()->get();
    }
    public function getArthikBarsaById($id)
    {
        return ArthikBarsa::findOrFail($id);
    }
    public function createArthikBarsa(array $data)
    {
        DB::beginTransaction();
        try {
            $this->handleActiveStatus($data['status']);
            $arthikBarsa = ArthikBarsa::create($data);
            DB::commit();
            return $arthikBarsa;
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }



    public function updateArthikBarsa(ArthikBarsa $arthikBarsa, array $data)
    {
        DB::beginTransaction();
        try {
            $this->handleActiveStatus($data['status']);
            $arthikBarsa->update($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function deleteArthikBarsa(ArthikBarsa $arthikBarsa)
    {
        DB::beginTransaction();
        try {
            $arthikBarsa->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
