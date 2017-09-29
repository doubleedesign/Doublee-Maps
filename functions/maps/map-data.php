<?php
/* 
MAGIC MAP SETUP FUNCTIONS
These functions are used by template-parts/map.php to echo the text we need into the Google Map JavaScript.
Having as many of the operations as possible in functions here helps keep everything neat and tidy,
as the map template part has the potential to get quite messy given the amount of things that need to be done and the switching between PHP and JS.
*/

// Use WP_Query inside a function to get an indexed array of address IDs
function doublee_get_address_ids() {
	
	// WP_Query arguments
	$args = array(
		'post_type'			=> array( 'address' ),
		'post_status'       => array( 'publish' ),
		//'posts_per_page' 	=> '2',
		'orderby'			=> 'menu_order',
		'order'    			=> 'ASC',
	);

	$address_array = array(); 

	$address_query = new WP_Query( $args );

	while ( $address_query->have_posts() ) : $address_query->the_post();
		$id = get_the_ID(); 
		array_push($address_array, $id);
	endwhile;

	return $address_array; 
}

// Function to get the lat and long of a given address (entered in the lat and long fields in WP) and store them in an array
function doublee_get_address_data($id) {
	
	$address_id = $id;
	$get_lat = get_field('location_latitude', $address_id);
	$get_long = get_field('location_longitude', $address_id);

	// Return an associative array
	$data = array(
		'id' 	=> $address_id,
		'lat' 	=> $get_lat,
		'long' 	=> $get_long,
	);
	return $data;
}

// Function to output the info windows on the map. This is what you want to edit if you want to include different data in the box.
function doublee_map_info_box($id) {
	
	// Get the info from WordPress. Texturize ACF fields in case there's symbols that would break the output, such as ' and <
	$title = get_the_title($id); 
	$streetAddress = wptexturize(get_field('street_address', $id));
	$suburb = wptexturize(get_field('suburb', $id));
	$state = wptexturize(get_field('state', $id));
	$postcode = wptexturize(get_field('postcode', $id));
	
	// Build the output
	$infobox = '<div class="map-infobox">';
		$infobox .= '<span class="title">'.$title.'</span>';
		$infobox .= '<span class="streetAddress">'.$streetAddress.'</span>';
		$infobox .= '<span class="suburb">'.$suburb.'</span>';
		$infobox .= '<span class="state">'.$state.'</span>';
		$infobox .= '<span class="postcode">'.$postcode.'</span>';
	$infobox .= '</div>';
	
	return $infobox;
}

?>