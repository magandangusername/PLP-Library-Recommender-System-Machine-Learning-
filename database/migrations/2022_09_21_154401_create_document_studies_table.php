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
        Schema::create('document_studies', function (Blueprint $table) {
            $table->id('document_id');
            $table->integer('compiled_tag_ID')->unique();
            $table->integer('document_college_ID')->unique();
            $table->string('document_number');
            $table->string('title');
            $table->timestamp('date_submitted');
            $table->string('author');
            $table->string('document_type');
            $table->string('addedby');
            $table->string('document_status');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('document_studies');
    }
};
