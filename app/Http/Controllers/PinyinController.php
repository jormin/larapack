<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Overtrue\Pinyin\Pinyin;

class PinyinController extends Controller
{
    /**
     * 中文转拼音
     */
    public function index(){
        return view('pinyin.index');
    }

    /**
     * 转换
     */
    public function convert(Request $request){
        $text = $request->input('text');
        if(!$text){
            return redirect()->back()->withErrors(['请输入待转换文字']);
        }
        $pinyin = new Pinyin();
        $data = [
            '不带音调' => implode($pinyin->convert($text),' '),
            '数字音调' => implode($pinyin->convert($text,'ascii'),' '),
            'UNICODE音调' => implode($pinyin->convert($text,'unicode'),' '),
            '链接（默认）' => $pinyin->permalink($text),
            '链接（.）' => $pinyin->permalink($text,'.'),
            '首字符字符串' => $pinyin->abbr($text),
            '翻译符号' => $pinyin->sentence($text),
            '姓名' => implode($pinyin->name($text),' ')
        ];
        return view('pinyin.convert',compact('text','data'));
    }
}
