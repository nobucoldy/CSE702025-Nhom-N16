<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    protected $fillable = ['codePro', 'quantity', 'export_date', 'receiver', 'note'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function productList()
{
    return $this->belongsTo(ProductsList::class, 'codePro', 'codePro');
}
}
