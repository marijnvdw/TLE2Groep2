<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::all();
        //dd($applications);
        //return view('application.index');
        //dd('hi');

        return view('application.index', compact('applications'));
//        return view('vacature-overzicht', compact('applications'));


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
        //
        return view('application.show', compact('application'));
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
