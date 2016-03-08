/**
 * @author Sanjiv Sutar 
 * @Org Fractalink Design Studio
 * @Date 25th May 2011
 * 
 */

var FI ={};
var noSim = 0;
var jsonobj;
var notclick = false;
var comms = ['Book Recommendation','Document Not Found on the Shelf','Database Not Accessible!','Not Happy with the Service','I Just Read This Book!','Feedback Form'];
var startComm = ['Recommend A Book','Report Document','Report Database','Report A Problem','Write a Review','Submit Feedback'];
var commCat = ['breco','ill','ao','grieve','breview','feedback'];
//globalNav functionality
FI.globalNav = {
	init:function(){
		if(FI.globalNav.checkActive())
		{
			$(".headerWrapper").css({backgroundPosition:"right -167px"})	
		}
		var cSubNav = "";
		var curIndx = 0;
		$(".mainNav > li").hover(function(){
			$(".subNavD").remove()
			$(".navOvrlay").remove();
			if(FI.globalNav.checkActive())
			{
				$(".headerWrapper").css({backgroundPosition:"right -167px"})	
			}else{
				$(".headerWrapper").css({backgroundPosition:"right 0"})
			}
			
			$(".mainNav > li").removeClass("active")
			$(this).addClass("active");
			curIndx = $(".mainNav > li").index(this)
			if(FI.globalNav.checkActive())
			{
				$(".headerWrapper").css({backgroundPosition:"right -167px"})	
			}
			cSubNav = $(this).find(".subNavWrapper").html()
			if(cSubNav != null)
				$("body").append("<div class='subNavD'>"+cSubNav+"</div>")
			var l = $(this).offset().left
			var t = $(".mainNav").offset().top
			//alert($(this).offset().left+$(this).width())
			
			$(".subNavD").css({"left":l,"top":t+36,"width":"auto","zIndex":"999"}).slideDown()
			
			if($(this).offset().left+$(".subNavD").width() > $(".mainNav").offset().left+$(".mainNav").width())
			{
				$(".subNavD .subNavCont > ul").width(($(".subNavD .subNavCont > ul > li").width()*$(".subNavD .subNavCont > ul > li").length)+20)
				$(".subNavD").css({"left":l-(($(".subNavD").width()-$(this).width())+3),"top":t+36,"width":"auto","zIndex":"999"}).slideDown()
			}else{
				$(".subNavD").css({"left":l,"top":t+36,"width":"auto","zIndex":"999"}).slideDown()
			}
			
			$(".navOvrlay").remove()
		},function(){
			/*$(".navOvrlay").remove();
			$(".mainNav > li").removeClass("active")
			if(FI.globalNav.checkActive())
			{
				$(".headerWrapper").css({backgroundPosition:"right -197px"})	
			}else{
				$(".headerWrapper").css({backgroundPosition:"right 0"})
			}
			$(this).append(cSubNav)
			$(".subNavWrapper").removeClass("bd")
			$(".subNavWrapper").hide()*/
			if($(".subNavWrapper",this).length != 0)
			{
				$(".subNavD").mouseleave(function(){
					$(".navOvrlay").remove();
					$(".mainNav > li").removeClass("active")
					if(FI.globalNav.checkActive())
					{
						$(".headerWrapper").css({backgroundPosition:"right -167px"})	
					}else{
						$(".headerWrapper").css({backgroundPosition:"right 0"})
					}
					//$(".mainNav > li").eq(curIndx).append(cSubNav)
					//$(".subNavWrapper").removeClass("bd")
					$(".subNavD").remove()
				})				
			}else{
				$(".navOvrlay").remove();
					$(".mainNav > li").removeClass("active")
					if(FI.globalNav.checkActive())
					{
						$(".headerWrapper").css({backgroundPosition:"right -167px"})	
					}else{
						$(".headerWrapper").css({backgroundPosition:"right 0"})
					}
					//$(".mainNav > li").eq(curIndx).append(cSubNav)
					//$(".subNavWrapper").removeClass("bd")
					$(".subNavD").remove()
			}
			$(".logoWrapper, .bannerCarouselWrapper").hover(function(){
				$(".navOvrlay").remove();
					$(".mainNav > li").removeClass("active")
					if(FI.globalNav.checkActive())
					{
						$(".headerWrapper").css({backgroundPosition:"right -197px"})	
					}else{
						$(".headerWrapper").css({backgroundPosition:"right 0"})
					}
					//$(".mainNav > li").eq(curIndx).append(cSubNav)
					//$(".subNavWrapper").removeClass("bd")
					$(".subNavD").remove()
			})
		})
		
	},
	checkActive:function(){
		var act = false;
		$(".mainNav > li").each(function(e){
			if($(this).hasClass("active"))
			{
				act = true;		
			}
		})
		return act;
	}
}
//login functionality
FI.login = {
	init:function (){
		$(".login").eq(0).click(function(){ 
			$(".loginform").submit();
		})
		$(".loginNav").hide()
		$(".loginWrapper").hover(function(){$(".loginNav").slideDown();},function(){$(".loginNav").hide();})
		var xmlhttp;
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
}
//carousel functionality
FI.customCarousel = {
	initVar:{
		mskWidth:727,
		mskHeight:327,
		timer:"",
		ato:true,
		currIndx:0
	},
	init:function(){
		$(".carousel1 .msk").width(FI.customCarousel.initVar.mskWidth).height(FI.customCarousel.initVar.mskHeight)
		$(".carousel1 .msk ul").height((FI.customCarousel.initVar.mskHeight)*8)
		//$(".prevBtn").css("opacity",".5")
		$(".carousel1 .msk ul li").hide()
		$(".carousel1 .msk ul").css({"position":"relative"})
		$(".carousel1 .msk ul li").each(function(e){
			$(this).css({"display":"none","z-index":6})
		})
		$(".carousel1 .msk ul li").eq(0).css({"display":"block","zIndex":"7"})
		$(".carousel1 .msk ul li").eq(0).addClass("preSlide")
		setTimeout(function(){
			$(".carousel1 .msk ul li").eq(0).show()
		},1000)
		setTimeout(function(){
			FI.customCarousel.animate(0)
		},6000)
	},
	createStructure:function(){
		
		/*$(".nextBtn").click(function(){
			indx = (FI.customCarousel.initVar.currIndx < $(".msk ul li").length-1)? FI.customCarousel.initVar.currIndx+1:$(".msk ul li").length-1
			FI.customCarousel.animate(indx)
			$(".carouselLedg li").removeClass("sel")
			$(".carouselLedg li").eq(indx).addClass("sel")
		})
		$(".prevBtn").click(function(){
			indx = (FI.customCarousel.initVar.currIndx > 0)? FI.customCarousel.initVar.currIndx-1:0
			FI.customCarousel.animate(indx)
			$(".carouselLedg li").removeClass("sel")
			$(".carouselLedg li").eq(indx).addClass("sel")
		})*/
//		$(".msk ul .qts").click(function(){
	//		var indx = $(".msk ul .qts").index(this)
			//$(this).colorbox({width:"650px", he`ight:"400px", inline:true, href:"#nws"+indx});
		//})
	},
	animate:function(indx){
		indx = (indx < 16)? indx+1:0;
		$(".carousel1 .msk ul li.preSlide").css({"zIndex":"6"})
		$(".carousel1 .msk ul li").eq(indx).css({"display":"none","zIndex":"7"})
		$(".carousel1 .msk ul li").eq(indx).fadeIn(1000,function(){
			$(".carousel1 .msk ul li.preSlide").css({"display":"none"})
			$(".carousel1 .msk ul li").removeClass("preSlide")
			$(this).addClass("preSlide")
		})	
		FI.customCarousel.initVar.currIndx = indx
		FI.customCarousel.initVar.timer = setTimeout(function(){FI.customCarousel.animate(FI.customCarousel.initVar.currIndx)},5000)
	}
}
//noticeboard functionality
FI.noticeCarousel = {
	initVar:{
		mskWidth:28.8*window.screen.availWidth/100,
		mskWidth1:32*window.screen.availWidth/100,
		mskHeight:327,
		scrolldelay:50
	},
	init:function(){
		$(".carousel .msk").width(FI.noticeCarousel.initVar.mskWidth).height(FI.noticeCarousel.initVar.mskHeight)
		$(".news .msk").width(FI.noticeCarousel.initVar.mskWidth1).height(FI.noticeCarousel.initVar.mskHeight)
		$(".carouselLedg").height((FI.noticeCarousel.initVar.mskHeight)*3)
		var scroller = $('.carousel .msk');
		var scroller1 = $('.news .msk');
        var scrollerContent = scroller.children('ul.carouselLedg');
		var scrollerContent1 = scroller1.children('ul.carouselLedg');
        scrollerContent.children().clone().appendTo(scrollerContent);
		scrollerContent1.children().clone().appendTo(scrollerContent1);
        var curY = 0;
        scrollerContent.children().each(function(){
            var $this = $(this);
            $this.css('top', curY);
            curY += $this.outerHeight(true);
        });
		scrollerContent1.children().each(function(){
            var $this = $(this);
            $this.css('top', curY);
            curY += $this.outerHeight(true);
        });
        var fullH = curY / 2;
        var viewportH = scroller.height();
		var viewportH1 = scroller1.height();

        // Scrolling speed management
        var controller = {curSpeed:0, fullSpeed:2};
        var $controller = $(controller);
        var tweenToNewSpeed = function(newSpeed, duration)
        {
            if (duration === undefined)
                duration = 600;
            $controller.stop(true).animate({curSpeed:newSpeed}, duration);
        };

        // Pause on hover
        scroller.hover(function(){
            tweenToNewSpeed(0);
			$(".carouselLedg li").click(function(){
			var indx = $(".carouselLedg li").index(this)
			$(this).colorbox({position:"fixed", top:"50px", width:"650px", height:"400px", inline:true, href:"#cont"+indx});
//			$('html, body').animate({scrollTop: 0},800)
		})
        }, function(){
            tweenToNewSpeed(controller.fullSpeed);
        });
		scroller1.hover(function(){
            tweenToNewSpeed(0);
			$(".carouselLedg li").click(function(){
			var indx = $(".carouselLedg li").index(this)
			$(this).colorbox({position:"fixed", top:"50px", width:"650px", height:"400px", inline:true, href:"#cont"+indx});
//			$('html, body').animate({scrollTop: 0},800)
		})
        }, function(){
            tweenToNewSpeed(controller.fullSpeed);
        });

        // Scrolling management; start the automatical scrolling
        var doScroll = function()
        {
            var curY = scroller.scrollTop();
            var newY = curY + controller.curSpeed;
			if (newY > fullH*2 - 1.5*viewportH)
                newY -= fullH;
            scroller.scrollTop(newY);
        };
		var doScroll1 = function()
        {
            var curY = scroller1.scrollTop();
            var newY = curY + controller.curSpeed;
            if (newY > fullH*2 - 1.5*viewportH1)
                newY -= fullH;
            scroller1.scrollTop(newY);
        };
        setInterval(doScroll, FI.noticeCarousel.initVar.scrolldelay);
		setInterval(doScroll1, FI.noticeCarousel.initVar.scrolldelay);
        tweenToNewSpeed(controller.fullSpeed);
	}
}
/*FI.noticeCarousel = {
	initVar:{
		mskWidth:385,
		mskHeight:327,
		delay:1000,
		hovered:0
	},
	init:function(){
		$(".carousel .msk").width(FI.noticeCarousel.initVar.mskWidth).height(FI.noticeCarousel.initVar.mskHeight)
		$(".carouselLedg").height((FI.noticeCarousel.initVar.mskHeight)*3)
		$("li.notice").css({"position":"relative","cursor":"pointer"})
		$("li.notice").css({"display":"block","z-index":"5"})
		if(FI.noticeCarousel.initVar.hovered==0)
		{
			setTimeout(function(){ FI.noticeCarousel.animate()},FI.noticeCarousel.initVar.delay)
		}
		$(".carouselLedg").hover(function(){
			$(".carouselLedg").stop();
			FI.noticeCarousel.initVar.hovered=1;
			$(".carousel .upnotice").hover(function(){$(".carousel .upnotice").css("opacity","1");},function(){$(".carousel .upnotice").css("opacity","0.3");})
			$(".carousel .downnotice").hover(function(){$(".carousel .downnotice").css("opacity","1");},function(){$(".carousel .downnotice").css("opacity","0.3");})
					$(".upnotice").show();
					$(".downnotice").show();
//					$(".upnotice").click();
	//				$(".downnotice").click();
		},function(){ 
			FI.noticeCarousel.initVar.hovered=0;
			$(".upnotice").hide();
			$(".downnotice").hide(); 
			setTimeout(function(){FI.noticeCarousel.animate()},FI.noticeCarousel.initVar.delay)
		})
	},
	animate:function(){
			if(FI.noticeCarousel.initVar.hovered==0){
				$(".carouselLedg").animate({marginTop: "-=154px"},{duration: 14000, easing:"linear"})
				$(".carouselLedg").append($(".carouselLedg li.notice").eq(0));
			}
			setTimeout(FI.noticeCarousel.animate(),500)
	}
}*/
// lower menu
FI.lowermenu = {
	init:function(){
		$(".carousel2 div.readMore a").eq(0).hover(function(){ $(".carousel2 div.readMore").eq(0).css({"background":"#eaeaea"});}, function(){ $(".carousel2 div.readMore").css({"background":"#ffffff"});})
		$(".carousel2 div.readMore").eq(1).hover(function(){ $(".carousel2 div.readMore").eq(1).css({"background":"#eaeaea"});}, function(){ $(".carousel2 div.readMore").css({"background":"#ffffff"});})
		$(".carousel2 div.readMore").eq(2).hover(function(){ $(".carousel2 div.readMore").eq(2).css({"background":"#eaeaea"});}, function(){ $(".carousel2 div.readMore").css({"background":"#ffffff"});})
		$(".carousel2 div.readMore").eq(3).hover(function(){ $(".carousel2 div.readMore").eq(3).css({"background":"#eaeaea"});}, function(){ $(".carousel2 div.readMore").css({"background":"#ffffff"});})
	}
}
//small Carousel
FI.sCarousel = {
	initVar:{
		mskWidth:32*window.screen.availWidth/100,
		mskHeight:300,
		currIndx:0
	},
    init: function () {
			$(".sCarousel .msk").width(FI.sCarousel.initVar.mskWidth).height(FI.sCarousel.initVar.mskHeight)
			$(".cData").width((FI.sCarousel.initVar.mskWidth)*3);
			$(".cData").css({ "position": "relative" })
			$(".cntrl ul li").eq(0).addClass("active")
            $(".cntrl .prevBtn").css("opacity", ".5")
            $(".cntrl .nextBtn").click(function () {
                indx = (FI.sCarousel.initVar.currIndx < 2) ? FI.sCarousel.initVar.currIndx + 1 : 2;
                FI.sCarousel.animateCarousel(indx)
            })
            $(".cntrl .prevBtn").click(function () {
                indx = (FI.sCarousel.initVar.currIndx > 0) ? FI.sCarousel.initVar.currIndx - 1 : 0
                FI.sCarousel.animateCarousel(indx)
            })
    },
    animateCarousel: function (indx) {
        var pos = indx * $(".cData li").width();
        $(".cData").animate({
            left: -pos
        }, FI.sCarousel.initVar.mskWidth)
        //alert($(".desc").eq(0).metadata().pth)
        $(".cntrl ul li").removeClass("active")
        $(".cntrl ul li").eq(indx).addClass("active")
        //$(".msk ul li").eq(indx).attr("style","background:url("+$(".desc").eq(indx).metadata().pth+") no-repeat 7px 7px")

        if (indx > 0) {
            $(".cntrl .prevBtn").css("opacity", "1")
        } else {
            $(".cntrl .prevBtn").css("opacity", ".5")
        }
        if (indx < $(".msk .cData li").length - 1) {
            $(".cntrl .nextBtn").css("opacity", "1")
        } else {
            $(".cntrl .nextBtn").css("opacity", ".5")
        }

        FI.sCarousel.initVar.currIndx = indx
    }
}
//Administrator
FI.admin = {
	init: function(){
		var panels = document.getElementsByClassName("panel");
		var tabs = document.getElementsByClassName("tab");
		$(".panel").hide();
		$(".panel").eq(0).show();
		$(".panel").eq(0).addClass("activated");
		$(".tab").eq(0).addClass("clicked");
		$(".admin-databListing").eq(0).addClass("admin-databListing1");
		var cat = $(".admin-databListing1").attr("cat");
		noSim = 1;
		$.ajax({
			url:"../administrator/comms.php?start="+0+"&cat="+cat,
			success: function(response){
				noSim = 0;
				$(".activated .showCase").html(response);
			}
		})
		$(".tabs .tab").click(function(){
			if(noSim==0){
				$(".clicked").removeClass("clicked");
				$(this).addClass("clicked");
				var id = $(this).attr("func");
				$(".activated").hide();
				$("#"+id).show();
				$(".activated").removeClass("activated");
				$("#"+id).addClass("activated");
				$(".admin-databListing1").removeClass("admin-databListing1");
				$("#"+id+" .admin-datablisting").eq(0).addClass("admin-databListing1");
				if(id=="Preview"){
					var preview = $(".admin-databListing1").attr("preview");
					noSim = 1;
					$.ajax({
						url:"../administrator/preview.php?preview="+preview,
						success: function(response){
							noSim = 0;
							$(".activated .showCase").html(response);
						}
					})
				}
				else if(id=="Database"){
					var table = $(".admin-databListing1").attr("table");
					if(table=="mbulls"){
						table = "bulletin";
					}
					noSim = 1;
					$.ajax({
						url:"../administrator/sql.php?table="+table,
						success: function(response){
							noSim = 0;
							$(".activated .showCase").html(response);
						}
					})
				}
				else if(id=="Comms"){
					var cat = $(".admin-databListing1").attr("cat");
					noSim = 1;
					$.ajax({
						url:"../administrator/comms.php?start="+0+"&cat="+cat,
						success: function(response){
							noSim = 0;
							$(".activated .showCase").html(response);
						}
					})
				}
				else{
					var data = $(".admin-databListing1").attr("data");
					noSim = 1;
					$.ajax({
						url:"analysis.php?data="+data,
						success: function(response){
							noSim = 0;
							$(".activated .showCase").html(response);
						}
					})
				}
			}
		});
		$(".admin-databListing").click(function(e) {
			if(noSim==0){
				$(".admin-databListing1").removeClass("admin-databListing1");
				$(this).addClass("admin-databListing1");
				if($(this).parent("ul").attr("func")=="Preview"){
					var preview = $(".admin-databListing1").attr("preview");
					noSim = 1;
					$.ajax({
						url:"../administrator/preview.php?preview="+preview,
						success: function(response){
							noSim = 0;
							var pos = preview.search("notice");
							$(".activated .showCase").html(response);
							if(pos>-1){
								FI.noticeCarousel.init();
							}
							if(preview=="banner"){
								FI.customCarousel.init();
							}
							if(preview=="breview"){
								FI.sCarousel.init();
							}
						}
					})
				}
				else if($(this).parent("ul").attr("func")=="Database"){
					var table = $(".admin-databListing1").attr("table");
					noSim = 1;
					$.ajax({
						url:"../administrator/sql.php?table="+table,
						success: function(response){
							noSim = 0;
							$(".activated .showCase").html(response);
						}
					})
				}
				else if($(this).parent("ul").attr("func")=="Comms"){
					var cat = $(".admin-databListing1").attr("cat");
					noSim = 1;
					$.ajax({
						url:"../administrator/comms.php?start="+0+"&cat="+cat,
						success: function(response){
							noSim = 0;
							$(".activated .showCase").html(response);
						}
					})
				}
				else{
					var data = $(".admin-databListing1").attr("data");
					noSim = 1;
					$.ajax({
						url:"analysis.php?data="+data,
						success: function(response){
							noSim = 0;
							$(".activated .showCase").html(response);
						}
					})
				}
			}
        });
	}
}
// dashborad noticeboard jssor
jssor_1_slider_init = function() {            
	var jssor_1_options = {
	  $AutoPlay: false,
	  $SlideWidth: screen.width * (12.0/17.0),           
	  $ArrowNavigatorOptions: {
		$Class: $JssorArrowNavigator$
	  },
	  $BulletNavigatorOptions: {
		$Class: $JssorBulletNavigator$
	  }
	};
	
	var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
	
	//responsive code begin
	//you can remove responsive code if you don't want the slider scales while window resizing
	function ScaleSlider() {
		var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
		if (refSize) {
			refSize = Math.min(refSize, 800);
			jssor_1_slider.$ScaleWidth(refSize);
		}
		else {
			window.setTimeout(ScaleSlider, 30);
		}
	}
	ScaleSlider();
	$Jssor$.$AddEvent(window, "load", ScaleSlider);
	$Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
	$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
	//responsive code end
};
		
// communication panel
FI.communications = {
	init: function(){
		initComms();
	}
}
function initComms(){
	var html = "";
	for(i = 0; i < comms.length; i++){
		html += "<li class='commOption' onclick='fetchComms(this)' cat='"+commCat[i]+"'>"+comms[i]+"</li>";
	}
	$(".commOptions").html(html);
	fetchComms($(".commOption").eq(0));
}
function fetchComms(element){
	if(!$(element).hasClass("activeComm")){
		$(".activeComm").removeClass("activeComm");
		$(element).addClass("activeComm");
		var cat = $(".activeComm").attr('cat');
		$.ajax({
			type:'GET',
			data:{start:0,cat:cat},
			url:"../administrator/comms.php",
			success:function(res){
				if(res.indexOf("class='no-messages'") > 0){
					$.ajax({
						type:'POST',
						data:{cat:cat},
						url:"../administrator/newConv.php",
						success:function(resp){
							$(".commlist").html(resp);
						}
					});
				}
				else{
					$(".commlist").html(res);
					assignCat(cat);
				}
			}
		});
		$(".commlist").attr('start',0);
		$(".commlist").attr('conv','');
	}
	else if(notclick){
		var cat = $(".activeComm").attr('cat');
		assignCat(cat);
		notclick = false;
	}
}
function assignCat(cat){
	for(i = 0; i < comms.length; i++){
		if(commCat[i] == cat){
			html = $(".commMenu").html()
			if(html == null){
				html = "";
			}
			$(".commMenu").html("<input type='button' value='"+startComm[i]+"' onclick='commMenu(this)' class='commMenu_new_Conversation'/>"+html)
			i = comms.length;
		}
	}
}
function converse(li){
	var classUl = $(".dshowCase ul").attr("class");
	var classUl1 = $(".activated .showCase ul").attr("class");
	if(noSim==0){
		var id = $(li).attr("conversation");
		noSim = 1;
		$.ajax({
			url:"../administrator/conversation.php?conversation="+id+"&start="+0,
			success: function(response){
				noSim = 0;
				if(classUl1=="communications"){
					$(".activated .showCase").html(response);
				}
				else{
					$(".commlist").html(response);
				}
			}
		})
	}
}
function commMenu(input){
	urlX = "../administrator/comms.php?start="
	if($(input).val()=="Back"){
		if($(".commlist").length == 0){
			list = ".activated .showCase"
			var cat = $(".admin-databListing1").attr("cat");
			urlX = urlX+0+"&cat="+cat;
		}
		else{
			list = ".commlist"
			var cat = $(".activeComm").attr('cat');
			urlX = urlX+0+"&cat="+cat;
		}
		$.ajax({
			url:urlX,
			success: function(response){
				$(list).html(response);
				if(list == '.commlist'){
					notclick = true;
					fetchComms($(".activeComm"));
				}
			}
		})	
	}
	else if($(input).val()=="Reply"){
		if($(input).css("border-style")=="inset"){
			$("#comm").show();
			$("#replacer").show();
			$("#commSend").show();
			$("#commfile").show();
			$(input).css("border-style","ridge");
		}
		else{
			$("#comm").hide();
			$("#replacer").hide();
			$("#commSend").hide();
			$("#commfile").hide();
			$(input).css("border-style","inset");
		}
	}
	else if($(input).val()=="Delete"){
		id = $(input).parent().siblings("ul").attr("conv");
		$.ajax({
			url:"../administrator/comms.php?id="+id,
			success: function(response){
				if($(".dshowCase ul").length == 0){
					list = ".activated .showCase ul"
					cat = $(".admin-databListing1").attr("cat");
					urlX = urlX+0+"&cat="+cat;
				}
				else{
					list = ".commlist"
					urlX = urlX+0+"&cat="+cat;
				}
				$.ajax({
					url:urlX,
					success: function(response){
						$(list).html(response);
						notclick = true;
						fetchComms($(".activeComm"));
					}
				})
			}
		})
	}
	else{
		$.ajax({
			type: 'POST',
			url:"../administrator/newConv.php",
			data:{cat:$(".activeComm").attr('cat')},
			success: function(response){
				if($(".commlist").length == 0){
					$(".activated .showCase").html(response);
				}
				else{
					$(".commlist").html(response);
				}
			}
		})
	}
}
function npbutton(button){
	if($(".dshowcase ul").length != 0){
		list = ".commlist ul"
		cat = $(".activeComm").attr('cat')
	}
	else if($(".activated .showCase").length != 0){
		list = ".activated .showCase ul"
		cat = $(".admin-databListing1").attr("cat");
	}
	init = parseInt($(list).attr("start"))
	classul = $(list).attr("class")
	conv = $(list).attr("conv")
	if($(button).val()=="Next"){	
		if(classul == "talk"){
			$.ajax({
				url:"../administrator/conversation.php?conversation="+conv+"&start="+(4+init),
				success: function(response){
					if(list == ".activated .showCase"){
						$(".activated .showCase").html(response);
					}
					else{
						$(".commlist").html(response);
					}
				}
			})
		}
		else{
			$.ajax({
				url:"../administrator/comms.php?start="+(4+init)+"&cat="+cat,
				success: function(response){
					if(list == ".activated .showCase ul"){
						$(".activated .showCase").html(response);
					}
					else{
						$(".commlist").html(response);
						notclick = true;
						fetchComms($(".activeComm"));
					}
				}
			})
		}
	}
	if($(button).val()=="Previous"){
		if(classul == "talk"){
			$.ajax({
				url:"../administrator/conversation.php?conversation="+conv+"&start="+(init-4),
				success: function(response){
					if(list == ".activated .showCase ul"){
						$(".activated .showCase").html(response);
					}
					else{
						$(".commlist").html(response);
					}
				}
			})
		}
		else{
			$.ajax({
				url:"../administrator/comms.php?start="+(init-4)+"&cat="+cat,
				success: function(response){
					if(list == ".activated .showCase ul"){
						$(".activated .showCase").html(response);
					}
					else{
						$(".commlist").html(response);
						notclick = true;
						fetchComms($(".activeComm"));
					}
				}
			})
		}
	}
}
function newConv(sel){
	var topic = $(sel).val();
	var classUl1 = $(".activated .showCase ul").attr("class");
	if(topic=="Submit"){
		var selected = $(".newConv").children("select").first();
		var selected1 = $(".newConv").children("select").last();
		var textarea = document.getElementsByTagName("textarea");
		var arrayForm = []
		var i = 0;
		if(selected1.length!=0 && selected != selected1){
			arrayForm[0] = $(selected1).val();
			i++;
		}
		var name = [];
		var noval;
		$(".newConv input").each(function(index, element) {
			if($(element).attr("type")=="radio" && i<100){
				if($(element).attr("checked")==true){
					arrayForm[i] = $(element).val();
					i++;
				}
			}
			else if(i<100){
				if($(element).val()!="Submit"){
					if($(element).val()!=""){
						arrayForm[i] = $(element).val();
						//console.log(i+ " " +element)
						i++;
					}
					else{
						noval = element;
						i = 100;
					}
				}
			}
		});
		if(textarea.length>0){
			if($(".newConv textarea").val()!=""){
				arrayForm[i] = $(".newConv textarea").val();
			}
			else{
				noval = ".newConv textarea";
				i = 100;
			}
		}
		if(i<100){
			console.log($(".activeComm"), $(".activeComm").attr('cat'), $(".activeComm").attr("cat"))
			$.ajax({
				url:"../administrator/newConv.php",
				type:"POST",
				data:{cat:$(".activeComm").attr('cat'), inputArray:arrayForm},
				success: function(response){
					//console.log(response);
					noSim = 1;
					if(response.indexOf('error-message') >= 0){
						$(".commlist").html(response);
						setTimeout(function(){
							$(".newConv .error-message").remove();
						},5000);
					}
					else{
						urlX = "../administrator/comms.php?start="+0+"&cat="+$(".activeComm").attr('cat');
						$.ajax({
							url:urlX,
							success: function(response){
								noSim = 0;
								$(".activated .showCase").html(response);
								$(".commlist").html(response);
								notclick = true;
								fetchComms($(".activeComm"));
							}
						})
					}
				}
			})
		}
		else{
			var det = $(noval).attr("term");
			window.alert("Please fill the details in '"+det+"'");
		}
	}
	else{
		var name = $(sel).attr("name");
		if(name=="nature"){
			$.ajax({
				url:"../administrator/newConv.php",
				type:"POST",
				data:{nature:name, cat:"ill"},
				success: function(response){
					if(classUl1=="talk"){
						//console.log(6)
						$(".activated .showCase").html(response);
					}
					else{
						//console.log(7)
						$(".commlist").html(response);
					}
				}
			})
		}
		else if(name=="number"){
			num = $(".commlist table tr").length;
			id = $(sel).attr('id');
			if(num < 6 && id == 'AddRow'){
				$(".commlist table tbody").append('<tr><td>'+num+'</td><td><input name="title-'+(num - 1)+'" term="Title No. '+num+'" class="breco"/></td><td><input name="author-'+(num - 1)+'" term="Author No. '+num+'" class="breco"/></td><td><input name="edition-'+(num - 1)+'" term="Edition No. '+num+'" class="breco"/></td><td><input name="publisher-'+(num - 1)+'" term="Publisher No. '+num+'" class="breco"/></td><td><input name="year-'+(num - 1)+'" term="Year No. '+num+'" class="breco"/></td></tr>');
			}
			else if(num > 2 && id == 'DeleteRow'){
				$(".commlist table tbody tr").last().remove();
			}
			else{
				if($(".commMenu #limit").length == 0/* || $(".commMenu #limit").attr('display') == 'none'*/){
					//if($(".commMenu #limit").length == 0){
						$(".commMenu").append("<p id='limit' style='color: red'>Operation Limit Reached!</p>");
					//}
					//else{
						//$("#limit").show();
					//}
					setTimeout(function(){
						$("#limit").remove();
					},3000);
				}
			}
		}
		else{
			//console.log(8)
			$.ajax({
				url:"../administrator/newConv.php",
				type:"POST",
				data:{cat:topic},
				success: function(response){
					if(classUl1=="talk"){
						//console.log(10)
						$(".activated .showCase").html(response);
					}
					else{
						//console.log(11)
						$(".commlist").html(response);
					}
				}
			})
		}
	}
}
function tableEdit(element){
	if(noSim==0){
		var iclass = $(element).attr("class");
		var variable = $(element).attr("var");
		if(variable){
			var pos = variable.indexOf("-");
			if(pos>0){
				var pos1 = variable.lastIndexOf("-");
				var pos2 = variable.lastIndexOf("(");
				p = 0;
				n= 0;
				pos5 = variable.indexOf(",",p);
				while(pos5>0){
					n++;
					p = pos5+1;
					pos5 = variable.indexOf(",",p);
				}
				var type = variable.slice(pos1+1)
				var tab = $(element).parent().parent().parent().attr("tab");
				var col = variable.slice(pos+1,pos1);
				var row = variable.slice(0,pos);
				if(pos2<=0){
					if(type=="number"){
						var html = '<input type='+type+' min="0" max="72" name="'+tab+'-'+col+'-'+row+'" class="tableEdit" onkeydown="inputSubmit(this,event)" />';
					}
					else if(type=="color"){
						var html = '<input type='+type+' name="'+tab+'-'+col+'-'+row+'" class="tableEdit1" onchange="inputSubmit(this,event)" />';
					}
					else{
						var html = '<input type='+type+' name="'+tab+'-'+col+'-'+row+'" class="tableEdit" onkeydown="inputSubmit(this,event)" />';
					}
					$(element).html(html);
					$(element).children("input").focus();
					noSim = 1;
				}
				else{
					var opts = []
					var html = '<select tag="select" name="'+tab+'-'+col+'-'+row+'" onchange="inputSubmit(this,event)" class="tableEdit1">';
					pos2 = pos2+1;
					for(i=0;i<=n;i++){
						if(i==0){
							opts[i] = "";
						}
						else{
							pos3 = variable.indexOf(",",pos2)
							opts[i] = variable.slice(pos2,pos3);
							pos2 = pos3+1;
						}
						html = html+'<option value="'+opts[i]+'">'+opts[i]+'</option>';	
					}
					html = html+"</select>";
					$(element).html(html);
					$(element).children("input").focus();
					noSim = 1;
				}
			}
			else{
				var pos = variable.indexOf(":");
				$(".activeTable").removeClass("activeTable");
				$(element).addClass("activeTable");
			}
		}
		else if(iclass=="tableOptions"){
			if($(element).val()=="Deactivate All"){
				var tab = $(element).siblings("table").attr("tab");
				noSim = 1;
				$.ajax({
					type:"POST",
					data:{action:$(element).val(), tab:tab},
					url:"../administrator/sql.php",
					success: function(response){
						noSim = 0;
						$(".table tbody tr td").each(function() {
						   var variable = $(this).attr("var");
							var pos = variable.indexOf("-");
							if(pos>0){
								var status = variable.slice(pos+1);
								if(status=="status"){
									$(this).text("inactive");
								}
							}
						});
					}
				})
			}
			if($(element).val()=="Activate All"){
				var tab = $(element).siblings("table").attr("tab");
				noSim = 1;
				$.ajax({
					type:"POST",
					data:{action:$(element).val(), tab:tab},
					url:"../administrator/sql.php",
					success: function(response){
						noSim = 0;
						$(".table tbody tr td").each(function(){
							var variable = $(this).attr("var");
							var pos = variable.indexOf("-");
							if(pos>0){
								var status = variable.slice(pos+1);
								if(status=="status"){
									$(this).text("active");
								}
							}
						});
					}
				})
			}
			if($(element).val()=="Move Up" || $(element).val()=="Move Down"){
				var value = $(".activeTable").text();
				var tab = $(".activeTable").parent().parent().parent().attr("tab");
				var action = $(element).val();
				noSim = 1;
				$.ajax({
					type:"POST",
					data:{val:value, tab:tab, action:action},
					url:"../administrator/sql.php",
					success: function(response){
						noSim = 0;
						var html = $(".activeTable").parent().html()
						var allhtml = $(".activeTable").parent().parent().html()
						var pos = 0;
						var trs = [];
						var i = 0;
						var newhtml = "";
						value2 = parseInt(value);
						while(allhtml.indexOf("<tr>",pos)>-1){
							pos1 = allhtml.indexOf("</tr>",pos);
							if($(element).val()=="Move Up" && i==(value2-1)){
								trs[i] = "<tr>"+html+"</tr>";
								trs[i+1] = allhtml.slice(pos,pos1+5);
								pos2 = trs[i+1].indexOf(">",8);
								pos3 = trs[i+1].indexOf("<",8);
								var value1 = trs[i+1].slice(pos2+1,pos3);
								value1 = parseInt(value1);
								value1 = value1+1;
								trs[i+1] = trs[i+1].slice(0,pos2+1)+value1+trs[i+1].slice(pos3);
								newhtml = newhtml+trs[i]+trs[i+1];
								pos = pos1+ 5 + trs[i].length;
								i = i + 2
								value2 = value2 - 1;
							}
							else if($(element).val()=="Move Down" && i==value2){
								pos = pos1+ 5;
								pos1 = allhtml.indexOf("</tr>",pos);
								trs[i] = allhtml.slice(pos,pos1+5);
								trs[i+1] = "<tr>"+html+"</tr>";
								pos2 = trs[i].indexOf(">",8);
								pos3 = trs[i].indexOf("<",8);
								var value1 = trs[i].slice(pos2+1,pos3);
								value1 = parseInt(value1);
								value1 = value1-1;
								trs[i] = trs[i].slice(0,pos2+1)+value1+trs[i].slice(pos3);
								newhtml = newhtml+trs[i]+trs[i+1];
								pos = pos1+ 5;
								i = i + 2;
								value2 = value2 + 1;
							}
							else{
								trs[i] = allhtml.slice(pos,pos1+5);
								newhtml = newhtml+trs[i];
								i++;
								pos = pos1+5;
							}
						}
						$(".activeTable").parent().parent().html(newhtml)
						$(".activeTable").text(value2)
					}
				})
			}
			if($(element).val()=="Delete"){
				var tab = $(element).attr("name");
				var id = $(".activeTable").text();
				noSim = 1;
				$.ajax({
					type:"POST",
					data:{action:$(element).val(), tab:tab, id:id},
					url:"../administrator/sql.php",
					success: function(response){
						noSim = 0;
						//console.log(response);
						var html = $(".activeTable").parent().html()
						var allhtml = $(".activeTable").parent().parent().html()
						var maxid = parseInt($(".activeTable").parent().parent().children().eq(1).children().eq(0).text());
						var pos = 0;
						var trs = [];
						var html1 = "";
						if($(element).attr("seq")=="top"){
							var i = maxid+1;
						}
						else{
							var i = 0;
						}
						var newhtml = "";
						var p = html.length;
						value = parseInt(id);
						while(allhtml.indexOf("<tr>",pos)>-1){
							pos1 = allhtml.indexOf("</tr>",pos);
							if($(element).attr("seq")=="top"){
								j = maxid - i + 1;
								//console.log("here1");
							}
							else{
								j = i;
							}
							if(i>=value){
								//console.log(j);
								if(i==value){
									pos = pos1+ 5;
									pos1 = allhtml.indexOf("</tr>",pos);
								}
								trs[j] = allhtml.slice(pos,pos1+5);
								pos2 = trs[j].indexOf(">",8);
								pos3 = trs[j].indexOf("<",8);
								if($(element).attr("seq")=="top" && (i-1)==maxid){
									trs[j] = trs[j].slice(0,pos2+1)+trs[j].slice(pos3);
								}
								else{
									if(i>value){
										trs[j] = trs[j].slice(0,pos2+1)+(i)+trs[j].slice(pos3);
									}
								}
								//console.log(trs[j]+"     ");
								newhtml = newhtml+trs[j];
								pos = pos1+ 5;
								if($(element).attr("seq")=="top"){
									i--;
								}
								else{
									i++;
								}
							}
							else{
								//console.log(j);
								trs[j] = allhtml.slice(pos,pos1+5);
								//console.log(trs[j]+"     ");
								newhtml = newhtml+trs[j];
								pos = pos1+5;
								if($(element).attr("seq")=="top"){
									i--;
								}
								else{
									i++;
								}
							}
						}
						$(".activeTable").parent().parent().html(newhtml)
					}
				})
			}
			if($(element).val()=="Add New"){
				var tab = $(element).attr("name");
				var field = $(element).attr("field");
				var sample = $(".showCase tbody").children().eq(1).html();
				noSim = 1;
				$.ajax({
					type:"POST",
					data:{action:$(element).val(), tab:tab, field:field, sample:sample},
					url:"../administrator/sql.php",
					success: function(response){
						noSim = 0;
						if($(element).attr("seq")=="top"){
							var html = $("#Database .showCase tbody").html();
							var html1 = $(".showCase tbody tr").eq(0).html();
							var pos = html.indexOf("</tr>");
							html = html.slice(pos+5);
							html = "<tr>"+html1+"</tr>"+response+html;
							//console.log(html1+"       "+response);
							$("#Database .showCase tbody").html(html)
						}
						else{
							//console.log(response);
							$("#Database .showCase tbody").append(response);
						}
					}
				})
			}
		}
	}
}
function inputSubmit(element,e){
	var id = $(element).attr('id');
	var name = $(element).attr('name');
	if(id=="commSend"){
		Var = $("#comm").val();
		poss = Var.indexOf("___");
		if(poss>0){
			window.alert("Please Don't use '___' in the comments!");
		}
		else if(jsonobj!=""){
			noSim = 1;
			$.ajax({
				url:"../administrator/conversation.php",
				type:"POST",
				data:{comm: Var, name:name, obj:"yes"},
				success: function(response){
					/*var html = $(".activated .showCase ul").html();
					html = html+response;
					$(".activated .showCase ul").html(html);
					$(element).attr('value','');*/
					name = name.slice(4);
					//console.log(response);
					$.ajax({
						url:"../administrator/conversation.php?conversation="+name+"&start="+0,
						success: function(response){
							$(".commlist").html(response);
							$(".activated .showCase").html(response);
							noSim = 0;
						}
					})	
				}
			})
		}
		else{
			noSim = 1;
			$.ajax({
				url:"../administrator/conversation.php",
				type:"POST",
				data:{comm: Var, name:name},
				success: function(response){
					/*var html = $(".activated .showCase ul").html();
					html = html+response;
					$(".activated .showCase ul").html(html);
					$(element).attr('value','');*/
					name = name.slice(4);
					//console.log(response);
					$.ajax({
						url:"../administrator/conversation.php?conversation="+name+"&start="+0,
						success: function(response){
							$(".commlist").html(response);
							$(".activated .showCase").html(response);
							noSim = 0;
						}
					})	
				}
			})
		}
	}
	if($(element).attr("func")=="replacer"){
		var value = $(element).val();
		value = parseInt(value);
		var opts = document.getElementsByTagName("option");
		$("#comm").text($(opts[value]).text())
	}
	var e = e || window.event;
	var keycode;
	var type = $(element).attr('type');
	if (window.event){
		// get key which is pressed in chrome
		keycode = event.which ? window.event.which : window.event.keyCode;
	}
	if(!keycode){
		// get key which is pressed in mozilla
		keycode = e.keyCode || e.which;
	}
	if(keycode==13){
		var Var = $(element).attr('value');
		var iclass = $(element).attr('class');
		if(type=="number"){
			var pos = name.indexOf("-");
			var pos1 = name.lastIndexOf("-");
			var tab = name.slice(0,pos);
			var col = name.slice(pos+1,pos1);
			var row = name.slice(pos1+1);
			noSim = 1;
			$.ajax({
				url:"../administrator/sql.php",
				type:"POST",
				data:{edit: Var, tab:tab, row:row, col:col},
				success: function(response){
					noSim = 0;
					$(element).parent().text(Var);
				}
			})
		}
		else if(iclass=="tableEdit"){
			var pos = name.indexOf("-");
			var pos1 = name.lastIndexOf("-");
			var tab = name.slice(0,pos);
			var col = name.slice(pos+1,pos1);
			var row = name.slice(pos1+1);
			noSim = 1;
			$.ajax({
				url:"../administrator/sql.php",
				type:"POST",
				data:{edit:Var, tab:tab, row:row, col:col},
				success: function(response){
					noSim = 0;
					//console.log(response);
					if(col=="image"){
						$(element).parent().html("<img src='file:\\"+response+"' width=75 />");
					}
					else{
						$(element).parent().text(Var);
					}
				}
			})
		}
	}
	else{
		var Var = $(element).attr('value');
		var name = $(element).attr('name');
		var pos = name.indexOf("-");
		var pos1 = name.lastIndexOf("-");
		var tab = name.slice(0,pos);
		var col = name.slice(pos+1,pos1);
		var row = name.slice(pos1+1);
		if(type=="color"){
			noSim = 1;
			$.ajax({
				url:"../administrator/sql.php",
				type:"POST",
				data:{edit:Var, tab:tab, row:row, col:col},
				success: function(response){
					noSim = 0;
					Var = Var.toUpperCase();
					$(element).parent().text(Var);
				}
			})
		}
		if($(element).attr("tag")=="select"){
			noSim = 1;
			$.ajax({
				url:"../administrator/sql.php",
				type:"POST",
				data:{edit:Var, tab:tab, row:row, col:col},
				success: function(response){
					noSim = 0;
					$(element).parent().text(Var);
				}
			})
		}
	}
}
function fileSubmit(file){
	jsonobj = $(file).contents();
}
function textarea(te,e){
	var p = 0;
	var x = $(te).val().indexOf(" ",p);
	var words = 0;
	var y;
	while(x>-1){
		y = p;
		p = x+1;
		if($(te).val().slice(y,x+2)!=" " && $(te).val().slice(y,x+1)!=" "){
			if(words<=74){
				words++;
			}
			if(words>=75){
				//console.log(x,y,p,words);
				if($(te).val().indexOf(" ",p)>-1){
					$(te).val($(te).val().slice(0,p));
					x = -1;
				}
			}
		}
		if(words<=75){
			if(x!=-1){
				x = $(te).val().indexOf(" ",p);
			}
			if(x==-1 && $(te).val().slice(p)!=""){
				if(words!=75){
					words++;
				}
				else{
					$(te).val($(te).val().slice(0,p));
				}
			}
		}
	}
	if(p==0 && $(te).val()!=""){
		words++;
	}
	else if(p==0 && $(te).val().slice(p)!="" && words<76){
		words++;
	}
	$(te).siblings("h2").text("("+words+" words)");
}
//default js styling
FI.defaultStyling = {
    init: function () {
        $(".contentFix h2, h1").each(function (e) {
            if ($(this).find("a").length != 0) {
                var txt = $(this).find("a").text()
                var ind = $(this).find("a").text().indexOf(" ", 0);
                if (ind != -1) {
                    $(this).find("a").html("<span>" + txt.slice(0, ind) + "</span> " + txt.slice(ind))
                } else {
                    $(this).find("a").html("<span>" + txt + "</span> ")
                }
            } else {

                var txt = $(this).text()
                 var ind = $(this).text().indexOf(" ", 0);
                if (ind != -1) {
                    $(this).html("<span>" + txt.slice(0, ind) + "</span>" + txt.slice(ind))
                } else {
                    $(this).html("<span>" + txt + "</span>")
                }

            }
        })
        $(".threeCol img, .oneCol img, .twoCol img").each(function () {
            //var obj = this.parent;
            if ($(this).parent().hasClass("bannerCont") == false) {
                if ($(this).parent().get(0).nodeName == "A") {
                    if ($(this).parent().hasClass("logo") != true && $(this).hasClass("vOverlay") != true) {
                        $(this).parent().wrap("<div class='imgFrame'></div>")
                    }

                } else {
                    $(this).wrap("<div class='imgFrame'></div>")
                }
                $(this).parents(".imgFrame").width($(this).width() + 6)
                $(this).parents(".imgFrame").height($(this).height() + 6)
            }

        })
        //show more btn styling
        $(".hModuleWrapper .showMore").addClass("off").attr("href", "javascript:void(0)").wrapInner("<span>")
	
	$(".desc table").addClass("tableGrid").attr({
			'cell-padding': 0,
			'cell-spacing': 0,
			'border': 0,
			'width': '100%'
		});

    }
}
FI.showHideCont = {
 	init:function(){
		var dataBack = [];
		var datapH = []
		var dataH = []
		
		//$(".profileDescription .desc").html();
		$(".hModuleWrapper").each(function(e){
			dataBack[e] = $(".desc", this).html();
			dataH[e] = $(".desc", this).height();
			$(this).find(".desc").html(dataBack[e].slice(0,350)+"...</p>")
			//$(this).find(".desc").height($(this).find(".desc").height()).css("overflow","hidden")
			datapH[e] = $(this).find(".desc").height()
		})
		//$(".showMore").remove()
		//$(".hModuleWrapper").append("<a href='javascript:void(0)' class='showMore off'><span>show more</span></a>")
		$(".showMore").addClass("off")
		$(".showMore").click(function(){
			var indx = $(".showMore").index(this)
			if ($(this).hasClass("on")) {
				$(".hModuleWrapper .desc").eq(indx).html(dataBack[indx].slice(0,350)+"...</p>")
				
				$(this).find("span").text("show more")
				$(this).removeClass("on").addClass("off")
			}
			else{
				$(".hModuleWrapper .desc").eq(indx).html(dataBack[indx])
					$(".showMore").eq(indx).find("span").text("show less")
					$(".showMore").eq(indx).addClass("on").removeClass("off")				
			}
		})

		
	}
 }
FI.dataretrieval = {
	init:function(){
		$("#hmenu ul li a").click(function(){
			var disp = $(this).text();
			$.ajax({
				url:"upload.php?disp="+disp,
				success: function(response){
					$(".service_box").html(response);
				}
			})
			/*var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					console.log(xmlhttp.responseText);
					$(".newarrivalsmb").html(xmlhttp.responseText);
				}
			}
			xmlhttp.open("GET", "http://localhost/BITS Pilani Library2/upload.php?disp="+disp, true);
			xmlhttp.send();*/
		})
	}
}
FI.acc = {
	init:function(obj){
		$(obj).find(".desc").each(function(){
			$(this).height($(this).height())
		})
		var lc = window.location.href;
		var ix = 0
		if(lc.search("id")!=-1)
		{
			ix = lc.slice(lc.lastIndexOf("=")+1)
		}
		
		$(obj).find(".desc").hide()
		//$(obj).find(".accHead").eq(ix).addClass("on")
		//$(obj).find(".desc").eq(ix).slideDown(500)
		$(obj).find(".accHead").click(function(){
			var indx = $(obj).find(".accHead").index(this);
			
			if($(this).hasClass("on")){
				$(obj).find(".accHead").eq(indx).removeClass("on");
				$(obj).find(".desc").eq(indx).slideUp();
			}
			else{
				$(obj).find(".desc").slideUp()
				$(obj).find(".accHead").removeClass("on")
				$(obj).find(".accHead").eq(indx).addClass("on")
				$(obj).find(".desc").eq(indx).slideDown(500)
			}
			
		})
	}
}

FI.tableAlter = {
	init:function(obj){
		$(obj).each(function(){
			$(this).find("tr:odd").addClass("odd")
		})
	}
}

function browserDetect() {
    var ua = $.browser;
    var noteElement = document.createElement("div")
    $(noteElement).addClass("note");
    $(noteElement).prependTo(document.body);

    if (ua.msie && ua.version.slice(0, 3) == 6.0) {
        $(".note").html("<div class='browserNote'><div class='browserWrapper'><p>Please note that you are currently running <strong>IE 6.0</strong>. We would request you to kindly upgrade to a <strong>IE 7.0 or above</strong> to view this  site properly. <br/>You can also view this in <strong>Mozila Firefox, Chrome or Safari</strong>.</p><ul><li><a href='#' class='closeNote'>Close this Message</a></li><li class='last'><a href='http://windows.microsoft.com/en-IN/internet-explorer/downloads/ie-9/worldwide-languages' target='_blank'>Upgrade to IE 9.0</li></ul></div></div>");
    }
    else {
        return false;
    }

    var closeBtn = $(".closeNote")
    $(closeBtn).click(function () {
        $(".note").remove();
    });
}

function noImage(){
	var horMod = $(".hModuleWrapper");
	//alert("here")
	$(horMod).each(function(){
		var imgEl = $("img", this);
		var heading = $(".desc h2", this);
		if($(imgEl).length===0){
			//alert("here")
			$(heading).css({
				'width':500
			})
		}
	})
}
//footer link functionality
FI.footerLinkAni={
	init:function(){
		$(".footerFix > ul").height($(".footerFix ul").height())
		$(".footerFix > ul").hide()
		$(".footerFix h2").removeClass("on")
		$(".footerFix h2").click(function(){
			if($(this).hasClass("on")==true)
			{
				$(this).removeClass("on").next().slideUp()
			}else{
				$(this).addClass("on").next().slideDown()
			}
		})
	}
}
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#newpic').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}
// dom ready function
$(document).ready(function () {
	if($("#second-disci").length!=0){
		$(".first").hide();
		$("#second-disci").hide();
		$("#status").change(function(e) {
			$(".first").fadeOut();
			$(".first").each(function(index, element) {
				//console.log(index,$("#status").val(),$(element).attr('student'),$(element).attr('faculty'),$(element).attr('rsch'),$(element).attr('admin'))
               if($("#status").val()=="Student"){
					if($(element).attr('student')==1){
						$(element).fadeIn();
					}
				}
				else if($("#status").val()=="Faculty"){
					if($(element).attr('faculty')==1){
						$(element).fadeIn();
					}
				}
				else if($("#status").val()=="Research Scholar"){
					if($(element).attr('rsch')==1){
						$(element).fadeIn();
						$(".second").fadeIn;
					}
				}
				else if($("#status").val()=="Staff (Non-Teaching)"){
					if($(element).attr('non-fac')==1){
						$(element).fadeIn();
						$(".second").fadeIn;
					}
				}
				else{
					if($(element).attr('admin')==1){
						$(element).fadeIn();
					}
				} 
            });
        });
		$("#dualdeg").focus(function(e){ 
			$("#second-disci").fadeIn();
		})
		$("#deg").focus(function(e) {
			$("#second-disci").fadeOut();
			$("#dualdept").val('');
        });
	}
	if($("#newpic").length!=0){
		$("#newpic").attr('src', "../images/preview.jpg");
		$("#avatar").change(function(){
    		readURL(this);
		});
	}
	if($(".admin-databListing").length!=0){
		FI.admin.init();
	}
    browserDetect();
    noImage();
    FI.globalNav.init();
	FI.login.init();
    FI.defaultStyling.init();
    FI.footerLinkAni.init();
	FI.customCarousel.init();
	FI.noticeCarousel.init();
	FI.lowermenu.init();
	FI.sCarousel.init();
	FI.dataretrieval.init();
	FI.communications.init();

    if ($(".showMore").length != 0) {
        FI.showHideCont.init();
    }
    if ($(".acc").length != 0) {
        FI.acc.init(".acc");
    }

    if ($(".galleryColBox").length != 0) {
        $(".galleryColBox").colorbox()

    }
    if ($(".videoLink").length != 0) {
        $(".videoLink").colorbox({ current: "video {current} of {total}", width: 520, height: 450, onComplete: function () {
            if ($(this).hasClass("videoLink")) {
                var videoLink = $(this).attr("href");
                $("#cboxLoadedContent").html("<div id='mediaplayer'></div>");

                jwplayer("mediaplayer").setup({
                    flashplayer: "jwplayer/player.swf",
                    file: videoLink,
                    'width': '470',
                    'height': '320'
                });
            }
        } 
        });
    }
    $(".bannerMsg").remove()
    if ($(".tableGrid").length != 0){
        FI.tableAlter.init(".tableGrid")
	}
})

