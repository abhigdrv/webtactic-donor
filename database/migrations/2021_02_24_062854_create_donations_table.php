<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('subcategory_id')->nullable();
            $table->string('donar')->nullable();
            $table->string('company_name')->nullable();
            $table->string('payment_mode');
            $table->string('payment_name')->nullable();
            $table->string('cheque_number')->nullable();
            $table->string('cheque_issued_by')->nullable();
            $table->string('receipt_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('cheque_date')->nullable();
            $table->string('beneficiary_name')->nullable();
            $table->string('via_bank')->nullable();
            $table->string('sr_no');
            $table->string('receipt_no')->nullable();
            $table->string('date')->nullable();
            $table->string('dob')->nullable();
            $table->string('amount');
            $table->string('bank')->nullable();
            $table->string('address')->nullable();
            $table->string('cash_address')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('refrence')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
