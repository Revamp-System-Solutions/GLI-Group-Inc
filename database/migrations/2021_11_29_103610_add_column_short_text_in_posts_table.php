<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnShortTextInPostsTable extends Migration
{
  
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('short_text');
        });
    }

  
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['short_text']);
        });
    }
}
