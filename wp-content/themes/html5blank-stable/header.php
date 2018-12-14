<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel='stylesheet' type='text/css'>
		<?php wp_head(); ?>
    	
	<link href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" rel='stylesheet' type='text/css'>
 	
	<link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
	<link href="<?php echo get_template_directory_uri(); ?>/css/animate.css" rel='stylesheet' type='text/css'>
<link href="<?php echo get_template_directory_uri(); ?>/css/lightbox.css" rel='stylesheet' type='text/css'>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-min.js"></script>
	<link href="<?php echo get_template_directory_uri(); ?>/css/component.css' rel='stylesheet" type='text/css'>
	
	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/lightbox.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
	
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>
	<script type="text/javascript">
	function changemysize(myvalue)
	 {
   	 var div = document.getElementById("mymain");
    	div.style.fontSize = myvalue + "px";   
	}
	</script>

	</head>
	<body <?php body_class(); ?>>
		<!-- Nav Menu Section -->
<div class="logo-menu">
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation" data-spy="affix" data-offset-top="50">
    <div class="container-fluid" style="background-color:#000000;">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="container">
        <div class="navbar-header col-md-12" style="height:35px;">
          <div class="col-md-6 col-sm-6">
            <ul class="header-links">
              <li><a href="#">Hindi</a></li>
              <li><a href="#">English</a></li>
            </ul>
          </div>
          <div class="col-md-6 col-sm-6">
            <ul class="header-links navbar-right">
              <li><a href="javascript:void(0);" onClick="changemysize(12);"><small>-A</small></a></li>
              <li><a href="javascript:void(0);" onClick="changemysize(14);">A</a></li>
              <li><a href="javascript:void(0);" onClick="changemysize(16);"><big>+A</big></a></li>
              <!-- <li id="sb-search" class="sb-search">
						<form>
							<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="">
							<i class="fa fa-search sb-icon-search"></i>
						</form>
					</li>-->
              <li><a href="#">Help</a></li>
              <li><a href="#">FAQ</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--<script src="assets/js/classie.js"></script>
		<script src="assets/js/uisearch.js"></script>
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>-->
    <!-- logo row starts -->
    <div class="container-fluid header_bg">
      <div class="container">
        <div class="col-md-12" >
          <div class="col-md-6 col-sm-6">
            <div class="logo_holder"> <a href="#"><img src="http://localhost/scps/wp-content/uploads/2016/11/scps_logo.png" alt="SCPS Bihar"  /></a>
              <h2>State Child Protection Society</h2>
              <h3>Ministry of Women and Child Development</h3>
              <h3>Government Of Bihar</h3>
            </div>
          </div>
          <div class="col-md-6 col-sm-6"><img src="http://localhost/scps/wp-content/uploads/2016/11/bihar_logo_red.jpg" alt="SCPS Bihar" style= "height:100px;width:91px;float:right;margin-top:10px;" /></div>
        </div>
      </div>
    </div>
    <!-- logo row ends -->
    <!-- menu row starts -->
    <div style="background-color:#000; height:60px; width:100%; margin:0 auto;">
      <div class="container">
        <div class="header" id="home">
          <div class="content white">
            <nav class="navbar navbar-default" role="navigation">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <!--/.navbar-header-->
                <div class="collapse navbar-collapse menu-gap" id="bs-example-navbar-collapse-1">
                  <?php html5blank_nav(); ?>
                </div>
                <!--/.navbar-collapse-->
                <!--/.navbar-->
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
    
    <!-- menu row ends -->
  </nav>

</div>


			
