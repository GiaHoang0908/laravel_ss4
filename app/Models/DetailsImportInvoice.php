<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsImportInvoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function inportInvoice()
    {
        return $this->hasOne(InportInvoice::class, 'id', 'import_invoices_id');
    }

    public function product()
    {
        return $this->has(Product::class, 'id', 'product_id');
    }
}
