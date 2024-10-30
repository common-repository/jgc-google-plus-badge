<?php
/**
 * Widget to display 'Google+ Badge'.
 *
 * Author: GalussoThemes
 * Author URI: https://galussothemes.com
 */

add_action ('widgets_init', 'jgcgpb_google_plus_badge_widget');

function jgcgpb_google_plus_badge_widget () {
	register_widget ('jgcgpb_widget_google_plus_badge');
}

class jgcgpb_widget_google_plus_badge extends WP_Widget {

	function __construct(){
		$widget_ops = array(
			'classname' => 'jgcgpb_widget_google_plus_badge',
			'description' => __('This widget display a Google Plus badge.','jgc-google-plus-badge'));

		parent::__construct('jgcgpb_widget_google_plus_badge', __('(JGC) Google Plus Badge','jgc-google-plus-badge'), $widget_ops);
	}

	function form($instance){
		$defaults = array(
			'title' => '',
			'page_url' => 'https://plus.google.com/+GalussothemesWordPress',
			'width' => '280',
			'color_scheme' => 'light',
			'gp_layout' => 'portrait',
			'page_type' => 'page',
			'cover_photo' => '',
			'tagline' => '',
			);

		$instance = wp_parse_args((array) $instance, $defaults);

		$title        = $instance ['title'];
		$page_url     = $instance ['page_url'];
		$width        = $instance ['width'];
		$color_scheme = $instance ['color_scheme'];
		$gp_layout    = $instance ['gp_layout'];
		$page_type    = $instance ['page_type'];
		$cover_photo  = $instance ['cover_photo'];
		$tagline      = $instance ['tagline'];
		?>

		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','jgc-google-plus-badge'); ?>:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('page_type'); ?>"><?php _e('Page type','jgc-google-plus-badge'); ?>:</label>
		<select id="<?php echo $this->get_field_id('page_type'); ?>" name="<?php echo $this->get_field_name('page_type'); ?>" style="width:100%;">
			<option value="profile" <?php echo selected( $page_type, 'profile', false ); ?>><?php _e('Profile', 'jgc-google-plus-badge'); ?></option>
			<option value="page" <?php echo selected( $page_type, 'page', false ); ?>><?php _e('Page', 'jgc-google-plus-badge'); ?></option>
			<option value="community" <?php echo selected( $page_type, 'community', false ); ?>><?php _e('Community', 'jgc-google-plus-badge'); ?></option>
		</select>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('page_url'); ?>"><?php _e('Google+ Page URL','jgc-google-plus-badge'); ?>:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('page_url'); ?>" name="<?php echo $this->get_field_name('page_url'); ?>" value="<?php echo esc_url($page_url); ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width','jgc-google-plus-badge'); ?>:</label>
		<input type="text" class="widefat" style="width: 50px;" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo esc_attr($width); ?>" /> px
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('color_scheme'); ?>"><?php _e('Color Scheme','jgc-google-plus-badge'); ?>:</label>
		<select id="<?php echo $this->get_field_id('color_scheme'); ?>" name="<?php echo $this->get_field_name('color_scheme'); ?>" class="widefat">
			<option value="light" <?php echo selected( $color_scheme, 'light', false ); ?>><?php _e('Light', 'jgc-google-plus-badge'); ?></option>
			<option value="dark" <?php echo selected( $color_scheme, 'dark', false ); ?>><?php _e('Dark', 'jgc-google-plus-badge'); ?></option>
		</select>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('gp_layout'); ?>"><?php _e('Layout','jgc-google-plus-badge'); ?>:</label>
		<select id="<?php echo $this->get_field_id('gp_layout'); ?>" name="<?php echo $this->get_field_name('gp_layout'); ?>" class="widefat">
			<option value="portrait" <?php echo selected( $gp_layout, 'portrait', false ); ?>><?php _e('Portrait', 'jgc-google-plus-badge'); ?></option>
			<option value="landscape" <?php echo selected( $gp_layout, 'landscape', false ); ?>><?php _e('Landscape', 'jgc-google-plus-badge'); ?></option>
		</select>
		</p>

		<p>
		<b><?php _e('Portrait Layout Settings','jgc-google-plus-badge'); ?></b>
		</p>

		<p>
		<input class="checkbox" type="checkbox" <?php echo checked($cover_photo, 'on', false); ?> id="<?php echo $this->get_field_id('cover_photo'); ?>" name="<?php echo $this->get_field_name('cover_photo'); ?>" />
		<label for="<?php echo $this->get_field_id('cover_photo'); ?>"><?php _e('Cover Photo','jgc-google-plus-badge'); ?></label>
		</p>

		<p>
		<input class="checkbox" type="checkbox" <?php echo checked($tagline, 'on', false); ?> id="<?php echo $this->get_field_id('tagline'); ?>" name="<?php echo $this->get_field_name('tagline'); ?>" />
		<label for="<?php echo $this->get_field_id('tagline'); ?>"><?php _e('Tagline','jgc-google-plus-badge'); ?></label>
		</p>

		<p><a style="font-style: italic; color:#919191; text-decoration: none;" href="https://galussothemes.com/wordpress-themes" target="_blank"><?php _e('Take a look to our Themes', 'jgc-google-plus-badge'); ?> &raquo;</a></p><hr>

		<?php
	}

	function update($new_instance, $old_instance){

		$instance = $old_instance;

		$instance['title']        = (!empty( $new_instance['title'])) ? strip_tags( $new_instance['title']) : '';
		$instance['page_type']    = sanitize_text_field($new_instance['page_type']);
		$instance['page_url']     = esc_url( $new_instance['page_url']);
		$instance['width']        = sanitize_text_field($new_instance['width']);
		$instance['gp_layout']    = strip_tags($new_instance['gp_layout']);
		$instance['color_scheme'] = strip_tags($new_instance['color_scheme']);
		$instance['cover_photo']  = (!empty( $new_instance['cover_photo'])) ? strip_tags( $new_instance['cover_photo']) : '';
		$instance['tagline']      = (!empty( $new_instance['tagline'])) ? strip_tags( $new_instance['tagline']) : '';

		return $instance;

	}

	function widget($args, $instance){

		extract($args);

		echo $before_widget;

		$title        = (!empty($instance['title'])) ? apply_filters ('widget_title', $instance['title']) : '';
		$page_type    = (!empty($instance['page_type'])) ?  $instance['page_type'] : 'page';
		$page_url     = (!empty($instance['page_url'])) ? esc_url( $instance['page_url']) : 'https://plus.google.com/+GalussothemesWordPress';
		$width        = (!empty($instance['width'])) ? $instance['width'] : '280';
		$color_scheme = (!empty($instance['color_scheme'])) ? $instance['color_scheme'] : 'light';
		$gp_layout    = (!empty($instance['gp_layout'])) ? $instance['gp_layout'] : 'portrait';
		$cover_photo  = (!empty($instance['cover_photo'])) ? $instance['cover_photo'] : '';
		$tagline      = (!empty($instance['tagline'])) ? $instance['tagline'] : '';

		$cover_photo = ($cover_photo == 'on') ? 'true' : 'false';
		$tagline     = ($tagline == 'on') ? 'true' : 'false';


		if($title) {
			echo $before_title . $title . $after_title;
		}

		$lang = substr(get_bloginfo('language'), 0, 2);

		if($page_url): ?>
			<script src="https://apis.google.com/js/platform.js" async defer>
				{lang: '<?php echo $lang; ?>'}
			</script>

			<div <?php if($page_type == 'profile') { ?>class="g-person"<?php } elseif($page_type == 'page') { ?>class="g-page"<?php } elseif($page_type == 'community') { ?>class="g-community"<?php } ?>
			data-width="<?php echo $width; ?>" data-href="<?php echo $page_url; ?>" data-layout="<?php echo $gp_layout; ?>" data-theme="<?php echo $color_scheme; ?>" data-rel="publisher" data-showtagline="<?php echo $tagline; ?>" data-showcoverphoto="<?php echo $cover_photo; ?>"></div>
		<?php endif;

		echo $after_widget;
	}
}
