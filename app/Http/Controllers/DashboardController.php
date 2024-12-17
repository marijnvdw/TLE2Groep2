<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Applicant;
use App\Models\Application;
use App\Models\ApplicationApplicantCount;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->is_admin) {
            // Redirect admins to the admin-overzicht page
            return redirect()->route('admin-overzicht.index');
        }

        // For company users, handle dashboard logic
        $applications = optional($user->company)->applications ?? collect();

        foreach ($applications as $application) {
            $applicantCount = $application->applicants()->count();

            // Update or create a record in the pivot table
            ApplicationApplicantCount::updateOrCreate(
                ['application_id' => $application->id],
                ['applicants_count' => $applicantCount]
            );
        }

        return view('dashboard', [
            'user' => $user,
            'applications' => $applications,
            'someData' => 'Example data',
        ]);
    }

    public function requestApplicant(Request $request)
    {
        $index = $request->query('index');
        $applicationId = $request->query('id');

        $applicants = Applicant::where('application_id', $applicationId)
            ->orderBy('created_at', 'asc')
            ->take($index)
            ->get();

        return view('companies.request-applicant', compact('applicants'));
    }
}
