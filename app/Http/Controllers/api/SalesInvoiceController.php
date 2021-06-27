<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\DetailSalesInvoice;
use Illuminate\Http\Request;
use App\Models\SalesInvoice;

class SalesInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SalesInvoice::all();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = SalesInvoice::find($id);
        return $model;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = DetailSalesInvoice::find($id);
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
        $model = SalesInvoice::find($id);
        if ($request->has('update_info')) {
           
            $model->update( [
                'address' => $request->address,
                'deleted_at' => null,
                'delivery_date' => $model->delivery_date,
                'id' => $model->id,
                'name' =>  $request->name,
                'note' => $request->note,
                'phone_number' => $request->phone_number,
                'prepayment' => 0,
                'status' => $model->status,
                'total_price' => $model->total_price,
                'total_quantity' => $model->total_quantity,
                'user_id' => $model->user_id,
            ]);
            return $model;          
        }
        else
        {
            $model->update($request->all());
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
