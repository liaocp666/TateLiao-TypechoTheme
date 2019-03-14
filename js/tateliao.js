/*点击搜索*/
function searchClick() {
	var canvas=document.getElementById("canvas");
		var can=canvas.getContext("2d");
		var s=window.screen;
		var w=canvas.width=s.width;
		var h=canvas.height=s.height;

		can.fillStyle=color2();

		var words = Array(256).join("1").split("");

		setInterval(draw,50);

		function draw(){
			can.fillStyle='rgba(0,0,0,0.05)';
			can.fillRect(0,0,w,h);
			can.fillStyle=color2();
			words.map(function(y,n){
				text=String.fromCharCode(Math.ceil(65+Math.random()*57)); 
				x = n*10;
				can.fillText(text,x,y)
				words[n]=( y > 758 + Math.random()*484 ? 0:y+10 );
			});
		}

		function color1(){
			var colors=[0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f'];
			var color="";
			for( var i=0; i<6; i++){
				var n=Math.ceil(Math.random()*15);
				color += "" + colors[n];
			}
			return '#'+color;
		}

		function color2(){
			var color = Math.ceil(Math.random()*16777215).toString(16); 
			while(color.length<6){
				color = '0'+color;
			}
			return '#'+color;
		}
		function color3(){
			return "#" + (function(color){
				return new Array(7-color.length).join("0")+color;
			})((Math.random()*0x1000000 << 0).toString(16))
		}
	$('#search').fadeIn();
}

/*关闭搜索*/
function closeSearch() {
	$('#search').fadeOut();
}

/*轮播图*/
$('#focusimg').carousel({
	interval: 4000
})

$(function() {
	//导航栏
	new Headroom(document.querySelector(".menu"), { //这里的nav-scroll改为你的导航栏的id或class
		offset: 5, // 在元素没有固定之前，垂直方向的偏移量（以px为单位）
		tolerance: 5, // scroll tolerance in px before state changes        
		classes: {
			initial: "animated", // 当元素初始化后所设置的class
			pinned: "slideUp", // 向上滚动时设置的class
			unpinned: "slideDown" // 向下滚动时所设置的class
		}
	}).init();

	//图片预加载
	var bLazy = new Blazy({
		breakpoints: [{
			width: 420 // Max-width
				,
			src: 'data-src',
		}],
		loadInvisible: true,
		success: function(element) {
			setTimeout(function() {
				// We want to remove the loader gif now.
				// First we find the parent container
				// then we remove the "loading" class which holds the loader image
				var parent = element.parentNode;
				parent.className = parent.className.replace(/\bloading\b/, '');
			}, 200);
		}
	});

	//返回顶部
	$.goup({
        trigger: 100,
        bottomOffset: 70,
        locationOffset: 70,
        title: '返回顶部',
        titleAsText: false
    });
    
    //手机端导航
    var trigger = $('.hamburger'),
	    overlay = $('.overlay'),
	    isClosed = false;

	    trigger.click(function () {
	      hamburger_cross();      
	    });

	    function hamburger_cross() {
	      if (isClosed == true) {          
	        overlay.hide();
	        trigger.removeClass('is-open');
	        trigger.addClass('is-closed');
	        isClosed = false;
	      } else {   
	        overlay.show();
	        trigger.removeClass('is-closed');
	        trigger.addClass('is-open');
	        isClosed = true;
	      }
	  }
	  
	  $('[data-toggle="offcanvas"]').click(function () {
	        $('#wrapper').toggleClass('toggled');
	  });  
	  
	
	//所有图片添加A链接
	$('.page-content img').each(function(){
	    var url = $(this).attr("src");
	    var aUrl = "<a class='venobox' href='"+url+"'></a>";
	    $(this).wrapAll(aUrl);
	    /*$(this).attr("data-source",url);
	    $(this).attr("class","js-lightbox");*/
	});
	
	//灯箱操作
	$('.venobox').venobox(); 
});