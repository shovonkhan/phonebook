<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Bank;
use App\Branch;
use App\Company;
use Storage;
use DB;

class InventoryController extends Controller
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
        $inventories = Inventory::all();
        return view('inventory.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $inventory = Inventory::all();
        $banks = Bank::all();
        $branch = Branch::all();
        return view('Inventory.create', compact('Inventory','banks','companies','branch'));
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
            'company' => 'required',
            'bank' => 'required',
            'branch' => 'required',
            'chq_no' => 'required',
            'amount' => 'required',
            'purpose' => 'required',
            's_date' => 'required',
            'permission_date' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move('images', $imageName);

            $inventory = new Inventory;
            $inventory->image = $imageName;
            $inventory->company = $request->company;
            $inventory->bank = $request->bank;
            $inventory->branch = $request->branch;
            $inventory->chq_no = $request->chq_no;
            $inventory->amount = $request->amount;
            $inventory->purpose = $request->purpose;
            $inventory->s_date = $request->s_date;
            $inventory->permission_date = $request->permission_date;
            $inventory->permission_by = $request->permission_by;
            $inventory->o_balence = $request->o_balence;
            $inventory->c_balence = $request->c_balence;
            $inventory->status = $request->status;
            $inventory->save();

            return redirect(route('inventory.index'));
        }else{
            $inventory = new Inventory;
            $inventory->company = $request->company;
            $inventory->bank = $request->bank;
            $inventory->branch = $request->branch;
            $inventory->chq_no = $request->chq_no;
            $inventory->amount = $request->amount;
            $inventory->purpose = $request->purpose;
            $inventory->s_date = $request->s_date;
            $inventory->permission_date = $request->permission_date;
            $inventory->permission_by = $request->permission_by;
            $inventory->o_balence = $request->o_balence;
            $inventory->c_balence = $request->c_balence;
            $inventory->status = $request->status;
            $inventory->save();

            return redirect(route('inventory.index'));
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
        $inventory = Inventory::find($id);
        return view('inventory.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::all();
        $banks = Bank::all();
        $branchs = Branch::all();
        $inventory = Inventory::where('id',$id)->first();
        return view('inventory.edit', compact('inventory','banks','branchs','companies'));
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
            'company' => 'required',
            'bank' => 'required',
            'branch' => 'required',
            'chq_no' => 'required',
            'amount' => 'required',
            'purpose' => 'required',
            's_date' => 'required',
            'permission_date' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move('images', $imageName);

            $inventory = Inventory::find($id);
            $inventory->image = $imageName;
            $inventory->company = $request->company;
            $inventory->bank = $request->bank;
            $inventory->branch = $request->branch;
            $inventory->chq_no = $request->chq_no;
            $inventory->amount = $request->amount;
            $inventory->purpose = $request->purpose;
            $inventory->s_date = $request->s_date;
            $inventory->permission_date = $request->permission_date;
            $inventory->permission_by = $request->permission_by;
            $inventory->o_balence = $request->o_balence;
            $inventory->c_balence = $request->c_balence;
            $inventory->status = $request->status;

            // $oldFileName = $inventory->image;
            // $inventory->image = $imageName;
            // Storage::delete($oldFileName);
            $inventory->save();

            return redirect(route('inventory.index'));
        }else{
            $inventory = Inventory::find($id);
            $inventory->company = $request->company;
            $inventory->bank = $request->bank;
            $inventory->branch = $request->branch;
            $inventory->chq_no = $request->chq_no;
            $inventory->amount = $request->amount;
            $inventory->purpose = $request->purpose;
            $inventory->s_date = $request->s_date;
            $inventory->permission_date = $request->permission_date;
            $inventory->permission_by = $request->permission_by;
            $inventory->o_balence = $request->o_balence;
            $inventory->c_balence = $request->c_balence;
            $inventory->status = $request->status;
            $inventory->save();
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
        Inventory::where('id',$id)->delete();
        return redirect()->back();
    }
}
