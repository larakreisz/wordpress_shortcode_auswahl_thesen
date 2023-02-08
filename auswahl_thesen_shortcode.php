<?php

/*
 * The plugin luther_auswahl_thesen
 * 
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link                https://github.com/larakreisz/wordpress_shortcode_auswahl_thesen
 * @since               February 8, 2023
 * @package             Luther Auswahl Thesen
 * 
 * @wordpress-plugin
 * Plugin Name:         Luther Auswahl Thesen
 * Plugin URI:          https://github.com/larakreisz/wordpress_shortcode_auswahl_thesen
 * Description:         The plugin generates a shortcode, that provides for each user the relevant luther thesis
 * Version:             1.0
 * Author:              Lara Kreisz
 * Author URI:          https://github.com/larakreisz/wordpress_shortcode_auswahl_thesen
 */
if (!defined('WPINC'))
    die;

add_shortcode('luther-thesen-auswahl', 'luther_thesen_auswahl_func');


function luther_thesen_auswahl_func( $atts ) {
	
// extract shortcode attributes
extract( shortcode_atts( array(
        'loesungszahl' => 1,
	'entwicklungszahl' => 1,
	'beziehungszahl' => 1,
	'schluesselzahl' => 1,
	'geistigezahl' => 1,
	'psychezahl' => 1,
	'koerperzahl' => 1,
	'materiezahl' => 1,
	'zusatzzahl' => 1,
    ), $atts ) );
	 

//-----------------
// Sub query #1:
//-----------------
$args1 = [
   'post_type'      => 'cars',
   //'posts_per_page' => 10,
   //'orderby'        => 'title',
   //'order'          => 'asc',
   'meta_query'     => [
        [
            'key'      => 'doors',
            'value'    => 0,
            'compare'  => '>=',
            'type'     => 'UNSIGNED'
        ],
    ],
];

//-----------------
// Sub query #2:
//-----------------
$args2 = [
   'post_type'      => 'post',
   //'posts_per_page' => 10,
   //'orderby'        => 'date',
   //'order'          => 'desc',
   'meta_query'     => [
        [
            'key'      => 'doors',
            'value'    => 0,
            'compare'  => '>=',
            'type'     => 'UNSIGNED'
        ],
    ],  
];


/*//------------------------------
// Order by a common meta value
//------------------------------

// Modify sub fields:
add_filter( 'cq_sub_fields', $callback = function( $fields ) {
    return $fields . ', meta_value';
});*/

//---------------------------
// Combined queries #1 + #2:
//---------------------------
$args = [
    'combined_query' => [        
	'args'           => [ $args1, $args2 ],
	//'posts_per_page' => 5,
	'orderby'        => 'meta_value_num',
	'order'          => 'DESC',
    ]
];

//---------
// Output:
//---------

//remove_filter( 'cq_sub_fields', $callback );

// HTML LOOP BODY / part 1
$output = '<div class="clear"></div><div class="childs grid_12">';

// loop
$thesen_auswahl = new WP_Query( $args );
if( $thesen_auswahl->have_posts() ):
	
	while( $thesen_auswahl->have_posts() ): $thesen_auswahl->the_post();
		$output .= '<div id="service-hp">'.
                   get_the_post_thumbnail('home-thumb').
                   '<h2 style="margin-bottom:5px">'.
                   get_the_title().
                   '</h2>'.
                   get_the_excerpt().
                   '<a class="read-more" href="'.
                   get_permalink().
                   '">en savoir plus <img src="'.
                   get_bloginfo( 'template_url' ).
                   '/images/read-more.png"></a></div><!--  ends here -->';
	endwhile;
	wp_reset_postdata();
	$output .= '</div>';
else:
	_e( 'Sorry no posts found!' );
endif;  

return $output;
}


