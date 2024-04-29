<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = false;

    public function category() {
        //return $this->belongsTo(Category::class, 'category_id', 'id');
        return $this->belongsTo(Category::class); // с конвенцией laravel
    }

    public function group() {
        return $this->belongsTo(Group::class); // с конвенцией laravel
    }

    public function tags() {
        $tags = $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
        $tagsTitles = '';
        foreach ($tags as $tag) {
            $tagsTitles = $tag;
        }
        return $tags;
        //return $this->belongsToMany(Tag::class); // с конвенцией laravel не работает, т.к. по ковенции из пивот таблиц s надо убирать, т.е. должно быть product_tag
    }

    public function colors() {
        return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
    }

    public function getImageUrlAttribute() {
        return url('storage/'.$this->preview_image);
    }

    public function productImages() {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}


