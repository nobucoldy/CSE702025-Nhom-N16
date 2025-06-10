<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
          Schema::create('suppliers', function (Blueprint $table) {
        $table->string('codeSup', 50)->primary(); // Mã nhà cung cấp
        $table->string('supplier');
        $table->text('address');
        $table->timestamps();
    });
    }

    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
