<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$taxseco_woo_relproduct_display = taxseco_opt('taxseco_woo_relproduct_display');

if ( $related_products && $taxseco_woo_relproduct_display) : ?>

    <div class="related-products space-extra-top">

        <div class="title-area text-center">
            <?php
            if( class_exists('ReduxFramework') ) {
                $subtitle = taxseco_opt('taxseco_woo_relproduct_subtitle');
                $title = taxseco_opt('taxseco_woo_relproduct_title');
            }else{
                $subtitle = esc_html__('Some Others Product','taxseco');
                $title = esc_html__('Related products','taxseco');
            }
            ?>
            <span class="sub-title"><?php echo esc_html($subtitle) ?></span>
            <h2 class="sec-title"><?php echo esc_html($title) ?></h2>
            <span class="shape-title"></span>
        </div>


        <div class="row related-products-carousel" id="productSlide">

        <?php
            
            if( class_exists('ReduxFramework') ) {
                $taxseco_woo_related_product_col = taxseco_opt('taxseco_woo_related_product_col');
                if( $taxseco_woo_related_product_col == '2' ) {
                    $taxseco_woo_product_col_val = 'col-xl-2 col-lg-4 col-sm-6 mb-30';
                } elseif( $taxseco_woo_related_product_col == '3' ) {
                    $taxseco_woo_product_col_val = 'col-xl-3 col-lg-4 col-sm-6 mb-30';
                } elseif( $taxseco_woo_related_product_col == '4' ) {
                    $taxseco_woo_product_col_val = 'col-xl-4 col-lg-4 col-sm-6 mb-30';
                } elseif( $taxseco_woo_related_product_col == '6' ) {
                    $taxseco_woo_product_col_val = 'col-lg-6 col-sm-6 mb-30';
                }
            } else {
                $taxseco_woo_product_col_val = 'col-xl-3 col-lg-4 col-sm-6 mb-30';
            }
        ?>

            <?php foreach ( $related_products as $related_product ) : ?>
                <div class="<?php echo esc_attr($taxseco_woo_product_col_val) ?>">
                    <?php
                        $post_object = get_post( $related_product->get_id() );

                        setup_postdata( $GLOBALS['post'] =& $post_object );

                        wc_get_template_part( 'content', 'product' );
                    ?>
                </div>

            <?php endforeach; ?>

        </div>

    </div>

<?php endif;

wp_reset_postdata();