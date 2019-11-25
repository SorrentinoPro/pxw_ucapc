<?php
	/**
		Plugin Name: pxw-uber_clean_air_plan_calculator
		
		Plugin URI:  https://sorrentino.pro/px/w/pxw_ucapc
		
		Description: The Plugin will allow users to select a car (out of the six Otto Car LTD have on their Rent 2 Buy scheme) and be able to select how much money they have on their Uber Clean Air fund, in order to see how much of a discount they can get on their weekly payments if they take out a car with Otto Car.
		
		Version:     1.0
		
		Author:      Sorrentino Francesco
		
		Author URI:  https://sorrentino.pro
		
		License:     Private
		
		Text Domain: pxw_ucapc
		
	*/

	if ( ! defined( 'ABSPATH' ) ){
		exit;
	}
	
	/**
	* Styling: loading stylesheets and javascript for the plugin.
	*/
	function pxw_uploader_enqueue_style(){

		wp_enqueue_style( 'SwiperCSS', plugins_url('assets/css/swiper.min.css', __FILE__) );
		wp_enqueue_style( 'pxw_ucapc_style', plugins_url('assets/css/style.css', __FILE__) );
		
		// Custom scripts.
		wp_enqueue_script('swiperJS', plugins_url('assets/js/swiper.min.js', __FILE__), array('jquery'), date('d-m-Y-H:i:s'), false );
		wp_enqueue_script('pxw_ucapc_script', plugins_url('assets/js/script.js', __FILE__), array('jquery'), date('d-m-Y-H:i:s'), false );
		
	}
	
	/**
	*	Admin end.
	*/
    add_action( 'admin_enqueue_scripts', 'pxw_uploader_enqueue_style' );
	
	/**
	*	Public end.
	*/
    add_action( 'wp_enqueue_scripts', 'pxw_uploader_enqueue_style' );
	
	
	/**
	* ShortCodes.
	*/	
	require plugin_dir_path(__FILE__) . 'includes/shortcodes.php';
	
?>