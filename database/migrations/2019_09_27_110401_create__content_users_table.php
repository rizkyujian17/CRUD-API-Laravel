<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('content_user_id')->unsigned();
            $table->string('NamaFile');
            $table->string('DeskripsiFile');
            $table->string('file');
        
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
        Schema::dropIfExists('content_users');
    }
}
