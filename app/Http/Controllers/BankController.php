<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;
use DB;

class BankController extends Controller
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
        $banks = Bank::all();
        return view('bank.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.create');
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
            'type' => 'required',
            'bank_type' => 'required',
            'chairman' => 'required',
            'managing_director' => 'required',
            'established' => 'required'
        ]);

        $bank = array();
        $bank['name'] = $request->name;
        $bank['type'] = $request->type;
        $bank['bank_type'] = $request->bank_type;
        $bank['chairman'] = $request->chairman;
        $bank['managing_director'] = $request->managing_director;
        $bank['established'] = $request->established;
        $bank['headquarters'] = $request->headquarters;
        $bank['phone'] = $request->phone;
        $bank['website'] = $request->website;
        $bank['history'] = $request->history;
        $image=$request->file('image');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/bank/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $bank['image']=$image_url;
                $banks=DB::table('banks')
                         ->insert($bank);
              if ($banks) {
                 $notification=array(
                 'messege'=>'Successfully Bank Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('bank.index')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{

              return Redirect()->back();
                
            }
        }else{
              return Redirect()->back();
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
        $bank = Bank::find($id);
        return view('bank.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banks = Bank::where('id',$id)->first();
        return view('bank.edit', compact('banks'));
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
            'name' => 'required',
            'type' => 'required',
            'bank_type' => 'required',
            'chairman' => 'required',
            'managing_director' => 'required',
            'established' => 'required'
        ]);

        $bank = array();
        $bank['name'] = $request->name;
        $bank['type'] = $request->type;
        $bank['bank_type'] = $request->bank_type;
        $bank['chairman'] = $request->chairman;
        $bank['managing_director'] = $request->managing_director;
        $bank['established'] = $request->established;
        $bank['headquarters'] = $request->headquarters;
        $bank['phone'] = $request->phone;
        $bank['website'] = $request->website;
        $bank['history'] = $request->history;
        $image=$request->image;

        if ($image) {
            
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/bank/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $bank['image']=$image_url;
                $img=DB::table('banks')->where('id',$id)->first();
                $image_path = $img->image;
                $done=unlink($image_path);
                $banks=DB::table('banks')->where('id',$id)->update($bank);
                if ($banks) {
                    $notification=array(
                        'messege'=>'Update Bank Successfully',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('bank.index')->with($notification);                      
             }else{
                $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);
             }   

                
            }else{

              return Redirect()->back();
                
            }
        }else{
              
            $oldphoto=$request->old_photo;
            if ($oldphoto) {
                $bank['image']=$oldphoto;  
                $user=DB::table('banks')->where('id',$id)->update($bank); 
                if ($user) {
                    $notification=array(
                        'messege'=>'Bank Update Successfully',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('bank.index')->with($notification);                      
                }else{
                    return Redirect()->back();
                } 
            }
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
        // Bank::where('id',$id)->delete();
        // return redirect()->back();
        $delete=DB::table('banks')
                ->where('id',$id)
                ->first();
         $photo=$delete->image;
         unlink($photo);
         $dltuser=DB::table('banks')
                  ->where('id',$id)
                  ->delete();
        if ($dltuser) {
            $notification=array(
                 'messege'=>'Successfully Bank Deleted ',
                 'alert-type'=>'success'
            );
            return Redirect()->route('bank.index')->with($notification);                      
        }else{
            $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }  
    }


}
