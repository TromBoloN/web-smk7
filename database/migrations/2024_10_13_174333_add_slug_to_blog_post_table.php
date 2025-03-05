<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('blog_post', function (Blueprint $table) {
            $table->string('slug')->unique()->after('title');
            $table->string('is_editors_choice')->after('slug')->default(false);
        });
    }

    public function down()
    {
        Schema::table('blog_post', function (Blueprint $table) {
            // $table->dropColumn('slug');
            // $table->dropColumn('is_editors_choice');
        });
    }
};
