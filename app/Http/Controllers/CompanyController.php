<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use App\Models\ApplicationApplicantCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    // Show the company dashboard
    public function index()
    {
        $user = Auth::user();
        $applications = optional($user->company)->applications ?? collect();

        foreach ($applications as $application) {
            $applicantCount = $application->applicants()->count();

            // Update of maak een nieuwe record in de koppeltabel
            ApplicationApplicantCount::updateOrCreate(
                ['application_id' => $application->id],
                ['applicants_count' => $applicantCount]
            );
        }

        return view('dashboard', compact('applications', 'user'));
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
