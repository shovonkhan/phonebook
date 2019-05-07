<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Company;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal = Personal::all();
        return view('personal.index', compact('personal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();
        return view('personal.create', compact('company'));
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
            'designation' => 'required',
            'h_education' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'p_address' => 'required',
            'c_address' => 'required',
            'company' => 'required',
            'salery' => 'required',
            'join_date' => 'required',
            'dob' => 'required',
        ]);

         if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move('images', $imageName);

            $personal = new Personal;
            $personal->name = $request->name;
            $personal->designation = $request->designation;
            $personal->h_education = $request->h_education;
            $personal->phone = $request->phone;
            $personal->email = $request->email;
            $personal->p_address = $request->p_address;
            $personal->c_address = $request->c_address;
            $personal->company = $request->company;
            $personal->salery = $request->salery;
            $personal->join_date = $request->join_date;
            $personal->dob = $request->dob;
            $personal->baiodata = $request->baiodata;
            $personal->image = $imageName;
            $personal->save();

            return redirect(route('personal.index'));
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
        $personal = Personal::find($id);
        return view('personal.show', compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::all();
        $personal = Personal::where('id',$id)->first();
        return view('personal.edit', compact('personal','company'));
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
            'designation' => 'required',
            'h_education' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'p_address' => 'required',
            'c_address' => 'required',
            'company' => 'required',
            'salery' => 'required',
            'join_date' => 'required',
            'dob' => 'required',
        ]);

         if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move('images', $imageName);

            $personal = Personal::find($id);
            $personal->name = $request->name;
            $personal->designation = $request->designation;
            $personal->h_education = $request->h_education;
            $personal->phone = $request->phone;
            $personal->email = $request->email;
            $personal->p_address = $request->p_address;
            $personal->c_address = $request->c_address;
            $personal->company = $request->company;
            $personal->salery = $request->salery;
            $personal->join_date = $request->join_date;
            $personal->dob = $request->dob;
            $personal->baiodata = $request->baiodata;
            $personal->image = $imageName;
            $personal->save();

            return redirect(route('personal.index'));
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
        //
    }
}
