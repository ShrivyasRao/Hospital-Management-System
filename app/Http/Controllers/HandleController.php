<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Handles;
use App\Customer;
use App\User;

class HandleController extends Controller
{
    public function insert(Request $req)
    {
        $option = $req->input('customer');
        $option1 = $req->input('pharmacist');
        $mod = new Handles();
        $mod->pharma_email = $option1;
        $mod->cust_email = $option;
        if($mod->save())
        {
            return redirect('/home');
        }
        else
        {
            return redirect('/home');
        }
    }
}
