<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->increments('id');
            $table->string('name',64);
            $table->string('email',64);
            $table->string('mobile',64);
            $table->string('address',255);
            $table->string('image',64)->nullable();
            $table->string('password',64);

    $table->addColumn('integer', 'designation', ['lenght' => 5, 'default' => '1','comment'=>'1 Admin  2 User']);
    $table->addColumn('integer', 'status', ['lenght' => 5, 'default' => '1','comment'=>'1 Active  2 Suspend']);
    $table->addColumn('integer', 'deleted', ['lenght' => 5, 'default' => '1','comment'=>'2 Deleted']);


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
        Schema::dropIfExists('user');
    }
}
