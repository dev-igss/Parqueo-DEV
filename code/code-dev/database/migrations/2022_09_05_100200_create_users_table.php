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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('ibm')->unique();
            $table->string('password');
            $table->text('permissions')->nullable();
            $table->integer('role');
            $table->integer('idunit')->nullable();
            $table->integer('status');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('users')->insert(array(
            'id'=>'1',
            'name'=>'Daniel',
            'lastname'=>'Velasquez',
            'ibm'=>'37732',
            'password' => '$2y$10$0zfZ2x2r4TwbTZ4CNTSQ6u/l8KUDBAw65WTg3EYgD/W/6l2T7ye3C', 
            'permissions' => '{"dashboard":"true"}', 
            'role' =>'0', 
            'status'=>'1'
        ));
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
