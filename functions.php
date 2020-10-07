<?php

function new_portfolio_sidebar() {
	register_sidebar( array(
		'name'          => __( 'Portfolio Sidebar', 'textdomain' ),
		'id'            => 'portfolio-sidebar',
		'description'   => __( 'Widgets in this area will be shown on posts.', 'textdomain' ),
		'before_title'  => '<h6 class="widgettitle">',
		'after_title'   => '</h6>',
	   'before_widget' => '<div class="widget">',
	   'after_widget'  => '</div>',
	) );
}
add_action( 'widgets_init', 'new_portfolio_sidebar' );



/*
* ///////////////////
* Shortcode to display taxonomy terms
*
*	Author: Peter Izzo
* ////////////////////
*/


function tax_list() {

	$object = get_queried_object();
	$taxonomies = get_terms( [
			'taxonomy'   => 'portfolio-cat',
			'hide_empty' => false
		]
	);

	if ( !empty($taxonomies) ) {
		$output = '<ul>';
		foreach ($taxonomies as $term) {
			if ($object->term_id == $term->term_id) {
				$output .= '<li><a href="' . get_term_link($term) . '"><strong>' . $term->name . '</strong></a></li>';
			}

			else {
				$output .= '<li><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
			}

		}
		$output .= '</ul>';
		return $output;
	}

}

add_shortcode('tax_list', 'tax_list');
