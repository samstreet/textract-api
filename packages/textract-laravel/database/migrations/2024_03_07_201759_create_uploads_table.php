<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36)->nullable(false);
            $table->timestamp('uploaded_at')->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('status', 20)->default('started');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('uploads');
    }
};
