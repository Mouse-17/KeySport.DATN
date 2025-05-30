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
            Schema::create('khach_hang', function (Blueprint $table) {
                $table->id();
                $table->string('ho_ten', 255);
                $table->string('email', 255)->unique();
                $table->string('password');
                $table->string('so_dien_thoai', 15);
                $table->text('dia_chi')->nullable();
                $table->integer('vai_tro')->default(0);
                $table->timestamps();
            });
        }
    
        public function down(): void {
            Schema::dropIfExists('khach_hang');
        }
    
};