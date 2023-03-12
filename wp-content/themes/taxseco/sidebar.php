<?php

/**
 * @Packge     : Taxseco
 * @Version    : 1.0
 * @Author     : Angfuzsoft
 * @Author URI : https://www.angfuzsoft.com/
 *
 */


// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit;
}

if ( ! is_active_sidebar( 'taxseco-blog-sidebar' ) ) {
    return;
}
?>

<div class="col-lg-4 ps-lg-2">
    <aside class="sidebar-area">
	    <?php dynamic_sidebar( 'taxseco-blog-sidebar' ); ?>
	</aside>
</div>