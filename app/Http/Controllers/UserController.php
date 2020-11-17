<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Session;

class UserController extends Controller
{
    public function getSignup(){
      return view('user.signup');
    }
    public function postSignup(Request $request){
      $this->validate($request,[
        'name' => 'required',
        'email' => 'email|required|unique:users',
        'password' => 'required|min:4'
      ]);

      $user = new User([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password'))
      ]);

      $user->save();

      Auth::login($user);

      return redirect()->route('user.profile');
    }

    public function getSignin(){
      return view('user.signin');
    }

    public function postSignin(Request $request){
      $this->validate($request,[
        'email' => 'email|required',
        'password' => 'required|min:4'
      ]);

      if (Auth::attempt(['email' => $request->input('email'),
      'password'=>$request->input('password')])){
        if(!(Session::has('checkout')) || !Session::get('checkout')){
          return redirect()->route('user.profile');
        }else{
          return redirect()->route('checkout');
        }
      }else{
        return redirect()->back();
      }
    }

    public function getProfile(){
      if(Auth::check()){
        $user = Auth::user();
        return view('user.profile',['user' => $user]);
      }
      return redirect()->route('user.signin');
    }

    public function getLogout(){
      Auth::logout();
      return redirect()->route('product.index');
    }

    public function update(Request $request){
      Session::put('step',2);
      dd(Session::get('cart'));
    }
}
