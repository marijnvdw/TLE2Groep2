<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function showModal()
    {
        /** @return \Illuminate\View\View */

        $applications = Application::all();

        return view('application.index', compact('applications'));
    }

    public function filterResults(Request $request)
    {
        $applications = Application::query();

        if ($request->has('location') && !empty($request->location)) {
            $applications->where('postcode', $request->location);
        }

        if ($request->has('distance') && !empty($request->distance)) {
            $applications->where('distance', $request->distance);
        }

        if ($request->has('sector') && !empty($request->sector)) {
            $applications->where('sector', $request->sector);
        }

        if ($request->has('hours') && !empty($request->hours)) {
            $applications->where('hours', $request->hours);
        }

        if ($request->has('adult') && $request->adult == 'on') {
            $applications->where('adult', true);
        }

        if ($request->has('drivers_license') && $request->drivers_license == 'on') {
            $applications->where('drivers_license', true);
        }

        $applications = $applications->get();

        return view('application.index', [ 'applications' => $applications ]);
    }
}
