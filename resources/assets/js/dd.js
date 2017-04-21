/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('ddtable', require('./components/ddtable.vue'));
import axios from 'axios';
var app = new Vue({
    el: '#app',
    data : {
        page_title:'数据字典',
        tables : '',
    },
    methods : {
    	loadtables : function(event){
            var vm = this;
    		var params = new FormData(event.target);
    		if(!params.get("host")){
    			alert("请输入Host");
    			return;
    		}
    		if(!params.get("dbname")){
    			alert("请输入数据库名称");
    			return;
    		}
    		if(!params.get("username")){
    			alert("请输入数据库账号");
    			return;
    		}
            if(!params.get("password")){
                alert("请输入数据库密码");
                return;
            }
    		axios.post("/dd/loadtables",params)
                .then(function(response){
                	var msg = response.data;
                	if(msg.result == 0){
                        vm.tables = msg.data;
                	}else{
                        alert(msg.description);
                    }
                })
                .catch(function(error){
                    vm.answer = '访问接口失败' + error
                })
            return false;
    	},
        onScroll:function(){
            var scrolltop = window.scrollY;
            if(scrolltop >= 200){       
                $(".scroll-top").show();
            }else{
                $(".scroll-top").hide();
            }
        },
        scrollTop:function(){
            $("html,body").animate({scrollTop: 0}, 500);
        },
        target_table : function(event){
            var dom = $(event.target);
            var code = dom.val();
            if(!code){
                return;
            }
            window.location.href = "#"+code;
        }
    }
});
