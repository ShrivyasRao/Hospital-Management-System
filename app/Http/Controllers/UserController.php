<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerUser(Request $req)
    {
        $mod = new User();
        $name = $req->input('name');
        $email = $req->input('email');
        $pass = $req->input('password');
        $cpass = $req->input('password_confirmation');
        if($cpass==$pass)
        {
            $c=Hash::make($pass);
            //dd($c.' '.$pass);
            $mod->name=$name;
            $mod->email=$email;
            $mod->password=$c;
            $x = User::all()->where('email',$email);
            if(count($x)==0)
            {
                if($mod->save())
                {
                    return view('user.userLogin');
                }
                else
                {
                    /*echo "
                    <script>
                    alert('Error in insertion');
                    window.location=/userRegister;
                    </script>
                    ";*/
                    return redirect()->back();
                }
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function loginUser(Request $req)
    {
        request()->validate([
            'email'=>'required|email',
            'password'=>'required|min:1'
        ]);
        $email = $req->input('email');
        $pass = $req->input('password');
        $x = User::all()->where('email','=',$email);
        if(count($x)==1)
        {
            echo "
            <script>
            alert('success');
            window.location=/userRegister;
            </script>
            ";
        }
        else
        {
            return view('user.userRegister');
        }
    }
}
