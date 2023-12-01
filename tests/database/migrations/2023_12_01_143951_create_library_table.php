<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library', function (Blueprint $table) {
            $table->integer('user_ID');
            $table->integer('book_ID');
            
            $table->foreign('book_ID', 'library_book_ID')->references('book_ID')->on('books');
            $table->foreign('user_ID', 'library_users_user_ID_fk')->references('user_ID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('library');
    }
}
