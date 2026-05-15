<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stock_requests', function (Blueprint $table) {

            $table->id();

            $table->foreignId('dealer_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('stock_id')
                ->constrained()
                ->onDelete('cascade');

            $table->integer('quantity');

            $table->text('notes')
                ->nullable();

            $table->enum('status', [

                'pending',
                'approved',
                'rejected'

            ])->default('pending');

            $table->unsignedBigInteger('approved_by')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_requests');
    }
};