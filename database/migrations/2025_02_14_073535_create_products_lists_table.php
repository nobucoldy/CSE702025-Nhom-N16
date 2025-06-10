<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsListsTable extends Migration
{
    public function up()
    {
        Schema::create('products_lists', function (Blueprint $table) {
             $table->string('codePro', 50)->primary(); // ← đảm bảo là primary
    $table->string('name');
    $table->string('codeSup', 50);
    $table->timestamps();

    $table->foreign('codeSup')->references('codeSup')->on('suppliers')->onDelete('cascade');
        }); // ← Đây là dấu ) đúng ở cuối
    }

    public function down()
    {
        Schema::dropIfExists('products_lists');
    }
}
