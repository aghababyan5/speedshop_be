<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class GetAllProductsController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function __invoke(): JsonResponse
    {
        return response()->json([
            'all_products' => $this->service->getAll()
        ]);
    }
}
