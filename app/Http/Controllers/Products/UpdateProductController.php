<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function __invoke(UpdateProductRequest $request): JsonResponse
    {
        $this->service->update($request->validated());

        return response()->json([
            'message' => 'Product updated successfully',
        ]);
    }
}

