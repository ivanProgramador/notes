<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('username',50)->nullable();
            $table->string('password',200)->nullable();
            $table->dateTime('last_login')->nullable();
            $table->timestamps();
            $table->softDeletes(); //quando o daddo é deletado do sistema mas não de forma fisica

        });
    }

    /**
     * Essa função ddesfaz a criação da tabela.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
