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
var app = new Vue({
    el: '#app',
    created : function(){
    	window.addEventListener("scroll",this.onScroll);
    		
    },
    methods : {
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
    	target_country : function(event){
    		var dom = $(event.target);
			var code = dom.val();
			if(!code){
				return;
			}
			window.location.href = "#"+code;
    	}
    }
});
