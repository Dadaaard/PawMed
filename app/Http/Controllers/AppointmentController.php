<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;

class AppointmentController extends Controller
{
    //

    public function index()
    {
    $appointments = Appointment::select('id', 'Name', 'PetName', 'Purpose', 'conditions', 'symptoms', 'appointmentDate', 'user_id', 'status')->get();


    $userIds = $appointments->pluck('user_id')->toArray();

    //wala pa nahuman
    foreach ($appointments as $appointment) {
        $appointment->user = User::find($appointment->user_id);
        $appointment->symptoms = explode(',', $appointment->symptoms);
        $appointment->conditions = explode(',', $appointment->conditions);
        // $appointment->user = $users->find($appointment->user_id);
    }


    return view('Appointment.appointment', compact('appointments'));
}

    // public function index()
    // {

    //     $appointments = Appointment::all();
        
    //     return view('Appointment.appointment', compact('appointments'));
    // }
}


