<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarSeries extends Model
{

    /**
     * 所属品牌
     */
    public function carBrand(){
        return $this->belongsTo('App\Models\CarBrand','brand_id');
    }

    /**
     * 所属厂商
     */
    public function carFactory(){
        return $this->belongsTo('App\Models\CarFactory','factory_id');
    }
}
