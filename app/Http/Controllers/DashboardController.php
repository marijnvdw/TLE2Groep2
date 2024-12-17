<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Check if the user is an admin
        if ($user->is_admin) {
            // Redirect admins to the admin-overzicht page
            return redirect()->route('admin-overzicht.index');
        }

        // For non-admins, load the dashboard view
        return view('dashboard', [
            'user' => $user,
            'someData' => 'Example data'
        ]);
    }
}
