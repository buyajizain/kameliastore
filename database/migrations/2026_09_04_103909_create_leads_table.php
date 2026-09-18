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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('handle')->nullable(); // e.g. @clarissa_bags
            $table->string('platform')->default('instagram'); // instagram, twitter, carousell, tiktok, facebook, whatsapp
            $table->string('contact')->nullable(); // No WA / Phone / Link Profil
            $table->string('target_brand')->nullable(); // Coach, Tory Burch, Fossil, etc.
            $table->string('target_category')->nullable(); // Tas, Dompet, Jam Tangan, etc.
            $table->text('raw_inquiry')->nullable(); // Komentar / Tweet asli calon pembeli
            $table->unsignedBigInteger('budget_max')->nullable(); // Maksimal budget
            $table->string('matched_product_id')->nullable(); // ID produk Mercari/Kamelia
            $table->string('matched_product_title')->nullable();
            $table->unsignedBigInteger('matched_product_price')->nullable();
            $table->string('matched_product_image')->nullable();
            $table->enum('status', ['new', 'contacted', 'interested', 'closed', 'lost'])->default('new');
            $table->text('notes')->nullable();
            $table->text('outreach_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
