<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Tiêu đề');
            $table->unsignedInteger('board_id')->unsigned();
            $table->foreign('board_id')->references('id')->on('boards')->onDelete('cascade');
            $table->text('description')->nullable()->comment('Mô tả');
            $table->string('image')->nullable()->comment('Ảnh');
            $table->date('date')->nullable()->comment('ngày hoàn thành task');
            $table->string('label')->nullable()->comment('Trạng thái');
            $table->boolean('status')->default(true)->comment('Trạng thái');
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_items');
    }
}
