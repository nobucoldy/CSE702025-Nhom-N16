<?php 

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 

class Invent extends Model 
{ 
    use HasFactory; 

    protected $table = 'invent'; 

    protected $fillable = [ 
        'codePro', 
        'quantity', 
        'description', 
    ]; 

    // Mỗi sản phẩm tồn kho thuộc về một sản phẩm trong danh sách
    public function productList() 
    { 
        return $this->belongsTo(ProductsList::class, 'codePro', 'codePro'); 
    } 

    // Lấy nhà cung cấp thông qua sản phẩm
    public function supplier() 
    { 
        return $this->productList?->supplier(); 
    } 
}
