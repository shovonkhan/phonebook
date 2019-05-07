<?php

namespace App\Http\Controllers;

use App\Manufacture;
use App\Yarn;
use App\YarnStock;
use Illuminate\Http\Request;
use Auth;
use DB;

class YarnStockController extends Controller
{
    public function index()
    {
        $yarns = Yarn::all();
    	return view('yarnstock.index', compact('yarns'));
    }

    // public function create()
    // {
    // 	$yarns = Yarn::all();
    // 	$manufactures = Manufacture::all();
    // 	// return view('yarnstock.create', compact('yarns','manufactures'));
    //     return view('yarn.upadte_stock', compact('yarns','manufactures'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yarn = Yarn::where('id',$id)->first();
        return view('yarn.upadte_stock', compact('yarn'));
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
        $data=array();
        $data['opening_stock']=$request->opening_stock;
        $yarnstock=DB::table('yarns')->where('id',$id)->update($data);
        
        if ($yarnstock) {
            $notification=array(
                'messege'=>'Successfully Yarn Added ',
                'alert-type'=>'success'
            );
            return Redirect()->route('yarnstock')->with($notification);                      
        }else{
            $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
//==========================================
    public function indext()
    {
        $country_list = DB::table('yarns')
                    ->groupBy('yarn_name')
                    ->get();
        // $country_list = Yarn::all();
        return view('yarnstock.test')->with('country_list', $country_list);
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('yarns')
                ->where($select, $value)
                ->groupBy($dependent)
                ->get();
    $output = '<option value="">Select '.ucfirst($dependent).'</option>';
    foreach($data as $row)
    {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
    }
        echo $output;
    }
//========================================================
    public function getPositions($id)
    {
        if (Request::ajax())
        {
            $positions = DB::table('yarn_stocks')->join('yarns','yarn_stocks.yarn_id','yarns.id')->select('yarn_stocks.*','yarns.id','yarns.name')->where('yarn_id', '=', $id)->get();
            return Response::json( $positions );
        } 
    }

    public function store(Request $request)
    {
    	// $this->validate($request,[
     //        'yarn_name' => 'required',
     //        'manufacture_name' => 'required',
     //        'category' => 'required'
     //    ]);

        $yarn_id = DB::table('yarn_stocks')->where('yarn_id',$request->yarn_id)->get();
        // $yarn=array();
        // $yarn['yarn_id'] = $request->$yarn_id;
        // echo "<pre>";
        // print_r($yarn_id);
        $data=array();
        $data['yarn_id']=$request->yarn_id;
        $data['manufacture']=$request->manufacture;
        $data['opening_stock']=$request->opening_stock;
        $data['closeing_stock']=$request->closeing_stock;
        echo $yarn_id;
        // print_r($data);
        
        // if($yarn_id < 0 )
        // {
        // 	$stock->manufacture_name = $request->manufacture_name;
        // 	$stock->yarn_name = $request->yarn_name;
        // 	DB::update("UPDATE yearn_stocks SET 'qty'= $yarn->qty where 'menufacture_name'='$yarn->manufacture_name', 'yarn_name' = '$yarn->yarn_name'");
        //     echo "Yes";
        // }else{
        // 	$stock->manufacture_name = $request->manufacture_name;
        // 	$stock->yarn_name = $request->yarn_name;
        	
        // }

        // return redirect(route('yarn.index'));
    }

    public function findStock(Request $request)
    {
        $data = YarnStock::select('opening_stock')->where('id',$request->id)->first();
        return response()->json($data);
    }

    public function CreateYarnStock()
    {
        return view('stock.yarn.create');
    }

    public function showStock()
    {
        echo "Store";
    }

    
}
