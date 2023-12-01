<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->integer('book_ID')->primary();
            $table->integer('author_ID');
            $table->string('name', 60);
            $table->mediumText('Description');
            $table->string('image_path')->nullable();
            
            $table->foreign('author_ID', 'author_ID')->references('author_ID')->on('author');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
