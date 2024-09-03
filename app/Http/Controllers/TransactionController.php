<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\History;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    //
    public function index(){

        $medicines = Inventory::all();
        $transactions = Transaction::paginate(8);

        return view('Transaction.transactions', compact('medicines', 'transactions'));
    }



    public function store(Request $request){

        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'date' => 'required',
            'medicine' => 'required',
            'quantity' => 'required|numeric',
            'payment' => 'required', 
        ]);


        $transaction = new Transaction();
        $transaction->Name = $request->name;
        $transaction->Email = $request->email;
        $transaction->Date = $request->date;
        $transaction->MedicineOrdered = $request->medicine;
        $transaction->Quantity = $request->quantity;
        $transaction->Total = Str::remove('₱', $request->payment);
        $transaction->Status = 'COMPLETE';
        $transaction->save();

        return redirect()->back()->with('success', 'Transaction Added Successfully');
    }




    public function fromDiagnosis(Request $request) {

        $inventory = Inventory::where('id', $request->medicine)->get();


        $transact = Transaction::create([
            'Name' => $request->name,
            'Email' => $request->email,
            'Date' => now(),
            'MedicineOrdered' => $inventory[0]->GenericName,
            'Quantity' => $request->quantity,
            'Total' => Str::remove('₱', $request->payment),
            'Status' => 'COMPLETE',
        ]);
        
        if($transact) {
            $this->setHistory($transact, $request, $inventory);
            $this->deleteDiagnosis($request);
        }
        
        return redirect()->back();
    }

    public function deleteDiagnosis($request) {

        $history = Diagnosis::where('pet_id', $request->pet_id)->first();

        $history->delete();

        return redirect()->back();
    }

    public function setHistory($transact, $request, $inventory) {


        $History = History::create([
            'petname' => $request->petname,
            'doctorname' => $request->doctorname,
            'diagnosis' => $request->diagnosis,
            'medicine' => $inventory[0]->GenericName,
            'quantity' => $request->quantity,
            'Status' => $transact->Status,
            'pet_id' => $request->pet_id,
        ]);

        return $History;
    }






    public function getStocks($medicineId) {
        
        $medicine = Inventory::findOrFail($medicineId);
        return response()->json(['stocksAvailable' => $medicine->Quantity]);
    }

    public function getpayment($medicineId, $quantity) {

        $medicine = Inventory::findOrFail($medicineId);

        $payment = $medicine->Price*$quantity;
        $this->stockOut($medicineId,$quantity);
        return response()->json(['payment' => $payment]);
    }


    public function stockOut($medicineId,$quantity) {

        $medId = Inventory::find($medicineId);
        $medId->Quantity = $medId->Quantity - $quantity;
        $medId->save();

    }


}
