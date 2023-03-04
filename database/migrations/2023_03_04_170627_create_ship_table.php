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
        Schema::create('ship', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->bigInteger('telephone');
            $table->integer('cp_origin');
            $table->integer('cp_destiny');
            $table->float('large');
            $table->float('width');
            $table->float('height');
            $table->float('weight');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ship');
    }
};
