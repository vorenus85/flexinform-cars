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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->index();
            $table->string('type'); // enum
            $table->timestamp('registered');
            $table->boolean('ownbrand');
            $table->integer('accidents');
            $table->timestamps();
        });

        // relations
        $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
