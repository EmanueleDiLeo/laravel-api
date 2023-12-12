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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('name',100);
            $table->string('image')->nullable();
            $table->string('image_name')->nullable();
            $table->string('link_git')->nullable();
            $table->decimal('version',6,3)->nullable();
            $table->text('description');
            $table->date('date_updated');
            $table->string('slug', 100)->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
