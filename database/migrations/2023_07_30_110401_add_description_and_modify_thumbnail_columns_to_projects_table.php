<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add the 'description' column
        if (!Schema::hasColumn('projects', 'description')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->text('description')->nullable();
            });
        }

        // Modify the 'thumbnail' column to store binary data (BLOB)
        if (Schema::hasColumn('projects', 'thumbnail')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->binary('thumbnail')->nullable()->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
};
