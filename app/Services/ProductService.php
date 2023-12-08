<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{

    public function getAll()
    {
        return Product::all();
    }

    public function storeProduct($data)
    {
        return Product::create([
            'am_title'             => $data['am_title'],
            'am_description'       => $data['am_description'],
            'am_short_description' => $data['am_short_description'],
            'ru_title'             => $data['ru_title'],
            'ru_description'       => $data['ru_description'],
            'ru_short_description' => $data['ru_short_description'],
            'en_title'             => $data['en_title'],
            'en_description'       => $data['en_description'],
            'en_short_description' => $data['en_short_description'],
            'price'                => $data['price'],
            'user_id'              => $data['user_id'],
        ]);
    }

    public function storeImages($id, $images)
    {
        foreach ($images as $image) {
            $imageName = Str::random(32).'.'.$image->getClientOriginalExtension(
                );

            Storage::put(
                '/productImages/'.$imageName,
                file_get_contents($image)
            );

            ProductImage::create([
                'image'      => $imageName,
                'product_id' => $id,
            ]);
        }

        return response()->noContent();
    }

    public function getOne($id)
    {
        return Product::find($id);
    }

    public function getUserProducts($user_id)
    {
        return Product::where('user_id', $user_id)->get();
    }

    public function update($id, array $data)
    {
        $product = Product::find($id);

        $product->update([
            'am_title'             => $data['am_title'],
            'am_description'       => $data['am_description'],
            'am_short_description' => $data['am_short_description'],
            'ru_title'             => $data['ru_title'],
            'ru_description'       => $data['ru_description'],
            'ru_short_description' => $data['ru_short_description'],
            'en_title'             => $data['en_title'],
            'en_description'       => $data['en_description'],
            'en_short_description' => $data['en_short_description'],
            'price'                => $data['price'],
            'img'                  => $data['img'],
            'user_id'              => $data['user_id'],
        ]);

        return $product;
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }

}
