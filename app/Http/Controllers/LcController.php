<?php

namespace App\Http\Controllers;

use App\Lc;
use App\MasterLc;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lcs = Lc::all();
        return view('lc.index', compact('lcs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master_lc_no = MasterLc::all();
        return view('lc.create', compact('master_lc_no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lc_type = $request->lc_type;
        $master_lc_no = $request->master_lc_no;
        $lc_date = $request->lc_date;
        $customer = $request->customer;
        $lc_value = $request->lc_value;
        $pi_to = $request->pi_to;
        $pi_no = $request->pi_no;
        $pi_date = $request->pi_date;
        $auth_date = $request->auth_date;
        $description = $request->description;
        // $shipping_id = Session::get('shipping_id');

        // echo $payment_getway;
        // echo "<pre>";
        // print_r($shipping_id);
        // echo "</pre>";

        // $pdata['payment_method'] = $payment_getway;
        // $pdata['payment_status'] = 'panding';
        // $payment_id = DB::table('payments')
                    // ->insertGetId($pdata);


        $lc = array();
        $lc['lc_type'] = $lc_type;
        $lc['master_lc_no'] = $master_lc_no;
        $lc['lc_date'] = $lc_date;
        $lc['customer'] = $customer;
        $lc['lc_value'] = $lc_value;
        $lc['pi_to'] = $pi_to;
        $lc['pi_no'] = $pi_no;
        $lc['pi_date'] = $pi_date;
        $lc['auth_date'] = $auth_date;
        $lc['description'] = $description;
        $lc['total_amount'] = Cart::total();
        $customer_id = DB::table('lcs')->insertGetId($lc);

        $contents = Cart::content();
        $total = Cart::total();
        $order = array();
        foreach ($contents as $v_content) {
            $order['customer_id'] = $customer_id;
            $order['product_id'] = $v_content->id;
            $order['items'] = $v_content->name;
            $order['rate'] = $v_content->price;
            $order['qty'] = $v_content->qty;
            $order['amount'] = $v_content->subtotal;
            $order['total_amount'] = $total;
            DB::table('orders')->insert($order);
            Cart::destroy();
            return view('lc.index');
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

    public function master_lc_info(Request $request)
    {
        $productname = $request->productname;
        $category = $request->category;
        $company = $request->company;
        $p_date = $request->p_date;
        $qty = $request->qty;
        $price = $request->price;
        $dis = $request->dis;
        $amount = $request->amount;
        $designation = $request->designation;
        // $product_info = DB::table('products')
        //             ->where('product_id',$product_id)
        //             ->first();

        // echo "<pre>";
        // print_r($product_info);
        // echo "</pre>";
        $data['productname'] = $productname;
        $data['category'] = $category;
        $data['company'] = $company;
        $data['p_date'] = $p_date;
        $data['qty'] = $qty;
        $data['price'] = $price;
        $data['dis'] = $dis;
        $data['amount'] = $amount;
        $data['designation'] = $designation;

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();

        DB::table('products')->insert($data);
        return redirect('products');
    }

    public function delete_to_cart($rowId)
    {
        Cart::update($rowId,0);
        return redirect('lc/create');
    }

    Public function add_to_cart(Request $request)
    {
        $qty = $request->product_qty;
        $product_id = $request->product_id;
        $product_name = $request->product_name;
        $product_price = $request->product_price;
        // $product_info = DB::table('products')
        //             ->where('product_id',$product_id)
        //             ->first();

        // echo "<pre>";
        // print_r($product_info);
        // echo "</pre>";
        $data['qty'] = $qty;
        $data['id'] = $product_id;
        $data['name'] = $product_name;
        $data['price'] = $product_price;

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();

        Cart::add($data);
        return redirect('lc/create');
    }


}
