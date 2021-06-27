<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\support\Facades\Auth;
use App\Http\Requests\SiteRequest\loginRequest;
use App\Http\Requests\SiteRequest\registerRequest;
use App\Models\User;

class SiteController extends Controller
{
    public function home()
    {
        $menus= Category::has('children')->get();

        //sales
        $flashsales = Product::inRandomOrder()->limit(3)->get();
        $sallalot   = Product::orderByDESC('sold')->take(8)->get();

        return view('side.site.home', [
            'menus' => $menus,
            'flashsales' => $flashsales,
            'sallalot' => $sallalot,
        ]);
    }

    public function getPro(Request $req, $slug)
    {
        $data = Category::getProByCate($slug);
        return response($data);
    }

    public function login(Request $request)
    {
       
        $login = Auth::guard('customer')->attempt($request->only('email', 'password'));
        if($login)
        {
            return true;
        }
        return false;
    }

    public function register(Request $request)
    {       
        $request->merge(['password' => bcrypt($request->password)]);
        $result = User::create($request->all());
        return $result;
        if($result) {
            return true;
        }
        return false;
    }

    public function logout()
    {
        return Auth::guard('customer')->logout();
       
    }
}
