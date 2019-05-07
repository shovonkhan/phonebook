<?php

namespace App\Http\Controllers;

use App\Category;
use App\Manufacture;
use App\Model\Receive;
use App\Model\ReceiveInven;
use App\Model\Stock;
use App\Product;
use App\YarnReceive;
use App\YarnStock;
use App\YarnReceiveDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use Hash;

class ReceiveController extends Controller
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
        $receives = Stock::all();
        return view('invoice.receive.index', compact('receives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufactur = Manufacture::all();
        $product_list = Product::all();
        $categories = Category::all();
        $stocks = DB::table('stocks')->orderBy('id', 'desc')->first();
        return view('invoice.receive.create', compact('manufactur','categories','stocks','product_list'));
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
            'manufactur' => 'required',
            'count' => 'required'
        ]);

        $exists = DB::table('receives')->where('manufactur', $request->manufactur)->first();
        if ($exists ) {
            $stock = Stock::find('id',$id);
            $stock->opening_stock = $request->opening_stock+ $request->qty;
        }else{
            $receive = new Stock;
            $receive->manufactur = $request->manufactur;
            $receive->count = $request->count;
            $receive->r_date = $request->r_date;
            $receive->lc_no = $request->lc_no;
            $receive->lot_no = $request->lot_no;
            $receive->challen_no = $request->challen_no;
            $receive->opening_stock = $request->opening_stock;
            $receive->qty = $request->qty;
            $receive->rate = $request->rate;
            $receive->bag = $request->bag;
            $receive->amount = $request->amount;
            $receive->remarks = $request->remarks;
            $receive->save();
        }
        return redirect(route('receive.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receive = Stock::where('id',$id)->first();
        return view('invoice.receive.show', compact('receive'));
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

    // Yarn Receive Funtion=============================================

    public function YarnReceiveList(){
        $yarn_receive_list = DB::table('yarn_receives')
                            ->join('yarn_receive_details','yarn_receives.id','yarn_receive_details.receiv_id')
                            ->join('manufactures','yarn_receives.manufacture_id','manufactures.id')
                            ->join('products','yarn_receive_details.yarn_id','products.id')
                            ->select('yarn_receives.*','yarn_receive_details.qty','yarn_receive_details.price','yarn_receive_details.amount','manufactures.manufacture_name','products.productname')
                            ->get();
        return view('invoice.receive.yarn_receive.index',compact('yarn_receive_list'));
    }


    public function YarnReceiveCreate()
    {
        $product_list = Product::all();
        $manufacture = Manufacture::all();
        $categories = Category::all();
        $yarnStock = YarnStock::all();
        return view('invoice.receive.yarn_receive.create',compact('product_list','categories','manufacture'));
    }

    public function YarnReceiveShow($id)
    {
        $yarn_receive_show = DB::table('yarn_receives')
                            ->join('yarn_receive_details','yarn_receives.id','yarn_receive_details.receiv_id')
                            ->join('manufactures','yarn_receives.manufacture_id','manufactures.id')
                            ->join('products','yarn_receive_details.yarn_id','products.id')
                            ->select('yarn_receives.*','yarn_receive_details.receiv_id','yarn_receive_details.qty','yarn_receive_details.price','yarn_receive_details.amount','manufactures.manufacture_name','products.productname')
                            ->where('yarn_receives.id',$id)
                            ->first();
        return view('invoice.receive.yarn_receive.show',compact('yarn_receive_show'));
    }


    public function YarnReceiveStore(Request $request)
    {
        $this->validate($request,[
        'date' => 'required',
        'bill' => 'required',
        'challan' => 'required'
        ]);

        $yarn_receive = new YarnReceive;
        $yarn_receive->date = $request->date;
        $yarn_receive->bill =$request->bill;
        $yarn_receive->challan =$request->challan;
        $yarn_receive->lc_no =$request->lc_no;
        $yarn_receive->manufacture_id =$request->manufacture_id;
        $yarn_receive->pi_no =$request->pi_no;
        $yarn_receive->remarks =$request->remarks;

        if ($yarn_receive->save()) {
            $id = $yarn_receive->id;
            foreach($request->productname as $key => $v)
            {
                $yarns = array('receiv_id'=>$id,
                            'yarn_id'=>$v,
                            'qty'=>$request->qty [$key],
                            'price'=>$request->price [$key],
                            'amount'=>$request->amount [$key]
                        );
                $yarn_recieve = YarnReceiveDetail::insert($yarns);
            }
            if ($yarn_recieve) {
                $notification=array(
                    'messege'=>'Successfully Yarn Receive Added ',
                    'alert-type'=>'success'
                );
                return Redirect()->route('yarn-receive')->with($notification);                      
            }else{
                $notification=array(
                    'messege'=>'error ',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            } 
        }
            echo "<pre>";
            print_r($data);

            // $yarn_receive=DB::table('yarn_receives')->insert($data);
            // if ($yarn_receive) {
            //     $notification=array(
            //         'messege'=>'Successfully Yarn Receive Added ',
            //         'alert-type'=>'success'
            //     );
            //     return Redirect()->back()->with($notification);                      
            // }else{
            //     $notification=array(
            //         'messege'=>'error ',
            //         'alert-type'=>'success'
            //     );
            //     return Redirect()->back()->with($notification);
            // }      
           
    }

    public function findPrice(Request $request)
    {
        $data = Product::select('price')->where('id',$request->id)->first();
        return response()->json($data);
    }
}
