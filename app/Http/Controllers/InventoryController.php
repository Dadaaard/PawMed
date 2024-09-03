<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\User;

class InventoryController extends Controller
{
    //
    public function index()
    {
        $items= Inventory::paginate(3);
        

        // dd($items); // You can uncomment this for debugging if needed
        return view('Inventory.Inventory_medicine', compact('items'));
    }


    public function store(Request $request){


        $request->validate([
            'Dcode' => 'required|numeric',
            'Gname' => 'required',
            'Bname' => 'required',
            'Quantity' => 'required',
            'Category' => 'required',
            'ExpDate' => 'required',
            'Price' => 'required|numeric',
        ]);

        $inventory = new Inventory();
        $inventory->DrugCode = $request->Dcode;
        $inventory->GenericName = $request->Gname;
        $inventory->Brandname = $request->Bname;
        $inventory->Quantity = $request->Quantity;
        $inventory->Category = $request->Category;
        $inventory->ExpDate = $request->ExpDate;
        $inventory->Price = $request->Price;
        $inventory->save();

        return redirect()->back()->with('success', 'Inventory Added Successfully');
    }

    public function delete($id){

        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect()->back()->with('success', 'Inventory Deleted Successfully');
    }

    public function search (Request $request)
    {

        $search = $request->search;
        $items = Inventory::where('GenericName', 'like', '%' . $search . '%')->paginate(6);
        return view('Inventory.Inventory_medicine', compact('items'));
    }


}
