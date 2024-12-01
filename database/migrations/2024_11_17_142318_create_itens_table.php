<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->text('especificacoes');
            $table->text('descricao')->nullable();

            $table->unsignedBigInteger('localidade_id')->nullable();
            $table->foreign('localidade_id')
                ->references('id')->on('localidade')
                ->onDelete('set null');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null');

            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')
                ->references('id')->on('status')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
