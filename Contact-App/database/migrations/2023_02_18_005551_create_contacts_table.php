<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('fullname',255);
            $table->integer('gender');
            $table->string('email',255);
            $table->string('postcode',8);
            $table->string('address',255);
            $table->string('building_name',255);
            $table->string('opinion');
            $table->timestamp('created_at')->useCurrent()->nullable;
            $table->timestamp('updated_at')->useCurrent()->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
