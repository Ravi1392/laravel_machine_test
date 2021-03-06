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
            $table->addColumn('integer', 'gender', ['lenght' => 5,'comment'=>'1 Male  2 Female 3 Other']);
            $table->string('pre_loc',64);
            $table->string('current_ctc',64);
            $table->string('expected_ctc',64);
            $table->string('notice_period',64);
            
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
