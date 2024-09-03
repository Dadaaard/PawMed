<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Pet;

class PetController extends Controller
{
    //

    public function index($id)
    {

        $users = User::find($id);
        $pets = Pet::where('user_id', $id)->get();

        return view('Customer.pet_details', compact('users', 'pets')); 
    }

    public function store(Request $request, $id)
    {
        //

        $pet = new Pet();
        $pet->petname = $request->petname;
        $pet->date = $request->dateofbirth;
        $pet->animaltype = $request->animaltype;
        $pet->gender = $request->gender;
        $pet->breed = $request->breed;
        $pet->weight = $request->weight;
        $pet->colormarkings = $request->color;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $pet->image = 'images/' . $imageName;
        }

        $pet->user_id = $id;
        $pet->save();
        return redirect()->back()->with('success', 'Pet Details Updated Successfully');
        
    }

    public function update($id)
    {
        //

        $pet = Pet::find($id);
        $pet->update(
            [
                'petname' => request('petname'),
                'date' => request('dateofbirth'),
                'animaltype' => request('animaltype'),
                'gender' => request('gender'),
                'breed' => request('breed'),
                'weight' => request('weight'),
                'colormarkings' => request('color'),
                'image' => request('image'),
            ]
        );
        return redirect()->back()->with('success', 'Pet Details Updated Successfully');

    }

}
