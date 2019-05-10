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
$(function(){
	$url ="";
	$(window).on("scroll",backToTopFun);
	backToTopFun();

	$(".w_header").load("layout/head.html", function(response){ 
		console.log(response)
	});
	$(".w_foot").load("layout/footer.html", function(response){ 
		console.log(response)
	});
});

function ajax(url,data,fn,error=function(){}) {
	$.ajax({
		url:url,
		data:data,
		type:'post',
		dataType:'json',
		success:fn,
		error:error
	})
}
