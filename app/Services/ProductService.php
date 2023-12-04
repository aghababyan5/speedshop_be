<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getAll() {
        return Product::all();
    }

    public function store($data)
    {
        return Product::create([
            'am_title' => $data['am_title'],
            'am_description' => $data['am_description'],
            'am_short_description' => $data['am_short_description'],
            'ru_title' => $data['ru_title'],
            'ru_description' => $data['ru_description'],
            'ru_short_description' => $data['ru_short_description'],
            'en_title' => $data['en_title'],
            'en_description' => $data['en_description'],
            'en_short_description' => $data['en_short_description'],
            'price' => $data['price'],
            'img' => $data['img'],
            'user_id' => $data['user_id']
        ]);
    }

    public function getOne($id) {
        return Product::find($id);
    }

    public function getUserProducts($user_id) {
        return Product::where('user_id', $user_id)->get();
    }

    public function update(array $data) {
        $product = Product::query()->where('id', $data['id']);

        $product->update([
            'am_title' => $data['am_title'],
            'am_description' => $data['am_description'],
            'am_short_description' => $data['am_short_description'],
            'ru_title' => $data['ru_title'],
            'ru_description' => $data['ru_description'],
            'ru_short_description' => $data['ru_short_description'],
            'en_title' => $data['en_title'],
            'en_description' => $data['en_description'],
            'en_short_description' => $data['en_short_description'],
            'price' => $data['price'],
            'img' => $data['img'],
            'user_id' => $data['user_id']
        ]);

        return $product;
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }
}
