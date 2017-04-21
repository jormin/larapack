<template>
		<textarea name="content" :id="simditorid">
			<p>{{value}}</p>
		</textarea>
</template>
<script>
	import Simditor from 'simditor';
	export default{
		props:['value'],
		data: function (){
			return {
				simditorid : 'simditor_'+new Date().getTime(),//这里防止多个富文本发生冲突
                editor:'',//保存simditor对象
                toolbar : ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent', 'alignment']
			}
		},
		mounted:function(){
			this.createEditor();
		},
		methods: {
			createEditor:function() {
				var _this = this;
				this.editor = new Simditor({
					textarea: $('#' + _this.simditorid),
                    toolbar: _this.toolbar,
//                     upload: {
//                         url: apic + '/api/CommAnnex/UploadFiles', //文件上传的接口地址
// //                      params: null, //键值对,指定文件上传接口的额外参数,上传的时候随文件一起提交
//                         fileKey: 'fileDataFileName', //服务器端获取文件数据的参数名
//                         connectionCount: 3,//同时上传个数
//                         leaveConfirm: '正在上传文件'
//                     },
                    pasteImage: true,//是否允许粘贴上传图片，依赖 upload 选项，仅支持 Firefox 和 Chrome 浏览器。
                    tabIndent: true,//是否在编辑器中使用 tab 键来缩进
				});
                this.editor.on("valuechanged", function(e, src) {
                    _this.value = _this.editor.getValue()
                })//valuechanged是simditor自带获取值得方法
			}
		}
	}
</script>