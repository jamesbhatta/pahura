<?php
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
require_once get_template_directory() . '/includes/enqueue-scripts.php';
require_once get_template_directory() . '/includes/facebook-og-tags.php';
require_once get_template_directory() . '/includes/customize-admin-panel.php';
require_once get_template_directory() . '/includes/customize-dashboard.php';
require_once get_template_directory() . '/includes/post-views.php';
require_once get_template_directory() . '/includes/customizer/site_settings_customizer.php';
require_once get_template_directory() . '/includes/custom-loop.php';
require_once get_template_directory() . '/includes/widgets/theme_widgets.php';
require_once get_template_directory() . '/includes/nepali_calendar.php';
require_once get_template_directory() . '/includes/tharu_date_functions.php';
require_once get_template_directory() . '/includes/site_settings.php';

function get_tharu_date($yy, $mm, $dd)
{
	$cal = new Nepali_Calendar();
	$tharu_date = $cal->eng_to_nep($yy, $mm, $dd);
	$tharu_date = dtn_convert_to_tharu($tharu_date);

	return $tharu_date;
}

function tharu_date_today()
{
	$yy = date('Y');
	$mm = date('m');
	$dd = date('d');
	$tharu_date = get_tharu_date($yy, $mm, $dd);
	echo $tharu_date['date']  . ' ' . $tharu_date['month_name'] . ' ' . $tharu_date['year'] . ', '. $tharu_date['day'];
}


function wp_theme_setup(){
	add_theme_support('post-thumbnails');

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'Ranatharu' ),
		'footer-menu-one' => __( 'Footer Menu One', 'Ranatharu' ),
		'footer-menu-two' => __( 'Footer Menu Two', 'Ranatharu' ),
		'footer-menu-three' => __( 'Footer Menu Three', 'Ranatharu' ),
	) );
}
add_action('after_setup_theme', 'wp_theme_setup');

function themename_custom_logo_setup() {
	$defaults = array(
		'height'      => 120,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );







