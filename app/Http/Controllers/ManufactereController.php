<?php

namespace App\Http\Controllers;

use App\Manufacture;
use Illuminate\Http\Request;

class ManufactereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufactures = Manufacture::all();
        return view('manufacture.index', compact('manufactures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manufacture.create');
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
            'manufacture_name' => 'required|unique:manufactures'
        ]);

        $manufacture = new Manufacture;
        $manufacture->manufacture_name = $request->manufacture_name;
        $manufacture->description = $request->description;
        $manufacture->save();

        if ($manufacture->save()) {
                 $notification=array(
                 'messege'=>'Successfully Manufacture Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('manufacture.index')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }     

        // return redirect(route('manufacture.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manufacture = Manufacture::find($id);
        return view('manufacture.show', compact('manufacture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manufacture = Manufacture::where('id',$id)->first();
        return view('manufacture.edit', compact('manufacture'));
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
            'manufacture_name' => 'required|unique:manufactures'
        ]);

        $manufacture = Manufacture::find($id);
        $manufacture->manufacture_name = $request->manufacture_name;
        $manufacture->description = $request->description;
        $manufacture->save();

        if ($manufacture->save()) {
                 $notification=array(
                 'messege'=>'Successfully Manufacture Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('manufacture.index')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }  

        // return redirect(route('manufacture.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menuDel = Manufacture::where('id',$id)->delete();

        if ($menuDel) {
                 $notification=array(
                 'messege'=>'Successfully Manufacture Deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('manufacture.index')->with($notification);                      
        }else{
            $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
        // return redirect()->back();
    }
}
