<?php

namespace App\Http\Controllers;

use App\Fabric;
use App\FabricStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FabricStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock_fabrics = DB::table('fabric_stocks')
                        ->join('fabrics','fabric_stocks.fabric_code','fabrics.id')
                        ->select('fabric_stocks.*','fabrics.fabric_code','fabrics.opening_stock as stock')
                        // ->where('fabric_stocks.id')
                        ->get();
        return view('fabric.stock_fabric', compact('stock_fabrics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fabrics = Fabric::all();
        return view('fabric.stock_create', compact('fabrics'));
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
        'fabric_code' => 'required'
        ]);

        $fabric_stock = new FabricStock;
        $fabric_stock->date = $request->date;
        $fabric_stock->fabric_code =$request->fabric_code;
        $fabric_stock->receive =$request->receive;
        $fabric_stock->opening_stock =$request->opening_stock;
        $fabric_stock->grade =$request->grade;
        $fabric_stock->total_stock =$request->total_stock;

        if ($fabric_stock->save()) {
            $opening_stock = $fabric_stock->total_stock;
            $fabric_code = $fabric_stock->fabric_code;
            // $opening_stock =$fabric_stock->opening_stock;
            // $fabric_recieve = Fabric::update($fabric->opening_stock)->where('fabric_code',$fabric_code);

            $fabric_recieve=DB::table('fabrics')->where('id',$fabric_code)->update(['opening_stock'=>$opening_stock]);
            print_r($fabric_recieve);
            
            if ($fabric_recieve) {
                $notification=array(
                    'messege'=>'Successfully Fabric Receive Added ',
                    'alert-type'=>'success'
                );
                return Redirect()->route('fabric_stock.index')->with($notification);                      
            }else{
                $notification=array(
                    'messege'=>'error ',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            } 
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
        $fabrics = DB::table('fabric_stocks')
                ->join('fabrics','fabric_stocks.fabric_code','fabrics.id')
                ->select('fabric_stocks.*','fabrics.fabric_code')
                ->where('fabric_stocks.id',$id)
                ->first();
        return view('fabric_stock.show', compact('fabrics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fabrics = Fabric::all();
        $fabric_stock = FabricStock::find($id);
        return view('fabric.stock_fabric_edit', compact('fabric_stock','fabrics'));
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

    public function findFbric(Request $request)
    {
        $data = Fabric::select('opening_stock')->where('id',$request->id)->first();
        return response()->json($data);
    }
}
