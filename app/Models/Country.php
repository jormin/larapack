<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	/**
	 * 模型关联的数据表
	 * @var string
	 */
    protected $table = "countries";

    /**
     * 该模型是否自动维护时间戳
     * @var boolean
     */
    public $timestamps = false;
}
