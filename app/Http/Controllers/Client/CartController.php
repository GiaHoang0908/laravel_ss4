<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Http\Requests\CustomerRequest\cusRequest;
use App\Models\DetailSalesInvoice;
use App\Models\SalesInvoice;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{

    public function AddCart(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id);

            $request->session()->put('Cart', $newCart);
        }
        $ses = $request->session()->get('Cart');
        $quantity = 0;
        foreach ($ses->products as $s) {
            $quantity = $s['quantity'];
        }


        return view('side.site.cart', compact('quantity'));
    }

    public function DeleteCart(Request $request, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteCart($id);

        if (count($newCart->products) > 0) {
            $request->session()->put('Cart', $newCart);
        } else {
            $request->session()->forget('Cart');
        }
        return view('side.site.cart');
    }

    public function viewListCart()
    {
        return view('side.product.listcart');
    }

    

    public function AddCartList(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id);

            $request->session()->put('Cart', $newCart);
        }
        return view('side.site.listcart');
    }

    public function DeleteItemCartList(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->DeleteItemCart($product, $id);
            $request->session()->put('Cart', $newCart);
        }
        return view('side.site.listcart');
    }

    public function DeleteCartList(Request $request, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteCartList($id);

        if (count($newCart->products) > 0) {
            $request->session()->put('Cart', $newCart);
        } else {
            $request->session()->forget('Cart');
        }
        return view('side.site.listcart');
    }

    public function UpdateCart(Request $request, $id, $quantity)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->updateCart($id, $quantity);

        $request->session()->put('Cart', $newCart);

        return view('side.site.listcart');
    }


    public function checkout()
    {
        if(Session('Cart'))
        {
            return view('side.product.checkout');
        }
        return redirect()->route('home')->with('error-checkout', "Bạn chưa mua sản phẩm nào.");
    }

    public function delivery_date()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $newdate = strtotime('+3 day', strtotime($date));
        return $newdate = date('Y-m-d H:i:s',$newdate);
    }
    public function post_checkout(cusRequest $request)
    {
        
        $cart = Session('Cart');

        $salesInvoice_id = SalesInvoice::create([
            'total_quantity' => $cart->totalQuantity,
            'total_price' => $cart->totalPrice,
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'note' => $request->note,
            'delivery_date' => $this->delivery_date(),
            'user_id' => Auth::guard('customer')->user()->id,
        ])->id;
        $salesInvoice = SalesInvoice::find($salesInvoice_id);
        foreach ($cart->products as $p)
        {

            DetailSalesInvoice::create([
                'sales_invoice_id' => $salesInvoice_id,
                'product_id' => $p['productInfo']->id,
                'quantity' => $p['quantity'],
                'price' => $p['price'],
            ]);
            
            $amount = Product::find($p['productInfo']->id);
            $newAmount = $amount->amount - $p['quantity'];
            $newSold = $amount->sold + $p['quantity'];
            Product::find($p['productInfo']->id)->update([
                'amount' => $newAmount,
                'sold' => $newSold,
            ]);
        }

        $email = Auth::guard('customer')->user()->email;
        Mail::send('mail.email_checkout',[
            'hoadon' => $salesInvoice,
        ] ,function ($message) use($email){
            $message->from('hoangpham2kt1@gmail.com');
            $message->to($email);
            
            $message->subject('Thông tin đơn hàng');
           
        });
        
        return view('side.product.chekcout_success', [
            'hoadon' => $salesInvoice,
        ]);
    }
}
