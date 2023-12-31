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
        Schema::create('user_has_news', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('news_id')->unsigned();
            $table->primary(['user_id', 'news_id'])->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_has_news');
    }
};
