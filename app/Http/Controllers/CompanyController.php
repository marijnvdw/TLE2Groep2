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
        $user = Auth::user();
        $applications = $user->company->applications;
//        $applicants = Applicant::where('application_id', $applications->id);
//        $applicantsCount = $applicants->count();

        $applicants = Applicant::all();

        return view('companies.dashboard', compact('applications', 'applicants', 'user'));
    }
//    public function index()
//    {
//        $user = Auth::user();
//        $applications = $user->company->applications;
//
//        // Get applicants per application, and count them
//        $applicationsWithApplicants = $applications->map(function ($application) {
//            $applicants = Applicant::where('application_id', $application->id)->get();
//            $application->applicants_count = $applicants->count();
//            $application->applicants = $applicants;
//            return $application;
//        });
//
//        return view('companies.dashboard', compact('applicationsWithApplicants', 'user', 'applications'));
//    }


    public function requestApplicant(Request $request) {
        $applicationId = $request->query('id');
        $applicants = Applicant::where('application_id', $applicationId)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('companies.request-applicant', compact('applicants'));
    }

}
