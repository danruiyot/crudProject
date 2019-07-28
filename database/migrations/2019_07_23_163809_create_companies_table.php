<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
	    $table->text('name');
	    $table->text('email')->unique();
	    $table->text('website');
	    $table->string('image')->nullable();
	    $table->timestamp('created_at');
	    $table->timestamp('updated_at');
	});
	Schema::alter('employees', function (Blueprint $table) {
	$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    
    {
	    Schema::alter('employees', function (Blueprint $table) {
		    $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
	    });
        Schema::dropIfExists('companies');
    }
}

