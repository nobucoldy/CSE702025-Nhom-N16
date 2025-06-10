<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $primaryKey = 'codeSup';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'codeSup',
        'supplier',
        'address',
    ];

    public function productLists()
    {
        return $this->hasMany(ProductsList::class, 'codeSup', 'codeSup');
    }

    public function invents()
    {
        return $this->hasManyThrough(Invent::class, ProductsList::class, 'codeSup', 'codePro', 'codeSup', 'codePro');
    }
}
