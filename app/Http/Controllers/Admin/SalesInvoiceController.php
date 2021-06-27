<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DetailSalesInvoice;
use App\Models\Product;
use App\Models\SalesInvoice;
use Illuminate\Http\Request;
use PDF;

class SalesInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SalesInvoice::orderByDesc('created_at')->get();

        return view(
            'admin.salesinvoices.index',
            [
                'hoadon' => $data,
            ]
        );
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data = DetailSalesInvoice::where('sales_invoice_id', $id)->get();

        return view('admin.salesinvoices.show', [
            'cthoadon' => $data,
        ]);
    }
    public function pdf($id)
    {
        $cthoadon = DetailSalesInvoice::where('sales_invoice_id', $id)->get();
        $pdf = PDF::loadView('admin.salesinvoices.exportPDF', compact('cthoadon'));
        $filename = 'hoadon'.$id.'.pdf';
        return $pdf->download($filename);
        // $cthoadon = DetailSalesInvoice::where('sales_invoice_id', $id)->get();
        // return view('admin.salesinvoices.exportPDF', compact('cthoadon'));
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
        if($request->has('status'))
        {
            $result = SalesInvoice::find($id);
            $result->update([
                'status' => $request->status,
            ]);
            return redirect()->back();
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
        $data = SalesInvoice::withTrashed()->find($id);
        $data->forceDelete();
        $cthd = DetailSalesInvoice::where('sales_invoice_id', $id)->get();
        foreach($cthd as $c)
        {
            DetailSalesInvoice::find($c->id)->delete();
        }
        return redirect()->back();
    }

    public function softDelete($id)
    {
        $cthoadon = DetailSalesInvoice::where('sales_invoice_id', $id)->get();
        
        foreach($cthoadon as $c)
        {
            Product::find($c->product_id)->update([
                'amount' => Product::find($c->product_id)->amount + $c->quantity,
                'sold' => Product::find($c->product_id)->sold - $c->quantity,
            ]);
            
        }
        
        $result = SalesInvoice::find($id)->delete();
        
        return redirect()->back();
       
    }

    public function trash()
    {
        $hoadon = SalesInvoice::onlyTrashed()->orderByDESC('deleted_at')->get();
        return view('admin.salesinvoices.trash', compact('hoadon'));
    }

    public function unTrash($id)
    {
        $cat = SalesInvoice::withTrashed()->find($id);
        $cat->restore();

        $cthoadon = DetailSalesInvoice::where('sales_invoice_id', $id)->get();
        foreach($cthoadon as $c)
        {
            Product::find($c->product_id)->update([
                'amount' => Product::find($c->product_id)->amount - $c->quantity,
                'sold' => Product::find($c->product_id)->sold + $c->quantity,
            ]);
            
        }
        return redirect()->back();
    }
}
