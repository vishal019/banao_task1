<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\task;
use Auth;




class userController extends Controller
{
    

    public function Display_login_page(){

        

        return view('userLogin');

    }

    public function display_dashboard(Request $request){


       
      

        $login_id=$request->session()->get('loginId');
        $data =User::where('id',$login_id)->get();

        
        $user_data=$data[0];
        Auth::login($user_data);
        $all_users_data=task::where('user_id',$login_id)->get();

        

        return view('dashboard',compact('user_data','all_users_data'));

    }

    public function Display_register_page(){


        
        return view('userRegistration');
    }

    public function register_user(Request $request){


        $request->validate(
            [
                'name'=>'required|string',
                'email'=>'required|email|unique:app_user,email',
                'password'=>'required|min:8'


            ]
            );

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return  redirect('/')->with('success', 'Registration successful! Please log in.');



            

       

    }

    public function user_logout(Request $request){

        session()->forget('username');
        session()->forget('name');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');


    }
    public function validate_app_user(Request $request){

        $data= User::where( 'email' ,$request->input('email'))->first();

     
        $email= $request->input('email');
        $password= $request->input('password');
      
        $path = $request->path();
      


        
       if(!empty($data)){

        if( $email == $data->email && $password == password_verify( $password,$data->password))
        {
            Auth::login($data);

            $name=$data->name;
            if( $path == 'validate_login'){
  
                $request->session()->put('loginId',$data->id);
                $request->session()->put('name',$name);
            
                

                echo('code stuck here');
                return redirect('dashboard')->with('message','login sucessfull');
            }

        }
        else{

            return redirect('/')->with('message','Wrong password try again..!');
        }

    }else{


       return redirect('/')->with('message','user not found');
    }

}
}
