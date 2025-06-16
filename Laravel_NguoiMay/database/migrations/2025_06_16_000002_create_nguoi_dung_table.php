<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nguoi_dung', function (Blueprint $table) {
            $table->id('MaNguoiDung');
            $table->string('Ten');
            $table->string('Email')->unique();
            $table->string('MatKhau');
            $table->string('SoDienThoai');
            $table->text('DiaChi')->nullable();
            $table->string('VaiTro');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nguoi_dung');
    }
};
