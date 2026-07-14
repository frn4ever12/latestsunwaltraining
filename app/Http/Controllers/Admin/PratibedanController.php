<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\TrainingApplication;
use Illuminate\Http\Request;

class PratibedanController extends Controller
{
    public function prashikshan()
    {
        $query= Training::query();
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
        $trainings = $query->select('id','name_np','start_samaya','status','start_miti_bs','available_seats')->get();
        return view('admin.Pratibedan.prashikshan-pratibedan', compact('trainings'));
    }

    public function aabedan()
    {
        $query = TrainingApplication::query();
        if (!empty(request()->input('name_np'))) {
            $query->whereHas('training', function ($q) {
                $q->where('name_np', 'like', '%' . request()->input('name_np') . '%');
            });
        }

        if (!empty(request()->input('fullname_np'))) {
            $query->where('fullname_np', 'like', '%' . request()->input('fullname_np') . '%');
        }

        if (!empty(request()->input('start_miti_bs'))) {
            $query->whereDate('application_miti_bs', '>=', request()->input('start_miti_bs'));
        }
        if (!empty(request()->input('end_miti_bs'))) {
            $query->whereDate('application_miti_bs', '<=', request()->input('end_miti_bs'));
        }

        if (!empty(request()->input('category'))) {
            $query->whereHas('training', function ($q) {
                $q->where('category_id', request()->input('category'));
            });
        }

        $query->select('id', 'application_no', 'fullname_np', 'created_at', 'training_id', 'status', 'remarks');

        $applications = $query->get();
        return view('admin.Pratibedan.aabedan-pratibedan', compact('applications'));
    }
}
