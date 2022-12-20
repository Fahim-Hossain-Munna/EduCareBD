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
        Schema::create('php_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('subject_category_id');
            $table->longText('subject_name');
            $table->longText('subject_question');
            $table->longText('subject_ans');
            $table->string('status')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('php_questions');
    }
};
