<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
use App\Donation;
use App\Donar;

class DonarController extends Controller
{
    public function view(Request $request)
    {
    	$donar = Donar::all();
    	return view('admin/add_donar', ['donar'=>$donar]);
    }

    public function store(Request $request)
    {
        //dd($request->all()); exit();
    	$new_donar = new Donar;
    	$new_donar->donar = $request->input('donar');
    	$new_donar->dob = $request->input('dob');
    	$new_donar->company_name = $request->input('company_name');
    	$new_donar->address = $request->input('address');
        $new_donar->mobile_no = $request->input('mobile_no');
        $new_donar->email_id = $request->input('email_id');
        $new_donar->pan_no = $request->input('pan_no');
        $new_donar->aadhar = $request->input('aadhar');
    	$new_donar->save();
    	return redirect()->back()->with('success','Created Successfully');
    }
}
