<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id', 'subcategory_fk_455758')->references('id')->on('subcategories');
     
        });
    }
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['subcategory_id']);
           
        });
    }
}
