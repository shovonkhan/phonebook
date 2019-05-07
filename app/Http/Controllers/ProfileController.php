<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Hash;


class ProfileController extends Controller
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

    public function my_profile()
    {
        $profile = User::find(Auth::User()->id);
        return view('profile.index',compact('profile'));
    }


    public function edit()
    {
        $profile = User::find(Auth::User()->id);
        return view('profile.edit',compact('profile'));
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore(Auth::User()->id),
            ],
            'avatar' => 'nullable|image|max:5120',
        ]);

        $profile = User::find(Auth::User()->id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
		$profile->facebook = $request->facebook=="" ? "#" : $request->facebook;
	    $profile->twitter = $request->twitter=="" ? "#" : $request->twitter;
	    $profile->linkedin = $request->linkedin=="" ? "#" : $request->linkedin;
	    $profile->google_plus = $request->google_plus=="" ? "#" : $request->google_plus;
        // $profile->save();

        // return redirect('profile/my_profile')->with('success', _lang('Information has been updated'));


        $image=$request->avatar;

        if ($image) {
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/users/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $profile->avatar=$image_url;
                $img = User::find(Auth::User()->id)->first();
                $image_path = $img->avatar;
                $done=unlink($image_path);
                $user=$profile->save(); 
         if ($user) {
                $notification=array(
                'messege'=>'User Profile Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
         $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $profile->avatar=$oldphoto;  
          $user=$profile->save(); 
         if ($user) {
                $notification=array(
                'messege'=>'User Profile Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }
    }

    /**
     * Show the form for change_password the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_password()
    {
        return view('profile.change-password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::find(Auth::User()->id);
        if(Hash::check($request->oldpassword, $user->password)){
            $user->password = Hash::make($request->password);
            $users = $user->save();
            if($users) {
                $notification=array(
                    'messege'=>'Password has been changed',
                    'alert-type'=>'success'
                );
            }
        }else{
            return back()->with('error','Old Password not match');
        }
        return back()->with('success', 'Password has been changed');
    }


}
