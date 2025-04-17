<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class San extends Model
{
    use HasFactory;

    protected $table = 'san';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'Ten_san',
        'Dia_chi',
        'Gia',
        'Mo_ta',
        'Hinh_anh',
        'view',
        'Trang_thai',
        'ID_Loai',
        'So_luong',
        'diem_danh_gia'
    ];

    public function loai()
    {
        return $this->belongsTo(Loai_san::class, 'ID_Loai');
    }
}
