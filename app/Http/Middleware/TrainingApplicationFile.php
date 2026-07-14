<?php

namespace App\Http\Middleware;

use App\Models\TaEducationDetail;
use App\Models\TaExperienceDetail;
use App\Models\TaTheganaDetail;
use App\Models\TrainingApplication;
use App\Models\TaAnyeBibaranDetail;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class TrainingApplicationFile
{

    /**
     * File column names to check in models
     */
    protected $fileColumns = [ 'nagrita_copy_back','nagrita_copy_front','photo','marksheet','character_certificate','equivalency_certificate','document','anye_document'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $filePath = $request->route('filePath');
        $filePath = urldecode($filePath);
        
        $user = Auth::user();

        
        $filename = basename($filePath);
        
        $foundFile = false;
        $trainingApplicationId = null;
        $ownerId = null;
        
        $trainingAppColumns = Schema::getColumnListing((new TrainingApplication())->getTable());
        foreach ($this->fileColumns as $column) {
            if (!in_array($column, $trainingAppColumns)) {
                continue;
            }
            
            $trainingApp = TrainingApplication::where($column, 'LIKE', '%' . $filename . '%')->select('id','user_id',$column)->first();
            
            if ($trainingApp) {
                $foundFile = true;
                $trainingApplicationId = $trainingApp->id;
                $ownerId = $trainingApp->user_id;
                break;
            }
        }
        
        if (!$foundFile) {
            $modelMap = [
                TaAnyeBibaranDetail::class => (new TaAnyeBibaranDetail())->getTable(),
                TaTheganaDetail::class => (new TaTheganaDetail())->getTable(),
                TaExperienceDetail::class => (new TaExperienceDetail())->getTable(),
                TaEducationDetail::class => (new TaEducationDetail())->getTable()
            ];
            
            foreach ($modelMap as $modelClass => $tableName) {
                if ($foundFile) {
                    break;
                }
                
                $columns = Schema::getColumnListing($tableName);
                
                foreach ($this->fileColumns as $column) {
                    if (!in_array($column, $columns)) {
                        continue;
                    }
                    
                    $fileRecord = $modelClass::where($column, 'LIKE', '%' . $filename . '%')->first();
                    
                    if ($fileRecord) {
                        $foundFile = true;
                        $trainingApplicationId = $fileRecord->training_application_id;
                        break;
                    }
                }
            }
        }
        
        if (!$foundFile) {
            abort(404, 'File not found in our records');
        }
        
        if (!$ownerId) {
            $trainingApplication = TrainingApplication::find($trainingApplicationId);
            
            if (!$trainingApplication) {
                abort(404, 'Related training application not found');
            }
            
            $ownerId = $trainingApplication->user_id;
        }
        
        if ($ownerId == $user->id) {
            return $next($request);
        }
        
        if ($user->hasRole('admin') || $user->hasRole('super-admin') || $user->can('view_private_file')) {
            return $next($request);
        }
        
        abort(403, 'You do not have permission to access this file');
    }
}
