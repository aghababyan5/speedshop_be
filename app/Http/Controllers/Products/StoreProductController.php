<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

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

        $fileName = time().$request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('images', $fileName, 'public');
        $validated_data['img'] = '/storage/' . $path;

        $this->service->store($request->validated());

        return response()->json([
            'message' => 'Product stored successfully'
        ]);
    }
}
