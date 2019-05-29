url = 'http://127.0.0.1:8000/api/v1/'

var $backToTopEle=$('<a href="javascript:void(0)" class="Hui-iconfont toTop" title="返回顶部" alt="返回顶部" style="display:none">^^</a>').appendTo($("body")).click(function(){
	$("html, body").animate({ scrollTop: 0 }, 120);
});
var backToTopFun = function() {
	var st = $(document).scrollTop(), winh = $(window).height();
	(st > 0)? $backToTopEle.show(): $backToTopEle.hide();
	/*IE6下的定位*/
	if(!window.XMLHttpRequest){
		$backToTopEle.css("top", st + winh - 166);
	}
};

function ajax(method,data,fn,error=function(){}) {
	$.ajax({
		url:url+method,
		data:data,
		type:'post',
		dataType:'json',
		success:fn,
		error:error
	})
}

function getUrlParam(name) {
	var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
	var r = window.location.search.substr(1).match(reg);  //匹配目标参数
	if (r!=null) return unescape(r[2]); return null; //返回参数值
}

$(function(){
	$url ="";
	$(window).on("scroll",backToTopFun);
	backToTopFun();

	$(".w_header").load("layout/head.html?1", function(response){ 
		
	});
	$(".w_foot").load("layout/footer.html", function(response){ 
		
	});
	$(".newRelease").load("layout/newrelease.html", function(response){

	});
	$(".review").load("plugin/review/index.html")
});

