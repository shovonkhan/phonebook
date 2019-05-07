<?php

namespace App\Http\Controllers;

use App\Chemical;
use App\ChemicalInventory;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChemicalInventoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chemicalInventory = DB::table('chemical_inventories')
                            ->join('chemicals','chemical_inventories.chemical_id','chemicals.id')
                            ->select('chemical_inventories.*','chemicals.name')
                            ->get();
        return view('chemical.inventory.index', compact('chemicalInventory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chemical = Chemical::all();
        $department = Department::all();
        return view('chemical.inventory.create', compact('chemical','department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'date' => 'required',
            'chemical_id' => 'required',
            'bill' => 'required',
            'challan' => 'required',
            'department' => 'required',
            'qty' => 'required',
            'rate' => 'required',
            'amount' => 'required',
        ]);

        $chemical_receive = new ChemicalInventory;
        $chemical_receive->date = $request->date;
        $chemical_receive->chemical_id = $request->chemical_id;
        $chemical_receive->bill = $request->bill;
        $chemical_receive->challan = $request->challan;
        $chemical_receive->department = $request->department;
        $chemical_receive->lc_no = $request->lc_no;
        $chemical_receive->qty = $request->qty;
        $chemical_receive->rate = $request->rate;
        $chemical_receive->amount = $request->amount;
        $chemical_receive->bags = $request->bags;
        $chemical_receive->description = $request->description;
        $chemical_receive->save();
        if ($chemical_receive->save()) {
            $notification=array(
                        'messege'=>'Successfully Chemical Receive Inserted ',
                        'alert-type'=>'success'
            );
            return Redirect()->route('chemical-inventory.index')->with($notification);                      
        }else{
            $notification=array(
                        'messege'=>'error ',
                        'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chemicalInventory = DB::table('chemical_inventories')
                            ->join('chemicals','chemical_inventories.chemical_id','chemicals.id')
                            ->select('chemical_inventories.*','chemicals.name')
                            ->where('chemical_inventories.id',$id)
                            ->first();
        return view('chemical.inventory.show', compact('chemicalInventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chemical = Chemical::all();
        $department = Department::all();
        $chemicalInventory = ChemicalInventory::find($id);
        return view('chemical.inventory.edit', compact('chemicalInventory','chemical','department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'date' => 'required',
            'chemical_id' => 'required',
            'bill' => 'required',
            'challan' => 'required',
            'department' => 'required',
            'qty' => 'required',
            'rate' => 'required',
            'amount' => 'required',
        ]);

        $chemical_receive = ChemicalInventory::find($id);
        $chemical_receive->date = $request->date;
        $chemical_receive->chemical_id = $request->chemical_id;
        $chemical_receive->bill = $request->bill;
        $chemical_receive->challan = $request->challan;
        $chemical_receive->department = $request->department;
        $chemical_receive->lc_no = $request->lc_no;
        $chemical_receive->qty = $request->qty;
        $chemical_receive->rate = $request->rate;
        $chemical_receive->amount = $request->amount;
        $chemical_receive->bags = $request->bags;
        $chemical_receive->description = $request->description;
        $chemical_receive->save();
        if ($chemical_receive->save()) {
            $notification=array(
                        'messege'=>'Successfully Chemical Receive Updated ',
                        'alert-type'=>'success'
            );
            return Redirect()->route('chemical-inventory.index')->with($notification);                      
        }else{
            $notification=array(
                        'messege'=>'error ',
                        'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
