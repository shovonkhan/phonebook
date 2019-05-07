<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Personal;
use DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal  = Personal::all();
        $companies = Company::all();
        return view('company.index', compact('companies','personal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
            'name' => 'required|unique:companies',
            'type' => 'required',
            'managing_director' => 'required',
            'chairman' => 'required',
            'established' => 'required',
            'headquarters' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'parent' => 'required',
            'website' => 'required',
        ]);

            
            $company=array();
            $company['name'] = $request->name;
            $company['type'] = $request->type;
            $company['managing_director'] = $request->managing_director;
            $company['chairman'] = $request->chairman;
            $company['established'] = $request->established;
            $company['headquarters'] = $request->headquarters;
            $company['phone'] = $request->phone;
            $company['email'] = $request->email;
            $company['address'] = $request->address;
            $company['parent'] = $request->parent;
            $company['website'] = $request->website;
            $image=$request->file('image');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/companies/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['image']=$image_url;
                $companies=DB::table('companies')->insert($data);
                if ($companies) {
                    $notification=array(
                        'messege'=>'Successfully Company Inserted ',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('company.index')->with($notification);                      
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
        $company = Company::find($id);
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('id',$id)->first();
        return view('company.edit', compact('company'));
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
            'managing_director' => 'required',
            'chairman' => 'required',
            'established' => 'required',
            'headquarters' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'parent' => 'required',
            'website' => 'required',
        ]);

            
        $company=array();
        $company['name'] = $request->name;
        $company['type'] = $request->type;
        $company['managing_director'] = $request->managing_director;
        $company['chairman'] = $request->chairman;
        $company['established'] = $request->established;
        $company['headquarters'] = $request->headquarters;
        $company['phone'] = $request->phone;
        $company['email'] = $request->email;
        $company['address'] = $request->address;
        $company['parent'] = $request->parent;
        $company['website'] = $request->website;
        $image=$request->image;

        if ($image) {
           $image_name=str_random(20);
           $ext=strtolower($image->getClientOriginalExtension());
           $image_full_name=$image_name.'.'.$ext;
           $upload_path='public/companies/';
           $image_url=$upload_path.$image_full_name;
           $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['image']=$image_url;
                $img=DB::table('companies')->where('id',$id)->first();
                $image_path = $img->image;
                $done=unlink($image_path);
                $user=DB::table('companies')->where('id',$id)->update($data); 
                if ($user) {
                    $notification=array(
                        'messege'=>'Company Update Successfully',
                        'alert-type'=>'success'
                    );
                   return Redirect()->route('company.index')->with($notification);                      
                }else{
                    return Redirect()->back();
                }
            }else{
                $oldphoto=$request->old_photo;
                if ($oldphoto) {
                    $data['photo']=$oldphoto;  
                    $user=DB::table('employees')->where('id',$id)->update($data); 
                    if ($user) {
                        $notification=array(
                            'messege'=>'Employee Update Successfully',
                            'alert-type'=>'success'
                        );
                        return Redirect()->route('employee')->with($notification);
                    }else{
                    return Redirect()->back();
                    }
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
        // Company::where('id',$id)->delete();
        // return redirect()->back();
        $delete=DB::table('companies')
                ->where('id',$id)
                ->first();
         $dltuser=DB::table('companies')
                  ->where('id',$id)
                  ->delete();
        if ($dltuser) {
            $notification=array(
                 'messege'=>'Successfully Company Deleted ',
                 'alert-type'=>'success'
            );
            return Redirect()->route('company.index')->with($notification);                      
        }else{
            $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        } 
    }
}
