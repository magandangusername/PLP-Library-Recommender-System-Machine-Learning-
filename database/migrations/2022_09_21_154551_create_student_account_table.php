<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_account', function (Blueprint $table) {  
            $table->id('library_ID'); 
            $table->string('library_id_number')->unique();
            $table->integer('student_info_ID');
            $table->integer('compiled_backtrack_ID');
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_account');
    }
};
