<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use function Laravel\Prompts\table;

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
            $table->foreignId('authors_id')->constrained(
                table:'authors', indexName:'id'
            );
            $table->string('publisher')->nullable();
            $table->string('isbn');
            $table->string('pages')->nullable();
            $table->string('language')->nullable();
            $table->string('resume')->nullable();

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
