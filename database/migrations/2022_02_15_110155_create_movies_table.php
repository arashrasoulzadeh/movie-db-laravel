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
        Schema::create('movies', function (Blueprint $table) {
            $table->string( "imdbid" )->primary(); 
            $table->string( "title" )->nullable(); 
            $table->string( "year" )->nullable(); 
            $table->string( "rated" )->nullable(); 
            $table->string( "released" )->nullable(); 
            $table->string( "runtime" )->nullable(); 
            $table->string( "genre" )->nullable(); 
            $table->string( "director" )->nullable(); 
            $table->string( "writer" )->nullable(); 
            $table->string( "actors" )->nullable(); 
            $table->string( "plot" )->nullable(); 
            $table->string( "language" )->nullable(); 
            $table->string( "country" )->nullable(); 
            $table->string( "awards" )->nullable(); 
            $table->string( "poster" )->nullable(); 
            $table->string( "metascore" )->nullable(); 
            $table->string( "imdbrating" )->nullable(); 
            $table->string( "imdbvotes" )->nullable(); 
            $table->string( "type" )->nullable(); 
            $table->string( "totalseasons" )->nullable();
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
        Schema::dropIfExists('movies');
    }
};
