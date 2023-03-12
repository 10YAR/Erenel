<?php
/**
 * @Packge     : Taxseco
 * @Version    : 1.0
 * @Author     : Angfuzsoft
 * @Author URI : https://www.angfuzsoft.com/
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

echo '<!-- Single Post -->';

if(has_post_thumbnail()){ ?>

    <div <?php post_class('has-post-thumbnail'); ?>>
    <?php
}else{ ?>
    <div <?php post_class(); ?>>
<?php }


    // Blog Post Content
    do_action( 'taxseco_blog_post_content' );


echo '</div>';
echo '<!-- End Single Post -->';