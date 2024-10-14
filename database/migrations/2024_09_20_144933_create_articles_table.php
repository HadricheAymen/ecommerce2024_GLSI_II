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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('imageart');
            $table->string('marque');
            $table->string('reference')->index();
            $table->string('prix');
            $table->string('qtestock');
            $table->string('scategorieID')
            ->foreign('scategorieID')
            ->references('id')
            ->on('scategories')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
