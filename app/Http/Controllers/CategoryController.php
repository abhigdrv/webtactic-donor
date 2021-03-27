<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Donar;
use App\Donation;
class CategoryController extends Controller
{
    public function view(Request $request)
    {
    	$categories = Category::all();
        $subcategories = Subcategory::all();
    	return view('admin/category', ['subcategories'=>$subcategories, 'categories'=>$categories]);
    }

    public function dashboard(Request $request)
    {
        $categories = Category::all()->count();
        $donors = Donar::all()->count();
        $donation = Donation::all()->sum('amount');
        return view('admin/dashboard', ['donors'=>$donors, 'categories'=>$categories, 'donation'=>$donation]);
    }

    public function store(Request $request)
    {
    	$new_category = new Category;
    	$new_category->category_name = $request->input('category_name');
    	$new_category->category_code = $request->input('category_code');
    	$new_category->save();
    	return redirect()->back()->with('success','Created Successfully');
    }

    public function ajaxedit(Request $request)
    {
        Category::where('id', $request->input('category_id'))->update(['category_name' => $request->input('category_name')]);
        return response()->json(['success'=>'success']);
    }

    public function ajaxdelete(Request $request)
    {
        Category::where('id', $request->input('category_id'))->delete();
        return response()->json(['success'=>'success']);
    }

    public function ajaxgetsubcategory(Request $request)
    {
        $category_name = Category::where('id', $request->input('category_id'))->get()->pluck('category_name')->first();
        $subcategory = Subcategory::where('subcategory_category', $category_name)->get();
        return response()->json(['success'=>$subcategory]);
    }
}