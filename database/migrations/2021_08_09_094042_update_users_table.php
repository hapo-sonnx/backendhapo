<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role')->default(0)->comment('1: teacher, 0: student,');
            $table->string('phone')->nullable();
            $table->date('brithday')->nullable();
            $table->string('address')->nullable();
            $table->text('about')->nullable();
            $table->integer('gender')->default(0)->comment("0: female, 1: male;");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role')->default(0)->comment('1: teacher, 0: student,');
            $table->string('phone')->nullable();
            $table->date('brithday')->nullable();
            $table->string('address')->nullable();
            $table->text('about')->nullable();
            $table->integer('gender')->default(0)->comment("0: female, 1: male");
        });
    }
}
