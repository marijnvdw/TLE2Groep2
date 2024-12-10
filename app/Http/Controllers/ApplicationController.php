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
    public function index()
    {
        $applications = Application::all();

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
            'details' => 'required|string',
        ]);

        // Handle the image upload if present
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public'); // Save in 'storage/app/public/images'
        }

        // Set the creation date
        $validatedData['creation_date'] = now()->format('Y-m-d');

        // Associate the application with the authenticated user's company
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
    public function edit(Request $request)
    {
        $id = $request->query('id');
        $application = Application::findOrFail($id); // Fetch the application by ID or throw an error if not found

        return view('application.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $application = Application::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'employment' => 'required|string|max:255',
            'drivers_licence' => 'required|integer',
            'adult' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'details' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $application->update($validatedData);

        return redirect()->route('applications.index')->with('success', 'Vacature succesvol bijgewerkt.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
