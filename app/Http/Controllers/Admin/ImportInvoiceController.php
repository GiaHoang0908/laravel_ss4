<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DetailsImportInvoice;
use App\Models\ImportInvoice;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ImportInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inportInvoice = ImportInvoice::all();
        return view('admin.inportinvoices.index', ['inportInvoice' => $inportInvoice]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::all();
        return view('admin.inportinvoices.create', compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $importInvoice_id = ImportInvoice::create([
            'supplier_id' => $request->supplier_id,
            'total_quantity' => $request->total_quantity,
            'total_price' => $request->total_price
        ])->id;
        foreach($request->cart as $c)
        {
            DetailsImportInvoice::create([
                'import_invoices_id' => $importInvoice_id,
                'product_id' => $c['id'],
                'quantity' => $c['quantity'],
                'price' => $c['price'],
            ]);
            $product = Product::find($c['id']);
            $product->update([
                'amount' => $product->amount + $c['quantity'],
            ]);
            
        }
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
        //
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
