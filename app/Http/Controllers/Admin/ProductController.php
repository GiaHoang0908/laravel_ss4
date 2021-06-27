<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest\storeRequest;
use App\Http\Requests\ProductRequest\updateRequest;

use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderByDesc('id')->get();
        return view('Admin.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc = Category::all();
        return view('Admin.products.create', compact('danhmuc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request)
    {
        return $request->all();
        $prices = explode(',', $request->price);
        $price = '';
        foreach ($prices as $p) {
            $price = $price . $p;
        }
        $price = floatval($price);
        $request->merge(['price' => $price]);

        if ($request->has('image')) {

            $file = $request->image;

            $ext = $request->image->extension();

            $request->image = time() . '-' . 'myphamohui-lgvina' . '.' . $ext;

            $file->move(public_path('upload/image/product'), $request->image);
        }

        $result = Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'desc' => $request->desc,
            'image' => $request->image,
            'category_id' => $request->category_id,

        ]);

        if ($result) {
            return redirect()->route('admin.product.index')->with('success-product_store', 'Bạn đã thêm thành công!');
        }
        return redirect()->route('admin.product.create')->with('error-product_store', 'Có lỗi xảy ra vui lòng thử lại!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $danhmuc = Category::all();
        return view('Admin.products.edit', [
            'product' => $product,
            'danhmuc' => $danhmuc,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, $id)
    {
        $prices = explode(',', $request->price);
        $price = '';
        foreach ($prices as $p) {
            $price = $price . $p;
        }
        $price = floatval($price);
        $request->merge(['price' => $price]);

        if ($request->name == Product::find($id)->name || Product::where('name', '=', $request->name)->first() == null) {
            $data = Product::FindOrFail($id);
            if ($request->has('image')) {
                if (file_exists('upload/image/product/' . $data->image) and !empty($data->image)) {
                    unlink('upload/image/product/' . $data->image);
                }
                $file = $request->image;

                $ext = $request->image->extension();

                $request->image = time() . '-' . 'myphamohui-lgvina' . '.' . $ext;

                $file->move(public_path('upload/image/product'), $request->image);

                $result = $data->update([
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'price' => $price,
                    'amount' => $request->amount,
                    'sold' => $request->sold,
                    'desc' => $request->desc,
                    'image' => $request->image,
                    'category_id' => $request->category_id,
                ]);
                if ($result) {
                    return redirect()->route('admin.product.index')->with('success-product_update', 'Đã cập nhập thành công sản phẩm!');
                }
                return redirect()->route('admin.product.edit')->with('error-product_update', 'Có lỗi xảy ra vui lòng thử lại!');
            } else {
                $result = $data->update($request->all());
                if ($result) {
                    return redirect()->route('admin.product.index')->with('success-product_update', 'Đã cập nhập thành công sản phẩm!');
                }
                return redirect()->route('admin.product.edit')->with('error-product_update', 'Có lỗi xảy ra vui lòng thử lại!');
            }
        }

        return redirect()->to('admin/product/' . $id . '/edit')->with('error-product_update', 'Tên sản phẩm đã tồn tại, Vui lòng thử lại!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::withTrashed()->find($id);
        if (file_exists('upload/image/product/' . $data->image) and !empty($data->image)) {
            unlink('upload/image/product/' . $data->image);
        }
        $data = Product::withTrashed()->find($id);
        $data->forceDelete();
        return redirect()->back();
    }

    public function softDelete($id)
    {
        $result = Product::find($id)->delete();

        if ($result) {
            return redirect()->route('admin.product.index')->with('success-product_delete', 'Tên danh mục đã tồn tại, Vui lòng thử lại!');;
        }

        return redirect()->route('admin.product.index')->with('error-product_delete', 'Tên danh mục đã tồn tại, Vui lòng thử lại!');
    }

    public function trash()
    {
        $products = Product::onlyTrashed()->get();
        return view('Admin.products.trash', compact('products'));
    }
    public function unTrash($id)
    {
        $cat = Product::withTrashed()->find($id);
        $cat->restore();
        return redirect()->back();
    }
}
