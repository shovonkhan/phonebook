<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;
use Validator;
use Carbon\Carbon;
use Hash;
use Image;

class UserController extends Controller
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
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required',
            'role_id' => 'required',
            'phone' => 'required|string|max:20',
            'avatar' => 'nullable|image|max:5120',
        ]);

        // $ImageName='profile.png';

        // if ($request->hasFile('image')){
        //    $image = $request->file('image');
        //    $ImageName = time().'.'.$image->getClientOriginalExtension();
        //    Image::make($image)->resize(400, 400)->save(base_path('public/uploads/images/users/') . $ImageName);
        // }

       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $user->user_type = $request->user_type;
       $user->role_id = $request->role_id;
       $user->phone = $request->phone;
       $user->facebook = $request->facebook =="" ? "#" : $request->facebook;
       $user->twitter = $request->twitter =="" ? "#" : $request->twitter;
       $user->linkedin = $request->linkedin =="" ? "#" : $request->linkedin;
       $user->google_plus = $request->google_plus =="" ? "#" : $request->google_plus;
       $image=$request->file('avatar');
       if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/users/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $user->avatar = $image_url;
                $users = $user->save();
                if ($users) {
                 $notification=array(
                 'messege'=>'Successfully User Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('users.index')->with($notification);                      
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

       // return redirect('users')->with('success', _lang('Information has been added'));
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
}
