<?php
    use App\Models\Notebook;
    use App\Models\Note;
    use App\Models\User;
    
    /**
     * 解析用户上传的文件
     * @param  [type] $user_id [description]
     * @param  [type] $dir     [description]
     * @return [type]          [description]
     */
    function parse_upload_notes($user_id,$path,$resdirext=".resources"){
        $oripath = $path;
        $_DS = DIRECTORY_SEPARATOR;
        $newpath = $_DS."data".$_DS."note";;
        $path = public_path().$path;
        $files = loop_dir($path,'del_unuseful_file');
        foreach ($files as $key => $subfiles) {
            $notebook = Notebook::where('user_id',$user_id)->where('name',$key)->first();
            if(!$notebook){
                $notebook = new Notebook;
                $notebook->name = $key;
                $notebook->user_id = $user_id;
                $notebook->guid = guid();
                $notebook->save();
            }
            foreach ($subfiles as $subkey => $file) {
                if(is_int($subkey)){
                    $filename = substr($file,0,-5);
                    $guid = guid();
                    $newname = $guid.'.html';
                    $note = new Note;
                    $note->user_id = $user_id;
                    $note->title = $filename;
                    $note->guid = $guid;
                    $note->notebook_id = $notebook->id;
                    $note->source_type = 1;
                    $note->source_url = $newpath.$_DS.$user_id.$_DS.date('Ymd').$_DS.$newname;
                    $note->oripath = $oripath.$_DS.$key;

                    $resources_path = $path.$_DS.$key.$_DS.$filename.$resdirext;
                    if(file_exists($resources_path)){
                        $note->has_resource = 1;
                        $note->resource_url = $newpath.$_DS.$user_id.$_DS.date('Ymd').$_DS.$guid.'-res';
                    }
                    $note->save();
                    $notebook->notecount++;
                    $notebook->save();
                }
            }
        }
        deal_user_notes($user_id,$resdirext);
    }

    /**
     * 处理用户的笔记
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    function deal_user_notes($user_id,$resdirext=".resources"){
        $_DS = DIRECTORY_SEPARATOR;
        $notes = Note::where('user_id',$user_id)->whereNotNull('oripath')->get();
        foreach ($notes as $key => $note) {
            $orifile = public_path().$note->oripath.$_DS.$note->title.'.html';
            if(!file_exists($orifile)){
                continue;
            }
            $newfile = public_path().$note->source_url;
            $source_info = pathinfo($newfile);
            $dirname = $source_info['dirname'];
            if(!file_exists($dirname)){
                mkdir($dirname,0755,true);
            }
            if(rename($orifile,$newfile) && $note->has_resource == 1 && $note->resource_url){
                $orifile_res = public_path().$note->oripath.$_DS.$note->title.$resdirext;
                if(file_exists($orifile_res)){
                    rename($orifile_res,public_path().$note->resource_url);
                }
            }
            //删除旧文件夹
            if(is_empty_dir(public_path().$note->oripath)){
                rmdir(public_path().$note->oripath);
            }
            //处理笔记
            $note->oripath = null;
            $note->summary = html_summary($newfile);
            $note->source_size = filesize(public_path().$note->source_url);
            if($note->has_resource){
                $note->resource_size = get_dir_size(public_path().$note->resource_url);
            }else{
                $note->resource_size = 0;
            }
            $note->size = $note->source_size+$note->resource_size;
            $note->format_source_size = format_size($note->source_size);
            $note->format_resource_size = format_size($note->resource_size);
            $note->format_size = format_size($note->size);
            $note->save();
        }
    }

    /**
    * 生成HTML摘要
    * @param string $html html内容
    * @return string
    */
    function html_summary($filepath,$length=150){
        require_once app_path().'/Library/simplehtmldom/simple_html_dom.php';
        $html = new \simple_html_dom();
        $html->load_file($filepath);
        if(!$html){
            return "暂无摘要";
        }
        $body = $html->find('body',0);
        if(!$body){
            //微信采集文章
            $divdom = $html->find('#js_content',0);
            if(!$divdom){
                return "暂无摘要";
            }
            $contentdom = $divdom;
        }else{
            $contentdom = $body;
        }
        $content = strip_tags($contentdom->text());
        $content = preg_replace("/\s+/","",$content);
        if($content){
            return html_entity_decode(trim(mb_substr($content,0,$length)));
        }else{
            return "暂无摘要";   
        }
    }

    /**
     * 格式化日期
     * @param  [type] $time   [description]
     * @param  [type] $format [description]
     * @return [type]         [description]
     */
    function format_date($time,$format='Y-m-d'){
        if(!is_int($time)){
            $time = strtotime($time);
        }
        return date($format,$time);
    }

    /**
     * 读取笔记本名称
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    function get_notebook_name($id){
        $notebook = Notebook::select('name')->where('id',$id)->first();
        return $notebook->name;
    }

    /**
     * 读取最近一条更新的笔记
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    function get_latest_note_name($id){
        $note = Note::select('title')->whereNull('deleted_at')->where('notebook_id',$id)->orderBy('updated_at','asc')->first();
        if($note){
            return $note->title;
        }else{
            return '暂无笔记';
        }
    }

    /**
     * 获取随机颜色
     * @return [type] [description]
     */
    function get_random_color(){
        $colors = array('success','info','warn','error');
        return $colors[rand(0,3)];
    }

    /**
     * 生成随机昵称
     * @return [type] [description]
     */
    function mknickname(){
        $flag = true;
        $nickname = "";
        while($flag){
            $nickname = "用户".randnum(6);
            $user = User::where('nickname',$nickname)->first();
            if(!$user){
                $flag = false;
            }
        }
        return $nickname;
    }

    /**
     * 获取用户昵称
     */
    function get_user_nickname($id){
        $nickname = User::where('id',$id)->value("nickname");
        return $nickname;
    }

    /**
     * 获取用户GUID
     */
    function get_user_guid($id){
        $guid = User::where('id',$id)->value("guid");
        return $guid;
    }

    /**
     * 获取用户手机号
     */
    function get_user_mobile($id,$is_format = true){
        $mobile = User::where('id',$id)->value("mobile");
        if($is_format && $mobile){
            $mobile = substr_replace($mobile,'****',3,4);
        }
        return $mobile;
    }

    /**
     * 保存微信公众号图片
     * @param  [type] $url [description]
     * @return [type]      [description]
     */
    function save_wxtmp_file($url){
        $img_arr = parse_url($url);
        if(!key_exists('query',$img_arr)){
            return null;
        }
        $query_arr = explode("=",$img_arr['query']);
        $file_ext = $query_arr[1];
        $filetmp = public_path().'/data/note/tmp/';
        if(!is_dir($filetmp)){
            mkdir($filetmp);
        }
        $guid = guid();
        $file_name = $guid.".".$file_ext;
        $ab_path = $filetmp.$file_name;
        $re_path = '/data/note/tmp/'.$file_name;
        $flag = @file_put_contents($ab_path,file_get_contents($url));
        if($flag){
            return $re_path;
        }else{
            return null;
        }
    }

    /**
     * 保存微信公众号图片到七牛
     * @param  [type] $url [description]
     * @return [type]      [description]
     */
    function save_wxtmp_file_to_qiniu($url){
        $img_arr = parse_url($url);
        if(!key_exists('query',$img_arr)){
            return null;
        }
        $query_arr = explode("=",$img_arr['query']);
        $file_ext = $query_arr[1];
        $guid = guid();
        $file_name = $guid.".".$file_ext;
        $key = 'data/note/tmp/'.$file_name;
        require_once app_path().'/Library/jqiniu/JQiniu.php';
        $qiniu = new \JQiniu();
        $response = $qiniu->fetch($url,$key);
        if(is_array($response)){
            $url = 'http://'.config("qiniu.domains.custom").'/'.$key;
            return $url;
        }else{
            return null;
        }
    }

    /**
     * 保存笔记图片
     * @param  [type] $note    [description]
     * @param  [type] $content [description]
     * @return [type]          [description]
     */
    function save_note_file($note,$content){
        $user = $GLOBALS['user'];
        $date = date('Ymd');
        $filepath = public_path().$note->source_url;
        $dirpath = public_path()."/data/note/".$user->id.'/'.$date.'/';
        if(!is_dir($dirpath)){
            mkdir($dirpath,0755,true);
        }
        preg_match_all("/<img([^>]*)\s*src=('|\")([^'\"]+)('|\")/", $content, $m);
        foreach ($m[3] as $key => $img) {
            if(substr($img,0,15) == "/data/note/tmp/"){
                $imgname_arr = explode("/",$img);
                $imgname = end($imgname_arr);
                $ab_img_path = public_path().$img;
                if(file_exists($ab_img_path)){
                    $note->has_resource = 1;
                    $note->resource_url = "/data/note/".$user->id.'/'.$date.'/'.$note->guid.'-res';
                    $ab_res_path = public_path().$note->resource_url;
                    if(!is_dir($ab_res_path)){
                        mkdir($ab_res_path);
                    }
                    rename($ab_img_path,$ab_res_path.'/'.$imgname);
                    $content = str_replace($img,$note->resource_url.'/'.$imgname,$content);
                    $note->resource_size = get_dir_size($ab_res_path);
                }
            }
        }
        file_put_contents($filepath, $content);
        chmod($filepath, 0755);
        $note->summary = html_summary($filepath);
        $note->source_size = filesize($filepath);
        $note->size = $note->source_size + $note->resource_size;
        $note->format_source_size = format_size($note->source_size);
        $note->format_resource_size = format_size($note->resource_size);
        $note->format_size = format_size($note->size);
        return $note;
    }

    /**
     * 保存笔记图片到七牛
     * @param  [type] $note    [description]
     * @param  [type] $content [description]
     * @return [type]          [description]
     */
    function save_note_file_to_qiniu($note,$content){
        require_once app_path().'/Library/jqiniu/JQiniu.php';
        $qiniu = new \JQiniu();
        $user = $GLOBALS['user'];
        $date = date('Ymd');
        $filepath = public_path().$note->source_url;
        $dirpath = public_path()."/data/note/".$user->id.'/'.$date.'/';
        if(!is_dir($dirpath)){
            mkdir($dirpath,0755,true);
        }
        preg_match_all("/<img([^>]*)\s*src=('|\")([^'\"]+)('|\")/", $content, $m);
        foreach ($m[3] as $key => $img) {
            if(strpos($img,config('qiniu.domains.custom'))){ 
                $imgname_arr = explode("/",$img);
                $imgname = end($imgname_arr);
                $imgkey = str_replace("http://".config('qiniu.domains.custom')."/","",$img);
                $note->has_resource = 1;
                $note->resource_url = "data/note/".$user->id.'/'.$date.'/'.$note->guid.'-res';
                $newkey = $note->resource_url.'/'.$imgname;
                $qiniu->move($imgkey,$newkey);
                $content = str_replace($img,"http://".config('qiniu.domains.custom')."/".$note->resource_url.'/'.$imgname,$content);
                $note->resource_size = $qiniu->list_size($note->resource_url);
            }
        }

        file_put_contents($filepath, $content);
        chmod($filepath, 0755);
        $note->summary = html_summary($filepath);
        $note->source_size = filesize($filepath);
        $note->size = $note->source_size + $note->resource_size;
        $note->format_source_size = format_size($note->source_size);
        $note->format_resource_size = format_size($note->resource_size);
        $note->format_size = format_size($note->size);
        return $note;
    }

    /**
     * 微信js配置
     * @return [type] [description]
     */
    function wxjs_config(){
        $wechat = app("wechat");
        $wxjs = $wechat->js;
        $config = $wxjs->config(array('onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo','onMenuShareQZone','startRecord','stopRecord','onVoiceRecordEnd','playVoice','pauseVoice','stopVoice','onVoicePlayEnd','uploadVoice','downloadVoice','translateVoice','chooseImage', 'previewImage', 'uploadImage', 'downloadImage'), false);
        return $config;
    }
