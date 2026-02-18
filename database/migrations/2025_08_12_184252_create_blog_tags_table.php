<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('slug', 160)->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_tags');
    }
};
