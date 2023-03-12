<?php
/**
 * @Packge     : Taxseco
 * @Version    : 1.0
 * @Author     : Angfuzsoft
 * @Author URI : https://www.angfuzsoft.com/
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    taxseco_setPostViews( get_the_ID() );

    ?>
    <div <?php post_class(); ?>>
    <?php
        if( class_exists('ReduxFramework') ) {
            $taxseco_post_details_title_position = taxseco_opt('taxseco_post_details_title_position');
        } else {
            $taxseco_post_details_title_position = 'header';
        }

        $allowhtml = array(
            'p'         => array(
                'class'     => array()
            ),
            'span'      => array(),
            'a'         => array(
                'href'      => array(),
                'title'     => array()
            ),
            'br'        => array(),
            'em'        => array(),
            'strong'    => array(),
            'b'         => array(),
        );
        // Blog Post Thumbnail
        do_action( 'taxseco_blog_post_thumb' );

        if( $taxseco_post_details_title_position != 'header' ) {
            echo '<h2 class="blog-title h3">'.wp_kses( get_the_title(), $allowhtml ).'</h2>';
        }
        // Blog Post Meta
        do_action( 'taxseco_blog_post_meta' );
        
        echo '<div class="blog-content">';

            if( get_the_content() ){

                the_content();
                // Link Pages
                taxseco_link_pages();
            }
        echo '</div>';

        if( class_exists('ReduxFramework') ) {
            $taxseco_post_details_share_options = taxseco_opt('taxseco_post_details_share_options');
        } else {
            $taxseco_post_details_share_options = false;
        }
        
        $taxseco_post_tag = get_the_tags();
        
        if( ! empty( $taxseco_post_tag ) || ( function_exists( 'taxseco_social_sharing_buttons' ) || $taxseco_post_details_share_options ) ){
            echo '<div class="share-links clearfix">';
                echo '<div class="row justify-content-between">';
                    if( is_array( $taxseco_post_tag ) && ! empty( $taxseco_post_tag ) ){
                        if( count( $taxseco_post_tag ) > 1 ){
                            $tag_text = __( 'Tags:', 'taxseco' );
                        }else{
                            $tag_text = __( 'Tag:', 'taxseco' );
                        }
                        echo '<div class="col-sm-auto">';
                        echo '<span class="share-links-title">'.$tag_text.'</span>';

                            echo '<div class="tagcloud">';
                                foreach( $taxseco_post_tag as $tags ){
                                    echo '<a href="'.esc_url( get_tag_link( $tags->term_id ) ).'">'.esc_html( $tags->name ).'</a>';
                                }
                            echo '</div>';
                        echo '</div>';
                    }

                    /**
                    *
                    * Hook for Blog Details Share Options
                    *
                    * Hook taxseco_blog_details_share_options
                    *
                    * @Hooked taxseco_blog_details_share_options_cb 10
                    *
                    */
                    do_action( 'taxseco_blog_details_share_options' );
                echo '</div>';
            echo '</div>';
        }    

        /**
        *
        * Hook for Blog Details Author Bio
        *
        * Hook taxseco_blog_details_author_bio
        *
        * @Hooked taxseco_blog_details_author_bio_cb 10
        *
        */
        do_action( 'taxseco_blog_details_author_bio' );

        /**
        *
        * Hook for Blog Navigation
        *
        * Hook taxseco_blog_details_post_navigation
        *
        * @Hooked taxseco_blog_details_post_navigation_cb 10
        *
        */
        do_action( 'taxseco_blog_details_post_navigation' );

        /**
        *
        * Hook for Blog Details Comments
        *
        * Hook taxseco_blog_details_comments
        *
        * @Hooked taxseco_blog_details_comments_cb 10
        *
        */
        do_action( 'taxseco_blog_details_comments' );
    echo '</div>'; 