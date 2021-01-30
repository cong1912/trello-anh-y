<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Tiêu đề');
            $table->unsignedInteger('list_id')->unsigned();
            $table->foreign('list_id')->references('id')->on('lists')->onDelete('cascade');
            $table->text('description')->nullable()->comment('Mô tả');
            $table->string('image')->nullable()->comment('Ảnh');
            $table->date('date')->nullable()->comment('ngày hoàn thành task');
            $table->boolean('label')->default(false)->comment('Trạng thái');
            $table->boolean('status')->default(true)->comment('Trạng thái');
            $table->integer('order')->default(1);
            $table->boolean('type')->default(true)->comment('loại');
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
        Schema::dropIfExists('check_items');
    }
}
