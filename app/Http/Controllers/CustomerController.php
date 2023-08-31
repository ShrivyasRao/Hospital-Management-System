<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Handles;

class CustomerController extends Controller
{
    public function registerCustomer(Request $req)
    {
        try
        {
            $mod = new Customer();
            $name = $req->input('name');
            $email = $req->input('email');
            $pass = $req->input('password');
            $mod->name = $name;
            $mod->email = $email;
            $mod->password = $pass;
            $x=Customer::all()->where('email',$email);
            if(count($x)==0)
            {
                if($mod->save())
                {
                    //dd('success reg');
                    return view('user.custLogin');
                }
                else
                    throw new Exception("hello");
            }
        }
        catch(Exception $e)
        {
            return redirect()->back();
        }
    }
    public function loginCustomer(Request $req)
    {
        $email = $req->input('email');
        $pass = $req->input('password');
        $ress = Customer::all()->where('email',$email)->first();
        if(isset($ress))
        {
            $pass1 = $ress->password;
            if($pass1==$pass)
            {
                session()->put('name', $ress->name);
                $res = Customer::all()->where('email',$email);	
                return view('Customer',compact('res'));
            }
        }
    }
    public function alogout()
    {
    	session()->forget('name');
    	session()->flush();
    	return view('user.custLogin');
    }
}
