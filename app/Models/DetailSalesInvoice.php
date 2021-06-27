<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSalesInvoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function salesInvoice()
    {
        return $this->belongsTo(SalesInvoice::class, 'sales_invoice_id', 'id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
