<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donars', function (Blueprint $table) {
            $table->id();
            $table->string('donar')->nullable();
            $table->string('dob')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('aadhar')->nullable();
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
        Schema::dropIfExists('donars');
    }
}
