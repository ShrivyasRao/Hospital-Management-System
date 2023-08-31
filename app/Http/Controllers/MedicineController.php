<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicines;

class MedicineController extends Controller
{
    public function add(Request $req)
    {
        $med = new Medicines();
    	$med->medicine_number = $req->input('mnum');
    	$med->medicine_name = $req->input('mname');
    	$med->manufacture_date = $req->input('mdate');
        $med->expiring_date = $req->input('edate');
        $med->price = $req->input('price');
        if(strcmp($req->input('mdate'),$req->input('edate'))>0)
        {
            echo "
                <script>
                alert('Check dates');
                window.location='/addData';
                </script>
                ";
        }
        else
        {
            if($med->save())
            {
                echo "
                <script>
                alert('Inserted');
                window.location='/home';
                </script>
                ";
            }
            else
            {
                echo "
                <script>
                alert('Error');
                window.location='/home';
                </script>
                ";
            }
        }
    }
    public function edit($id)
    {
        $res=Medicines::where('medicine_number',$id)->get();
        return view('editMed',compact('res'));
    }
    
    public function editQry(Request $req)
    {
        //$
        //echo "Entered";
        $mnum=$req->input('mnum');
        $mname=$req->input('mname');
        $mdate=$req->input('mdate');
        $edate=$req->input('edate');
        $price=$req->input('price');
        $update = Medicines::where('medicine_number','=',$mnum)->
                update(['medicine_name'=>$mname,'manufacture_date'=>$mdate,'expiring_date'=>$edate,'price'=>$price]);
        if($update==true)
        {
            echo "<script>
            alert('Successfully updated');
            window.location='/home';
            </script>";
        }
    }
    public function delQry($id)
    {
        $delete = Medicines::where('medicine_number','=',$id)->delete();
            if($delete == true)
            {
                echo"
                <script>
                alert('Deleted successfully');
                window.location='/home';
                </script>
                ";
            }
            else
            {
                echo"
                <script>
                alert('Error');
                window.location='/home';
                </script>
                ";
            }
    }
    // public function sorting()
    // {
    //     $x = Medicines::orderBy('medicine_name');
    //     return view('home',compact('x'));
    // }
}
