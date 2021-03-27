<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;

class SubcategoryController extends Controller
{
    public function view(Request $request)
    {
    	$categories = Category::all();
    	$subcategories = Subcategory::all();
    	return view('admin/subcategory', ['subcategories'=>$subcategories, 'categories'=>$categories]);
    }

    public function store(Request $request)
    {
    	$new_subcategory = new Subcategory;
    	$new_subcategory->subcategory_category = $request->input('subcategory_category');
    	$new_subcategory->subcategory_name = $request->input('subcategory_name');
    	$new_subcategory->subcategory_code = $request->input('subcategory_code');
    	$new_subcategory->save();
    	return redirect()->back()->with('success','Created Successfully');
    }

    public function ajaxstore(Request $request)
    {
        $new_subcategory = new Subcategory;
        $cat_name = Category::where('id', $request->input('category_id'))->get()->pluck('category_name')->first();
        $new_subcategory->subcategory_category = $cat_name;
        $new_subcategory->subcategory_name = $request->input('category_name');
        $new_subcategory->subcategory_code = 'NA';
        $new_subcategory->save();
        return response()->json(['success'=>'success']);
    }

    public function ajaxdelete(Request $request)
    {
        Subcategory::where('id', $request->input('subcategory_id'))->delete();
        return response()->json(['success'=>'success']);
    }

    public function ajaxedit(Request $request)
    {
        Subcategory::where('id', $request->input('subcategory_id'))->update(['subcategory_name' => $request->input('subcategory_name')]);
        return response()->json(['success'=>'success']);
    }
}
