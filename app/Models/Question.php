<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	/**
	 * 模型关联的数据表
	 * @var string
	 */
    protected $table = "questions";

    /**
     * 该模型是否自动维护时间戳
     * @var boolean
     */
    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['title', 'type', 'options', 'guid'];
}
