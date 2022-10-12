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
        Schema::create('student_info', function (Blueprint $table) {
            $table->id('student_info_ID');
            $table->integer('student_college_ID')->unique();
            $table->string('student_number')->unique();
            $table->string('firstname');
            $table->string('surname');
            $table->string('year_level')->nullable();
            $table->string('contact_number');
            $table->string('email')->unique();
            $table->string('addedby')->nullable();
            $table->string('student_status')->default('active');
            $table->timestamp('date_added')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_on')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_info');
    }
};
