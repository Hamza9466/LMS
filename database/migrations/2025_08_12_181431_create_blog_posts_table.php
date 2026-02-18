<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
$table->foreignId('teacher_detail_id')->constrained()->cascadeOnDelete();
$table->string('title', 200);
$table->string('slug', 220)->unique()->nullable();
$table->string('feature_image')->nullable();
$table->string('feature_image_alt')->nullable();
$table->string('short_description', 500)->nullable();
$table->longText('long_description')->nullable();
$table->text('quotation')->nullable();
$table->timestamp('published_at')->nullable();
$table->enum('status', ['draft','scheduled','published','archived'])->default('draft');
$table->boolean('is_featured')->default(false);
$table->string('tags')->nullable();
$table->timestamps();
$table->softDeletes(); // <-- add this line

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
