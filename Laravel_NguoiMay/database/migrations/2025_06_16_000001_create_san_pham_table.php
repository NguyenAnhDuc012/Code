<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id('MaSanPham');
            $table->unsignedBigInteger('MaThuongHieu');
            $table->string('TenSanPham');
            $table->decimal('GiaBan', 10, 2);
            $table->integer('TonKho');
            $table->text('MoTa')->nullable();
            $table->string('HinhAnh')->nullable();
            $table->timestamps();

            $table->foreign('MaThuongHieu')->references('MaThuongHieu')->on('thuong_hieu')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('san_pham');
    }
};
