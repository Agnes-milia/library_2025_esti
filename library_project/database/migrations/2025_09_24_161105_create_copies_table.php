<?php

use App\Models\Copy;
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
        Schema::create('copies', function (Blueprint $table) {
            $table->id();
            $table->foreignId("book_id")->constrained("books");
            //0: kemény, 1: puha
            $table->boolean('hardcovered')->default(1);
            $table->year('publication');
            //0: könyvtárban, 1: felh-nál, 2: selejt
            $table->smallInteger('status')->default(0);
            $table->timestamps();
        });

        Copy::create([
            "book_id" => 1,
            "publication" => 2000,

        ]);

        Copy::create([
            "book_id" => 2,
            "publication" => 2020,
            "status" => 2
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copies');
    }
};
