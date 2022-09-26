<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_photos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('product_id')->nullable();
          $table->string('image')->nullable();
          
          $table->tinyInteger('status')->default(0);
          $table->tinyInteger('is_archive')->default(0);
          $table->integer('created_by')->nullable();
          $table->integer('updated_by')->nullable();
          $table->integer('deleted_by')->nullable();
          $table->softDeletes();
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
        Schema::dropIfExists('product_photos');
    }
}
