<?php
	// Block direct access
	if( ! defined( 'ABSPATH' ) ){
		exit( );
	}
	/**
	* @Packge 	   : Taxseco
	* @Version     : 1.0
	* @Author     : Angfuzsoft
    * @Author URI : https://www.angfuzsoft.com/
	*
	*/

	if( ! is_active_sidebar( 'taxseco-woo-sidebar' ) ){
		return;
	}
?>
<div class="col-xl-3 col-lg-4">
	<!-- Sidebar Begin -->
	<aside class="sidebar-area shop-sidebar">
		<?php
			dynamic_sidebar( 'taxseco-woo-sidebar' );
		?>
	</aside>
	<!-- Sidebar End -->
</div>