<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : Taxseco
 * @version   : 1.0
 * @Author    : Angfuzsoft
 * @Author URI: https://www.angfuzsoft.com/
 * Template Name: Template Builder
 */

//Header
get_header();

// Container or wrapper div
$taxseco_layout = taxseco_meta( 'custom_page_layout' );

if( $taxseco_layout == '1' ){
	echo '<div class="taxseco-main-wrapper">';
		echo '<div class="container">';
			echo '<div class="row">';
				echo '<div class="col-sm-12">';
}elseif( $taxseco_layout == '2' ){
    echo '<div class="taxseco-main-wrapper">';
		echo '<div class="container-fluid">';
			echo '<div class="row">';
				echo '<div class="col-sm-12">';
}else{
	echo '<div class="taxseco-fluid">';
}
	echo '<div class="builder-page-wrapper">';
	// Query
	if( have_posts() ){
		while( have_posts() ){
			the_post();
			the_content();
		}
        wp_reset_postdata();
	}

	echo '</div>';
if( $taxseco_layout == '1' ){
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}elseif( $taxseco_layout == '2' ){
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}else{
	echo '</div>';
}

//footer
get_footer();