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
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('original_url')->index();
            $table->string('encoded_id')->nullable()->unique();
            $table->integer('request_count')->default(0);
            $table->datetime('last_requested_at')->nullable();

            /*
            Note that if we were dealing with auth, I would include the following:
            $table->foreignId('creator_id')
                ->constrained('users') // Assumes `id` as the foreign column in `users`

            // While I could get to the customer via $url->creator->customer, I'd like to
            // have the customer_id directly on the url
            $table->foreignId('customer_id')
                ->constrained('customers');
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urls');
    }
};
