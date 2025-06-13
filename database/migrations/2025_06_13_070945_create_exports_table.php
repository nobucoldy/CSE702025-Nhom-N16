<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportsTable extends Migration
{
    public function up()
{
    Schema::create('exports', function (Blueprint $table) {
        $table->id();
        $table->string('codePro', 50);
        $table->integer('quantity');
        $table->date('export_date');
        $table->string('receiver')->nullable(); // người nhận (nếu có)
        $table->text('note')->nullable();
        $table->timestamps();

        $table->foreign('codePro')->references('codePro')->on('products_lists')->onDelete('cascade');
    });
}

}
