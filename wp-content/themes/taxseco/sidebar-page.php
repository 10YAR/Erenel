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

if ( ! is_active_sidebar( 'taxseco-page-sidebar' ) ) {
    return;
}
?>

<div class="col-lg-4">
    <div class="page-sidebar">
    <?php 
        dynamic_sidebar( 'taxseco-page-sidebar' );
    ?>               
    </div>
</div>