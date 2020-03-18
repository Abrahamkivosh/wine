<?php

namespace App\Http\Controllers;

use App\User;
use File ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth') ;
    }
    public function show($id)
    {
        $authId =Auth::user()->id ;


        if ( $id == $authId || Auth::user()->isAdmin  ) {
            $user = User::findOrfail($id);

            return view('profile.profile', compact('user') );

        } else {
            Session::flash("error","you can not view other people profile") ;
            return redirect()->route("home") ;
        }


    }
    public function passwordUpdate( Request $request)
    {
        request()->validate(array(
            'password' => 'required|min:8 |max:16|confirmed|string',
        ));
        $userId = Auth::user()->id ;
        $user = User::find($userId) ;

        if($request->password != ''){
            if($request->password == $request->password_confirmation){
                $user->password = bcrypt($request->password);
                if( $user->save() ){
                    Session::flash('success', 'Your password updated successfully');
                    return redirect()->back();
                }
            }
            else{
                Session::flash('error', 'Confirmation password and the password do not match.');
                return redirect()->back();
            }
        }



    }


    public function update(Request $request , $id)
    {
        $authId =Auth::user()->id ;

        if ( $authId == $id  || Auth::user()->isAdmin) {
            $user = User::where('id', $id)->first();

            // if(!$request->hasFile('avatar') && $request->has('avatar')){
            //     return redirect()->back()->with('error','Image not supported');
            // }
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'password'=> 'nullable',
                'permission' =>'nullable',
                'avatar' =>'image'
            ]);
            $user->name = $request->name ;
            $user->email = $request->email ;
            $user->phone = $request->phone ;

            if($request->password != ''){
                if($request->password == $request->confirm_password){
                    $user->password = bcrypt($request->password);
                }
                else{
                    Session::flash('error', 'Confirmation password and the password do not match.');
                    return redirect()->back();
                }
            }
            if ( $request->permission != ''  ) {
                if ( Auth::user()->isAdmin  ) {
                    $user->isAdmin = $request->permission ;

                }else{

                    $request->session()->flash('error', "You  do not have privilagies to change user permissions");
                    return redirect()->back();

                }
            }

            if($request->has('avatar')){
                $old_avatar = $user->avatar;
                $avatar = $request->avatar;
                if($old_avatar != 'uploads/users/avatar.png'){
                    Storage::delete( 'public/uploads/users/'.$user->avatar);
                }
                $avatar_name = time() . $avatar->getClientOriginalName();

                $new_avatar =  $request->avatar->storeAs('public/uploads/users/',$avatar_name);
                $avatar = $avatar_name;
                $user->avatar = $avatar;
            }



            if ( $user->save() ) {
                return redirect()->back()->with("success","Profile updated ") ;
            }

            return redirect()->back()->with("error","error occurred");







        }

    }

}
