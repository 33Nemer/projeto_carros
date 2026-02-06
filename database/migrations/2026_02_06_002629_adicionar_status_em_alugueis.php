<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('alugueis', function (Blueprint $table) {
        $table->enum('status', ['aberto', 'finalizado', 'cancelado'])
              ->default('aberto'); 
    });
}

public function down()
{
    Schema::table('alugueis', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
};
