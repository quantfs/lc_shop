<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
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
