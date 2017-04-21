<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use App\Models\CarFactory;
use App\Models\CarSeries;
use App\Models\CarSpec;
use App\Models\CarYear;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Yangqi\Htmldom\Htmldom;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brand_id = $request->input('brand');
        $factory_id = $request->input('factory');
        $series_id = $request->input('series');
        $year_id = $request->input('year');
        $specs = null;
        $factories = array();
        $series = array();
        $years = array();
        $query = CarSpec::query();

        if($brand_id){
            $query = $query->where('brand_id',$brand_id);
            $factories = CarFactory::where('brand_id',$brand_id)->get();
        }
        if($factory_id){
            $query = $query->where('factory_id',$factory_id);
            $series = CarSeries::where('factory_id',$factory_id)->get();
        }
        if($series_id){
            $query = $query->where('series_id',$series_id);
            $years = CarYear::where('series_id',$series_id)->get();
        }
        if($year_id){
            $query = $query->where('year_id', $year_id);
        }

        $specs = $query->paginate(30);

        $brands = CarBrand::get();
        return view('cars/index',compact('specs','brands','factories','series','years','brand_id','factory_id','series_id','year_id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 导入品牌
//        $htmlstr = '<div data-type="list" class="select-option" style="display: none;"><dl data-type="1"><dd data-parent="carbrand" data-target="carseries" data-key="117"><b>A</b><a target="_self" href="javascript:void(0);">AC Schnitzer</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="276"><b>A</b><a target="_self" href="javascript:void(0);">ALPINA</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="34"><b>A</b><a target="_self" href="javascript:void(0);">阿尔法·罗密欧</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="35"><b>A</b><a target="_self" href="javascript:void(0);">阿斯顿·马丁</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="221"><b>A</b><a target="_self" href="javascript:void(0);">安凯客车</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="33"><b>A</b><a target="_self" href="javascript:void(0);">奥迪</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="140"><b>B</b><a target="_self" href="javascript:void(0);">巴博斯</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="120"><b>B</b><a target="_self" href="javascript:void(0);">宝骏</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="15"><b>B</b><a target="_self" href="javascript:void(0);">宝马</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="231"><b>B</b><a target="_self" href="javascript:void(0);">宝沃</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="40"><b>B</b><a target="_self" href="javascript:void(0);">保时捷</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="27"><b>B</b><a target="_self" href="javascript:void(0);">北京</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="203"><b>B</b><a target="_self" href="javascript:void(0);">北汽幻速</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="173"><b>B</b><a target="_self" href="javascript:void(0);">北汽绅宝</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="143"><b>B</b><a target="_self" href="javascript:void(0);">北汽威旺</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="208"><b>B</b><a target="_self" href="javascript:void(0);">北汽新能源</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="154"><b>B</b><a target="_self" href="javascript:void(0);">北汽制造</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="36"><b>B</b><a target="_self" href="javascript:void(0);">奔驰</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="95"><b>B</b><a target="_self" href="javascript:void(0);">奔腾</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="14"><b>B</b><a target="_self" href="javascript:void(0);">本田</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="271"><b>B</b><a target="_self" href="javascript:void(0);">比速汽车</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="75"><b>B</b><a target="_self" href="javascript:void(0);">比亚迪</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="13"><b>B</b><a target="_self" href="javascript:void(0);">标致</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="38"><b>B</b><a target="_self" href="javascript:void(0);">别克</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="39"><b>B</b><a target="_self" href="javascript:void(0);">宾利</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="37"><b>B</b><a target="_self" href="javascript:void(0);">布加迪</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="79"><b>C</b><a target="_self" href="javascript:void(0);">昌河</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="76"><b>C</b><a target="_self" href="javascript:void(0);">长安</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="163"><b>C</b><a target="_self" href="javascript:void(0);">长安商用</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="77"><b>C</b><a target="_self" href="javascript:void(0);">长城</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="196"><b>C</b><a target="_self" href="javascript:void(0);">成功汽车</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="169"><b>D</b><a target="_self" href="javascript:void(0);">DS</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="92"><b>D</b><a target="_self" href="javascript:void(0);">大发</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="1"><b>D</b><a target="_self" href="javascript:void(0);">大众</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="41"><b>D</b><a target="_self" href="javascript:void(0);">道奇</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="32"><b>D</b><a target="_self" href="javascript:void(0);">东风</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="187"><b>D</b><a target="_self" href="javascript:void(0);">东风风度</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="259"><b>D</b><a target="_self" href="javascript:void(0);">东风风光</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="113"><b>D</b><a target="_self" href="javascript:void(0);">东风风神</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="165"><b>D</b><a target="_self" href="javascript:void(0);">东风风行</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="142"><b>D</b><a target="_self" href="javascript:void(0);">东风小康</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="81"><b>D</b><a target="_self" href="javascript:void(0);">东南</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="42"><b>F</b><a target="_self" href="javascript:void(0);">法拉利</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="11"><b>F</b><a target="_self" href="javascript:void(0);">菲亚特</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="3"><b>F</b><a target="_self" href="javascript:void(0);">丰田</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="141"><b>F</b><a target="_self" href="javascript:void(0);">福迪</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="197"><b>F</b><a target="_self" href="javascript:void(0);">福汽启腾</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="8"><b>F</b><a target="_self" href="javascript:void(0);">福特</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="96"><b>F</b><a target="_self" href="javascript:void(0);">福田</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="282"><b>F</b><a target="_self" href="javascript:void(0);">福田乘用车</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="112"><b>G</b><a target="_self" href="javascript:void(0);">GMC</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="152"><b>G</b><a target="_self" href="javascript:void(0);">观致</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="116"><b>G</b><a target="_self" href="javascript:void(0);">光冈</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="82"><b>G</b><a target="_self" href="javascript:void(0);">广汽传祺</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="108"><b>G</b><a target="_self" href="javascript:void(0);">广汽吉奥</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="24"><b>H</b><a target="_self" href="javascript:void(0);">哈飞</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="181"><b>H</b><a target="_self" href="javascript:void(0);">哈弗</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="150"><b>H</b><a target="_self" href="javascript:void(0);">海格</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="86"><b>H</b><a target="_self" href="javascript:void(0);">海马</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="267"><b>H</b><a target="_self" href="javascript:void(0);">汉腾汽车</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="43"><b>H</b><a target="_self" href="javascript:void(0);">悍马</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="164"><b>H</b><a target="_self" href="javascript:void(0);">恒天</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="91"><b>H</b><a target="_self" href="javascript:void(0);">红旗</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="245"><b>H</b><a target="_self" href="javascript:void(0);">华凯</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="237"><b>H</b><a target="_self" href="javascript:void(0);">华利</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="85"><b>H</b><a target="_self" href="javascript:void(0);">华普</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="220"><b>H</b><a target="_self" href="javascript:void(0);">华颂</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="87"><b>H</b><a target="_self" href="javascript:void(0);">华泰</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="260"><b>H</b><a target="_self" href="javascript:void(0);">华泰新能源</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="97"><b>H</b><a target="_self" href="javascript:void(0);">黄海</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="46"><b>J</b><a target="_self" href="javascript:void(0);">Jeep</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="25"><b>J</b><a target="_self" href="javascript:void(0);">吉利汽车</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="84"><b>J</b><a target="_self" href="javascript:void(0);">江淮</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="119"><b>J</b><a target="_self" href="javascript:void(0);">江铃</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="210"><b>J</b><a target="_self" href="javascript:void(0);">江铃集团轻汽</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="270"><b>J</b><a target="_self" href="javascript:void(0);">江铃集团新能源</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="44"><b>J</b><a target="_self" href="javascript:void(0);">捷豹</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="83"><b>J</b><a target="_self" href="javascript:void(0);">金杯</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="145"><b>J</b><a target="_self" href="javascript:void(0);">金龙</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="175"><b>J</b><a target="_self" href="javascript:void(0);">金旅</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="151"><b>J</b><a target="_self" href="javascript:void(0);">九龙</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="109"><b>K</b><a target="_self" href="javascript:void(0);">KTM</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="156"><b>K</b><a target="_self" href="javascript:void(0);">卡尔森</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="224"><b>K</b><a target="_self" href="javascript:void(0);">卡升</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="199"><b>K</b><a target="_self" href="javascript:void(0);">卡威</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="101"><b>K</b><a target="_self" href="javascript:void(0);">开瑞</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="47"><b>K</b><a target="_self" href="javascript:void(0);">凯迪拉克</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="214"><b>K</b><a target="_self" href="javascript:void(0);">凯翼</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="219"><b>K</b><a target="_self" href="javascript:void(0);">康迪全球鹰</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="100"><b>K</b><a target="_self" href="javascript:void(0);">科尼赛克</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="9"><b>K</b><a target="_self" href="javascript:void(0);">克莱斯勒</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="241"><b>L</b><a target="_self" href="javascript:void(0);">LOCAL MOTORS</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="118"><b>L</b><a target="_self" href="javascript:void(0);">Lorinser</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="48"><b>L</b><a target="_self" href="javascript:void(0);">兰博基尼</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="54"><b>L</b><a target="_self" href="javascript:void(0);">劳斯莱斯</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="52"><b>L</b><a target="_self" href="javascript:void(0);">雷克萨斯</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="10"><b>L</b><a target="_self" href="javascript:void(0);">雷诺</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="124"><b>L</b><a target="_self" href="javascript:void(0);">理念</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="80"><b>L</b><a target="_self" href="javascript:void(0);">力帆汽车</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="89"><b>L</b><a target="_self" href="javascript:void(0);">莲花汽车</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="78"><b>L</b><a target="_self" href="javascript:void(0);">猎豹汽车</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="51"><b>L</b><a target="_self" href="javascript:void(0);">林肯</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="53"><b>L</b><a target="_self" href="javascript:void(0);">铃木</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="204"><b>L</b><a target="_self" href="javascript:void(0);">陆地方舟</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="88"><b>L</b><a target="_self" href="javascript:void(0);">陆风</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="49"><b>L</b><a target="_self" href="javascript:void(0);">路虎</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="50"><b>L</b><a target="_self" href="javascript:void(0);">路特斯</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="20"><b>M</b><a target="_self" href="javascript:void(0);">MG</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="56"><b>M</b><a target="_self" href="javascript:void(0);">MINI</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="58"><b>M</b><a target="_self" href="javascript:void(0);">马自达</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="57"><b>M</b><a target="_self" href="javascript:void(0);">玛莎拉蒂</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="55"><b>M</b><a target="_self" href="javascript:void(0);">迈巴赫</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="129"><b>M</b><a target="_self" href="javascript:void(0);">迈凯伦</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="168"><b>M</b><a target="_self" href="javascript:void(0);">摩根</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="130"><b>N</b><a target="_self" href="javascript:void(0);">纳智捷</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="213"><b>N</b><a target="_self" href="javascript:void(0);">南京金龙</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="60"><b>O</b><a target="_self" href="javascript:void(0);">讴歌</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="59"><b>O</b><a target="_self" href="javascript:void(0);">欧宝</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="146"><b>O</b><a target="_self" href="javascript:void(0);">欧朗</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="61"><b>P</b><a target="_self" href="javascript:void(0);">帕加尼</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="26"><b>Q</b><a target="_self" href="javascript:void(0);">奇瑞</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="122"><b>Q</b><a target="_self" href="javascript:void(0);">启辰</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="62"><b>Q</b><a target="_self" href="javascript:void(0);">起亚</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="235"><b>Q</b><a target="_self" href="javascript:void(0);">前途</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="63"><b>R</b><a target="_self" href="javascript:void(0);">日产</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="19"><b>R</b><a target="_self" href="javascript:void(0);">荣威</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="174"><b>R</b><a target="_self" href="javascript:void(0);">如虎</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="103"><b>R</b><a target="_self" href="javascript:void(0);">瑞麒</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="45"><b>S</b><a target="_self" href="javascript:void(0);">smart</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="269"><b>S</b><a target="_self" href="javascript:void(0);">SWM斯威汽车</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="64"><b>S</b><a target="_self" href="javascript:void(0);">萨博</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="205"><b>S</b><a target="_self" href="javascript:void(0);">赛麟</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="68"><b>S</b><a target="_self" href="javascript:void(0);">三菱</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="149"><b>S</b><a target="_self" href="javascript:void(0);">陕汽通家</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="155"><b>S</b><a target="_self" href="javascript:void(0);">上汽大通</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="66"><b>S</b><a target="_self" href="javascript:void(0);">世爵</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="90"><b>S</b><a target="_self" href="javascript:void(0);">双环</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="69"><b>S</b><a target="_self" href="javascript:void(0);">双龙</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="162"><b>S</b><a target="_self" href="javascript:void(0);">思铭</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="65"><b>S</b><a target="_self" href="javascript:void(0);">斯巴鲁</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="238"><b>S</b><a target="_self" href="javascript:void(0);">斯达泰克</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="67"><b>S</b><a target="_self" href="javascript:void(0);">斯柯达</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="202"><b>T</b><a target="_self" href="javascript:void(0);">泰卡特</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="133"><b>T</b><a target="_self" href="javascript:void(0);">特斯拉</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="161"><b>T</b><a target="_self" href="javascript:void(0);">腾势</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="102"><b>W</b><a target="_self" href="javascript:void(0);">威麟</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="99"><b>W</b><a target="_self" href="javascript:void(0);">威兹曼</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="192"><b>W</b><a target="_self" href="javascript:void(0);">潍柴英致</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="284"><b>W</b><a target="_self" href="javascript:void(0);">蔚来</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="70"><b>W</b><a target="_self" href="javascript:void(0);">沃尔沃</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="114"><b>W</b><a target="_self" href="javascript:void(0);">五菱汽车</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="167"><b>W</b><a target="_self" href="javascript:void(0);">五十铃</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="98"><b>X</b><a target="_self" href="javascript:void(0);">西雅特</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="12"><b>X</b><a target="_self" href="javascript:void(0);">现代</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="185"><b>X</b><a target="_self" href="javascript:void(0);">新凯</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="71"><b>X</b><a target="_self" href="javascript:void(0);">雪佛兰</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="72"><b>X</b><a target="_self" href="javascript:void(0);">雪铁龙</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="111"><b>Y</b><a target="_self" href="javascript:void(0);">野马汽车</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="110"><b>Y</b><a target="_self" href="javascript:void(0);">一汽</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="144"><b>Y</b><a target="_self" href="javascript:void(0);">依维柯</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="73"><b>Y</b><a target="_self" href="javascript:void(0);">英菲尼迪</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="93"><b>Y</b><a target="_self" href="javascript:void(0);">永源</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="263"><b>Y</b><a target="_self" href="javascript:void(0);">驭胜</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="182"><b>Z</b><a target="_self" href="javascript:void(0);">之诺</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="206"><b>Z</b><a target="_self" href="javascript:void(0);">知豆</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="22"><b>Z</b><a target="_self" href="javascript:void(0);">中华</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="74"><b>Z</b><a target="_self" href="javascript:void(0);">中兴</a></dd><dd data-parent="carbrand" data-target="carseries" data-key="94"><b>Z</b><a target="_self" href="javascript:void(0);">众泰</a></dd></dl></div>';
//        $html = new Htmldom();
//        $html->load($htmlstr);
//        foreach ($html->find('dd') as $element){
//            $autoid = $element->attr['data-key'];
//            $brand = new CarBrand();
//            $brand->name = $element->find('a',0)->text();
//            $brand->firstletter = $element->find('b',0)->text();
//            $brand->autoid = $autoid;
//            $brand->save();
//        }
//
//        // 汽车厂商
//        foreach ($brands = CarBrand::get() as $brand){
//            $client = new Client();
//            $res = $client->request('get','http://www.autohome.com.cn/ashx/AjaxIndexCarFind.ashx?type=3&value='.$brand->autoid);
//            $content = iconv("GBK","UTF-8",$res->getBody()->getContents());
//            $content = json_decode($content,true);
//            if($content['returncode'] == 0){
//                $factoryitems = $content['result']['factoryitems'];
//                foreach ($factoryitems as $factoryitem){
//                    $factory = new CarFactory();
//                    $factory->name = $factoryitem['name'];
//                    $factory->firstletter = $factoryitem['firstletter'];
//                    $factory->autoid = $factoryitem['id'];
//                    $factory->brand_id = $brand->id;
//                    $factory->save();
//
//                    $seriesitems = $factoryitem['seriesitems'];
//                    foreach ($seriesitems as $seriesitem){
//                        $series = new CarSeries();
//                        $series->name = $seriesitem['name'];
//                        $series->firstletter = $seriesitem['firstletter'];
//                        $series->autoid = $seriesitem['id'];
//                        $series->state = $seriesitem['seriesstate'];
//                        $series->brand_id = $brand->id;
//                        $series->factory_id = $factory->id;
//                        $series->save();
//                    }
//                }
//            }
//        }

//        // 汽车年份
//        foreach ($series = CarSeries::get() as $key => $seriesitem){
//            if($key < 1000){
//                continue;
//            }
//            $client = new Client();
//            $res = $client->request('get','http://www.autohome.com.cn/ashx/AjaxIndexCarFind.ashx?type=5&value='.$seriesitem->autoid);
//            $content = iconv("GBK","UTF-8",$res->getBody()->getContents());
//            $content = json_decode($content,true);
//            if($content['returncode'] == 0){
//                $yearitems = $content['result']['yearitems'];
//                foreach ($yearitems as $yearitem){
//                    $year = new CarYear();
//                    $year->name = $yearitem['name'];
//                    $year->autoid = $yearitem['id'];
//                    $year->brand_id = $seriesitem->brand_id;
//                    $year->factory_id = $seriesitem->factory_id;
//                    $year->series_id = $seriesitem->id;
//                    $year->save();
//
//                    $specitems = $yearitem['specitems'];
//                    foreach ($specitems as $specitem){
//                        $spec = new CarSpec();
//                        $spec->name = $specitem['name'];
//                        $spec->autoid = $specitem['id'];
//                        $spec->state = $specitem['state'];
//                        $spec->minprice = $specitem['minprice'];
//                        $spec->maxprice = $specitem['maxprice'];
//                        $spec->brand_id = $seriesitem->brand_id;
//                        $spec->factory_id = $seriesitem->factory_id;
//                        $spec->series_id = $seriesitem->id;
//                        $spec->year_id = $year->id;
//                        $spec->save();
//                    }
//                }
//            }
//        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
