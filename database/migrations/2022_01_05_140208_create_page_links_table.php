<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_links', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("href")->nulllable();
            $table->string("order")->nulllable();
            $table->string("icon")->nulllable();
            $table->boolean("is_parent")->default(true);
            $table->boolean("has_dropdown")->default(false);
            $table->string("parentLink")->nulllable();
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
        Schema::dropIfExists('page_links');
    }
}
