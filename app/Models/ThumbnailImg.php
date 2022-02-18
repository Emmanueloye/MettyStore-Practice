<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThumbnailImg extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function productRel()
    // {
    //     return $this->belongsTo(Product::class, 'product_id', 'id');
    // }
}
