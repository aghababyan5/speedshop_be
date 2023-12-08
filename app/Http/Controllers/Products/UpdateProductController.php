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

    public function __invoke(UpdateProductRequest $request, $id): JsonResponse
    {
        $validated_data = $request->validated();

        $fileName = time().$request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('images', $fileName, 'public');
        $validated_data['img'] = '/storage/' . $path;

        $this->service->update($id, $validated_data);

        return response()->json([
            'message' => 'Product updated successfully',
        ]);
    }
}

