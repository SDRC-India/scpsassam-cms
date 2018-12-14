<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Movers Packers
 */
?>
<div id="footer-wrapper">
   <div class="container footerfix">
    <div class="fixed3">
      <div class="three-col" style="padding-top: 0px; padding-margin: 0px;">
        <div class="three-col-content">
          <h3>Photo Gallery</h3>
          <div class="three-col-img"><a href="#"><img src="http://scpsbihar.org/hindi/wp-content/uploads/2016/11/gallery-pic.jpg" 						alt="Photo Gallery" class="img-responsive"></a></div>
        </div>
      </div>
    </div>
    <div class="fixed3">
      <div class="three-col">
        <div class="three-col-content">
          <h3>Key Contacts</h3>
          <ul>
          <li><a href="#">DCPU</a></li>

		  <li><a href="#">CWC</a></li>

		  <li><a href="#">JJB</a></li>

		  <li><a href="#">SJPU</a></li>

		  <li><a href="#">CCIs</a></li>

		  <li><a href="#">Registered Institutions</a></li>

          </ul>
        </div>
      </div>
    </div>
    <div class="fixed3 last_column">
      <div class="three-col">
        <div class="three-col-content">
          <h3>Organisation Structure</h3>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. <br>
            <br>
            <a href="#" class="btn btn-default">Read more →</a></p>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!--end .container-->
  <div class="container">
    <div class="cols-3 widget-column-1">
      <p> <a href="http://gov.bih.nic.in/" target="_blank"><img src="http://scpsbihar.org/hindi/wp-content/uploads/2016/12/bihar_logo_red.jpg" alt="Bihar Government" style="width: 130px;" ></a> <a href="#"><img src="http://scpsbihar.org/hindi/wp-content/uploads/2016/12/scps_logo-1.png" alt="SCPS Bihar" style="width: 111px;"></a> <a href="http://www.unicef.org" target="_blank"><img src="http://scpsbihar.org/hindi/wp-content/uploads/2016/11/unicef_logo.jpg" alt="Unicef" style="width: 116px;" ></a> </p>
    </div>
    <!--end .widget-column-1-->
   <div class="cols-3 widget-column-2">
	
<!-- Start of SimpleHitCounter Code -->
<div align="center"><a href=" target="_blank"><img src="http://simplehitcounter.com/hit.php?uid=2203449&f=16777215&b=0" border="0" height="18" width="83" alt="web counter"></a><br><a style="text-decoration:none;">Visits</a></div>
<!-- End of SimpleHitCounter Code -->


   </div>
	
	<!--end for hit counter-->
	<div class="cols-3 widget-column-3">
	<span class="to-top pull-right"><a href=""><i class="fa fa-angle-up fa-2x"></i></a></span>
   </div>
    <div class="clear"></div>
  </div>
  <!--end .container-->
  <div class="copyright-wrapper">
    <div class="container">
      <div class="copyright-txt"><?php esc_attr_e('&copy; 2016','movers-packers');?> <?php bloginfo('name'); ?>. <?php esc_attr_e('     Terms of Use  |  Disclaimer', 'movers-packers');?></div>
                <div class="design-by"><?php printf('<a  rel="nofollow" >Powered by</a>' ); ?>&nbsp;&nbsp;<a href="http://www.sdrc.co.in" target="_blank"><img src="http://scpsbihar.org/hindi/wp-content/uploads/2016/11/sdrc-logo.png" alt="SDRC" height="30px"></a></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
</div>
<!--end #pagefixed-->
<?php wp_footer(); ?>
</body></html>