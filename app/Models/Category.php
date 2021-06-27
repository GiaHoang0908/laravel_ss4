<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Category extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function productByparent($id)
    {
        $childrenCategories = Category::find($id)->children()->get();
        $getProductsByChildren = [];
        foreach ($childrenCategories as $childrenCategory) {
            $tmp = $childrenCategory->product()->get();

            array_push($getProductsByChildren, $tmp);
        }
        $allProduct = [];
        foreach ($getProductsByChildren as $i) {
            foreach ($i as $j) {
                array_push($allProduct, $j);
            }
        }
        return $allProduct;
    }


    public static function getProductByParentSlug($slug)
    {
        $arr = [];
        foreach (Category::where('slug', $slug)->with('children')->get() as $category) {
            if (count($category->children) > 0) {
                foreach ($category->children as $childrens) {
                    foreach ($childrens->product as $product)
                        array_push($arr, $product);
                };
            } else {
                foreach ($category->product as $product)
                    array_push($arr, $product);
            };
        };
        return $arr;
    }

    
}
