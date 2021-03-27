<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
use App\Donation;
use App\Donar;
use Rap2hpoutre\FastExcel\FastExcel;
use DataTables;
use DB;

class ReportController extends Controller
{
    public function report(Request $request)
    {
    	$donar = Donation::all();
    	return view('admin/report', ['donar'=>$donar]);
    }

    public function donor_wise_report(Request $request)
    {
    	$donar = Donation::all();
    	return view('admin/donor_wise_report', ['donar'=>$donar]);
    }

    public function category_wise_report(Request $request)
    {
    	$donar = Donation::all();
    	return view('admin/category_wise_report', ['donar'=>$donar]);
    }

    public function subcategory_wise_report(Request $request)
    {
    	$donar = Donation::all();
    	return view('admin/subcategory_wise_report', ['donar'=>$donar]);
    }

    public function date_wise_report(Request $request)
    {
    	$donar = Donation::all();
    	return view('admin/date_wise_report', ['donar'=>$donar]);
    }

    public function week_wise_report(Request $request)
    {
    	$donar = Donation::all();
    	return view('admin/week_wise_report', ['donar'=>$donar]);
    }

    public function custom_date_wise_report(Request $request)
    {
    	$donar = Donation::all();
    	return view('admin/custom_date_wise_report', ['donar'=>$donar]);
    }

    public function area_wise_report(Request $request)
    {
    	$donar = Donation::all();
    	return view('admin/area_wise_report', ['donar'=>$donar]);
    }
}
