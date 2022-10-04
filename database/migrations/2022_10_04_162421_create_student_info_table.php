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
            $table->integer('student_number');
            $table->string('firstname');
            $table->string('surname');
            $table->string('college');
            $table->string('course');
            $table->string('year_level');
            $table->string('contact_number');
            $table->string('email');
            $table->string('addedby');
            $table->string('student_status');
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