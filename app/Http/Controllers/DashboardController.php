<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory; 
use App\Models\Transaction; 
use App\Models\User; 
use App\Models\Pet;
use App\Models\Appointment; 

class DashboardController extends Controller
{
    //

    public function index(){

        $inventory = $this->getInventoryStatus();
        $transactions = $this->getRecentTransaction();
        $customers = $this->getCustomers();
        $appointments = $this->getWeeklyAppointments();
        $patients = $this->getPatients();
        return view('maindashboard',compact('inventory','transactions','customers', 'appointments', 'patients'));
    }


    public function getInventoryStatus(){

        $inventory = Inventory::select('GenericName','Brandname','Quantity','ExpDate')->get();
        return $inventory;

    }

    public function getRecentTransaction(){

        $transactions = Transaction::select('Name','Date','Total')->get();
        return $transactions;

    }
    public function getCustomers(){

        $customers = User::where('usertype', '=', 'Customer')->count();
        return $customers;

    }

    public function getWeeklyAppointments(){
        $appointsments = Appointment::where('appointmentDate', '>=', date('Y-m-d', strtotime('-7 days')))->paginate(3);

        return $appointsments;
    }

    public function getPatients(){
        $patients = Pet::count();
        return $patients;
    }

    public function getDoctorStatus(){
        $doctors = User::where('usertype', '=', 'Doctor');
        return $doctors;
    }
}
