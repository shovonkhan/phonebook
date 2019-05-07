<?php

namespace App\Http\Controllers;

use App\Manufacture;
use App\Yarn;
use Illuminate\Http\Request;

class YarnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yarns = Yarn::all();
        return view('yarn.index', compact('yarns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacters = Manufacture::all();
        return view('yarn.create', compact('manufacters'));
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
            'yarn_name' => 'required',
            'company_name' => 'required',
            'category' => 'required'
        ]);

        $yarn = new Yarn;
        $yarn->yarn_name = $request->yarn_name;
        $yarn->company_name = $request->company_name;
        $yarn->category = $request->category;
        $yarn->opening_stock = $request->opening_stock;
        $yarn->remarks = $request->remarks;
        $yarn->save();
        if ($yarn->save()) {
            $notification=array(
                'messege'=>'Successfully Yarn Inserted ',
                'alert-type'=>'success'
            );
            return Redirect()->route('yarn.index')->with($notification);                      
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
        $yarn = Yarn::find($id);
        return view('yarn.show', compact('yarn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yarn = Yarn::where('id',$id)->first();
        return view('yarn.edit', compact('yarn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateStock($id)
    {
        $yarn = Yarn::where('id',$id)->first();
        return view('yarn.update_stock', compact('yarn'));
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
            'yarn_name' => 'required',
            'company_name' => 'required',
            'category' => 'required'
        ]);

        $yarn = Yarn::find($id);
        $yarn->yarn_name = $request->yarn_name;
        $yarn->company_name = $request->company_name;
        $yarn->category = $request->category;
        $yarn->remarks = $request->remarks;
        $yarn->save();
        if ($yarn->save()) {
            $notification=array(
                'messege'=>'Successfully Yarn Updated ',
                'alert-type'=>'success'
            );
            return Redirect()->route('yarn.index')->with($notification);                      
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
        $menuDel = Yarn::where('id',$id)->delete();
        if ($menuDel) {
                 $notification=array(
                 'messege'=>'Successfully Yarn Deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('yarn.index')->with($notification);                      
        }else{
            $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
