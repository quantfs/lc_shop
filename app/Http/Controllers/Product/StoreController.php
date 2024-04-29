<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $productImages = null;
        if(isset($data['product_images'])) {
            $productImages = $data['product_images'];
            unset($data['product_images']);
        }

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $tagsIds = null;
        if(isset($data['tags'])) {
            $tagsIds = $data['tags'];
            unset($data['tags']);
        }

        $colorsIds = 0;
        if(isset($data['colors'])) {
            $colorsIds = $data['colors'];
            unset( $data['colors']);
        }

        $product = Product::firstOrCreate([     // альтернативный способ создания уникальной записи
            'title' => $data['title'],
        ], $data);

        foreach ($productImages as $productImage) {
            $currentImages = ProductImage::where('product_id', $product->id)->get();
            if($currentImages->count() > 3) continue;

            $filePath = Storage::disk('public')->put('/images', $productImage);
            ProductImage::create([
                'product_id' => $product->id,
                'file_path' => $filePath,
            ]);
        }

        foreach ($tagsIds as $tagsId) {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tagsId
            ]);
        }

        foreach ($colorsIds as $colorsId) {
            ColorProduct::firstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorsId
            ]);
        }

        return redirect()->route('product.index');
    }
}
