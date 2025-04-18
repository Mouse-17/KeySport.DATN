<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use App\Models\SanPham;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showListProduct(Request $request)
    {
        try {
            // Lấy trang hiện tại từ request, mặc định là 1
            $page = $request->input('trang', 1);
            
            // Khởi tạo query builder
            $query = SanPham::join('danh_muc', 'san_pham.ID_Danhmuc', '=', 'danh_muc.id')
            ->join('thuong_hieu', 'san_pham.ID_Thuonghieu', '=', 'thuong_hieu.id')
            ->join('san_pham_mau_size', 'san_pham.id', '=', 'san_pham_mau_size.ID_SP')
            ->leftJoin('danh_gia', 'san_pham.id', '=', 'danh_gia.ID_SP')
            ->where('san_pham.So_luong', '>', 0)
            ->select(
                'san_pham.*',
                'thuong_hieu.Ten_thuong_hieu as Thuong_hieu',
                'danh_muc.Ten_danh_muc as Danh_muc',
                DB::raw('COALESCE(AVG(danh_gia.So_sao), 0) as diem_trung_binh'),
                DB::raw('COUNT(danh_gia.id) as tong_danh_gia')
            )
            ->groupBy('san_pham.id', 'thuong_hieu.Ten_thuong_hieu', 'danh_muc.Ten_danh_muc');
        

            if (!empty($request->input('tukhoa'))) {
                $search = $request->input('tukhoa');
                $query->where(function($q) use ($search) {
                    $q->where('san_pham.Ten_san_pham', 'like', "%{$search}%")
                    ->orWhere('san_pham.Mo_ta', 'like', "%{$search}%")
                    ->orWhere('san_pham.Gia', 'like', "%{$search}%")
                    ->orWhere('thuong_hieu.Ten_thuong_hieu', 'like', "%{$search}%")
                    ->orWhere('danh_muc.Ten_danh_muc', 'like', "%{$search}%");
                });
            }

            
            // Phân trang
            $products = $query->paginate(9, ['*'], 'trang', $page);
            
            return response()->json([
                'status' => 'success',
                'data' => $products->items(),
                'pagination' => [
                    'current_page' => $products->currentPage(),
                    'last_page' => $products->lastPage(),
                    'per_page' => $products->perPage(),
                    'total' => $products->total()
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lỗi khi lấy danh sách sản phẩm: ' . $e->getMessage()
            ], 500);
        }
    }

    public function sortProduct(Request $request)
    {
        try {
            $popular = $request->input('popular');
            $price = $request->input('price');
            $category = $request->input('category');
            $brand = $request->input('brand');
            $rating = $request->input('rating');
    
            $query = SanPham::join('danh_muc', 'san_pham.ID_Danhmuc', '=', 'danh_muc.id')
                ->join('thuong_hieu', 'san_pham.ID_Thuonghieu', '=', 'thuong_hieu.id')
                ->leftJoin('danh_gia', 'san_pham.id', '=', 'danh_gia.ID_SP')
                ->where('san_pham.So_luong', '>', 0)
                ->select(
                    'san_pham.id',
                    'san_pham.Ten_san_pham',
                    'san_pham.Hinh_anh',
                    'san_pham.Gia',
                    'san_pham.So_luong',
                    'san_pham.view',
                    'san_pham.created_at',
                    'thuong_hieu.Ten_thuong_hieu as Thuong_hieu',
                    'danh_muc.Ten_danh_muc as Danh_muc',
                    DB::raw('COALESCE(AVG(danh_gia.So_sao), 0) as diem_trung_binh'),
                    DB::raw('COUNT(danh_gia.id) as tong_danh_gia')
                )
                ->groupBy(
                    'san_pham.id',
                    'san_pham.Ten_san_pham',
                    'san_pham.Hinh_anh',
                    'san_pham.Gia',
                    'san_pham.So_luong',
                    'san_pham.view',
                    'san_pham.created_at',
                    'thuong_hieu.Ten_thuong_hieu',
                    'danh_muc.Ten_danh_muc'
                );
    
            // Sắp xếp theo phổ biến
            if (!empty($popular)) {
                switch ($popular) {
                    case 'Mới nhất':
                        $query->orderBy('san_pham.created_at', 'desc');
                        break;
                    case 'Cũ nhất':
                        $query->orderBy('san_pham.created_at', 'asc');
                        break;
                    case 'Phổ biến':
                        $query->orderBy('san_pham.view', 'desc');
                        break;
                }
            }
    
            // Sắp xếp theo giá
            if (!empty($price)) {
                switch ($price) {
                    case 'Thấp - Cao':
                        $query->orderBy('san_pham.Gia', 'asc');
                        break;
                    case 'Cao - Thấp':
                        $query->orderBy('san_pham.Gia', 'desc');
                        break;
                }
            }
    
            // Lọc theo danh mục
            if (!empty($category)) {
                $query->where('san_pham.ID_Danhmuc', $category);
            }
    
            // Lọc theo thương hiệu
            if (!empty($brand)) {
                $query->where('san_pham.ID_Thuonghieu', $brand);
            }
    
            // Lọc theo đánh giá (dùng HAVING)
            if ($request->filled('rating')) {
                $rating = (float) $request->rating;
                if ($rating >= 0 && $rating <= 5) {
                    $query->having(DB::raw('COALESCE(AVG(danh_gia.So_sao), 0)'), '>=', $rating);
                }
            }
    
            $products = $query->paginate(9);
    
            return response()->json([
                'status' => 'success',
                'data' => $products->items(),
                'pagination' => [
                    'current_page' => $products->currentPage(),
                    'last_page' => $products->lastPage(),
                    'per_page' => $products->perPage(),
                    'total' => $products->total()
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lỗi khi lọc sản phẩm: ' . $e->getMessage()
            ], 500);
        }
    }
    
    
    public function showdetail($id)
    {
        try {
            $productdetail = SanPham::with(['danhMuc', 'thuongHieu','san_pham_mau_size'])->find($id);
            if (!$productdetail) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Sản phẩm không tồn tại'
                ], 404);
            }
            
            return response()->json([
                'status' => 'success',
                'data' => $productdetail
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function bestseller(){
        try {
            $bestseller = SanPham::where('bestseller', '>', 0)->orderBy('bestseller', 'desc')->get();
            return response()->json([
                'status' => 'success',
                'data' => $bestseller
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }



} 