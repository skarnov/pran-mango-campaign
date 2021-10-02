<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_categories', function (Blueprint $table) {
            $table->integer('pk_category_id');
            $table->integer('category_serial');
            $table->string('category_name', 50);
            $table->string('category_image');
            $table->enum('category_status', array('published', 'unpublished'));
            $table->date('create_date');
            $table->time('create_time');
            $table->bigInteger('created_by');
            $table->date('modify_date');
            $table->time('modify_time');
            $table->bigInteger('modified_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_categories');
    }
}
