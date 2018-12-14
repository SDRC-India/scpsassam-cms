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
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="/wp-content/themes/movers-packers/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
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
       <!--  <div class="col-md-3 col-sm-3 col-xs-3 mobileNav"> 
           <ul class="header-links"> 
	       <li class="hindicls"><a href="http://scpsbihar.org" target="_blank">English</a></li>
              <li ><a href="#">অসমীয়া</a></li> 
            </ul> 
          </div>-->
	 <div class="col-md-10 col-sm-7 col-xs-9 fontSize">
        <div class="social-icons langOption">		
	<ul style="margin: 0; padding: 0;">
	<li><a href="javascript:void(0);" onclick="changemysize(12);"><small>-A</small></a></li>
	<li><a href="javascript:void(0);" onclick="changemysize(14);">A</a></li>
	<li><a href="javascript:void(0);" onclick="changemysize(16);"><big>+A</big></a></li>
	<li><a href="/help/" >Help</a></li>
    <li><a href="/faq/" >FAQ</a></li>
		<li class="mblsitemap"><a href="/contact-us-2/" >Contact Us</a></li>
	 <li class="mblres"><a href="#"><i class="fa fa-lg fa-facebook"></i></a></li>
	<li class="twt"><a href="#"><i class="fa fa-lg fa-twitter"></i></a></li>
         </ul>
         </div> 
	</div> 
<?php if ( '' !== get_theme_mod( 'twitt_link' ) ) { ?>
          <div class="col-md-2 col-sm-2 mobileSearch" >
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

            	<div class="col-md-2 col-sm-2 col-xs-2 textAligncenter">
			<a href="https://www.scpsassam.org" target="_blank"><img class="scpsassamLogo" src="/wp-content/uploads/2017/08/SCPS_LOGO.png" alt="SCPS Assam"></a>
			
			</div>
			<div class="col-md-8 col-sm-8 col-xs-8 siteHeading">
								<h1>State Child Protection Society</h1>
								<h4>Social Welfare Department</h4>
								<h4>Government of Assam</h4>
			
            </div>
			           
		
            <div class="col-md-2 col-sm-2 col-xs-2 logoAssam"> 
            
             <?php if ( ! dynamic_sidebar( 'header-info' ) ) : ?>
                 <div class="headerinfo">
              <a href="http://assam.gov.in/" target="_blank"><img class="assamLogo" src="/wp-content/uploads/2017/07/gov_logo.png" alt="Assam Government" ></a>
                   
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

  <div class="navbar navbar-default navbar-static-top bar menu" id="head2">
	<div class="container-fluid menutoggle">
		<div class="navbar navbar-default" role="navigation">
        <div class="container marginPaddingZero">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle menu-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
          </div>
          <div class="navbar-collapse collapse" id="cssmenu">
          
            <!-- Left nav -->
            <ul class="nav navbar-nav" id="main-menu">
              <li class="home-active"><a href="https://scpsassam.org/">Home</a></li>
              <li class="has-sub active-about"><a href="#">About Us<span class="caret"></span></a>
              	<ul class="dropdown-menu" id="dropdowns" style="display: none; width: auto;">
                  <li class="has-parent"><a href="/about-us/">About SCPS</a></li>
                  <li class="has-parent"><a href="/objective/">Objective</a></li>
                  <li class="has-parent"><a href="/our-mission/">Our Mission</a></li>
                  <li class="has-parent"><a href="/achievements/">Achievements</a></li>
                  <li class="has-parent"><a href="/projects/">Services Under ICPS</a></li>
                  </ul></li>
              
              <li class="active-org"><a href="#">Organisation Structure <span class="caret"></span></a>
                <ul class="dropdown-menu sub-navmenu" style="display: none; width: auto;">
                  <li><a href="#">State Units<span class="caret"></span></a>
                  	<ul class="dropdown-menu" style="display: none; width: auto;">
                  <li><a href="/state-child-protection-society-scps/">State Child Protection Society (SCPS)</a></li>
                  <li><a href="/state-adoption-resource-agency-sara/">State Adoption Resource Agency (SARA)</a></li>
				  <li><a href="/organogram-of-scps-and-sara/">Organogram of SCPS and SARA</a></li>
                  </ul></li>
                  <li><a href="#">District Unit<span class="caret"></span></a>
                  <ul class="dropdown-menu" style="display: none; width: auto;">
                  <li><a href="/dcpu-5/">District Child Protection Unit (DCPU)</a></li>
                  
                  </ul></li>
                  <li><a href="#">Statutory Bodies<span class="caret"></span></a>
                  <ul class="dropdown-menu" style="display: none; width: auto;">
                  <li><a href="/child-welfare-committeecwcs/">Child Welfare Committee (CWC)</a></li>
                  <li><a href="/juvenile-justice-boardsjjbs/">Juvenile Justice Boards (JJB)</a></li>
                  <li><a href="/special-juvenile-police-unitsjpus/">Special Juvenile Police Unit (SJPU)</a></li>
                  <li><a href="/childrens-court/">Children's Court</a></li>

                  </ul></li>
                  
                  
                  <li><a href="#">Committees <span class="caret"></span></a>
                    <ul class="dropdown-menu sub-navmenu" style="display: none; width: auto;">
                      <li><a href="/state-level-selection-committee/">State Level Selection Committee</a></li>
                      <li><a href="/state-inspection-committee/">State Inspection Committee</a></li>
                      <li><a href="/state-child-protection-committee/">State Child Protection Committee</a></li>
                      <li><a href="#">District Child Protection Committee <span class="caret"></span></a>
                        <ul class="dropdown-menu " style="display: none; width: auto;">
                          <li><a href="/district-child-protection-committee/">District Child Protection Committee</a></li>
                          <li><a href="/block-child-protection-committee/">Block Child Protection Committee</a></li>
                          <li><a href="/gram-panchayat-child-protection-committee/">Gram Panchayat Child Protection Committee</a></li>
                          <li><a href="/ward-child-protection-committee/">Village Level Child Protection Committee</a></li>
                         
                        </ul>
                      </li>
                      <li><a href="/district-advisory-board-cum-district-level-inspection-committee/">District Inspection Committee</a></li>
                      <li><a href="/sponsorship-and-foster-care-approval-committee/">Sponsorship and Foster Care Approval Committee</a></li>
                    </ul>
                  </li>
                   <li><a href="#">Child Care Institutions<span class="caret"></span></a>
                   <ul class="dropdown-menu " style="display: none; width: auto;">
                          <li><a href="/childrens-home/">Children ' s Home</a></li>
                          <li><a href="/open-shelter/">Open Shelter</a></li>
                          
                           <li><a href="/specialized-adoption-agency/">Specialized Adoption Agency</a></li>
                           <li><a href="/observation-home/">Observation Home</a></li>
                           <li><a href="/place-of-safety/">Place of Safety</a></li>
                           <li><a href="/special-home/">Special Home</a></li>
                          
                          </ul></li>
                           <li><a href="#">Non Institutional Care<span class="caret"></span></a>	
                          	<ul class="dropdown-menu " style="display: none; width: auto;">
                          <li><a href="/adoption/">Adoption</a></li>    
                          <li><a href="/sponsorship/">Sponsorship</a></li>
                           <li><a href="/foster-care/">Foster Care</a></li>
                            <li><a href="/after-care/">After Care</a></li>
                          </ul>
                           </li>
                           
                </ul>
              </li>
              
              <li><a href="#">Dashboard<span class="caret"></span></a>
              <ul class="dropdown-menu" style="display: none; width: auto;">
                          <li><a href="http://dashboard.scpsassam.org/index">Index</a></li>
                          
                          <li><a  href="http://dashboard.scpsassam.org/dashboard">Indicator</a></li>
                          </ul>
              </li>
              
              
              <li class="active-resource"><a href="#">Resources&nbsp;<span class="caret"></span></a>
              	 <ul class="dropdown-menu sub-navmenu" style="display: none; width: auto;">
                          <li><a href="/act-and-rules/">Act and Rules</a></li>
                          <li><a href="/policy/">Policy</a></li>
                          <li><a href="/guidelines/">Guidelines</a></li>
                          
                          <li><a href="/sops/">SOPs</a></li>
                          <li><a href="/monthly-bulletin/">Newsletter</a></li>
                          
                          <li><a href="/modules/">Training Modules</a></li>
                          
                          <li><a href="#">IEC Materials<span class="caret"></span></a>
                          <ul class="dropdown-menu" style="display: none; width: auto;">
                          <li><a href="/jingles/">Jingles</a></li>
                          <li><a href="/posters/">Posters</a></li>
                          <li><a href="/comic-book/">Comic Book</a></li>
                          
                          <li><a href="/calendar/">Calendar</a></li>
                          
                          <li><a href="/brochures/">Brochures</a></li>
                          <li><a href="/play-cards/">Play cards</a></li>
                          </ul></li>
                         <li><a href="/studyreports/">Study/Reports</a></li>
                         <li><a href="/icps-faq/">ICPS-FAQs</a></li>
                          	
                          </ul>
              </li>
              <li class="active-order"><a href="#">Order/Notifications<span class="caret"></span></a>
              <ul class="dropdown-menu" style="display: none; width: auto;">
                          <!--<li><a href="/tenders/">Tenders</a></li>-->
                          
                          <li><a href="/notices/">Notifications</a></li>
                          
                          <li><a href="/ordernotifications/circularsorders/">Circulars/Orders</a></li>
                          </ul></li>
             <li class="active-key"><a href="#">Key Contacts<span class="caret"></span></a>
             <ul class="dropdown-menu" style="display: none; width: auto;">
                          <li><a href="/scps/">State Child Protection Society</a></li>
                          <li><a href="/dcpu-contacts/">District Child Protection Unit</a></li>
                          <li><a href="/jjb/">Juvenile Justice Board</a></li>
                          <li><a href="/cwc/">Child Welfare Committee</a></li>
                          <li><a href="/sjpu/">Special Juvenile Police Unit</a></li>
                          <li><a href="/govt-run-child-care-institution/">Govt. run Child Care Institution</a></li>
				 		  <li><a href="/ccis/">NGO run Child Care Institution</a></li>
                          <li><a href="/registered-institutions/">Registered Institutions</a></li>
<li><a href="https://scpsassam.org/specialized-adoption-agencies/">Specialized Adoption Agencies</a></li>
                          </ul>
             </li>             
                       <li class="active-gallery"><a href="#">Gallery<span class="caret"></span></a>
                       <ul class="dropdown-menu" style="display: none; width: auto;">
                          <li><a href="/gallery/photo-gallery/">Photo Gallery</a></li>
                          <li><a href="/media-gallery/">Video Gallery</a></li>
                          </ul>
                          </li>  
                          
                         <li class="active-rti"><a href="/rti/">RTI</a></li>
				<li class="data_entry"><a href="http://dashboard.scpsassam.org/login" class="dataentry_link">Data Entry</a></li> 
            </ul>
			  
			  
          
          </div><!--/.nav-collapse -->
        </div><!--/.container -->
      </div>
	</div>
</div>
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
          <img src="../wp-content/uploads/2017/07/slider-1.jpg" alt="" title="#slidecaption1" />
        <img src="../wp-content/uploads/2017/08/11.jpg" alt="" title="#slidecaption2" />
		<img src="../wp-content/uploads/2018/10/banner-03.jpg" alt="" title="#slidecaption3" />
		<img src="../wp-content/uploads/2018/10/banner-04.jpg" alt="" title="#slidecaption4" />
		<img src="../wp-content/uploads/2018/10/banner-05.jpg" alt="" title="#slidecaption5" />
        <!--<img src="../wp-content/uploads/2017/08/22.jpg" alt="" title="#slidecaption3" />-->
    </div>                                      
   
</div>
 </div>


<div class="col-md-4 col-sm-12 memberProfile" id="members-details">
<div class="row members_block">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 four-col-box">
      <div class="memberImg">
         <img src="https://scpsassam.org/wp-content/uploads/2017/11/cmAssam.jpg" alt="Chief Minister" class="img-responsive image_size"> 
        <p>Shri. Sarbananda Sonowal<br>Hon'ble Chief Minister,<br>Assam</p>
      </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 four-col-box" >
      <div class="memberImg">
         <img src="https://scpsassam.org/wp-content/uploads/2018/05/pramila-rani-brahma.jpg" alt="Minister Social Welfare Department" class="img-responsive image_size"> 
        <p>Smti.  Pramila Rani Brahma<br>Hon'ble Minister, Social Welfare Department, Govt. of Assam</p>
      </div>
    </div> 
    
 </div>
</div>
<div class="clear">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12" >
<h4>About <strong>SCPS Assam</strong></h4>
                    <p text-justify>
State Child Protection Society (SCPS), Assam is a registered Society under the aegis of the Department of Social Welfare, Government of Assam.<br> <a href="../about-us/" class="btn btn-default">Read more &rarr;</a></p>
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
        <div class="carousel-img"> <img src="/wp-content/uploads/2017/07/objective.jpg" alt="Objectives" class="img-responsive"> </div>
        <div class="carousel-content">
          <h3>CP Concerns</h3>
          <p>Child trafficking is child abuse. Children are recruited, moved or transported and then exploited, forced to work or sold. They are often subject to multiple forms of exploitation <br>
            <br>
            <a href="/cp-concerns" class="btn btn-default">Read more &rarr;</a></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 four-col-box">
      <div class="ca-hover">
        <div class="carousel-img"> <img src="/wp-content/uploads/2017/07/achievemnt.jpg" alt="Achievements" class="img-responsive"> </div>
        <div class="carousel-content">
          <h3>CP Services</h3>
          <p>As per Section 50 of JJ Act, “Children’s Home” means a children’s home, established or maintained in every district or group of districts, by the state government.
 <br><br>
            
            <a href="/cp-services/" class="btn btn-default">Read more &rarr;</a></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6  four-col-box">
      <div class="ca-hover fourClbox">
        <div class="carousel-img"> <img src="/wp-content/uploads/2017/07/project.jpg" alt="Projects" class="img-responsive"> </div>
        <div class="carousel-content">
          <h3>Good Practices</h3>
          <p>The Child Protection Bulletin received the First Best Jury Award in the News Letter House Journal Competition in 2015 given by “Public Relations Society of India”.<br><br>
            
            <a href="/good-practices/" class="btn btn-default">Read more &rarr;</a></p>
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
<a href="/archive/" class="btn btn-default">Read more &rarr;</a>
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
    <div class="fixed3 col-md-4 col-xs-12">
      <div class="three-col">
        <div class="three-col-content">
          <h3>Photo Gallery</h3>
          <div class="three-col-img"><a href="../gallery/photo-gallery/" target="_blank">
	<img src="../wp-content/uploads/2017/07/Image-copy.jpg" alt="Photo Gallery" 
        class="img-responsive"></a></div>
        </div>
      </div>
    </div>
    <div class="fixed3 col-md-4 col-xs-12 ">
      <div class="three-col margin-top">
        <div class="three-col-content">
          <h3>Key Contacts</h3>
          <ul>
      <li><a href="../scps/">State Child Protection Society</a></li>
          <li><a href="../dcpu-contacts/">District Child Protection Unit</a></li>

          <li><a href="../jjb/">Juvenile Justice Board</a></li>
		  <li><a href="../cwc/">Child Welfare Committee</a></li>
		  <li><a href="../sjpu/">Special Juvenile Police Unit</a></li>

		  <li><a href="../cci/">Child Care Institution</a></li>

		  <li><a href="../registered-institutions/">Registered Institutions</a></li>
			<li><a href="../specialized-adoption-agencies/">Specialized Adoption Agency</a></li>

		  
          </ul>
        </div>
      </div>
    </div>
    <div class="fixed3 last_column col-md-4 col-xs-12 ">
      <div class="three-col margin-top">
        <div class="three-col-content content3">
          <h3>FAQ</h3>
          <p>ICPS visualizes setting up of State Child Protection Society in every State/UT as the fundamental unit for the implementation of the scheme.

The specific functions of the State Child Protection Society shall include: <br>
           
		 <br>
            <a href="../faq/" class="btn btn-default">Read more &rarr;</a></p>
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