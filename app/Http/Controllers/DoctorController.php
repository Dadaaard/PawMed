<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DashboardController;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use App\Models\Appointment;

class DoctorController extends Controller
{
    //


    public function index(DashboardController $dashboardController)
    {

        $WeeklyAppointments = Appointment::where('status', 'Pending')->get();
        return view('test-doctor', compact('WeeklyAppointments'));
    }

    public function update($id){

        
        $appointment = Appointment::find($id);

        $appointment->update([
            'status' => 'Done'
        ]);

        return redirect()->back();
    }


}
