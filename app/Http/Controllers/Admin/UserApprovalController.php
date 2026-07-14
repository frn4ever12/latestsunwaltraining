<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserApprovalController extends Controller
{
    /**
     * Display list of applicants (registered users).
     */
    public function applicants(): View
    {
        $applicants = User::where('approval_status', '!=', null)
            ->latest()
            ->paginate(10);

        return view('admin.users.applicants', compact('applicants'));
    }

    /**
     * Display list of pending users for approval.
     */
    public function index(): View
    {
        $pendingUsers = User::where('approval_status', 'pending')
            ->latest()
            ->paginate(10);

        $approvedUsers = User::where('approval_status', 'approved')
            ->latest()
            ->paginate(10);

        $rejectedUsers = User::where('approval_status', 'rejected')
            ->latest()
            ->paginate(10);

        return view('admin.users.approval', compact('pendingUsers', 'approvedUsers', 'rejectedUsers'));
    }

    /**
     * Approve a user.
     */
    public function approve(Request $request, User $user)
    {
        $user->update([
            'approval_status' => 'approved',
            'email_verified_at' => now(),
        ]);

        return back()->with('success', 'प्रयोगकर्ता सफलतापूर्वक स्वीकृत भयो।');
    }

    /**
     * Reject a user.
     */
    public function reject(Request $request, User $user)
    {
        $user->update(['approval_status' => 'rejected']);

        return back()->with('success', 'प्रयोगकर्ता अस्वीकार गरियो।');
    }

    /**
     * Delete a user.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'प्रयोगकर्ता मेटियो।');
    }
}
