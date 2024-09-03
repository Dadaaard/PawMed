<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    //

    public function store(Request $request)
    {
        return view('history.index');
    }
}
