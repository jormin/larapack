<?php

namespace App\Http\Controllers;

use Jenssegers\Agent\Agent;
use Jormin\IP\IP;

class AgentController extends Controller{
    
    /**
     * UA首页
     * @return [type] [description]
     */
    public function index(){
        $access = new \stdClass;
        $agent = new Agent();
        $access->device = $agent->device();
        $access->platform = $agent->platform();
        $access->platform_version = $agent->version($access->platform);
        $access->browser = $agent->browser();
        $access->browser_version = $agent->version($access->browser);
        $access->language = json_encode($agent->languages());

        $access->route_name = request()->route()->getName();
        $access->route_path = request()->route()->getPath();
        $access->route_prefix = request()->route()->getPrefix();
        $access->route_uri = request()->route()->getUri();
        $access->route_action_name = request()->route()->getActionName();

        $access->fullurl = request()->fullUrl();
        $access->url = request()->url();
        $access->path = request()->path();
        $access->ip = request()->ip();
        $access->ip_address = implode(IP::ip2addr($access->ip));
        $access->method = request()->method();
        $access->header = json_encode(request()->header());
        $access->params = json_encode(request()->all());
    	return view('agent/index',compact('access'));
    }
}
