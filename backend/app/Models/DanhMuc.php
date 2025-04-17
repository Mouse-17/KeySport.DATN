<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;

    protected $table = 'danh_muc';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'ten_danh_muc',
        'mo_ta',
        'trang_thai'
    ];

    public function sanPham()
    {
        return $this->hasMany(SanPham::class, 'id_danhmuc');
    }
} 