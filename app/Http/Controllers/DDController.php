<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class DDController extends Controller{
	/**
	 * 数据字典首页
	 */
	public function index(){
		return view("dd/index");
	}

	/**
	 * 读取数据信息
	 */
	public function loadtables(Request $request){
        //字段验证
        $dbdata = $request->all();
        if(!$dbdata['port']){
        	$dbdata['port'] = 3306;
        }
        $validator = Validator::make($dbdata, [
	            'host'     => 'required',
	            'dbname' => 'required',
	            'username' => 'required',
	            'password' => 'required',
	            'port' => 'numeric',
	        ]);
        if($validator->fails()){
            return mkresponse(-1,$validator->errors()->first());
        }
		$dsn = "mysql:host=".$dbdata['host'].";port=".$dbdata['port'].";dbname=".$dbdata['dbname'];
		try{
			$pdo = new \PDO($dsn, $dbdata['username'], $dbdata['password']);
		}catch(\Exception $e){
			return mkresponse(-1,'连接数据库失败，请检查相关配置');
		}
		//强制列名小写
		$pdo->setAttribute(\PDO::ATTR_CASE,\PDO::CASE_LOWER);
		$pdo->query('set names utf8;');
		//数据库信息数组
		$tables = array();
		//获取数据库表名称列表
		$sql = 'SHOW TABLE STATUS FROM '.$dbdata['dbname'];
		$result = $pdo->query($sql);
		$result->setFetchMode(\PDO::FETCH_ASSOC);
		$tables = array();
		foreach ($result->fetchAll() as $key => $value) {
			$tables[$key]['info'] = $value;
		}
		foreach ($tables as $key => $value) {
			$info = $value['info'];
			//获取表名
			$table_name = $info['name'];
			//获取改表的所有字段信息
			$sql="SHOW FULL FIELDS FROM ".$table_name;
			$result = $pdo->query($sql);
			$result->setFetchMode(\PDO::FETCH_ASSOC);
			$tables[$key]['fields'] = $result->fetchAll();
		}
		return mkresponse(0,'读取数据库信息成功',$tables);
	}
}
