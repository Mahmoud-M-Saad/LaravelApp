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
        Schema::create('posts', function (Blueprint $table) {
          
            $table->id();
            $table->string(column:'title');     // 225 char
            $table->text(column:'description'); //more than 255 char 
            $table->timestamps();               //created at & upadated at
            
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users'); //foreign key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

   /* 
   public function down()
    {
        Schema::dropIfExists('posts');
    }
    */
};
