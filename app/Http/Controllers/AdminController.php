<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Application;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Check if user is an admin
        if (Auth::user()->admin) {
            // Get all companies and show them on the dashboard
            $companies = Company::all();
            return view('admin.index', compact('companies'));
        } else {
            // if user is not an admin redirect to home
            return redirect('/')->with('error', 'Je bent niet bevoegd om deze pagina te bekijken.');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->admin) {
            return redirect()->route('/')->with('error', 'Je moet admin zijn om een bedrijf toe te voegen');
        } else {
            return view('admin.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|numeric|digits:10',
            'address' => 'required|string|max:200',
            'city' => 'required|string|max:200',
            'company_code' => 'required|string|max:50',
        ]);

        $company = new Company();

        $company->name = $request->input(key: 'name');
        $company->phone_number = $request->input(key: 'phone_number');
        $company->address = $request->input(key: 'address');
        $company->city = $request->input(key: 'city');
        $company->company_code = $request->input(key: 'company_code');

        $company->save();
        return redirect()->route('admin-overzicht.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);

        if (!auth()->user()->admin) {
            return redirect()->route('/')->with('error', 'Je bent niet bevoegd om deze pagina te bekijken.');
        }
        return view('admin.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);

        if (!auth()->user()->admin) {
            return redirect()->route('/')->with('error', 'Je bent niet bevoegd om deze pagina te bekijken.');
        }

        // Validatie
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|digits:10',
            'address' => 'required|string|max:200',
            'city' => 'required|string|max:200',
            'company_code' => 'required|string|max:50',
        ]);

        // Bijwerken van de gegevens
        $company->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'city' => $request->city,
            'company_code' => $request->company_code,
        ]);

        // Redirect met een succesbericht
        return redirect()->route('admin-overzicht.index')->with('success', 'Bedrijf succesvol bijgewerkt!');
    }

    /**
     * Verwijder de opgegeven resource uit de database.
     */
    public function destroy(Company $company)
    {

//        if (!auth()->user()->admin) {
//            return redirect()->route('/')->with('error', 'Je bent niet bevoegd deze pagina te bekijken.');
//        }
//
//        $company->delete();
//
//        return redirect()->route('admin-overzicht.index')->with('success', 'Bedrijf succesvol verwijderd!');

    }
}
