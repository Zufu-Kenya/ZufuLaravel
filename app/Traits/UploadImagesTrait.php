<?php

namespace App\Traits;

use App\Models\ProductImage;

trait UploadImagesTrait
{
    private function uploadImages($request, $product)
    {
        $product->productImages()->delete();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('produc_images', 'public');
                ProductImage::create(['image' => $imagePath, 'product_id' => $product->id]);
            }
        }
    }
}
