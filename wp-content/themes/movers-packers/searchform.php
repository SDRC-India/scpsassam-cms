<?php
//include('header.php');
//include('footer.php');
/**
 * The template for displaying search forms in SKT Movers Packers
 *
 * @package SKT Movers Packers
 */
?>


<script>
jQuery(document).ready(function(){ 
 jQuery("#test").on('keyup', function(){
	  var type=jQuery("#test").val();
   //alert(type);
   //alert("Works");
   jQuery("input[name='submit']").removeAttr('disabled');
   var type=jQuery("#test").val();
   //alert(type);
   if(type=="")
   {
	  jQuery("input[name='submit']").attr("disabled", true);
   }
   
 });
  
});




</script>



<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="search-label">
		<?php /*<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'movers-packers' ); ?></span>*/ ?>
		<input type="search" id="test" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'movers-packers' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<input type="submit" name="submit" disabled class="search-submit" style="background-color: #66bc29 !important;" value="<?php echo esc_attr_x( 'GO', 'button', 'movers-packers' ); ?>">
</form>
