<?php

namespace App\Http\Controllers;

use App\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::all();
        return view('buyer.index', compact('buyers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buyer.create');
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
            'buyer_name' => 'required',
            'buyer_type' => 'required',
            'phone' => 'required'
        ]);

        $buyers = array();
        $buyers['buyer_name'] = $request->buyer_name;
        $buyers['buyer_type'] = $request->buyer_type;
        $buyers['email'] = $request->email;
        $buyers['phone'] = $request->phone;
        $buyers['address'] = $request->address;
        $buyers['status'] = $request->status;

        $buyer=DB::table('buyers')->insert($buyers);
        if ($buyer) {
            $notification=array(
                'messege'=>'Successfully Buyer Inserted ',
                'alert-type'=>'success'
            );
            return Redirect()->route('buyer.index')->with($notification);                      
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
        $buyer = Buyer::find($id);
        return view('buyer.show', compact('buyer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buyer = Buyer::find($id);
        return view('buyer.edit', compact('buyer'));
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
            'buyer_name' => 'required',
            'buyer_type' => 'required',
            'phone' => 'required'
        ]);

        $buyers = Buyer::where('id',$id)->first();
        $buyers->buyer_name = $request->buyer_name;
        $buyers->buyer_type = $request->buyer_type;
        $buyers->email = $request->email;
        $buyers->phone = $request->phone;
        $buyers->address = $request->address;
        $buyers->status = $request->status;
        if ($buyers->save()) {
            $notification=array(
                'messege'=>'Successfully Buyer Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('buyer.index')->with($notification);                      
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
        $delete=DB::table('buyers')
                ->where('id',$id)
                ->first();
         $dltuser=DB::table('buyers')
                  ->where('id',$id)
                  ->delete();
        if ($dltuser) {
            $notification=array(
                 'messege'=>'Successfully Buyer Deleted ',
                 'alert-type'=>'success'
            );
            return Redirect()->route('buyer.index')->with($notification);                      
        }else{
            $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        } 
    }
}
