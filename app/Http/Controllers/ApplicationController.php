<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $applications = Application::query();
        //dd($applications);
        //return view('application.index');
        //dd('hi');

        if (!$request->filled('allCities')) {
            if ($request->filled('location')) {
                $applications->whereHas('company', function ($query) use ($request) {
                    $query->where('city', 'LIKE', "%{$request->location}%");
                });
            }
        }

        if ($request->filled('sector')) {
            $applications->where('sector', $request->sector);
        }

        if ($request->filled('employment')) {
            $employment = $request->employment == 'fulltime' ? true : false;
            $applications->where('employment', $employment);
        }

        if ($request->filled('adult')) {
            $applications->where('adult', true);
        }

        if ($request->filled('drivers_license')) {
            $applications->where('drivers_license', true);
        }

        $applications = $applications->get();

        return view('application.index', compact('applications'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('application.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'employment' => 'required|string|max:255',
            'drivers_licence' => 'required|integer',
            'adult' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'details' => 'nullable|string',
        ]);

        // Handle the image upload if present
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $validatedData['creation_date'] = now()->format('Y-m-d');

        $validatedData['company_id'] = Auth::user()->company->id;
        // Create a new application with the validated data
        Application::create($validatedData);

        // Redirect with a success message
        return redirect()->route('application.index')->with('success', 'Vacature succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        $company = Company::find($application->company_id);
        return view('application.show', compact('application', 'company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
        return view('application.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
