<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest\storeRequest;
use App\Http\Requests\CategoryRequest\updateRequest;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Category::all();
        return view('Admin.categories.index', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = Category::where('parent_id', 0)->get();
        return view('Admin.categories.create', compact('parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request)
    {
        $pr_id = 0;
        if ($request->parent_id) {
            $pr_id = $request->parent_id;
        }
        $result = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'parent_id' => $pr_id,
        ]);

        if ($result) {
            return redirect()->route('admin.category.index')->with('success-category_store', 'Bạn đã thêm thành công một danh mục!');
        }
        return redirect()->route('admin.category.create')->with('error-category_store', 'Thêm thất bại, Vui lòng thử lại!');
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
        $cat = Category::find($id);
        $parent = Category::where('parent_id', 0)->get();
        return view('Admin.categories.edit', [
            'cat' => $cat,
            'parent' => $parent,
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
        if ($request->name == Category::find($id)->name || Category::where('name', '=', $request ->name)->first() == null)
        {

            $category = Category::find($id);
            $pr_id = 0;
            if ($request->parent_id) {
                $pr_id = $request->parent_id;
            }
            $result = $category->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'parent_id' => $pr_id,
            ]);

            if ($result) {
                return redirect()->route('admin.category.index')->with('success-category_update', 'Bạn đã thay đổi thành công một danh mục!');
            }
            return redirect()->to('admin/category/'.$id.'/edit')->with('error-category_update', 'Thông tin chưa được thay đổi, Vui lòng thử lại!');
            
        }

        return redirect()->to('admin/category/'.$id.'/edit')->with('error-category_update', 'Tên danh mục đã tồn tại, Vui lòng thử lại!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::withTrashed()->find($id);
        $data->forceDelete();

        $proByCat = Product::withTrashed()->where('category_id', $id)->get();
        foreach($proByCat as $p)
        {
            Product::withTrashed()->find($p->id)->forceDelete();
        }

        return redirect()->back();
    }

    public function softDelete($id)
    {
        
        $result = Category::find($id)->delete();
        $proByCat = Product::where('category_id', $id)->get();
        foreach($proByCat as $p)
        {
            Product::find($p->id)->delete();
        }

        if($result)
        {
            return redirect()->route('admin.category.index')->with('success-category_delete', 'Tên danh mục đã tồn tại, Vui lòng thử lại!');;
        }

        return redirect()->route('admin.category.index')->with('error-category_delete', 'Tên danh mục đã tồn tại, Vui lòng thử lại!');
    }

    public function trash()
    {
        $cat = Category::onlyTrashed()->get();
        return view('Admin.categories.trash', compact('cat'));
    }
    public function unTrash($id)
    {
        $cat = Category::withTrashed()->find($id);
        $cat->restore();
        return redirect()->back();
    }
}
