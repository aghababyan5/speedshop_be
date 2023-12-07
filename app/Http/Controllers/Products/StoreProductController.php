<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class StoreProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function __invoke(StoreProductRequest $request): JsonResponse
    {
        $validated_data = $request->validated();
        $productWithoutImages = Arr::except($validated_data, 'images');
        $storedProductImages = $request->file('images');

        $this->service->storeProduct($productWithoutImages);

        $storedProductId = Product::latest()->first()->id;

        $this->service->storeImages($storedProductId, $storedProductImages);

        return response()->json([
            'message' => 'Product stored successfully'
        ]);
    }
}
