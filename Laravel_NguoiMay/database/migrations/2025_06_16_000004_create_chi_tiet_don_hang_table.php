<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chi_tiet_don_hang', function (Blueprint $table) {
            $table->id('MaChiTietDonHang');
            $table->unsignedBigInteger('MaDonHang');
            $table->unsignedBigInteger('MaSanPham');
            $table->integer('SoLuong');
            $table->timestamps();

            $table->foreign('MaDonHang')->references('MaDonHang')->on('don_hang')->onDelete('cascade');
            $table->foreign('MaSanPham')->references('MaSanPham')->on('san_pham')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_don_hang');
    }
};
