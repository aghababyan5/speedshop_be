<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetUserProductsController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function __invoke($user_id): JsonResponse
    {
        return response()->json([
            'products' => $this->service->getUserProducts($user_id)
        ]);
    }
}
