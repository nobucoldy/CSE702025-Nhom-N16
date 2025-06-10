<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsList extends Model
{
    use HasFactory;

    protected $table = 'products_lists';

    protected $primaryKey = 'codePro';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'codePro',
        'name',
        'codeSup',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'codeSup', 'codeSup');
    }

    public function invents()
    {
        return $this->hasMany(Invent::class, 'codePro', 'codePro');
    }
}
