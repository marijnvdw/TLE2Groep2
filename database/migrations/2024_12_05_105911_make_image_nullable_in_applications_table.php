<?php
// database/migrations/xxxx_xx_xx_xxxxxx_make_image_nullable_in_applications_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeImageNullableInApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('image')->nullable(false)->change();
        });
    }
}

