<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryNews;
use App\Models\News;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    // all product
    public function all(Request $req)
    {
       
        if ($req->has('name')) {
            $result = Product::where('name', 'like', '%' . $req->name . '%');
            $all = $result->paginate(12);
            if ($req->orderBy) {
                switch ($req->orderBy) {
                    case 'ordering':
                        $result = $result->orderByDesc('view');
                        $all = $result->paginate(12);
                        break;
                    case 'created':
                        $result = $result->orderByDesc('created_at');
                        $all = $result->paginate(12);
                        break;
                    case 'sales':
                        $result = $result->orderByDesc('sold');
                        $all = $result->paginate(12);
                        break;
                    case 'price_asc':
                        $result = $result->orderBy('price');
                        $all = $result->paginate(12);
                        break;
                    case 'price_desc':
                        $result = $result->orderByDesc('price');
                        $all = $result->paginate(12);
                        break;
                }
            }
        } elseif ($req->orderBy) {
            if ($req->orderBy)
                switch ($req->orderBy) {
                    case 'ordering':
                        $result = Product::orderByDesc('view');
                        $all = $result->paginate(12);
                        break;
                    case 'created':
                        $result = Product::orderByDesc('created_at');
                        $all = $result->paginate(12);
                        break;
                    case 'sales':
                        $result = Product::orderByDesc('sold');
                        $all = $result->paginate(12);
                        break;
                    case 'price_asc':
                        $result = Product::orderBy('price');
                        $all = $result->paginate(12);
                        break;
                    case 'price_desc':
                        $result = Product::orderByDesc('price');
                        $all = $result->paginate(12);
                        break;
                }
        } else {
            $all = Product::paginate(12);
        }



        return view('side.product.all', [
            'all' => $all,
        ]);
    }

    // paginate
    private function phantrang(Request $request, $array)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $productCollection = collect($array);

        $perPage = 12;

        $currentPageproducts = $productCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();


        $paginatedproducts = new LengthAwarePaginator($currentPageproducts, count($productCollection), $perPage);


        return $paginatedproducts->setPath($request->url());
    }

    // sort asc
    function sap_xep_tang($mang, $value)
    {
        $sophantu = count($mang);
        // Sắp xếp mảng
        for ($i = 0; $i < ($sophantu - 1); $i++) {
            for ($j = $i + 1; $j < $sophantu; $j++) {

                if ($mang[$i]->$value > $mang[$j]->$value) {
                    // hoán vị
                    $tmp = $mang[$j];
                    $mang[$j] = $mang[$i];
                    $mang[$i] = $tmp;
                }
            }
        }
        return $mang;
    }

    // sort desc
    function sap_xep_giam($mang, $value)
    {
        $sophantu = count($mang);
        // Sắp xếp mảng
        for ($i = 0; $i < ($sophantu - 1); $i++) {
            for ($j = $i + 1; $j < $sophantu; $j++) // lặp các phần tử phía sau
            {
                if ($mang[$i]->$value < $mang[$j]->$value) // nếu phần tử $i bé hơn phần tử phía sau
                {
                    // hoán vị
                    $tmp = $mang[$j];
                    $mang[$j] = $mang[$i];
                    $mang[$i] = $tmp;
                }
            }
        }
        return $mang;
    }

    //get product by Category_slug
    public function danhmuc(Request $req, $slug)
    {
        $categoryName = Category::where('slug', $slug)->first();
        $danhmuc = Category::getProductByParentSlug($slug);
        $paginate = $this->phantrang($req, $danhmuc);
        if ($req->orderBy)
            switch ($req->orderBy) {
                case 'ordering':
                    $danhmuc = $this->sap_xep_giam($danhmuc, 'view');
                    $paginate = $this->phantrang($req, $danhmuc);
                    break;
                case 'created':
                    $danhmuc = $this->sap_xep_giam($danhmuc, 'created_at');
                    $paginate = $this->phantrang($req, $danhmuc);

                    break;
                case 'sales':
                    $danhmuc = $this->sap_xep_giam($danhmuc, 'sold');
                    $paginate = $this->phantrang($req, $danhmuc);
                    break;
                case 'price_asc':
                    $danhmuc = $this->sap_xep_tang($danhmuc, 'price');
                    $paginate = $this->phantrang($req, $danhmuc);
                    break;
                case 'price_desc':
                    $danhmuc = $this->sap_xep_giam($danhmuc, 'price');
                    $paginate = $this->phantrang($req, $danhmuc);
                    break;
            }
            
        return view('side.product.danhmuc', [
            'categoryName' => $categoryName,
            'danhmuc' => $paginate,
        ]);
    }

    //News
    public function news() {
        $data = News::paginate(10);
        $menu = CategoryNews::all();
        if(request()->s)
        {
            $data = News::where('title', 'like', '%' . request()->s . '%')->paginate(10);
        }
        return view('side.news.index', [
            'menu' => $menu,
            'models' => $data,
        ]);
    }

    public function getByCategory_news() 
    {
        $menu = CategoryNews::all();
        $cat = CategoryNews::where('slug', request()->slug)->get();
        $data = News::where('category_news_id', $cat[0]->id)->paginate(10);
        return view('side.news.index', [
            'menu' => $menu,
            'models' => $data,
        ]);
    }
    public function detailNews($slug)
    {
        $menu = CategoryNews::all();
        $data = News::where('slug', $slug)->get();
        return view('side.news.show', compact('menu', 'data'));
    }
    //get detail product
    public function detail(Request $req, $slug)
    {

        if ($slug != 'all' && $slug != 'cart' && $slug != 'tin-tuc') {
            $product = Product::where('slug', $slug)->first();
            if ($product) {
                $product->update([
                    'view' =>  $product->view + 1,
                ]);
                return view('side.product.detailProduct', [
                    'product' => $product,
                ]);
            } else {
                return redirect()->route('home');
            }
        } else if ($slug == 'all') {
            return $this->all($req);
        } else if ($slug == 'cart') {
            return view('side.product.listcart');
        } else if ($slug == 'tin-tuc') {
            return $this->news();
        }
    }

    public function renderProduct(Request $request)
    {
        if ($request->ajax()) {
            $listID = $request->id;
            $products = Product::whereIn('id', $listID)->get();
            $html = view('side.product.renderProduct', compact('products'));
            return $html;
        }
    }
}
