<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

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
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('salary')->nullable();
            $table->string('image')->default('user.jpg');
            $table->enum('role', ['customer', 'chef', 'admin', 'owner'])->default('customer');
            $table->string('address')->nullable();
            $table->integer('chef_orders')->default(0)->nullable();
            $table->integer('chef_description')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('day')->nullable();
            $table->string('mounth')->nullable();
            $table->string('year')->nullable();
            $table->string('jop')->nullable();
            $table->string('bio')->nullable();
            $table->string('country')->nullable();
            $table->string('location')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('github')->nullable();
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
