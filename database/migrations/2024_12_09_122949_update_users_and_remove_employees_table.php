<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersAndRemoveEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add company_id and admin columns to users table
        Schema::table('users', function (Blueprint $table) {
            $table->integer('company_id')->nullable(); // Add company_id
            $table->smallInteger('admin')->default(0); // Add admin with default value 0
        });

        // Drop employees table
        Schema::dropIfExists('employees');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove company_id and admin columns from users table
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['company_id', 'admin']);
        });

        // Recreate employees table
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('email');
            $table->string('password');
            $table->integer('admin')->default(0);
            $table->timestamps();
        });
    }
}
