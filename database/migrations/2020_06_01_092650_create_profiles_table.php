<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedSmallInteger('age');
            $table->string('picture_main')->nullable();
            $table->string('gender')->nullable();
            $table->string('bio')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
