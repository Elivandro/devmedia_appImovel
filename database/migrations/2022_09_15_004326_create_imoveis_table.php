<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('address');
            $table->string('neighborhood');
            $table->integer('number');
            $table->string('postal_code');
            $table->string('city');
            $table->string('state');
            $table->integer('price');
            $table->integer('roomQty');
            $table->enum('type', ['Apartamento', 'Casa', 'Kitnet', 'Lote']);
            $table->enum('purpose', ['Venda', 'Aluguel']);
            $table->foreignId('user_id')->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imoveis');
    }
};
