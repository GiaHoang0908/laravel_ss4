<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryNews;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = News::all();
        return view('admin.news.index', [
            'model' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = CategoryNews::all();
        return view('admin.news.create', [
            'models' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->image;

        $ext = $request->image->extension();

        $request->image = time() . '-' . 'myphamohui-lgvina' . '.' . $ext;

        $file->move(public_path('upload/image/news'), $request->image);

        News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $request->image,
            'category_news_id' => $request->category_news_id,
            'content' => $request->desc,
        ]);
        return redirect()->route('admin.news.index');
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
        $news = News::find($id);

        $data = CategoryNews::all();
        return view('admin.news.edit', [
            'models' => $data,
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = News::FindOrFail($id);
        if ($request->has('image')) {
            if (file_exists('upload/image/news/' . $data->image) and !empty($data->image)) {
                unlink('upload/image/news/' . $data->image);
            }
            $file = $request->image;

            $ext = $request->image->extension();

            $request->image = time() . '-' . 'myphamohui-lgvina' . '.' . $ext;

            $file->move(public_path('upload/image/news'), $request->image);

            $result = $data->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->desc,
                'image' => $request->image,
                'category_news_id' => $request->category_news_id,
            ]);
            
            return redirect()->route('admin.news.edit', ['news'=> $id]);
        } else {
            $result = $data->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->desc,
                'category_news_id' => $request->category_news_id,
            ]);
           
            return redirect()->route('admin.news.edit', ['news'=> $id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();
        return redirect()->back();
    }
}
