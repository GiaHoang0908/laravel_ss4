<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SiteRequest\loginRequest;
use App\Http\Requests\SiteRequest\registerRequest;

use App\Models\Product;
use App\Models\SalesInvoice;
use Carbon\Carbon;
use DB;

class SiteController extends Controller
{

    //dashboard view
    public function index()
    {
        //
        $user = User::all();
        // get total_price 
        $get_all_order_delivered = SalesInvoice::where('status', 'Đã giao')->get();
        $total = 0;
        foreach ($get_all_order_delivered as $h) {
            $total += $h->total_price;
        }

        //get total_price last month
        $get_all_order_delivered_last_month = SalesInvoice::whereMonth('created_at', Carbon::now()->subMonth()->month)->get();
        $total_last_month = 0;
        
        foreach ($get_all_order_delivered as $h) {
            $total_last_month += $h->total_price;
        }
        // get all record sales_invoice to day
        $get_all_sales_invoice = salesInvoice::all();
        $data = SalesInvoice::whereDate('created_at', DB::raw('CURDATE()'))->orderByDesc('created_at')->get();
        // all products
        $products = Product::all();
        return view('Admin.Site.Dashboard', [
            'hoadon' => $data,
            'user' => $user,
            'total' => $total,
            'total_last_month' => $total_last_month,
            'get_all_sales_invoice' => $get_all_sales_invoice,
            'products' => $products,
        ]);
    }

    // 404 not found
    public function denyAccess()
    {
        return view('admin.site.denyaccess');
    }

    //login view
    public function login()
    {
        return view('Admin.Site.Login');
    }
    //Post login
    public function  post_login(loginRequest $req)
    {
        $login = Auth::attempt($req->only('email', 'password'), $req->has('remember'));
        $email = $req->email;

        if ($login) {
            return redirect()->route('admin.dashboard')->with('success-post_login', 'Bạn đã đăng nhập thành công!');
        }
        return redirect()->route('auth.login')->with('error-post_login', 'Thông tin tài khoản hoặc mật khẩu không chính xác')->with('re-email', $email);
    }


    //register view
    public function register()
    {
        return view('Admin.Site.Register');
    }

    //post register
    public function post_register(registerRequest $req)
    {
        $req->merge(['password' => bcrypt($req->password)]);
        $reg = User::create($req->all());
        if ($reg) {
            return redirect()->route('auth.login')->with('success-post_register', 'Bạn đã đăng ký thành công!');
        }
        return redirect()->route('auth.register')->with('error-post_register', 'Có lỗi xảy ra vui lòng thử lại');
    }

    //logout
    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
