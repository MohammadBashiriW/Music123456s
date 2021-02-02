<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('unique_code' ,255);
            $table->string('name' , 255);
            $table->text('title');
            $table->text('description');
            $table->float('rating')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->unsignedBigInteger('singer_id');
            $table->foreign('singer_id')->references('id')->on('singers')->onDelete('cascade');
            $table->string('320URL');
            $table->string('128URL');
            $table->string('videoUrl')->nullable();
            $table->enum('status' , [0,1])->default(0);
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
        Schema::dropIfExists('songs');
    }
}
