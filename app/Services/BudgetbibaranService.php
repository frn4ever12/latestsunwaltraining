<?php

namespace App\Services;


use Illuminate\Support\Facades\DB;
use App\Traits\FileUploadTrait;
use App\Models\BudgetBibaran;

class BudgetbibaranService
{
    use FileUploadTrait;
    public function store(array $data)
    {
        try {
            DB::beginTransaction();

            $budgetbibaran = BudgetBibaran::create($data);

            DB::commit();
            return $budgetbibaran;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(array $data, BudgetBibaran $budgetbibaran)
    {
        try {
            DB::beginTransaction();

            $budgetbibaran->update($data);

            DB::commit();
            return $budgetbibaran;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete(BudgetBibaran $budgetbibaran)
    {
        try {
            DB::beginTransaction();

            $budgetbibaran->delete();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    
}
