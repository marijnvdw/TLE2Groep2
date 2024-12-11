<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    // Show the company dashboard
    public function index()
    {
        // Retrieve the authenticated user's company applications
        $applications = auth()->user()->company->applications;
        $user = Auth::user();

        // Pass the applicants associated with each application
        $applicants = Applicant::all();

        return view('companies.dashboard', compact('applications', 'applicants', 'user'));
    }

    public function requestApplicant(Request $request) {
        $applicationId = $request->query('id');
        $applicants = Applicant::where('application_id', $applicationId)
            ->orderBy('created_at', 'asc')
            ->get();

        $applicantsCount = $applicants->count();
        return view('companies.request-applicant', compact('applicants', 'applicantsCount'));
    }

}
