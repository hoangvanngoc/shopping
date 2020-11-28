<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products1s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('feature_image_path')->nullable();
            $table->text('content');
            $table->integer('user_id');
            $table->integer('category_id');

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
        Schema::dropIfExists('products1s');
    }
}
