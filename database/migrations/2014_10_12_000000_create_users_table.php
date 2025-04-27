<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',15);
            $table->string('last_name',15);
            $table->integer('phone',8);
            $table->integer('extra_phone',8)->nullable();
            $table->char('role',1);
            $table->char('status',1);
            $table->foreignId('address_idaddress');
            $table->string('email',35)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',60);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
