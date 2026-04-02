<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_proof_path')->nullable()->after('gateway_ref');
            $table->text('admin_review_note')->nullable()->after('payment_proof_path');
            $table->timestamp('reviewed_at')->nullable()->after('admin_review_note');
            $table->foreignId('reviewed_by')->nullable()->after('reviewed_at')->constrained('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['reviewed_by']);
            $table->dropColumn(['payment_proof_path', 'admin_review_note', 'reviewed_at', 'reviewed_by']);
        });
    }
};
