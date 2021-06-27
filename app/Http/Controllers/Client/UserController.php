<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\SalesInvoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomerRequest\cusRequest;

class UserController extends Controller
{
    public function profile()
    {
        if (Auth::guard('customer')->check()) {
            return view('side.users.accounts.profile');
        } else {
            return redirect()->route('home');
        }
    }

    public function post_profile(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            $avatar = "";
            if ($request->avatar) {
                $imageName = time() . '.' . $request->avatar->extension();
                $request->avatar->move(public_path('upload/image/user'), $imageName);
                $avatar = $imageName;
            }
            $user = User::find(Auth::guard('customer')->user()->id);
            $user->update([
                'name' => $request->name ? $request->name : "",
                'phone_number' => $request->phone_number ? $request->phone_number : "",
                'address' => $request->address ? $request->address : "",
                'avatar' => $avatar,
            ]);
            return redirect()->back();
        } else {
            return redirect()->route('home');
        }
    }

    public function purchase()
    {
        if (Auth::guard('customer')->check()) {
            $all = SalesInvoice::where('user_id', Auth::guard('customer')->user()->id)->withTrashed()->orderByDESC('created_at')->orderByDESC('deleted_at')->get();

            $cxn = SalesInvoice::where('user_id', Auth::guard('customer')->user()->id)->where('status', 'Chưa xử lý')->orderByDESC('created_at')->get();
            $clh = SalesInvoice::where('user_id', Auth::guard('customer')->user()->id)->where('status', 'Chờ lấy hàng')->orderByDESC('created_at')->get();
            $dg = SalesInvoice::where('user_id', Auth::guard('customer')->user()->id)->where('status', 'Đang giao')->orderByDESC('created_at')->get();
            $dag = SalesInvoice::where('user_id', Auth::guard('customer')->user()->id)->where('status', 'Đã giao')->orderByDESC('created_at')->get();
            $dh = SalesInvoice::onlyTrashed()->where('user_id', Auth::guard('customer')->user()->id)->orderByDESC('deleted_at')->get();

            return view('side.users.purchase.purchase', [
                'all' => $all,

                'cxn' => $cxn,

                'clh' => $clh,

                'dg' => $dg,

                'dag' => $dag,

                'dh' => $dh,
            ]);
        } else {
            return redirect()->route('home');
        }
    }

    public function order(Request $request, $id)
    {
        if (Auth::guard('customer')->check()) {
            $ctdh = SalesInvoice::withTrashed()->find($id);
            return view('side.users.purchase.order', [
                'ctdh' => $ctdh,
            ]);
        } else {
            return redirect()->route('home');
        }
    }

    public function updateInfo(cusRequest $request, $id)
    {
        $user = SalesInvoice::find($id);
        $user->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);
        return redirect()->back();
    }
}
