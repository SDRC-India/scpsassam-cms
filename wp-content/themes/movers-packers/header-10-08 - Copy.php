<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Movers Packers
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
<style>
@media screen and (max-width: 767px)
{
.sitenav ul li ul {
    display: none !important;
}
.sitenav ul li:hover ul {
    display: block !important;
background-color: #fff !important;
}

}
</style>
</head>

<body <?php body_class(''); ?>  id="mymain">

<div class="navbar navbar-default" role="navigation">
<div id="pagefixed">
  <div class="headertop">
   <!-- <div class="container"> -->
        <div class="col-md-3 col-sm-3 col-xs-3">
            <ul class="header-links">
	       <li class="hindicls"><a href="http://scpsbihar.org">English</a></li>
              <li ><a href="#">???????</a></li> 
            </ul>
          </div>
	 <div class="col-md-6 col-sm-6 col-xs-6 langOption">
        <div class="social-icons">		
	<ul style="margin: 0; padding: 0;">
	<li><a href="javascript:void(0);" onclick="changemysize(12);"><small>-A</small></a></li>
	<li><a href="javascript:void(0);" onclick="changemysize(14);">A</a></li>
	<li><a href="javascript:void(0);" onclick="changemysize(16);"><big>+A</big></a></li>
	<li><a href="../scpsassam/help/" >Help</a></li>
	<li><a href="../scpsassam/faq/" >FAQ</a></li>
	<li class="mblsitemap"><a href="../scpsassam/sitemap/" >Sitemap</a></li>
	 <li class="mblres"><a href="#"><i class="fa fa-lg fa-facebook"></i></a></li>
	<li class="twt"><a href="#"><i class="fa fa-lg fa-twitter"></i></a></li>
         </ul>
         </div> 
	</div> 
<?php if ( '' !== get_theme_mod( 'twitt_link' ) ) { ?>
          <div class="col-md-3 col-sm-3 col-xs-3" >
            <div class="header-search"><?php get_search_form(); ?></div>
        </div> 
          <?php } ?>
        </div>
        <div class="clear"></div>
   
  </div><!-- end .headertop -->
       <div class="clear"></div>       
  <div class="header <?php if ( !is_front_page() && ! is_home() ) { ?>innerheader<?php } ?>">
        <div class="container">
		<div class="row">

            	<div class="col-md-2 col-sm-2 col-xs-3">
			<a href=""><img class="scpsassamLogo" src="/scpsassam/wp-content/uploads/2017/08/SCPS_LOGO.png" alt="SCPS Assam"></a>
			
			</div>
			<div class="col-md-8 col-sm-8 col-xs-6 siteHeading">
								<h3>State Child Protection Society</h3>
								<h4>Directorate of Social Welfare Department</h4>
								<h4>Government of Assam</h4>
			
            </div>
			           
		
            <div class="col-md-2 col-sm-2 col-xs-3 logoAssam"> 
            
             <?php if ( ! dynamic_sidebar( 'header-info' ) ) : ?>
                 <div class="headerinfo">
              <a href="http://assam.gov.in/" target="_blank"><img class="assamLogo" src="/scpsassam/wp-content/uploads/2017/07/gov_logo.png" alt="Assam Government" ></a>
                   
                   <div class="clear"></div>                  
                       
                 </div>                 
            <?php endif; // end sidebar widget area ?>                    
            <div class="clear"></div>
          </div><!-- header_right -->
		</div>
          <div class="clear"></div>

</div>
        </div><!-- container -->
 <!--.header -->

  <div class="menubar" id="nav-menu">
     <div class="toggle">
         <a class="toggleMenu" href="<?php echo esc_url('#');?>"><?php _e('Menu','movers-packers'); ?></a>
     </div><!-- toggle --> 
      <div class="sitenav flexcroll">
          <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
            
      </div><!-- site-nav -->  
  </div><!--end .menubar -->
</div>

   
<?php if ( is_front_page() && is_home() ) { ?>
<!-- Slider Section -->
<?php for($sld=7; $sld<10; $sld++) { ?>
<?php if( get_theme_mod('page-setting'.$sld)) { ?>
<?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
$img_arr[] = $image;
$id_arr[] = $post->ID;
endwhile;
}
}
?>
<?php if(!empty($id_arr)){ ?>
<?php if( get_theme_mod( 'hide_slides' ) == '') { ?>

<section id="home_slider">

<div class="slider-wrapper theme-default">

             
<div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
<div class="slide_info">
<h2><?php echo $title; ?></h2>
<?php echo $content; ?>
<div class="clear"></div>
<div class="slide_more"><a href="<?php the_permalink(); ?>"><?php esc_attr_e('Read More', 'movers-packers');?></a></div>
</div>
</div>      
<?php $i++; } ?>       
 </div>
<div class="clear"></div>        
</section>
<?php } ?>
<?php } else { ?>
<?php if( get_theme_mod( 'hide_slides' ) == '') { ?>

<?php } ?>
<?php } ?>
<!-- Slider Section -->
<?php if( get_theme_mod( 'hide_choose' ) == '') { ?>	
  <section id="wrapfirst">
            	<div class="container">
                    <div class="welcomewrap">
					<?php if( get_theme_mod('page-setting1')) { ?>
                    <?php $queryvar = new WP_query('page_id='.get_theme_mod('page-setting1' ,true)); ?>
                    <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?> 		
                     <?php the_post_thumbnail( array(570,380, true));?>
                     <h1><?php the_title(); ?></h1>         
                     <?php the_content(); ?>
                     <div class="clear"></div>
                    <?php endwhile; } else { ?>                    
                    <h2><?php esc_attr_e('Why Choose Us','movers-packers'); ?></h2>
                    <p><?php esc_attr_e('Vivamus non elementum lacus. Nam ac molestie tortor. Ut sit amet lobortis magna, ut ornare ante. Curabitur lobortis urna non ligula porta
sodales. Pellentesque at efficitur risus, at dignissim libero. Etiam lacinia lorem sit amet arcu vulputate varius. Suspendisse sodales quam eu
egestas consequat. Donec vestibulum elementum libero eget fringilla. ','movers-packers'); ?></p>                   
                    <?php } ?>
                      
               </div><!-- welcomewrap-->
              <div class="clear"></div>
            </div><!-- container -->

</section>

	
<?php } ?>
<?php if( get_theme_mod( 'hide_column' ) == '') { ?>        
<div id="pagearea">
    <div class="container">         
            <?php for($fx=1; $fx<5; $fx++) { ?>
        	<?php if( get_theme_mod('page-column'.$fx,false) ) { ?>
        	<?php $queryvar = new wp_query('page_id='.get_theme_mod('page-column'.$fx,true));				
			while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
        	    <div class="threebox <?php if($fx % 4 == 0) { echo "last_column"; } ?>">
				 <a href="<?php the_permalink(); ?>">				 
                  <?php if ( has_post_thumbnail() ) { ?>
                        <?php the_post_thumbnail( array(65,65,true));?>                        
                   <?php } else { ?>
                       <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/img_404.png" width="65" alt=""/>
                   <?php } ?>
                  <h3><?php the_title(); ?></h3>
                 </a>
                 <?php the_excerpt(); ?>
                 
        	   </div>
             <?php endwhile;
						wp_reset_query(); ?>
        <?php } else { ?>
        <div class="threebox <?php if($fx % 4 == 0) { echo "last_column"; } ?>">
             <a href="<?php echo esc_url('#')?>">
             <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/services-icon<?php echo $fx; ?>.png" alt="" />
             <h3><?php esc_attr_e('Largest Warehousing', 'movers-packers'); ?>&nbsp;<?php echo $fx; ?></h3>
             </a>
             <p><?php esc_attr_e('Praesent eget malesuada massa. Curabitur pretium, est eu iaculis maximus, sem arcu rhoncus arcu, sit amet consequat justo sem eget sapien. Nulla egestas non ex ultricies semper. Aliquam vitae orci rutrum','movers-packers');?></p>
         </div>
		<?php }} ?>      
    <div class="clear"></div>
    </div><!-- .container -->
 </div><?php }?><!-- #pagearea -->  

<?php
}
elseif ( is_front_page() ) { 
?>
<!-- Slider Section -->
<?php for($sld=7; $sld<10; $sld++) { ?>
<?php if( get_theme_mod('page-setting'.$sld)) { ?>
<?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
$img_arr[] = $image;
$id_arr[] = $post->ID;
endwhile;
}
}
?>
<?php if(!empty($id_arr)){ ?>
<?php if( get_theme_mod( 'hide_slides' ) == '') { ?>
<section id="home_slider">

<div class="slider-wrapper theme-default">
<div id="slider" class="nivoSlider">
	<?php 
	$i=1;
	foreach($img_arr as $url){ ?>
    <img src="<?php echo esc_url($url); ?>" title="#slidecaption<?php echo $i; ?>" />
    <?php $i++; }  ?>
</div>   
<?php 
$i=1;
foreach($id_arr as $id){ 
$title = get_the_title( $id ); 
$post = get_post($id); 
$content = apply_filters('the_content', substr(strip_tags($post->post_content), 0, 150)); 
?>                 
<div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
<div class="slide_info">
<h2><?php echo $title; ?></h2>
<?php echo $content; ?>
<div class="clear"></div>
<div class="slide_more"><a href="<?php the_permalink(); ?>"><?php esc_attr_e('Read More', 'movers-packers');?></a></div>
</div>
</div>      
<?php $i++; } ?>       
 </div>
<div class="clear"></div>        
</section>
<?php } ?>
<?php } else { ?>
<?php if( get_theme_mod( 'hide_slides' ) == '') { ?>
<section id="home_slider">
<div class="container" style="margin-top:25px;">
<div class="col-lg-8 col-md-8 col-sm-12 sliderWindow">
<div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
          <img src="../scpsassam/wp-content/uploads/2017/07/slider-1.jpg" alt="" title="#slidecaption1" />
        <img src="../scpsassam/wp-content/uploads/2017/07/slider-2.jpg" alt="" title="#slidecaption2" />
        <img src="../scpsassam/wp-content/uploads/2017/07/slider-3.jpg" alt="" title="#slidecaption3" />
    </div>                                      
   
</div>
 <h4>About <strong>SCPS Assam</strong></h4>
                    <p text-justify>
State Child Protection Society (SCPS), Assam is a registered Society under the aegis of the Department of Social Welfare, Government of Assam. <a href="../scpsassam/about-us/" class="btn btn-default">Read more ?</a></p>
<div class="clear"></div>
</div>
<div class="col-md-4 col-sm-12 memberProfile">
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-12 four-col-box">
      <div class="memberImg">
         <img src="/scpsassam/wp-content/uploads/2017/08/cmAssam.jpg" alt="Chief Minister" class="img-responsive" style="width:100px; height: 100px;"> 
        <p>Shri. Sarbananda Sonowal<br>Hon'ble Chief Minister,<br>Assam</p>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-12 four-col-box" >
      <div class="memberImg">
         <img src="/scpsassam/wp-content/uploads/2017/07/n_k_doley.jpg" alt="Minister Social Welfare Department" class="img-responsive" style="width:100px; height: 100px;"> 
        <p>Shri. Naba Kumar Doley<br>Minister, Social Welfare Department, Assam</p>
      </div>
    </div>

<div class="col-lg-6 col-md-6 col-sm-3 col-xs-12 four-col-box" >
      <div class="memberImg">
         <img src="/scpsassam/wp-content/uploads/2017/07/ravi_kapoor.jpg" alt="Additional Chief Secretary" class="img-responsive" style="width:100px; height: 100px;"> 
        <p>Shri. Ravi Capoor<br>
Additional Chief Secretary, SWD, Assam</p>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-12 four-col-box" >
      <div class="memberImg">
         <img src="/scpsassam/wp-content/uploads/2017/08/DirectorAssam.png" alt="Director SWD" class="img-responsive" style="width:100px; height: 100px;"> 
        <p>Shri. S.S. Meenakshi Sundaram, IAS<br>Director, SWD, Assam</p>
      </div>
    </div>

    
 </div>
</div>
</div>
</section>

<?php } ?>
<?php } ?>
<!-- Slider Section -->
<?php if( get_theme_mod( 'hide_choose' ) == '') { ?>	
  <section id="wrapfirst">
            	<div class="container">
                    <div class="welcomewrap">
					<?php if( get_theme_mod('page-setting1')) { ?>
                    <?php $queryvar = new WP_query('page_id='.get_theme_mod('page-setting1' ,true)); ?>
                    <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?> 		
                     <?php the_post_thumbnail( array(570,380, true));?>
                     <h1><?php the_title(); ?></h1>         
                     <?php the_content(); ?>
                     <div class="clear"></div>
                    <?php endwhile; } else { ?>                    
                   <!-- <h3>About <strong>SCPS Bihar</strong></h3>
                    <p text-justify>State Child Protection Society (SCPS) is a body registered on 11th October, 2011 under the Societies

Registration Act, 1860 (Registration No. 2143). SPCS is the apex institution functioning under the

Directorate of Social Welfare of the Social Welfare Department in Government of Bihar. SCPS was

constituted to implement, coordinate and monitor the implementation of the Integrated Child

Protection Scheme (ICPS). The scheme has significantly contributed to the realization of

Government/State responsibility for creating a system that will efficiently and effectively protect

children. Based on the cardinal principles of “protection of child rights” and “best interest of the

child”, ICPS is achieving its objectives to contribute to the improvements in the well-being of

children in difficult circumstances, as well as to the reduction of vulnerabilities to situations and

actions that lead to abuse, neglect, exploitation, abandonment and separation of children from their

families.   
</p>    -->               
                    <?php } ?>
                      
               </div><!-- welcomewrap-->
              <div class="clear"></div>
            </div><!-- container -->
</section>
<div class="container">
	<?php
	echo do_shortcode('[print_responsive_thumbnail_slider]');?>
	</div>
	<!-- end slider container -->
<?php } ?>
<?php if( get_theme_mod( 'hide_column' ) == '') { ?>        
<div id="pagearea">
    <div class="container carousel">
  <div class="row contentsinMobile" style="padding-right:0 !important;padding-left:0px;">
    <div class="col-lg-3 col-md-3 col-sm-6 four-col-box">
      <div class="ca-hover ">
        <div class="carousel-img"> <img src="/scpsassam/wp-content/uploads/2017/07/objective.jpg" alt="Objectives" class="img-responsive"> </div>
        <div class="carousel-content">
          <h3>CP Concerns</h3>
          <p>State Child Protection Society (SCPS) is a body registered on 11th October, 2011 under the Societies Registration Act, 1860 (Registration No. 2143). <br>
            <br>
            <a href="/scpsassam/cp-concerns" class="btn btn-default">Read more ?</a></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 four-col-box">
      <div class="ca-hover">
        <div class="carousel-img"> <img src="/scpsassam/wp-content/uploads/2017/07/achievemnt.jpg" alt="Achievements" class="img-responsive"> </div>
        <div class="carousel-content">
          <h3>CP Services</h3>
          <p>SCPS Assam successfully completed the setting up of DCPUs & DCPSs in 27 districts.
 <br>
            <br><br><br>
            <a href="/scpsassam/cp-services/" class="btn btn-default">Read more ?</a></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6  four-col-box">
      <div class="ca-hover fourClbox">
        <div class="carousel-img"> <img src="/scpsassam/wp-content/uploads/2017/07/project.jpg" alt="Projects" class="img-responsive"> </div>
        <div class="carousel-content">
          <h3>Good Practices</h3>
          <p>Sponsorship programme to provide financial support to the children in need.  <br><br><br><br>
            
            <a href="/scpsassam/good-practices/" class="btn btn-default">Read more ?</a></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 four-col-box">
      <div class="ca-hover noticeBoard">
        <div class="carousel-content">
          <div class="notcboard">
          <h3>Notice Board</h3>
	   </div>
         <?php if(function_exists('ditty_news_ticker')){ditty_news_ticker(286);} ?>
        </div>
      </div>
    </div>
  </div>
</div>
 </div>
<div id="pagearea1">
    <div class="container carousel">
 
 </div><?php } ?><!-- #pagearea --> 

<div id="footer-wrapper">
   <div class="container footerfix">
    <div class="fixed3">
      <div class="three-col" style="padding-top: 0px; padding-margin: 0px;">
        <div class="three-col-content">
          <h3>Photo Gallery</h3>
          <div class="three-col-img"><a href="../scpsassam/gallery/photo-gallery/" target="_blank">
	<img src="../scpsassam/wp-content/uploads/2017/07/Image-copy.jpg" alt="Photo Gallery" 
        class="img-responsive"></a></div>
        </div>
      </div>
    </div>
    <div class="fixed3">
      <div class="three-col">
        <div class="three-col-content">
          <h3>Key Contacts</h3>
          <ul>
      <li><a href="../scpsassam/scps/">State Child Protection Society</a></li>
          <li><a href="../scpsassam/dcpu-contacts/">District Child Protection Unit</a></li>

          <li><a href="../scpsassam/jjb/">Juvenile Justice Board</a></li>
		  <li><a href="../scpsassam/cwc/">Child Welfare Committee</a></li>
		  <li><a href="../scpsassam/sjpu/">Special Juvenile Police Unit</a></li>

		  <li><a href="../scpsassam/cci/">Child Care Institution</a></li>

		  <li><a href="../scpsassam/registered-institutions/">Registered Institutions</a></li>

          </ul>
        </div>
      </div>
    </div>
    <div class="fixed3 last_column">
      <div class="three-col">
        <div class="three-col-content content3">
          <h3>Organisation Structure</h3>
          <p>ICPS visualizes setting up of State Child Protection Society in every State/UT as the fundamental unit for the implementation of the scheme.

The specific functions of the State Child Protection Society shall include: <br>
           
		 <br>
            <a href="../scpsassam/state-child-protection-society-scps/" class="btn btn-default">Read more ?</a></p>
<br/>
        </div>
      </div>
    </div>
    <div class="clear"></div>

  </div>
  <!--end .container-->
 
	
	<span class="to-top pull-right"><a href="#"><i class="fa fa-angle-up fa-2x"></i></a></span>
 
   

  <!--end .container-->
 <?php
}
elseif ( is_home() ) {
?>
<section id="home_slider" style="display:none;"></section>
<section id="wrapfirst" style="display:none;"></section>
<section id="pagearea" style="display:none;"></section>
<section id="footer-wrapper" style="display:none;"></section>
<?php
}
?>  
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-99602158-1', 'auto');
  ga('send', 'pageview');

</script>