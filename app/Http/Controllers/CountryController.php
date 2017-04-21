<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Validator;

class CountryController extends Controller{
    
    /**
     * 国家
     */
    public function index(){
        $countries = Country::All();
        $data = array(
            'countries' => $countries,
            'page_title' => '国家信息'
            );
    	return view("country/index",$data);
    }
}
