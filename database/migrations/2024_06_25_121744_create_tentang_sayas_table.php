<?php

use App\Models\InformasiDasar;
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
        Schema::create('tentang_saya', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('info_id');
            $table->text('biografi');
            $table->timestamps();

            $table->foreign('info_id')->references('id')->on('informasi_dasar')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_saya');
    }
};
