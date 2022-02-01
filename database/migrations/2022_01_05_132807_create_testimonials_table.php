<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->float('ratings');
            $table->mediumText("content");
            $table->string("image")->nullable();
            $table->string('client_name');
            $table->string('client_org');
            $table->string('status')->default('draft');
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id', 'subcategory_fk_455769')->references('id')->on('subcategories');
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
        Schema::dropIfExists('testimonials');
    }
}
