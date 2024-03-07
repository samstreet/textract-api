<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('upload_content', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('upload_id')->nullable(false);
            $table->string('content')->nullable(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('upload_content');
    }
};
