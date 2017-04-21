<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarSpec extends Model
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

    /**
     * 所属车系
     */
    public function carSeries(){
        return $this->belongsTo('App\Models\CarSeries','series_id');
    }

    /**
     * 所属年份
     */
    public function carYear(){
        return $this->belongsTo('App\Models\CarYear','year_id');
    }
}
