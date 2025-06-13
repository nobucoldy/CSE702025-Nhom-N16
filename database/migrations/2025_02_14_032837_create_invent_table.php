<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventTable extends Migration
{
    public function up()
    {
        Schema::create('invent', function (Blueprint $table) {
            $table->id();
            $table->string('codePro', 50);
            $table->integer('quantity');
            $table->date('import_date');
            $table->text('description')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('invent');
    }
}
