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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name')->index();
            $table->string('book_author');
            $table->string('book_pic');
            $table->string('rating')->nullable();
            $table->string('category');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
