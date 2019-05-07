<?php

namespace App\Http\Controllers;

use App\Chemical;
use App\ChemicalStor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChemicalStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = ChemicalStor::all();
        return view('stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chemicals = Chemical::all();
        return view('stock.create', compact('chemicals'));
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
            'department' => 'required',
            'items' => 'required',
            'company' => 'required',
            'date' => 'required',
            'weight' => 'required',
            'as_weight' => 'required',
        ]);

        $stock = new ChemicalStor;
        $stock->department = $request->department;
        $stock->items = $request->items;
        $stock->invoic_no = $request->invoic_no;
        $stock->company = $request->company;
        $stock->date = $request->date;
        $stock->weight = $request->weight;
        $stock->as_weight = $request->as_weight;
        $stock->opping_stock = $request->opping_stock;
        $stock->closing_stock = $request->closing_stock;
        $stock->save();

        return redirect(route('stock.index'));
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

    public function chemicalStock()
    {
        $chemicals = Chemical::all();
        return view('stock.chemical.index', compact('chemicals'));
    }

    public function EditChemicalStock($id)
    {
        $chemicals = Chemical::where('id',$id)->first();
        return view('stock.chemical.edit', compact('chemicals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateChemicalStock(Request $request, $id)
    {
        $data=array();
        $data['opening_stock']=$request->opening_stock;
        $yarnstock=DB::table('chemicals')->where('id',$id)->update($data);
        
        if ($yarnstock) {
            $notification=array(
                'messege'=>'Successfully Chemical Added ',
                'alert-type'=>'success'
            );
            return Redirect()->route('chemicalStock.index')->with($notification);                      
        }else{
            $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
