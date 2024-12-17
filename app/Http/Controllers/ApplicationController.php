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
        $activeFilters = [];

        //dd($applications);
        //return view('application.index');
        //dd('hi');

        if ($request->filled('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $applications->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', $searchTerm)
                    ->orWhere('details', 'like', $searchTerm);
//                    ->orWhere('name', 'like', $searchTerm);
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
            $employment = $request->employment == 'fulltime' ? true : false;
            $applications->where('employment', $employment);
            $activeFilters['employment'] = $request->employment;
        }

        if ($request->filled('adult')) {
            $applications->where('adult', true);
            $activeFilters['adult'] = $request->adult;
        }

        if ($request->filled('drivers_license')) {
            $applications->where('drivers_license', true);
            $activeFilters['drivers_license'] = $request->drivers_license;
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
        $application = Application::find($request);

        if (!$application) {
            abort(404, 'Application not found.');
        }

        if (auth()->check() && auth()->user()->admin) {
            return view('application.edit', compact('application'));
        }

        if (auth()->check() && $application->company_id === auth()->user()->company_id) {
            return view('application.edit', compact('application'));
        }

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

        return redirect()->route('dashboard')->with('success', 'Vacature succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = Application::find($id);

        if (!$application) {
            abort(404, 'Application not found.');
        }

        if ((!auth()->check() || !auth()->user()->admin) && $application->company_id !== auth()->user()->company_id) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }

        $application->delete();

        return redirect()->route('application.index')->with('success', 'Application successfully deleted.');
    }
}
