<?php
/*
	Plugin name: Gallery Portfolio 
	Plugin URI: http://total-soft.pe.hu/gallery-portfolio
	Description: Portfolio plugin created for persons who like to show their photos in high quality with the best gallery design. Gallery & Portfolio plugin will help you more easily create image gallery, photo album, portfolio, grid image and slider portfolio.
	Version: 1.1.7
	Author: Total-Soft
	Author URI: http://total-soft.pe.hu/
	License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/
 	require_once(dirname(__FILE__) . '/Includes/Total-Soft-Portfolio-Widget.php');
 	require_once(dirname(__FILE__) . '/Includes/Total-Soft-Portfolio-Ajax.php');
 	add_action('wp_enqueue_scripts', 'TotalSoft_PG_Widget_Style');
 	function TotalSoft_PG_Widget_Style() 
 	{
 		wp_register_style('Total_Soft_Portfolio', plugins_url('/CSS/Total-Soft-Portfolio-Widget.css',__FILE__ ));
		wp_register_style('Total_Soft_Portfolio2', plugins_url('/CSS/Filt_popup.min.css',__FILE__ ));
		wp_enqueue_style('Total_Soft_Portfolio');	
		wp_enqueue_style('Total_Soft_Portfolio2');	
		wp_register_script('Total_Soft_Portfolio',plugins_url('/JS/Total-Soft-Portfolio-Widget.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Total_Soft_Portfolio', 'object', array('ajaxurl' => admin_url('admin-ajax.php')));
		wp_enqueue_script('Total_Soft_Portfolio');
		wp_enqueue_script("jquery");

		wp_register_style('fontawesome-css', plugins_url('/CSS/totalsoft.css', __FILE__)); 
  		wp_enqueue_style('fontawesome-css');
 	}
 	add_action('widgets_init', 'TotalSoft_PG_Widget_Reg');
 	function TotalSoft_PG_Widget_Reg() 
 	{
 		register_widget('Total_Soft_Portfolio');
 	} 	
	add_action("admin_menu", 'TotalSoft_PG_Admin_Menu');
	function TotalSoft_PG_Admin_Menu()
	{
		$complete_url = wp_nonce_url( $bare_url, 'edit-menu_'.$comment_id, 'TS_Portfolio_Nonce' );
		add_menu_page('Admin Menu','Portfolio', 'manage_options','Total_Soft_Portfolio' . $complete_url, 'Add_New_Portfolio',plugins_url('/Images/admin.png',__FILE__));
 		add_submenu_page('Total_Soft_Portfolio' . $complete_url, 'Admin Menu', 'Portfolio Manager', 'manage_options', 'Total_Soft_Portfolio' . $complete_url, 'Add_New_Portfolio');
 		add_submenu_page('Total_Soft_Portfolio' . $complete_url, 'Admin Menu', 'General Options', 'manage_options', 'Total_Soft_Portfolio_General' . $complete_url, 'Portfolio_Options');
 		add_submenu_page('Total_Soft_Portfolio' . $complete_url, 'Admin Menu', 'Total Products', 'manage_options', 'Total_Soft_Products' . $complete_url, 'Total_Soft_Product_Portfolio');
	}
	add_action('admin_init',  'TotalSoft_PG_Admin_Style');
	function TotalSoft_PG_Admin_Style()
	{
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');

		wp_register_style('Total_Soft_Portfolio', plugins_url('/CSS/Total-Soft-Portfolio-Admin.css',__FILE__));
		wp_enqueue_style('Total_Soft_Portfolio' );	
		wp_register_script('Total_Soft_Portfolio', plugins_url('/JS/Total-Soft-Portfolio-Admin.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Total_Soft_Portfolio','object', array('ajaxurl'=>admin_url('admin-ajax.php')));
		wp_enqueue_script('Total_Soft_Portfolio');

		wp_register_style('fontawesome-css', plugins_url('/CSS/totalsoft.css', __FILE__)); 
  		wp_enqueue_style('fontawesome-css');	
	}

	function Add_New_Portfolio()
	{
		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Portfolio-New.php');
	}
	function Portfolio_Options()
	{
		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Portfolio-Settings.php');
	}
	function Total_Soft_Product_Portfolio()
	{
 		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Products.php');
	}
	function TotalSoftPortfolioInstall()
	{
		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Portfolio-Install.php');
	}
	register_activation_hook(__FILE__,'TotalSoftPortfolioInstall');

	function Total_SoftPortfolio_Short_ID($atts, $content = null)
	{
		$atts=shortcode_atts(
			array(
				"id"=>"1"
			),$atts
		);
		return Total_Soft_Draw_Portfolio($atts['id']);
	}
	add_shortcode('Total_Soft_Portfolio', 'Total_SoftPortfolio_Short_ID');
	function Total_Soft_Draw_Portfolio($Portfolio)
	{
		ob_start();	
			$args = shortcode_atts(array('name' => 'Widget Area','id'=>'','description'=>'','class'=>'','before_widget'=>'','after_widget'=>'','before_title'=>'','AFTER_TITLE'=>'','widget_id'=>'','widget_name'=>'Total Soft Portfolio'), $atts, 'Total_Soft_Portfolio' );
			$Total_Soft_Portfolio=new Total_Soft_Portfolio;

			$instance=array('Total_Soft_Portfolio'=>$Portfolio);
			$Total_Soft_Portfolio->widget($args,$instance);	
			$cont[]= ob_get_contents();
		ob_end_clean();	
		return $cont[0];		
	}
	function TotalSoft_Port_Color() 
	{
	    wp_enqueue_script(
	        'alpha-color-picker',
	        plugins_url('/JS/alpha-color-picker.js', __FILE__),	       
	        array( 'jquery', 'wp-color-picker' ), // You must include these here.
	        null,
	        true
	    );
	    wp_enqueue_style(
	        'alpha-color-picker',
	        plugins_url('/CSS/alpha-color-picker.css', __FILE__),
	        array( 'wp-color-picker' ) // You must include these here.
	    );
	}
	add_action( 'admin_enqueue_scripts', 'TotalSoft_Port_Color' );
?>