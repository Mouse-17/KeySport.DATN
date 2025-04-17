<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function search(Request $request)
    // {
    //     $query = $request->get('q');
        
    //     if (strlen($query) < 2) {
    //         return response()->json([]);
    //     }

    //     $results = San_pham::where('ten_san_pham', 'like', "%{$query}%")
    //         ->orWhere('mo_ta', 'like', "%{$query}%")
    //         ->select('id', 'ten_san_pham', 'gia', 'anh_dai_dien')
    //         ->get();

    //     return response()->json($results);
    // }

    public function showListProduct()
    {
        $product = SanPham::where('So_luong', '>', 0)->limit(9)->get();
        return response()->json([
            'status' => 'success',
            'data' => $product
        ]);
    }
    public function showdetail($id)
    {
        $productdetail = SanPham::with(['danhMuc', 'thuongHieu'])->find($id);
        return response()->json([
            'status' => 'success',
            'data' => $productdetail
        ]);
    }
} 