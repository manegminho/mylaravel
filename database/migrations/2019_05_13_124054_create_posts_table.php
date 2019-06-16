<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
<<<<<<< HEAD
            $table->string('subject',100);
            $table->string('content',100);
=======
<<<<<<< HEAD
            $table->string('subject',100);
            $table->string('content',100);
=======
            $table->string('subject');
            $table->string('content');
>>>>>>> a945983c23d4ebee28a69908ffadec7c7645a7a2
>>>>>>> 8eee83c2b3a823278f5e17af74c32a5b3ba769e4
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
        Schema::dropIfExists('posts');
    }
}
