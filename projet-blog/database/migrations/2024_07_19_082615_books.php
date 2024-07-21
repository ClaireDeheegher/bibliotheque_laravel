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
        schema::create('books', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('author');
            $table->string('publisher');
            $table->string('isbn');
            $table->string('pages');
            $table->string('language');
            $table->string('resume');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('books');
    }
};
