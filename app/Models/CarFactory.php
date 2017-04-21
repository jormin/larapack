<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarFactory extends Model
{

    /**
     * 所属品牌
     */
    public function carBrand(){
        return $this->belongsTo('App\Models\CarBrand','brand_id');
    }
}
