<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_tags', function (Blueprint $table) {
            $table->integer('book_ID');
            $table->integer('tag_ID');
            
            $table->foreign('book_ID', 'book_ID')->references('book_ID')->on('books');
            $table->foreign('tag_ID', 'tag_ID')->references('tag_ID')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_tags');
    }
}
