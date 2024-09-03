<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AuditController extends Controller
{
    //
    public function index()
    {
        return view('audit.index');
    }   

    public function show()
    {
        
        $users = DB::table('audit')
            ->select('id', 'Name', 'Email', 'LastLoginTime', 'LastLoginOutTime', 'Status','IpAddress' ,'Verified')
            ->paginate(3); // Replace 10 with the number of records per page you want to display
        return view('audit.index', compact('users'));
    }

}
