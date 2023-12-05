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

        if ($request->file('img')) {
            $fileName = time() . $request->file('img')->getClientOriginalName();

            // Assuming 'images' is the disk you want to use
            Storage::put('images/' . $fileName, file_get_contents($request->file('img')));

            $validated_data['img'] = $fileName;
        }

        $this->service->store($validated_data);

        return response()->json([
            'message' => 'Product stored successfully'
        ]);
    }
}
