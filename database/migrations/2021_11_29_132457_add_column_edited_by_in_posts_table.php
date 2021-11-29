<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnEditedByInPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('edited_by')->nullable();
        });
    }

  
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['edited_by']);
        });
    }
}
