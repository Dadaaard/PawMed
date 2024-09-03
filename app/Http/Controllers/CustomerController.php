<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Diagnosis;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Pet;
use App\Models\Records;
use App\Models\Inventory;
use App\Models\History;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class CustomerController extends Controller
{
    //


    public function index()
    {
        return view('Customer.customer');
    }

    public function appointmentForm(){

        $appointments = Appointment::where('user_id', auth()->user()->id)->get();


        return view('Customer.customerAppointment', compact('appointments'));
    }

    


    public function customerPurchase(){

        $user = auth()->user()->email;
        $userid = auth()->user()->id;

        $transactions = Transaction::where('Email', $user)->get();

        

        $transactionMedicineName = Transaction::where('id', $transactions);

        return view('test-customer-purchase', compact('transactions'));
    }

    public function view()
    {
        return view('Customer.pet_details');
    }


    public function store(Request $request)
    {

        $request = $request->validate([
            'Name' => 'required|string',
            'Petname' => 'required|string',
            'Purpose' => 'required|string',
            'conditions' => 'array', // Ensure symptoms is an array
            'symptoms' => 'array', // Ensure symptoms is an array
            'date' => 'required',
            // Add more validation rules as necessary
        ]);
        

        $symptoms = $request['symptoms'];
        $symptomsString = implode(', ', $symptoms);
        $conditions = $request['conditions'];
        $conditionsString = implode(', ', $conditions);


        $customer = Appointment::create([
            'Name' => $request['Name'],
            'PetName' => $request['Petname'],
            'Purpose' => $request['Purpose'],
            'conditions' => $conditionsString,
            'symptoms' => $symptomsString,
            'appointmentDate' => $request['date'],
            'status' => 'Pending',
            'user_id' => auth()->user()->id,
        ]);

        return view('test', compact('customer'));
    }

    public function show()
    {


        $customers = User::where('usertype', 'Customer')->get();

    // Iterate over each customer to fetch their pets
    foreach ($customers as $customer) {
        // Fetch pets belonging to the current customer
        $customer->pet_count = $customer->pets()->count();

    }

    return view('Customer.customer', compact('customers'));


    //     $customers = User::where('usertype', 'Customer')->get();
    // $customerIds = $customers->pluck('id')->toArray(); // Convert collection to array of IDs


 
    
    // // Fetch count of pets where user_id is in the array of customerIds
    // $pets = Pet::where('user_id', $customerIds)->get()->count();
        // return view('Customer.customer', compact('customers' , 'pets'));
    }

    public function destroy($id)
    {
        $customer = User::find($id);
        $customer->delete();
        return redirect()->back();
    }

    public function getPurchase()
    {
        $transaction = Transaction::where('email', auth()->user()->email)->get();
        $user = User::all();


        return view('Customer.purchase', compact('transaction'));
    }


    public function customerDiagnosis($id)
    {
         // Fetch all pets belonging to the current user
         $petlist = Pet::where('id', $id)->paginate(2);

        $stocks = $this->getStock();
         // Iterate through each pet to fetch its records and associated user
         foreach ($petlist as $pet) {
             // Fetch records associated with the current pet

            $pet->records = Diagnosis::where('pet_id', $pet->id)->get();


            
                

             // Fetch user information associated with the current pet
             $pet->user = User::where('id', $pet->user_id)->first();
     
             // Iterate through records of the current pet
             foreach ($pet->records as $record) {
                 
                 $record->doctor = User::where('id', $record->doctor_id)->first();
                 // Assigning individual fields to each record
                 $record->id; // Assuming you want to access ID
                 $record->diagnosis; // Assuming you want to access Diagnosis
                 $record->Medicine; // Assuming you want to access Medicine
                 $record->Quantity; // Assuming you want to access Quantity
             }
         }
        
         $historys = $this->getHistory($id);
         
         $this->deleteRecord($id);
         

        return view('Customer.pet_diagnosis', compact('petlist', 'stocks', 'historys'));
    }

    public function getHistory($id) {
        
        $history = History::where('pet_id', $id)->orderBy('created_at', 'desc')->get();
        return $history;
    }
    public function deleteRecord($id) {

    } 

    public function getStock()
    {
        $stocks = Inventory::all();
        return $stocks;
    }
}