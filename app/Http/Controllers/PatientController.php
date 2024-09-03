<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Records;

use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    //
    public function index()
    {

        $pets = $this->getPets();
        return view('test-doctor-generate', compact('pets'));
    }

    public function getPets()
    {
        $pets = Pet::paginate(8); // Paginate pets

        // Retrieve users for all pets using a single query to optimize performance
        $userIds = $pets->pluck('user_id')->toArray();
        $users = User::whereIn('id', $userIds)->get()->keyBy('id');

        // Attach the corresponding user to each pet
        foreach ($pets as $pet) {
            if (isset($users[$pet->user_id])) {
                $pet->user = $users[$pet->user_id];
            } else {
                $pet->user = null; // Handle case where user is not found (optional)
            }
        }

        return $pets;
    }

    public function record($id)
    {

        $pet = Pet::findOrFail($id); // Find the pet by ID

        $user = User::findOrFail($pet->user_id); // Find the user corresponding to the pet

        $pet->user = $user; // Attach the user to the pet object
        
        return view('test-doctor-medical-records', compact('pet'));
    }

    public function store(Request $request, $id)
    {
       // Validate and process the JSON data
       $medicineData = json_decode($request->input('medicineData'), true);

     
       

       // Example: Save medicines and quantities to database
       foreach ($medicineData as $data) {
           // Assuming you have a Medicine model or similar

           Diagnosis::create ([
               'diagnosis' => $request->diagnosis,
               'medicinename' => $data['medicine'],
               'quantity' => $data['quantity'],
               'pet_id' => $id,
               'doctor_id' => Auth::user()->id,
               'status' => $request->status,
           ]);
       }

       // Redirect or return a response as needed
       return redirect()->back()->with('success', 'Medical record saved successfully.');
   
    
    }


    public function getRecords() {
        // Fetch all pets belonging to the current user
        $petlist = Pet::where('user_id', auth()->user()->id)->paginate(2);
        // Iterate through each pet to fetch its records and associated user
        foreach ($petlist as $pet) {
            // Fetch records associated with the current pet
            $pet->records = Records::where('pet_id', $pet->id)->get();
    
            // Fetch user information associated with the current pet
            $pet->user = User::where('id', $pet->user_id)->first();
    
            // Iterate through records of the current pet
            foreach ($pet->records as $record) {
                
                $doctor = User::where('id', $record->doctor_id)->first();
                // Assigning individual fields to each record
                $record->id; // Assuming you want to access ID
                $record->diagnosis; // Assuming you want to access Diagnosis
                $record->Medicine; // Assuming you want to access Medicine
                $record->Quantity; // Assuming you want to access Quantity
            }
        }
    
        // Pass the prepared data to the view
        return view('test-customer-medical-records', compact('petlist'));
    }
}
