<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsEnglishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_englishes', function (Blueprint $table) {
            $table->id();
            $table->string('title', '255');
            $table->string('slug', '255');
            $table->date('date');
            $table->text('discription');
            $table->string('image', '255');
            $table->string('mimages', '255');
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
        Schema::dropIfExists('news_englishes');
    }
}
