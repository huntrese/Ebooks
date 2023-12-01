<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recent', function (Blueprint $table) {
            $table->integer('user_ID')->nullable();
            $table->integer('book_ID')->nullable();
            $table->timestamps();
            $table->integer('chapter')->nullable();
            
            $table->foreign('user_ID', 'recent_books_book_ID_fk')->references('book_ID')->on('books');
            $table->foreign('user_ID', 'recent_users_user_ID_fk')->references('user_ID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recent');
    }
}
