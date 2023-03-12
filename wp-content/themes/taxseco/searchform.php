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
        exit();
    }
?>

<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form">
    <input name="s" required value="<?php echo esc_html( get_search_query() ); ?>" type="search" class="form-control" placeholder="<?php echo esc_attr__( 'Search Here', 'taxseco' ); ?>">
    <button type="submit"><i class="fal fa-search"></i></button>
</form>