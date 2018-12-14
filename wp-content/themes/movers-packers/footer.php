<?php

?>

  <div class="container-fluid footerInall" style="background-color:#66bc29;">
<!--	<div class="copyright-wrapper"> -->
    <div class="container">
    <div class="row">
	
      <div class="col-md-3 col-sm-4 col-xs-4 copyright-txtt">
<p class="footer-unicef">Supported by &nbsp<a href="http://www.unicef.org" target="_blank"><img src="/wp-content/uploads/2017/09/UNICEF_ForEveryChild_White_Horizontal_RGB_ENG.png" alt="UNICEF" classs="footerUnicef"></a></p>

</div>
 <div class="col-md-7 col-sm-4 col-xs-4 copyright-txtt" style="text-align:center;">
<p>© 2017 State Child Protection Society.<a href="https://scpsassam.org/terms-of-use/"> Terms of Use</a> | <a href=" https://scpsassam.org/disclaimer/">Disclaimer</a> | <a href="https://scpsassam.org/privacy-policy/">Privacy Policy</a> | <a href="/sitemap/">Sitemap </a></p>
</div>

<!-- <div class="col-md-3 col-sm-12 col-xs-12 copyright-txtt copyright-txttpadding" style="text-align:center; height:0px !important;">
<p> -->
<!--Visitor Count:--> 
<!-- Start of SimpleHitCounter Code -->
<!-- <div align="center" class="hitcounter" style="font-size: 12px !important; color: #fff;margin-top: -11px;"><a href="http://www.freecounterstat.com" title="web hit counter"><img src="http://counter3.01counter.com/private/freecounterstat.php?c=ec99fd8e2055981622b127cd29bbeb5f" border="0" title="web hit counter" alt="web hit counter" style="height:25px;"></a><br>Visit Counter</div> -->
<!-- End of SimpleHitCounter Code -->

<!-- </p></div> -->

                <div class="col-md-2 col-sm-4 col-xs-4  sdrclogo copyright-txtt">
		<p class="footer-sdrc">Powered by<a href="http://www.sdrc.co.in" target="_blank" style="font-size: 14px; text-decoration: none; font-weight:400; color:#fec02c;">&nbsp;SDRC</a></p>
		</div>
	</div>
    		</div>
    <div class="clear"></div>
  </div>


<!--end #pagefixed-->
<?php wp_footer(); ?>
<script type="text/javascript" src="/wp-content/themes/movers-packers/js/jquery.smartmenus.js"></script>

    <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="/wp-content/themes/movers-packers/js/jquery.smartmenus.bootstrap.js"></script>
<script>
jQuery("#main-menu > li:not(.open)").click(function(){
	if(!jQuery(this).hasClass("open")){
		jQuery(this).siblings().removeClass('open');
		jQuery(this).siblings().find('a[area-expanded]').attr("area-expanded", "false");
		jQuery(this).siblings().find('a.highlighted[area-expanded]').removeClass("highlighted");
		jQuery(this).siblings().find('ul.dropdown-menu').css({"display": "none"});
		jQuery(this).siblings().find('ul.dropdown-menu').attr({"area-expanded": "false", "area-hidden": "true"});
	}
})
</script>
<script type="text/javascript">
jQuery(document).ready(function() {
 if(window.location.pathname.indexOf("scpsassam") >= 0){
		jQuery(".home-active").addClass("active");
		jQuery(".home-active").siblings().removeClass("active");
	} 

     if(window.location.pathname.indexOf("about-us-2") >= 0){
		jQuery(".active-about").addClass("active");
		jQuery(".active-about").siblings().removeClass("active");
	} 

  if(window.location.pathname.indexOf("organisation-structure") >= 0){
		jQuery(".active-org").addClass("active");
		jQuery(".active-org").siblings().removeClass("active");
	}  
if(window.location.pathname.indexOf("resources") >= 0){
		jQuery(".active-resource").addClass("active");
		jQuery(".active-resource").siblings().removeClass("active");
	}  

 if(window.location.pathname.indexOf("tenders") >= 0 || window.location.pathname.indexOf("letters") >= 0 || 	
 window.location.pathname.indexOf("ordernotifications") >= 0){
		jQuery(".active-order").addClass("active");
		jQuery(".active-order").siblings().removeClass("active");
	}  

  if(window.location.pathname.indexOf("key-contacts/scps") >= 0 || window.location.pathname.indexOf("dcpu-contacts") >= 0 || window.location.pathname.indexOf("jjb") >= 0 || window.location.pathname.indexOf("sjpu") >= 0  || window.location.pathname.indexOf("ccis") >= 0 || window.location.pathname.indexOf("registered-institutions") >= 0){
		jQuery(".active-key").addClass("active");
		jQuery(".active-key").siblings().removeClass("active");
	} 
 if(window.location.pathname.indexOf("cwc") >= 0){
		jQuery(".active-key").addClass("active");
		jQuery(".active-key").siblings().removeClass("active");
	}   

 if(window.location.pathname.indexOf("gallery") >= 0 || window.location.pathname.indexOf("media-gallery") >= 0){
		jQuery(".active-gallery").addClass("active");
		jQuery(".active-gallery").siblings().removeClass("active");
	}    

if(window.location.pathname.indexOf("rti") >= 0){
		jQuery(".active-rti").addClass("active");
		jQuery(".active-rti").siblings().removeClass("active");
	} 
if(window.location.pathname.indexOf("contact-us-2") >= 0){
		jQuery(".active-contact-us").addClass("active");
		jQuery(".active-contact-us").siblings().removeClass("active");
	}    


 
     
});
		
	</script>
<script type="text/javascript">
function changemysize(myvalue) {
   
	//var fontSize = jQuery("#mymain").css('font-size');
	//if(fontSize == 16)
		//{
	//jQuery("#members-details").css("font-size", 14+"px");
		//	}
	jQuery("#mymain *").css("font-size", myvalue+"px");
}
jQuery(window).scroll(function(){
			if(jQuery(window).scrollTop()>100)
			jQuery('#head2').addClass('nav-fixed');
			
			else
				jQuery('#head2').removeClass('nav-fixed');
		})

//jQuery("#txtArea").resizable();
</script>


</body></html>