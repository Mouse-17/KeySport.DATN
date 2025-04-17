<?php

namespace App\Http\Controllers;
use App\Models\San;
use Illuminate\Http\Request;

class SanController extends Controller
{
    public function showListYard(){
        try {
            $yard = San::paginate(9);
            return response()->json([
                'status' => 'success',
                'data' => $yard->items(),
                'pagination' => [
                    'current_page' => $yard->currentPage(),
                    'last_page' => $yard->lastPage(),
                    'per_page' => $yard->perPage(),
                    'total' => $yard->total()
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
    
    public function show($id)
    {
        $yarddetail = San::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $yarddetail
        ]);
    }

}
