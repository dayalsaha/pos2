<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Purchase extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function rel_to_vendor(){
        return $this->belongsTo(Vendor::class, 'vendor_id','id');
    }

    public function rel_to_category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function rel_to_warehouse(){
        return $this->belongsTo(Warehouse::class, 'warehouse_id','id');
    }






}
