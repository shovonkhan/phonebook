<?php

namespace App\Http\Controllers;

use App\Fabric;
use App\FabricDelivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FabricDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fabric.delivery');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fabrics = Fabric::all();
        return view('fabric.make_delivery', compact('fabrics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fdelivery = new FabricDelivery;
        $fdelivery->date = $request->date;
        $fdelivery->user_id = $request->user_id;
        $fdelivery->bill_number = $request->bill_number;
        $fdelivery->challan_number = $request->challan_number;
        $fdelivery->lc_no = $request->lc_no;
        $fdelivery->customer_id = $request->customer_id;

        if ($fdelivery->save()) {
            $id = $fdelivery->id;
            foreach($request->fabric_id as $key => $v)
            {
                $data = array('delivery_id'=>$id,
                            'fabric_id'=>$v,
                            'qty'=>$request->qty [$key],
                            'price'=>$request->price [$key],
                            'amount'=>$request->amount [$key]
                        );
                DB::table('fabric_delivery_details')->insert($data);
            }
        }
        return redirect('/fabric_delivery');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function insert(Request $request){
        

        if ($customers->save()) {
            $id = $customers->id;
            foreach($request->productname as $key => $v)
            {
                $data = array('cus_id'=>$id,
                            'pro_id'=>$v,
                            'qty'=>$request->qty [$key],
                            'price'=>$request->price [$key],
                            'dis'=>$request->dis [$key],
                            'amount'=>$request->amount [$key]
                        );
                Sale::insert($data);
            }
        }
        return redirect('products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }


    public function findPrices(Request $request)
    {
        $data = Fabric::select('price')->where('id',$request->id)->first();
        return response()->json($data);
    }
}
