<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Bank;
use DB;

class BranchController extends Controller
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
        $branch = Branch::all();
        return view('branch.index', compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::all();
        return view('branch.create', compact('banks'));
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
            'name' => 'required',
            'bank' => 'required',
            'maneger' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $branch = new Branch;
        $branch->name = $request->name;
        $branch->bank = $request->bank;
        $branch->maneger = $request->maneger;
        $branch->phone = $request->phone;
        $branch->address = $request->address;
        $branch->save();

        return redirect(route('branch.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch = Branch::find($id);
        return view('branch.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banks = Bank::all();
        $branch = Branch::where('id',$id)->first();
        return view('branch.edit', compact('branch','banks'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=DB::table('branches')
                ->where('id',$id)
                ->first();
         $dltuser=DB::table('branches')
                  ->where('id',$id)
                  ->delete();
        if ($dltuser) {
            $notification=array(
                 'messege'=>'Successfully Branch Deleted ',
                 'alert-type'=>'success'
            );
            return Redirect()->route('branch.index')->with($notification);                      
        }else{
            $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        } 
    }
}
