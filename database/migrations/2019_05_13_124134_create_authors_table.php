<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->bigIncrements('id');
<<<<<<< HEAD
            $table->string('name', 100);
=======
<<<<<<< HEAD
            $table->string('name', 100);
=======
            $table->string('name', 255);
>>>>>>> a945983c23d4ebee28a69908ffadec7c7645a7a2
>>>>>>> 8eee83c2b3a823278f5e17af74c32a5b3ba769e4
            $table->string('password', 60);
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
        Schema::dropIfExists('authors');
    }
}
