<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('upload_content', fn(Blueprint $table) => $table->foreign('upload_id')->references('id')->on('uploads'));
    }

    public function down(): void
    {
        Schema::dropIfExists('upload_foreign_keys');
    }
};
