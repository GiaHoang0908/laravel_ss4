<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportInvoice extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }
    
    public function detailsImportInvoice()
    {
        return $this->hasMany(DetailsImportInvoice::class, 'import_invoices_id', 'id');
    }
}
