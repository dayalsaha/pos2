<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rel_to_vendor(){
        return $this->belongsTo(Vendor::class, 'vendor_id','id');
    }

    public function rel_to_unit(){
        return $this->belongsTo(Unit::class, 'unit_id','id');
    }

    public function rel_to_category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }


}
