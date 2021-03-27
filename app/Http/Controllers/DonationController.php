<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
use App\Donation;
use App\Donar;
use Rap2hpoutre\FastExcel\FastExcel;

class DonationController extends Controller
{
    public function view(Request $request)
    {
    	$categories = Category::all();
    	$subcategories = Subcategory::all();
    	$donation = Donation::all();
        $donar = Donar::all();
    	return view('admin/donation', ['subcategories'=>$subcategories, 'categories'=>$categories, 'donation'=>$donation, 'donar'=>$donar]);
    }

    public function single_donation(Request $request)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $donation = Donation::where('id', $request->id)->get();
        return view('admin/single_donation', ['subcategories'=>$subcategories, 'categories'=>$categories, 'donation'=>$donation]);
    }

    public function edit_donation(Request $request)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $donation = Donation::where('id', $request->id)->get()->first();
        $donar = Donar::all();
        return view('admin/edit-donation', ['subcategories'=>$subcategories, 'categories'=>$categories, 'donation'=>$donation, 'donar'=>$donar]);
    }

    public function delete_donation(Request $request)
    {
        Donation::where('id', $request->id)->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function store(Request $request)
    {
        //dd($request->all()); exit();
    	$new_donation = new Donation;
    	$new_donation->category_id = $request->input('category_id');
    	$new_donation->subcategory_id = $request->input('subcategory_id');
    	$new_donation->sr_no = $request->input('sr_no');
    	$new_donation->receipt_no = $request->input('receipt_no');
        $new_donation->donar = $request->input('donar');
        $new_donation->company_name = $request->input('company_name');
        $new_donation->payment_mode = $request->input('payment_mode');
        $new_donation->payment_name = $request->input('payment_name');
        $new_donation->cheque_issued_by = $request->input('cheque_issued_by');
        $new_donation->transaction_id = $request->input('transaction_id');
        $new_donation->beneficiary_name = $request->input('beneficiary_name');
        $new_donation->via_bank = $request->input('via_bank');
        $new_donation->cheque_number = $request->input('cheque_number');
        $new_donation->receipt_id = $request->input('receipt_id');
        $new_donation->aadhar = $request->input('aadhar');
        $new_donation->cheque_date = $request->input('cheque_date');
    	$new_donation->date = $request->input('date');
        $new_donation->dob = $request->input('dob');
    	$new_donation->amount = $request->input('amount');
    	$new_donation->bank = $request->input('bank');
    	$new_donation->address = $request->input('address');
    	$new_donation->pan_no = $request->input('pan_no');
    	$new_donation->mobile_no = $request->input('mobile_no');
    	$new_donation->email_id = $request->input('email_id');
    	$new_donation->refrence = $request->input('refrence');
        $new_donation->comment = $request->input('comment');
    	$new_donation->save();
    	return redirect()->back()->with('success','Created Successfully');
    }

    public function update(Request $request)
    {
        //dd($request->all()); exit();
        $new_donation = Donation::where('id',$request->input('donation_id'))->get()->first();
        $new_donation->category_id = $request->input('category_id');
        $new_donation->subcategory_id = $request->input('subcategory_id');
        $new_donation->sr_no = $request->input('sr_no');
        $new_donation->receipt_no = $request->input('receipt_no');
        $new_donation->donar = $request->input('donar');
        $new_donation->company_name = $request->input('company_name');
        $new_donation->payment_mode = $request->input('payment_mode');
        $new_donation->payment_name = $request->input('payment_name');
        $new_donation->cheque_issued_by = $request->input('cheque_issued_by');
        $new_donation->transaction_id = $request->input('transaction_id');
        $new_donation->beneficiary_name = $request->input('beneficiary_name');
        $new_donation->via_bank = $request->input('via_bank');
        $new_donation->cheque_number = $request->input('cheque_number');
        $new_donation->receipt_id = $request->input('receipt_id');
        $new_donation->aadhar = $request->input('aadhar');
        $new_donation->cheque_date = $request->input('cheque_date');
        $new_donation->date = $request->input('date');
        $new_donation->dob = $request->input('dob');
        $new_donation->amount = $request->input('amount');
        $new_donation->bank = $request->input('bank');
        $new_donation->address = $request->input('address');
        $new_donation->pan_no = $request->input('pan_no');
        $new_donation->mobile_no = $request->input('mobile_no');
        $new_donation->email_id = $request->input('email_id');
        $new_donation->refrence = $request->input('refrence');
        $new_donation->comment = $request->input('comment');
        $new_donation->save();
        return redirect()->back()->with('success','Updated Successfully');
    }

    public function import(Request $request){
        $areaFile = $request->file('import_file')->getRealPath();
        $original_file_name=$request->import_file->getClientOriginalName();
        $dotpos=strpos($original_file_name,".xlsx");
        $only_file_name=substr($original_file_name,0,$dotpos);
        $file_type=explode("_",$only_file_name);
        $path=public_path('/datauploads');
        $main_file = time().'.'.$request->import_file->getClientOriginalExtension();
        $request->import_file->move($path, $main_file);
        $uploaded_file=public_path('/datauploads')."/".$main_file;

        $collection = (new FastExcel)->import($uploaded_file);
        $collection->filter()->each(function($item) {
            
                $new_donation = new Donation;
                $new_donation->category_id = trim($item['category_id']);
                $new_donation->subcategory_id = trim($item['subcategory_id']);
                $new_donation->sr_no = trim($item['sr_no']);
                $new_donation->receipt_no = trim($item['receipt_no']);
                $new_donation->donar = trim($item['donar']);
                $new_donation->company_name = trim($item['company_name']);
                $new_donation->payment_mode = trim($item['payment_mode']);
                $new_donation->payment_name = trim($item['payment_name']);
                $new_donation->cheque_issued_by = trim($item['cheque_issued_by']);
                $new_donation->transaction_id = trim($item['transaction_id']);
                $new_donation->beneficiary_name = trim($item['beneficiary_name']);
                $new_donation->via_bank = trim($item['via_bank']);
                $new_donation->cheque_number = trim($item['cheque_number']);
                $new_donation->receipt_id = trim($item['receipt_id']);
                $new_donation->aadhar = trim($item['aadhar']);
                $new_donation->cheque_date = substr(trim($item['cheque_date']), 1, -1);
                $new_donation->date = substr(trim($item['date']), 1, -1);
                $new_donation->dob = substr(trim($item['dob']), 1, -1);
                $new_donation->amount = trim($item['amount']);
                $new_donation->bank = trim($item['bank']);
                $new_donation->address = trim($item['address']);
                $new_donation->pan_no = trim($item['pan_no']);
                $new_donation->mobile_no = trim($item['mobile_no']);
                $new_donation->email_id = trim($item['email_id']);
                $new_donation->refrence = trim($item['refrence']);
                $new_donation->comment = trim($item['comment']);
                $new_donation->save();

                $donor_id = Donar::where('email_id', $new_donation->email_id)->orWhere('mobile_no', $new_donation->mobile_no)->get();
                if(count($donor_id) == 0)
                {
                    $new_donar = new Donar;
                    $new_donar->donar = $new_donation->donar;
                    $new_donar->dob = $new_donation->dob;
                    $new_donar->company_name = $new_donation->company_name;
                    $new_donar->address = $new_donation->address;
                    $new_donar->mobile_no = $new_donation->mobile_no;
                    $new_donar->email_id = $new_donation->email_id;
                    $new_donar->pan_no = $new_donation->pan_no;
                    $new_donar->aadhar = $new_donation->address;
                    $new_donar->save();
                }
        });

        @unlink(public_path('/datauploads')."/".$main_file);

        //return response()->json(['status' => 'success']);
        return redirect()->back()->with('success', 'Impoted Successfully');
    }
}
 