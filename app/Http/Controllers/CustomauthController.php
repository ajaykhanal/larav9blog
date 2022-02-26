<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customauth;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;
use Laravel\Socialite\Facades\Socialite;

class CustomauthController extends Controller
{
    public function index(){
        $all_posts= Post::paginate(2);
        return view('users.index',compact('all_posts'));
    }

    public function home(){

        return view('users.home');
    }

    public function register(){
        return view('users.register');
    }

    public function register_data(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:customauths',
            'password'=>'required|confirmed',
            
        ]);
        $user= new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);
        $res= $user->save();
        
        if($res){
            return redirect("/login")->with('success', 'Your form has been registered');  
        }else{
            return back()->with('fail','Your form hasnot been registered');
        } 
    }

    public function login(){
        return view('users.login');
    }


  public function login_data(Request $request){
    $request->validate([
        
                'email'=>'required',
                
                'password'=>'required|min:4|max:10',
    ]);
    $check= $request->only('email','password');
    
    if(Auth::guard('web')->attempt($check)){
        return redirect('/home')->with('success','You have been loggedin successfully!!');
    }else{
        return redirect('/login')->with('error','Invalid Credentials!!');
    }
}

public function logout(){
    // Session::flush();
    
    Auth::guard('web')->logout();

    return redirect('/login')->with('success',"Successfully logged out!!");
}

public function detail($id){
    $post= Post::find($id);
    $category= Category::find($id);
    return view('users.detail_post',['post'=>$post,'category'=>$category]);
}




}
