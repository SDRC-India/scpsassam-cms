<?php
defined( 'ABSPATH' ) OR exit;
/*
  Plugin Name: Thumbnail Slider
  Plugin URI: http://kuldipmakdiya.wordpress.com
  Version: 1.0
  Author: kuldip_raghu
  Author URI: http://kuldipmakdiya.wordpress.com
  Donate link: http://kuldipmakdiya.wordpress.com
  Description: This Plugin will help you to easily create a Thumbnail slider manager system into your WordPress website. The Thumbnail slider System will display a List of banner images and also a part of small thumbnail image availability in wordpress. Thumbnail slider create custom post type and display all image with their custom image meta box and large image as featured image.
  License: GNU General Public License v2.0 or later
  Copyright 2016 kuldip_raghu
 */
define( 'PLUGIN_PATH', plugin_dir_url( __FILE__ ));
add_action('init', 'ts_customslider_custom_post', 0);
/* Create custom post type using CPT */
function ts_customslider_custom_post() {
    $labels = array(
        'name' => _x('Add Banner', 'Post Type General Name', 'twentysixteen'),
        'singular_name' => _x('Add Banner', 'Post Type Singular Name', 'twentysixteen'),
        'menu_name' => __('Banner', 'twentysixteen'),
        'parent_item_colon' => __('Parent Add Banner', 'twentysixteen'),
        'all_items' => __('All Banner', 'twentysixteen'),
        'view_item' => __('View Banner', 'twentysixteen'),
        'add_new_item' => __('Add New Banner', 'twentysixteen'),
        'add_new' => __('Add New', 'twentysixteen'),
        'edit_item' => __('Edit Banner', 'twentysixteen'),
        'update_item' => __('Update Banner', 'twentysixteen'),
        'search_items' => __('Search Banner', 'twentysixteen'),
        'not_found' => __('Not Found', 'twentysixteen'),
        'not_found_in_trash' => __('Not found in Trash', 'twentysixteen'),
    );
    $args = array(
        'label' => __('banners', 'twentysixteen'),
        'description' => __('Banner and reviews', 'twentysixteen'),
        'labels' => $labels,
        'supports' => array('title', 'editor'),
        'taxonomies' => array('genres'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'capability_type' => 'page',
    );
    register_post_type('banners', $args);
}
/* Create custom post type using CPT */
/* All Hooks are define in this below section */
add_action('admin_menu', 'ts_slider_enable_pages');
/* All Hooks are define in this below section */
/* Create slider Settings tab in custom post type hook */
function ts_slider_enable_pages() {
    add_submenu_page('edit.php?post_type=banners', 'Custom Post Type Admin', 'Slider Settings', 'edit_posts', basename(__FILE__), 'ts_slider_settings');
}
/* Create slider Settings tab in custom post type hook */
?>
<style type="text/css">
    body {font: normal 0.9em Arial;color:#222;}
    header {display:block; font-size:1.2em;margin-bottom:100px;}
    header a, header span {
        display: inline-block;
        padding: 4px 8px;
        margin-right: 10px;
        border: 2px solid #000;
        background: #DDD;
        color: #000;
        text-decoration: none;
        text-align: center;
        height: 20px;
    }
    header span {background:white;}
    a {color: #1155CC;}
    .field_left {float:left;}
    .field_right {float:left;margin-left:10px;}
    .clear {clear:both;}
    #dynamic_form {width:770px;}
    #dynamic_form input[type=text] {width:600px;}
    #dynamic_form .field_row {border:1px solid #999;margin-bottom:10px;padding:10px;}
    #dynamic_form label {padding:0 6px;}
    .error_msg.green{ color:#138f45; font-weight: bold; font-size: 18px;}
    .error_msg.red{ color:#fff000; font-weight: bold; font-size: 18px;}
</style>
<?php
/* On button submit if there is no table name then it will create table and update slider setting tab data into database */
function ts_slider_settings() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'slidermanager';
    $result = $wpdb->get_results("SELECT * FROM " . $table_name . "");
    ?>
    <div id="poststuff">
        <div id="post-body"  class="metabox-holder columns-2" >
            <div id="post-body-content">
                <div class="wrap">
                    <table><tr><td><a href="https://twitter.com/kuldipraghu" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @kuldipraghu</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></td>
                        </tr>
                    </table>
                    <div class="fb-share-button" data-href="https://wordpress.org/plugins/thumbnail-slider/" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwordpress.org%2Fplugins%2Fthumbnail-slider%2F&amp;src=sdkpreparse">Share</a></div>
                    <h2>Slider Settings</h2>
                    <div id="poststuff">
            <div id="post-body" class="metabox-holder columns-2">
                <div id="post-body-content">
                    <form name="add_country" action="" id="add_country" method="post">
                        <div class="stuffbox" id="namediv" style="width:100%;">
                            <h3><label>Transition Type</label></h3>
                            <div class="inside">
                                <table>
                                    <tr>
                                        <td>
                                            <select name="transitiontype">
                                                <option value="fade" <?php echo $result[0]->transitiontype == 'fade' ? "selected='selected'" : ''; ?>>Fade</option>
                                                <option value="slide" <?php echo $result[0]->transitiontype == 'slide' ? "selected='selected'" : ''; ?>>Slide</option>
                                                <option value="zoom" <?php echo $result[0]->transitiontype == 'zoom' ? "selected='selected'" : ''; ?>>Zoom</option>
                                                <option value="kenburns 1.2" <?php echo $result[0]->transitiontype == 'kenburns 1.2' ? "selected='selected'" : ''; ?>>kenburns 1.2</option>
                                                <option value="none" <?php echo $result[0]->transitiontype == 'none' ? "selected='selected'" : ''; ?>>None</option>
                                            </select>
                                            <div style="clear:both"></div>
                                            <div></div>
                                        </td>
                                    </tr>
                                </table>
                                <div style="clear:both"></div>
                            </div>
                        </div>
                        <div class="stuffbox" id="namediv" style="width:100%;">
                            <h3><label>Transition Speed</label></h3>
                            <div class="inside">
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="transitionspeed" id="transitionspeed" value="<?php if ($result[0]->transitionspeed != '') { echo $result[0]->transitionspeed;  } ?>" required="" />
                                            <div style="clear:both"></div>
                                            <div></div>
                                        </td>
                                    </tr>
                                </table>
                                <div style="clear:both"></div>
                            </div>
                        </div>
                        <div class="stuffbox" id="namediv" style="width:100%;">
                            <h3><label >Show Arrows</label></h3>
                            <div class="inside">
                                <table>
                                    <tr>
                                        <td>
                                            <select name="show_arrows">
                                                <option value="1" <?php echo $result[0]->show_arrow == 1 ? "selected='selected'" : ''; ?>>Yes</option>
                                                <option value="0" <?php echo $result[0]->show_arrow == 0 ? "selected='selected'" : ''; ?>>No</option>
                                            </select>
                                            <div style="clear:both"></div>
                                            <div></div>
                                        </td>
                                    </tr>
                                </table>
                                <div style="clear:both"></div>

                            </div>
                        </div>
                        <div class="stuffbox" id="namediv" style="width:100%;">
                            <h3><label >Show Thumbnail:</label></h3>
                            <div class="inside">
                                <table>
                                    <tr>
                                        <td>
                                            <select name="show_thumbnail">
                                                <option value="1" <?php echo $result[0]->show_thumbnail == 1 ? "selected='selected'" : ''; ?>>Yes</option>
                                                <option value="0" <?php echo $result[0]->show_thumbnail == 0 ? "selected='selected'" : ''; ?>>No</option>
                                            </select>
                                            <div style="clear:both"></div>
                                            <div></div>
                                        </td>
                                    </tr>
                                </table>
                                <div style="clear:both"></div>

                            </div>
                        </div>
                        <div class="stuffbox" id="namediv" style="width:100%;">
                            <h3><label >Show Description on Hover</label></h3>
                            <div class="inside">
                                <table>
                                    <tr>
                                        <td>
                                            <select name="show_description_hover">
                                                <option value="1" <?php echo $result[0]->show_dhover == 1 ? "selected='selected'" : ''; ?>>Yes</option>
                                                <option value="0" <?php echo $result[0]->show_dhover == 0 ? "selected='selected'" : ''; ?>>No</option>
                                            </select>
                                            <div style="clear:both"></div>
                                            <div></div>
                                        </td>
                                    </tr>
                                </table>
                                <div style="clear:both"></div>

                            </div>
                        </div>
                        <input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit">
                    </form>
                </div>
            </div>
            </div>
                </div>
            </div>
            
            <div id="postbox-container-1" class="postbox-container"> 
                <div class="postbox"> 
                    <h3 class="hndle"><span></span>Launch Website Faster</h3> 
                    <div class="inside">
                        <center><a target="_blank" href="https://codecanyon.net/?ref=kuldip1"><img src="<?php echo PLUGIN_PATH ?>images/code_canyon_250x250.jpg" alt="Code Canyon" border="0"></a></center>

                        <div style="margin:10px 5px">

                        </div>
                    </div></div>
                <div class="postbox"> 
                    <h3 class="hndle"><span></span>Recommended WordPress Themes & Templates</h3> 
                    <div class="inside">
                        <center><a target="_blank" href="https://codecanyon.net/?ref=kuldip1"><img src="<?php echo PLUGIN_PATH ?>images/theme_forest_250x250.jpg" alt="Code Canyon" border="0"></a></center>

                        <div style="margin:10px 5px">

                        </div>
                    </div></div>
            </div>
            </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'slidermanager';
        if ($wpdb->get_var("SHOW TABLES LIKE '" . $wpdb->prefix . "slidermanager'") === $wpdb->prefix . 'slidermanager') {
            $blogtime = current_time('mysql');
            if ($_POST['transitiontype'] != '' && $_POST['transitionspeed'] != '' && $_POST['show_arrows'] != '' && $_POST['show_thumbnail'] != '' && $_POST['show_description_hover'] != '') {
                $result = $wpdb->get_results("SELECT id FROM " . $table_name . "");
                if (count($result) > 0) {
                    $transitiontype = esc_html($_POST['transitiontype']);
                    if ( ! $transitiontype ) {
                       $transitiontype = '';
                    }
                    $transitionspeed = intval($_POST['transitionspeed']);
                    if ( ! $transitionspeed ) {
                       $transitionspeed = '';
                    }
                    $show_arrows = intval($_POST['show_arrows']);
                    if ( ! $show_arrows ) {
                       $show_arrows = '';
                    }
                    $show_thumbnail = intval($_POST['show_thumbnail']);
                    if ( ! $show_thumbnail ) {
                       $show_thumbnail = '';
                    }
                    $show_description_hover = intval($_POST['show_description_hover']);
                    if ( ! $show_description_hover ) {
                       $show_description_hover = '';
                    }
                    $query = $wpdb->query(
                        $wpdb->prepare(
                            "UPDATE {$table_name} SET transitiontype = %s, transitionspeed = %d, show_arrow = %d, show_thumbnail = %d,show_dhover = %d,updated_date=%s WHERE id = '%d' " ,
                            $transitiontype, $transitionspeed, $show_arrows, $show_thumbnail,$show_description_hover,$blogtime,$result[0]->id
                        )
                    );
                    if ($query) {
                        echo '<div style="clear: both;"></div>';
                        echo '<p class="error_msg green">Records Updated Succesfully.</p>';
                    }
                } else {
                    $transitiontype = esc_html($_POST['transitiontype']);
                    if ( ! $transitiontype ) {
                       $transitiontype = '';
                    }
                    $transitionspeed = intval($_POST['transitionspeed']);
                    if ( ! $transitionspeed ) {
                       $transitionspeed = '';
                    }
                    $show_arrows = intval($_POST['show_arrows']);
                    if ( ! $show_arrows ) {
                       $show_arrows = '';
                    }
                    $show_thumbnail = intval($_POST['show_thumbnail']);
                    if ( ! $show_thumbnail ) {
                       $show_thumbnail = '';
                    }
                    $show_description_hover = intval($_POST['show_description_hover']);
                    if ( ! $show_description_hover ) {
                       $show_description_hover = '';
                    }
                    $idsa = $wpdb->query( $wpdb->prepare( 
                            "INSERT INTO $table_name
                            ( transitiontype, transitionspeed, show_arrow,show_thumbnail,show_dhover,post_type,post_author,created_date )
                            VALUES ( %s, %d, %d, %d, %d, %s, %d, %s )", 
                            $transitiontype, $transitionspeed,
                            $show_arrows, $show_thumbnail,
                            $show_description_hover,'banners',1,
                            $blogtime
                    ) );
                    if (isset($idsa)) {
                        echo '<p class="error_msg green">Slider Setting Updated.</p>';
                    }
                }
            } else {
                echo '<p class="error_msg red">Please Enter Required Fields.</p>';
            }
        } else {
            $charset_collate = $wpdb->get_charset_collate();
            $sql = "CREATE TABLE $table_name (
		id int(10) NOT NULL AUTO_INCREMENT,
                transitiontype varchar(255) NOT NULL,
                transitionspeed int(10) NOT NULL,
                show_arrow int(10) NOT NULL,
                show_thumbnail varchar(255) NOT NULL,
		show_dhover text NOT NULL,
                post_type varchar(255) NOT NULL,
                post_author int(10) NOT NULL,
		created_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                updated_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		UNIQUE KEY id (id)
        	) $charset_collate;";
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }
    }
}
/* On button submit if there is no table name then it will create table and update slider setting tab data into database */
/* Create Custom Slider Gallery function with hooks and action */
add_action('admin_init', 'ts_slider_add_post_gallery');
add_action('save_post', 'ts_slider_update_post_gallery', 10, 2);
/**
 * Add custom Meta Box to Posts post type
 */
function ts_slider_add_post_gallery() {
    add_meta_box(
            'post_gallery', 'Slider Thumbnail Image', 'ts_slider_post_gallery_options', 'banners', 'normal', 'core'
    );
}
/**
 * Print the Meta Box content
 */
function ts_slider_post_gallery_options() {
    wp_nonce_field(plugin_basename(__FILE__), 'ts_slider_noncename_so_1444');
    global $post;
    $gallery_data = get_post_meta($post->ID, 'gallery_data', true);
    ?>
    <div id="dynamic_form">
        <div id="field_wrap">
                    <div class="field_row">
                        <div class="field_left">
                            <div class="form_field">
                                <label>Image URL</label>
                                <input type="text"
                                       class="meta_image_url"
                                       placeholder="Select Image Path From Media Manager"
                                       name="image_url"
                                       value="<?php esc_html_e($gallery_data['image_url']); ?>"
                                       />
                            </div>
                            <div class="form_field">
                                <label>Image Desc</label>
                                <input type="text"
                                       class="meta_image_desc"
                                       placeholder="Insert Description Here"
                                       name="image_desc"
                                       value="<?php esc_html_e($gallery_data['image_desc'][0]); ?>"
                                       />
                            </div>
                        </div>
                        <div class="field_right image_wrap">
                            <?php if(isset($gallery_data['image_url'])) { ?>
                            <img src="<?php esc_html_e($gallery_data['image_url']); ?>" height="48" width="48" />
                            <?php } ?>
                        </div>
                    <div class="clear" /></div> 
                </div>
        </div>
    </div>
    <?php
}
/**
 * Save post action, process fields
 */
function ts_slider_update_post_gallery($post_id, $post_object) {
    $post_nonce = $_POST['ts_slider_noncename_so_1444'];
    $post_type = $_POST['post_type'];
    $post_image_url = $_POST['image_url'];
    $post_image_desc = $_POST['image_desc'];
    if(! $post_nonce){
        $post_nonce = '';
    }
    if( ! $post_type){
        $post_type = '';
    }
    if( ! $post_image_url){
        $post_image_url = '';
    }
    if(! $post_image_desc){
        $post_image_desc = '';
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if ('revision' == $post_object->post_type)
        return;
    if (!wp_verify_nonce($post_nonce, plugin_basename(__FILE__)))
        return;
    if ($post_type != 'banners')
        return;
    if (isset($post_image_url) && isset($post_image_desc)) {
        $gallery_data = array();
        if ($post_image_url != '') {
            $gallery_data['image_url'] = $post_image_url;
            $gallery_data['image_desc'][] = $post_image_desc;
        }
        if (isset($gallery_data)) {
            update_post_meta($post_id, 'gallery_data', $gallery_data);
        } else {
            delete_post_meta($post_id, 'gallery_data');
        }
    } else {
        delete_post_meta($post_id, 'gallery_data');
    }
}
/* Create Custom slider Gallery function with hooks and action */
function ts_slider_scripts() {
    wp_register_style('tsslider',PLUGIN_PATH.'css/ts-slider.css');
    wp_register_style('thumbnailslider',PLUGIN_PATH.'css/thumbnail-slider.css');
    wp_register_script('tsjs',PLUGIN_PATH.'js/ts-slider.js');
    wp_register_script('thumbnailjs',PLUGIN_PATH.'js/thumbnail-slider.js');
    wp_enqueue_style('tsslider');
    wp_enqueue_style('thumbnailslider');
    wp_enqueue_script('tsjs');
    wp_enqueue_script('thumbnailjs');
}
add_action( 'wp_enqueue_scripts', 'ts_slider_scripts' );
/* Slider Shortcode Function with custom meta [ts_slider_list_basic] */
add_shortcode('ts_slider_list_basic', 'ts_slider_listing_shortcode');
function ts_slider_listing_shortcode($atts) {
    ob_start();
    global $post,$wpdb;
    $query = new WP_Query(array(
        'post_type' => 'banners',
        'posts_per_page' => -1,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_status' => 'publish',
    ));
    $table_name = $wpdb->prefix . 'slidermanager';
    $result = $wpdb->get_results("SELECT * FROM " . $table_name . "");
    if ($query->have_posts()) { ?>
    <script>
        var nsOptions =
        {
            sliderId: "custom-slider",
            transitionType: "<?php echo $result[0]->transitiontype; ?>",
            autoAdvance: true,
            delay: "default",
            transitionSpeed: <?php echo $result[0]->transitionspeed; ?>,
            aspectRatio: "2:1",
            initSliderByCallingInitFunc: false,
            shuffle: false,
            startSlideIndex: 0, //0-based
            navigateByTap: true,
            pauseOnHover: false,
            keyboardNav: true,
            before: function (currentIdx, nextIdx, manual) { if(manual && typeof mcThumbnailSlider!="undefined") mcThumbnailSlider.display(nextIdx);},
            license: "b2e981"
        };
        var nslider = new NinjaSlider(nsOptions);
        </script>
        <div style="width:1000px;margin:80px auto;">
            <div id="custom-slider" style="float:left;">
                <div class="slider-inner">
                    <ul>
                        <?php
                        while ($query->have_posts()) : $query->the_post();
                            $gallery_data = get_post_meta($post->ID, 'gallery_data', true);
                            ?>
                            <li><a class="ns-img" href="<?php echo $gallery_data['image_url']; ?>"></a></li>
                        <?php endwhile; ?>
                    </ul>
                    <div class="fs-icon" title="Expand/Close"></div>
                </div>
            </div>
            <div id="thumbnail-slider" style="float:left;">
                <div class="inner">
                    <ul>
                        <?php
                        while ($query->have_posts()) : $query->the_post();
                            $gallery_data = get_post_meta($post->ID, 'gallery_data', true);
                            ?>
                            <li><a class="thumb" href="<?php echo $gallery_data['image_url']; ?>"></a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <?php
        $ts_slider_variable = ob_get_clean();
        return $ts_slider_variable;
    }
}
/* Slider Shortcode Function with custom meta [ts_slider_list_basic] */
?>