<?php
/**
 * @Packge     : Taxseco
 * @Version    : 1.0
 * @Author     : Angfuzsoft
 * @Author URI : https://www.angfuzsoft.com/
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
    
    /**
    *
    * Hook for Footer Content
    *
    * Hook taxseco_footer_content
    *
    * @Hooked taxseco_footer_content_cb 10
    *
    */
    do_action( 'taxseco_footer_content' );

    /**
    *
    * Hook for Back to Top Button
    *
    * Hook taxseco_back_to_top
    *
    * @Hooked taxseco_back_to_top_cb 10
    *
    */
    do_action( 'taxseco_back_to_top' );

    wp_footer();
    ?>
</body>
</html>