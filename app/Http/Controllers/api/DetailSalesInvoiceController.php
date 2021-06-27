<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\DetailSalesInvoice;
use App\Models\SalesInvoice;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailSalesInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $arr = [];
        $model = DetailSalesInvoice::where('sales_invoice_id', $request->salesInvoice_id)->get();
        foreach($model as $i)
        {
            array_push($arr, $i);
        }
        
        return $arr;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DetailSalesInvoice::create($request->all());

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DetailSalesInvoice::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if($request->has('edit'))
        {
            $model = DetailSalesInvoice::find($id);    
            $salesInvoiceId = SalesInvoice::find($model->sales_invoice_id);
            $salesInvoiceId->update([
                'address' => $salesInvoiceId->address,
                'delivery_date' => $salesInvoiceId->delivery_date,
                'id' => $salesInvoiceId->id,
                'name' =>  $salesInvoiceId->name,
                'note' => $salesInvoiceId->note,
                'phone_number' => $salesInvoiceId->phone_number,
                'prepayment' => 0,
                'status' => $salesInvoiceId->status,
                'total_price' => ($salesInvoiceId->total_price - $model->price) + $request->price,
                'total_quantity' => ($salesInvoiceId->total_quantity - $model->quantity) + $request->quantity,
                'user_id' => $salesInvoiceId->user_id,
            ]);
            $product = Product::find($model->product_id);
            $product->update([
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $product->price,
                'amount' => ($product->amount + $model->quantity) - $request->quantity,
                'sold' => ($product->sold - $model->quantity) + $request->quantity,
                'desc' => $product->desc,
                'image' => $product->image,
                'category_id' => $product->category_id,
            ]);
    
            $model->update([
                'sales_invoice_id' => $model->sales_invoice_id,
                'product_id' => $model->product_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
            ]);
            return true;
        }
        else if($request->has('delete')) {
            $model = DetailSalesInvoice::find($id);    
            $salesInvoiceId = SalesInvoice::find($model->sales_invoice_id);
            $salesInvoiceId->update([
                'address' => $salesInvoiceId->address,
                'delivery_date' => $salesInvoiceId->delivery_date,
                'id' => $salesInvoiceId->id,
                'name' =>  $salesInvoiceId->name,
                'note' => $salesInvoiceId->note,
                'phone_number' => $salesInvoiceId->phone_number,
                'prepayment' => 0,
                'status' => $salesInvoiceId->status,
                'total_price' => $salesInvoiceId->total_price - $model->price,
                'total_quantity' => $salesInvoiceId->total_quantity - $model->quantity,
                'user_id' => $salesInvoiceId->user_id,
            ]);
            $product = Product::find($model->product_id);
            $product->update([
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $product->price,
                'amount' => $product->amount + $model->quantity,
                'sold' => $product->sold - $model->quantity,
                'desc' => $product->desc,
                'image' => $product->image,
                'category_id' => $product->category_id,
            ]);
    
            $model->delete();
            return true;
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
        //
    }
}
