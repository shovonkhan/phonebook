<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Fabric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FabricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fabrics = Fabric::all();
        return view('fabric.index', compact('fabrics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buyer = Buyer::all();
        return view('fabric.create', compact('buyer'));
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
            'fabric_code' => 'required|unique:fabrics',
            'fabric_type' => 'required',
            'lot' => 'required',
            'unit' => 'required',
        ]);

        $fabrics = array();
        $fabrics['fabric_code'] = $request->fabric_code;
        $fabrics['fabric_type'] = $request->fabric_type;
        $fabrics['lot'] = $request->lot;
        $fabrics['unit'] = $request->unit;
        $fabrics['buyer_id'] = $request->buyer_id;
        $fabrics['color'] = $request->color;
        $fabrics['gsm'] = $request->gsm;
        $fabrics['grade'] = $request->grade;
        $fabrics['construction'] = $request->construction;
        $fabrics['remarks'] = $request->remarks;
        $fabrics['status'] = $request->status;

        $fabric=DB::table('fabrics')->insert($fabrics);
        if ($fabric) {
            $notification=array(
                'messege'=>'Successfully Fabric Inserted ',
                'alert-type'=>'success'
            );
            return Redirect()->route('fabric.index')->with($notification);                      
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
        $fabrics = DB::table('fabrics')
                ->join('buyers','fabrics.buyer_id','buyers.id')
                ->select('fabrics.*','buyers.*')
                ->where('fabrics.id',$id)
                ->first();
        return view('fabric.show', compact('fabrics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buyer = Buyer::all();
        $fabric = Fabric::find($id);
        return view('fabric.edit', compact('fabric','buyer'));
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
            'fabric_code' => 'required',
            'fabric_type' => 'required',
            'lot' => 'required',
            'unit' => 'required'
        ]);

        $fabrics = Fabric::where('id',$id)->first();
        $fabrics->fabric_code = $request->fabric_code;
        $fabrics->fabric_type = $request->fabric_type;
        $fabrics->lot = $request->lot;
        $fabrics->unit = $request->unit;
        $fabrics->buyer_id = $request->buyer_id;
        $fabrics->color = $request->color;
        $fabrics->gsm = $request->gsm;
        $fabrics->grade = $request->grade;
        $fabrics->construction = $request->construction;
        $fabrics->remarks = $request->remarks;
        if ($fabrics->save()) {
            $notification=array(
                'messege'=>'Successfully Fabric Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('fabric.index')->with($notification);                      
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
        $delete=DB::table('fabrics')
                ->where('id',$id)
                ->first();
         $dltuser=DB::table('fabrics')
                  ->where('id',$id)
                  ->delete();
        if ($dltuser) {
            $notification=array(
                 'messege'=>'Successfully Fabric Deleted!',
                 'alert-type'=>'success'
            );
            return Redirect()->route('fabric.index')->with($notification);                      
        }else{
            $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        } 
    }

    public function addCreate()
    {
        return view('fabric.add');
    }
}
