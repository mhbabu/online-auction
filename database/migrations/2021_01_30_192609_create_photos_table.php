<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('reference_id')->nullable();
            $table->string('reference_type')->nullable()
                ->comment('product,
                product_category,product_type,
                industry,industry_category,
                profile,application,
                service_support,news_event'
                );

            $table->string('directory')->nullable();
            $table->string('photo')->nullable();
            $table->string('path')->nullable();
            $table->string('dimensions')->nullable()->comment('Height x Width');

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
        Schema::dropIfExists('photos');
    }
}
