<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use App\Models\User;
use Hash;
use DB;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function profile()
    {
        return view('dashboard.profile.index');
    }
    public function profile_photo_upload(Request $request){

        $request->validate([
            'name'=>'required',
            'phone_number'=>'required',
        ]);



        if($request->name){
            User::find(auth()->user()->id)->update([
                'name'=>$request->name,
            ]);
        }
        if($request->phone_number){
            User::find(auth()->user()->id)->update([
                'phone_number'=>$request->phone_number,
            ]);
        }
        if($request->hasFile('profile_photo')){
            $new_name=auth()->user()->name."_".auth()->id()."_".Carbon::now()->format("d_m_Y").".".$request->file('profile_photo')->getClientOriginalExtension();
        $img = Image::make($request->file('profile_photo'))->resize(200, 200);
        $img->save(base_path('public/uploads/profile_photos/'.$new_name),80);
        User::find(auth()->id())->update([
            'profile_photo'=>$new_name,
        ]);

        }
        if($request->hasFile('profile_cover_photo')){
         $new_name=auth()->user()->name."_".auth()->id()."_".Carbon::now()->format("d_m_Y").".".$request->file('profile_cover_photo')->getClientOriginalExtension();
        $img = Image::make($request->file('profile_cover_photo'));
        $img->save(base_path('public/uploads/profile_cover_photos/'.$new_name),80);
        User::find(auth()->id())->update([
            'profile_cover_photo'=>$new_name,
        ]);

        }
        return back()->with('success_msg',"profile update successfull!");

    }

    public function password_change(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>'required | confirmed |different:current_password',
            'password_confirmation'=>'required',
        ]);

        if( Hash::check($request->current_password, auth()->user()->password)){
            User::find(auth()->id())->update([
                'password'=>bcrypt($request->password)
            ]);
            return back()->with('success_msg',"password change successfully!");
        }else{
            return back()->with('errr_msg',"Current password dose not matched");
        }

    }








}
