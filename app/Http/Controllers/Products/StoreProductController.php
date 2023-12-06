<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

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

        if ($image = $request->file('img')) {
            $fileName = random_int(1, 1000) . '_' . $image->getClientOriginalName();
            Storage::put('products/' . $fileName, file_get_contents($image));

            $validated_data['img'] = $fileName;
        }

        $this->service->store($validated_data);

        return response()->json([
            'message' => 'Product stored successfully'
        ]);
    }
}
