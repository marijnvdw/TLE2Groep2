<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function showModal()
    {
        /** @return \Illuminate\View\View */

        return view('vacature-overzicht');
    }
}
