<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'fl_head', 'FLChildTheme::stylesheet' );



function recent_donors_function() {
	
	//Get the latest 100 Give Donors
	$args = array(
		'number' => 300,
	);
	$output = "";

	//First check that Give exist
	if ( class_exists( 'Give' ) ) {
		$donors = Give()->customers->get_customers( $args );
		foreach ( $donors as $donor ) {
			
			$output .= $names.$donor->name.", ";
			$output = ucwords(strtolower($output)); 

		}
	$output .= " and many more.";
	return $output;
	}

}
add_shortcode( 'donor_list', 'recent_donors_function' );