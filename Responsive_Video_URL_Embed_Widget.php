<?php
/**
 * @package Responsive_Video_URL_Embed_Widget
*/
/*
Plugin Name: Responsive Video URL Embed Widget
Plugin URI: http://tonnexmedia.com/
Description: Responsive Video URL Embed Widget is an advanced URL embedding widget which will make your URL embedding experience better than ever.
Version: 1.0
Author: Tets Stuart
Author URI: http://www.visualscope.com/
*/

class ResponsiveVideoURLEmbed extends WP_Widget{
    
    public function __construct() {
        $params = array(
            'description' => 'Responsive Video URL Embed Widget is an advanced URL embedding widget which will make your URL embedding experience better than ever.',
            'name' => 'Responsive Video URL Embed Widget'
        );
        parent::__construct('ResponsiveVideoURLEmbed','',$params);
    }
    
    public function form($instance) {
        extract($instance);
        
        ?>
        
        <!-- Color Picker Script Start -->
<script type="text/javascript">
//<![CDATA[
    jQuery(document).ready(function()
    {
	// colorpicker field
	jQuery('.cw-color-picker').each(function(){
	var $this = jQuery(this),
        id = $this.attr('rel');
 	$this.farbtastic('#' + id);
    });
});		
//]]>   
</script>
<!-- Color Picker Script End -->

<!-- here will put all widget configuration -->
		<p>
			<label for="<?php echo $this->get_field_id('url_name');?>">Your Player URL : </label>
			<input
			class="widefat"
			id="<?php echo $this->get_field_id('url_name');?>"
			name="<?php echo $this->get_field_name('url_name');?>"
			value="<?php echo !empty($url_name) ? $url_name : ""; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'boxshadow' ); ?>">Box-Shadow Display:</label> 
			<select id="<?php echo $this->get_field_id( 'boxshadow' ); ?>"
				name="<?php echo $this->get_field_name( 'boxshadow' ); ?>"
				class="widefat" style="width:100%;">
					<option value="1" <?php if ($boxshadow == '1') echo 'selected="1"'; ?> >YES</option>
					<option value="0" <?php if ($boxshadow == '0') echo 'selected="0"'; ?> >NO</option>	
			</select>
		</p>

	    <p>
			<label for="<?php echo $this->get_field_id('shadow_color');?>">Add Box-Shadow Color : </label>
			<input
			class="widefat"
			id="<?php echo $this->get_field_id('shadow_color');?>"
			name="<?php echo $this->get_field_name('shadow_color');?>"
				value="<?php echo !empty($shadow_color) ? $shadow_color : "#382525"; ?>" />
		</p>
		<div class="cw-color-picker backgroundColorHide" rel="<?php echo $this->get_field_id('shadow_color'); ?>"></div>
		<p>
			<label for="<?php echo $this->get_field_id( 'border_radius' ); ?>">Border Radius Display:</label> 
			<select id="<?php echo $this->get_field_id( 'border_radius' ); ?>"
				name="<?php echo $this->get_field_name( 'border_radius' ); ?>"
				class="widefat" style="width:100%;">
					<option value="1" <?php if ($border_radius == '1') echo 'selected="1"'; ?> >YES</option>
					<option value="0" <?php if ($border_radius == '0') echo 'selected="0"'; ?> >NO</option>	
			</select>
		</p>
	     <p>
			<label for="<?php echo $this->get_field_id('border_radius_size');?>">Border Radius Size : </label>
			<input
			class="widefat"
			id="<?php echo $this->get_field_id('border_radius_size');?>"
			name="<?php echo $this->get_field_name('border_radius_size');?>"
			value="<?php echo !empty($border_radius_size) ? $border_radius_size : "5"; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'padding' ); ?>">Padding Display:</label> 
			<select id="<?php echo $this->get_field_id( 'padding' ); ?>"
				name="<?php echo $this->get_field_name( 'padding' ); ?>"
				class="widefat" style="width:100%;">
					<option value="1" <?php if ($padding == '1') echo 'selected="1"'; ?> >YES</option>
					<option value="0" <?php if ($padding == '0') echo 'selected="0"'; ?> >NO</option>	
			</select>
		</p>
		  <p>
			<label for="<?php echo $this->get_field_id('padding_size');?>">Padding Size : </label>
			<input
			class="widefat"
			id="<?php echo $this->get_field_id('padding_size');?>"
			name="<?php echo $this->get_field_name('padding_size');?>"
			value="<?php echo !empty($padding_size) ? $padding_size : "5"; ?>" />
		</p>
		

<?php
    }
    
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        $title = apply_filters('widget_title', $title);
        $description = apply_filters('widget_description', $description);
	    if(empty($title)) $title = "Responsive URL Embed Widget";
        if(empty($url_name)) $url_name = "";
		if(empty($boxshadow)) $boxshadow = "0";
        if(empty($shadow_color)) $shadow_color = "#382525";
        if(empty($border_radius)) $border_radius = "1";
        if(empty($border_radius_size)) $border_radius_size = "5";
        if(empty($padding)) $padding = "1";
        if(empty($padding_size)) $padding_size = "5";	
        echo $before_widget;
            echo $before_title . $title . $after_title;          
            ?>

   <style type="text/css">
.video-responsive {
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
   }
.video-responsive iframe {
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}

</style>


<?php if ($boxshadow=='1'){?>
    <style type="text/css">
      .responsive_url_embeded_widget { 
        border: 1px solid #999;
        -webkit-box-shadow: 6px 7px 15px -2px <?php echo $shadow_color;?>;
        -moz-box-shadow: 6px 7px 15px -2px <?php echo $shadow_color;?>;
        box-shadow: 6px 7px 15px -2px <?php echo $shadow_color;?>;
        }  
    </style>
<?php } else { } ?>
<?php if ($border_radius=='1'){?>
    <style type="text/css">
      .responsive_url_embeded_widget{ 
        border: 1px solid #999;
        border-radius:<?php echo $border_radius_size; ?>px ;
         }  
    </style>
<?php } else {} ?>

<?php if ($padding=='1'){?>
    <style type="text/css">
      .responsive_url_embeded_widget{ 
        border: 1px solid #999;
        padding:<?php echo $padding_size; ?>px ;
        }  
    </style>
<?php } else {} ?>
   
  <div class="responsive_url_embeded_widget">
     <div class="video-responsive">
       <iframe width="auto" height="auto" src="<?php echo $url_name;?>" frameborder="0" allowfullscreen></iframe>
     </div>
  </div>
   
<?php
        echo $after_widget;
    }
}
//registering the color picker
function responsive_video_url_embed_color_picker_script() {
	wp_enqueue_script('farbtastic');
}
function responsive_video_url_embed_color_picker_style() {
	wp_enqueue_style('farbtastic');
}
add_action('admin_print_scripts-widgets.php', 'responsive_video_url_embed_color_picker_script');
add_action('admin_print_styles-widgets.php', 'responsive_video_url_embed_color_picker_style');
add_action('widgets_init','register_Responsivevideourlembed');
function register_Responsivevideourlembed(){
    register_widget('ResponsiveVideoURLEmbed');
}