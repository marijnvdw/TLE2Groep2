<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use Dflydev\DotAccessData\Data;
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
        $activeFilters = [];


        if ($request->filled('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $applications->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', $searchTerm)
                    ->orWhereHas('company', function ($companyQuery) use ($searchTerm) {
                        $companyQuery->where('city', 'like', $searchTerm)
                        ->orWhere('name', 'like', $searchTerm);
                    });
            });
            $activeFilters['search'] = $request->search;
        }

        if (!$request->boolean('allCities')) {
            if ($request->filled('location')) {
                $applications->whereHas('company', function ($query) use ($request) {
                    $query->where('city', 'LIKE', "%{$request->location}%");
                });
                $activeFilters['location'] = $request->location;
            }
        }

        if ($request->filled('sector')) {
            $applications->where('sector', $request->sector);
            $activeFilters['sector'] = $request->sector;
        }

        if ($request->filled('employment')) {
            if ($request->employment === 'fulltime') {
                $applications->where('employment', true);
            } elseif ($request->employment === 'parttime') {
                $applications->where('employment', false);
            }
            $activeFilters['employment'] = $request->employment;
        }

        if ($request->filled('adult')) {
            if ($request->adult === 'ja') {
                $applications->where('adult', true);
            } elseif ($request->adult === 'nee') {
                $applications->where('adult', false);
            }
            $activeFilters['adult'] = $request->adult;
        }

        if ($request->filled('drivers_licence')) {
            if ($request->drivers_licence === 'ja') {
                $applications->where('drivers_licence', true); // 1 in database
            } elseif ($request->drivers_licence === 'nee') {
                $applications->where('drivers_licence', false); // 0 in database
            }
            $activeFilters['drivers_licence'] = $request->drivers_licence;
        }

        $applications = $applications->get();
        $applicationsCount = Application::all()->count();

        return view('application.index', compact('applications', 'activeFilters', 'applicationsCount'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->check() || auth()->user()->admin)
        {
            return redirect()->route('home');
        }
        return view('application.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->check() || auth()->user()->admin)
        {
            return redirect()->route('home');
        }
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'employment' => 'required|integer',
            'drivers_licence' => 'required|integer',
            'adult' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'details' => 'required|string',
            'sector' => 'string',
        ]);

        // Handle the image upload if present
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public'); // Save in 'storage/images'
        }

        // Set the creation date
        $validatedData['creation_date'] = now()->format('Y-m-d');

        // Associate the application with the authenticated user's company
        $validatedData['company_id'] = Auth::user()->company->id;

        //storage

        $validatedData['image'] = 'storage/' . $validatedData['image'];

        // Create a new application with the validated data
        Application::create($validatedData);

        // Redirect with a success message
        return redirect()->route('dashboard')->with('success', 'Vacature succesvol aangemaakt.');
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
    public function edit(string $id)
    {
        $application = Application::find($id);

        if (!$application) {
            abort(404, 'Application not found.');
        }

        if (auth()->check() && auth()->user()->admin) {
            return view('application.edit', compact('application'));
        }

        if (auth()->check() && $application->company_id === auth()->user()->company_id) {
            return view('application.edit', compact('application'));
        }

        return redirect()->route('home')->with('error', 'Unauthorized access.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $application = Application::findOrFail($id);

        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'employment' => 'required|integer',
            'drivers_licence' => 'required|integer',
            'adult' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'details' => 'required|string',
            'sector' => 'string',
        ]);

        // Handle image upload separately
        if ($request->hasFile('image')) {
            // Store the file in 'public/images' and get the path
            $path = $request->file('image')->store('images', 'public');

            // Add the correct path to the validated data
            $validatedData['image'] = 'storage/' . $path;
        } else {
            // If no new image is uploaded, keep the existing image
            $validatedData['image'] = $application->image;
        }

        // Update the application with the validated data
        $application->update($validatedData);
//            dd($validatedData);
        // Redirect back with a success message
        return redirect()->route('dashboard')->with('success', 'Vacature succesvol bijgewerkt.');
    }


    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the application by ID
        $application = Application::find($id);

        // Check if the application exists
        if (!$application) {
            return redirect()->route('application.index')->with('error', 'Application not found.');
        }

        // Check if the user is authorized to delete the application
        if (!auth()->check() ||
            (!auth()->user()->admin && $application->company_id !== auth()->user()->company_id)) {
            return redirect()->route('application.index')->with('error', 'Unauthorized access.');
        }

        // Delete the application
        $application->delete();

        // Redirect with a success message
        return redirect()->route('dashboard')->with('success', 'Application successfully deleted.');
    }








}
