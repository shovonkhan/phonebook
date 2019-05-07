<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Lc;
use App\Product;
use App\Category;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $product_list = Product::all();
    	$categories = Category::all();
    	return view('invoice.info',compact('product_list','categories'));
    }

    public function info_list()
    {
        $product_list = Product::all();
        $categories = Category::all();
        // $lcs = Lc::all();
        // return view('invoice.info_list', compact('lcs','product_list','categories'));

        $all_product_info = DB::table('lcs')
                            ->join('sales','lcs.customer_id','=','sales.cus_id')
                            ->join('products','sales.pro_id','=','products.id')
                            ->select('lcs.*','sales.*','products.productname')
                            ->get();
        return view('invoice.info_list', compact('all_product_info','product_list','categories'));
    }

    public function show_info($cus_id)
    {
        // $show_product_info = DB::table('lcs')
        //                     ->join('sales','lcs.customer_id','=','sales.cus_id')
        //                     ->select('lcs.*','sales.*')
        //                     ->where('customer_id',$customer_id)
        //                     ->first();
        $sales = Sale::all();
        return view('invoice.show', compact('sales'));
    }

    public function insert(Request $request){
    	$customers = new Lc;
    	// $customers->firstname = $request->fn;
    	// $customers->lastname = $request->ln;
    	// $customers->sex = $request->sex;
    	// $customers->email = $request->email;
    	// $customers->phone = $request->phone;
    	// $customers->location = $request->location;

        $customers->lc_type = $request->lc_type;
        $customers->master_lc_no = $request->master_lc_no;
        $customers->lc_date = $request->lc_date;
        $customers->customer = $request->customer;
        $customers->lc_value = $request->lc_value;
        $customers->pi_to = $request->pi_to;
        $customers->pi_no = $request->pi_no;
        $customers->pi_date = $request->pi_date;
        $customers->auth_date = $request->auth_date;
        $customers->description = $request->description;
        $customers->total_amount = $request->total_amount;

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

    public function edit()
    {
    	return view('invoice.update');
    }

    public function update()
    {

    }

    public function findPrice(Request $request)
    {
    	$data = Product::select('price')->where('id',$request->id)->first();
    	return response()->json($data);
    }
}
