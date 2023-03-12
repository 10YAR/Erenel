<?php
/**
 * @Packge     : Taxseco
 * @Version    : 1.0
 * @Author     : Angfuzsoft
 * @Author URI : https://www.angfuzsoft.com/
 *
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit;
}
?>
<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 

	/**
	 * page content 
	 * Comments Template
	 * @Hook  taxseco_page_content
	 *
	 * @Hooked taxseco_page_content_cb
	 * 
	 *
	 */
	do_action( 'taxseco_page_content' );
	?>
</div>