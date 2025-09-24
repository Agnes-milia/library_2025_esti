<?php

use App\Models\Book;
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
            $table->string("author");
            $table->longText("title");
            $table->integer("pieces")->default(50);
            $table->timestamps();
        });

        Book::create([
            "author" => "Karl Marx",
            "title" => "Tőke",
            "pieces" => 100
        ]);

        Book::create([
            "author" => "Stephen King",
            "title" => "Ragyogás"
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
