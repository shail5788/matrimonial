// JavaScript Document
jQuery(document).ready(function()
{ 


  
jQuery(".online-chat .title").click(function()
  {
	 if(jQuery(".chat-list-box").css("display")=="none")
	  {
		jQuery(".chat-list-box").slideDown(300);
	  }
	 else
	  {
		jQuery(".chat-list-box").slideUp(300);
	  }
	  
  })  
/* chat close*/    

/* profile start*/
jQuery(".dob li").click(function()
	{
		if(jQuery(this).find(".dobdropbox").css("display")=="none")
		{
		  jQuery(".dobdropbox").slideUp(300);
		  jQuery(this).find(".dobdropbox").slideDown(300);
		  event.stopPropagation();
		}
		else
		{
			jQuery(".dobdropbox").slideUp(300);
			event.stopPropagation();
		}
	}
)

jQuery("#profile-self").click(function()
	{
			jQuery("#profile-self").next("ul").fadeIn(300);
			event.stopPropagation();
	
	}
)

jQuery("#profile-self ul li").click(function()
	{
			jQuery("#profile-self ul li").removeClass("active")
			jQuery(this).addClass("active")
	
	}
)



/* profile start*/


/* home search start*/
jQuery(".search-tab").click(function()
  {
	jQuery(".search-row").addClass("active");
  }
)

jQuery(".drop-box .box").click(function()
  {
	if(jQuery(this).find("ul").css("display")=="block")  
	{
		jQuery(".drop-box .box ul").slideUp(300);
		
	}  
	else
	{
		jQuery(".drop-box .box ul").slideUp(300);
		jQuery(this).find("ul").slideDown(300);
		jQuery(".search-row .drop").css("overflow","inherit");
	}
  }
)


/* home search close*/
  
/*list detail start*/
jQuery(".partner-detail-box .tab li").click(function()
 {
    jQuery(".partner-detail-box .tab li").removeClass("active");
	jQuery(this).addClass("active");
	var name= jQuery(this).attr("name")
	var target= jQuery("#"+name).offset().top-80+"px";
    jQuery("body, html").animate({"scrollTop":target+"px"},400); 
 }
)
/*list detail close*/  
 
/*slider start*/  
var blankvalue=0;
var label=jQuery(".matched .tab ul li").length;
	if(label>4)
	{
		jQuery(".arrow").fadeIn(300)
	}
var count=jQuery(".matched .tab ul li").each(function()
 {
	var count=jQuery(this).outerWidth();
	blankvalue += count;
	jQuery(".matched .tab ul").css("width",blankvalue+50+"px")

 }
)

var blankvalue=173;

jQuery("#right-arrow").click(function()
  {
	 
	 var slidepoint=jQuery(".matched .tab ul").css("margin-left");	 
	 var slidepoint1=slidepoint.replace('px','').replace('-','');
	 var mainpoint=parseInt(slidepoint1)+blankvalue;
	 if(slidepoint1>450)
	  {
		 jQuery("#right-arrow").fadeOut(300);
	  }
	 else if(slidepoint1==0)
	  {
		 jQuery("#left-arrow").fadeIn(300);
	  }
	  
	 jQuery(".matched .tab ul").animate({"marginLeft":"-"+mainpoint+"px"})
  }
)


jQuery("#left-arrow").click(function()
  {
	 
	 var slidepoint=jQuery(".matched .tab ul").css("margin-left");
	 var slidepoint1=slidepoint.replace('px','').replace('-','');
	 var mainpoint=parseInt(slidepoint1)-blankvalue;
	 if(slidepoint1<560)
	  {
		 jQuery("#right-arrow").fadeIn(300);
	  }
	 if(slidepoint1<100)
	  {
		 jQuery("#left-arrow").fadeOut(300);
	  }
	 
	 jQuery(".matched .tab ul").animate({"marginLeft":"-"+mainpoint+"px"})
	 
  }
)


/*slider start*/  
   
/*all matches start*/
jQuery(".matched .tab ul li").click(function()
 {
    
	jQuery(".matched .tab ul li").removeClass("active");
	jQuery(this).addClass("active");
	var target=jQuery(this).attr("name");
	jQuery(".searchlist").fadeOut();
	jQuery("#"+target).fadeIn(300);
 }
)
/*all matches close*/


/*setting start*/
jQuery(".setting .profile-tab ul li").click(function()
 {
    
	jQuery(".setting .profile-tab ul li").removeClass("active");
	jQuery(this).addClass("active");
	var target=jQuery(this).attr("name");
	jQuery(".hide-profile").hide();
	jQuery("#"+target).fadeIn(300);
 }
)

jQuery(".check").click(function()
 {
   jQuery(this).toggleClass("active");
 }
)
/*setting close*/

/*filterbtn stat*/
jQuery(".desired .box-wrap .btn").click(function()
 {
	if(jQuery(this).html()=="Filter ON")
	{
		jQuery(this).removeClass("active");
		jQuery(this).html("Filter OFF");
	}
	else
	{
	 jQuery(this).addClass("active");
	 jQuery(this).html("Filter ON");
	  }
	 
 }
)

jQuery("#check").click(function()
 {
   jQuery(this).toggleClass("active");
 }
)

/*filterbtn close*/

  
});

/*scroll start*/
jQuery(window).scroll(function()
  {
	 if(jQuery(this).scrollTop()>500)
	 {
		jQuery(".partner-detail-box .tab").addClass("active");
	 }
	 else
	 {
		jQuery(".partner-detail-box .tab").removeClass("active"); 
	 }
  })

/*scroll close*/



function popupOpen(elementid)
{
  if(jQuery("#"+elementid).css("display")=="none")
  {
    //alert("hello")
	jQuery(".overlay-bg").fadeIn(300);
	jQuery(".popup-box").hide();
    jQuery("#"+elementid).fadeIn(300);
    jQuery(window).scrollTop(0);
  }
  else
  {
    jQuery(".overlay-bg").fadeOut(300);
    jQuery(".popup-box").fadeOut(300);
  }	
}



/*fade start*/
function fade(searchbox)
	{
	 jQuery(window).scrollTop(0);
	   if(jQuery("#"+searchbox).css("display")=="block")
		 { 
		   jQuery(".overlay").fadeOut(300);
		   jQuery("#"+searchbox).fadeOut(300);	   
		 }
	   else	 
	     {
			jQuery(".overlay").fadeIn(300);
			jQuery("#"+searchbox).fadeIn(300);	    
		 }
	}
/*fade close*/


 /*inbox start*/
function inbox(selectfield)
  {
    jQuery(".subpanel").hide();
    jQuery("#"+selectfield).fadeIn(300);
  }

function leftbox(selectfield)
  {
    jQuery(".panel").hide();
    jQuery("#"+selectfield).fadeIn(300);
	jQuery("#"+selectfield).find(".subpanel").first().css("display","block");
	jQuery("#"+selectfield).find(".tab ul li").first().addClass("active");
  }


jQuery(document).ready(function()

{ 
	jQuery(".rightbar .tab ul li").click(function()
	 {
		jQuery(".rightbar .tab ul li").removeClass("active");
		jQuery(this).addClass("active");
	 }
	)
	
	jQuery(".leftbar ul li a").click(function()
	 {
		jQuery(".leftbar ul li a").removeClass("active");
		jQuery(this).addClass("active");
	 }
	)


})

  
/*inbox close*/


