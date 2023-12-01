<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->integer('chapter_ID')->primary();
            $table->integer('book_ID');
            $table->string('chapter_name', 100)->nullable();
            $table->mediumblob('chapter');
            
            $table->foreign('book_ID', 'book_ID_fk')->references('book_ID')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapters');
    }
}
