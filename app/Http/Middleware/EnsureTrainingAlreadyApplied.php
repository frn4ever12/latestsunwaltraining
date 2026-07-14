<?php

namespace App\Http\Middleware;

use App\Models\Training;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTrainingAlreadyApplied
{

    public function handle(Request $request, Closure $next)
    {
         $trainingId = $request->route('training');
        $training = Training::findOrFail($trainingId);
        
        // Check if user has already applied for this training
        $existingApplication = $training->trainingApplications()
            ->where('user_id', auth()->id())
            ->first();
        
        if ($existingApplication) {
            if ($request->isMethod('get') && $request->routeIs('admin.application.index')) {
                return redirect()
                    ->route('training-application.already-applied', ['training' => $trainingId])
                    ->with('info', 'You have already applied for this training.');
            }
            
            if ($request->isMethod('post') && $request->routeIs('admin.application.store')) {
                return redirect()
                    ->route('training-application.already-applied', ['training' => $trainingId])
                    ->with('error', 'You have already applied for this training.');
            }
            
            if (in_array($request->method(), ['PUT', 'PATCH']) && 
                $existingApplication->status === 'approved') {
                return redirect()
                    ->route('training-application.already-applied', ['training' => $trainingId])
                    ->with('error', 'Cannot edit approved application.');
            }
        }
        
        return $next($request);
    }
}
