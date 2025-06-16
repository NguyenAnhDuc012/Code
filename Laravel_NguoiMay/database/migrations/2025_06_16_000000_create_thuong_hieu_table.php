<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('thuong_hieu', function (Blueprint $table) {
            $table->id('MaThuongHieu');
            $table->string('TenThuongHieu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('thuong_hieu');
    }
};
