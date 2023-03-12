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


    // preloader hook function
    if( ! function_exists( 'taxseco_preloader_wrap_cb' ) ) {
        function taxseco_preloader_wrap_cb() {
            $preloader_display              =  taxseco_opt('taxseco_display_preloader');

            if( class_exists('ReduxFramework') ){
                if( $preloader_display ){
                    echo '<div class="preloader">';
                        echo '<button class="as-btn style3 preloaderCls">'.esc_html__( 'Cancel Preloader', 'taxseco' ).'</button>';
                        echo '<div class="preloader-inner">';
                            if( ! empty( taxseco_opt( 'taxseco_preloader_img','url' ) ) ){
                                echo taxseco_img_tag( array(
                                    'url'   => esc_url( taxseco_opt( 'taxseco_preloader_img','url' ) ),
                                    'class' => 'loader-img',
                                ) );  
                            }else{
                               echo '<span class="loader"></span>';
                            }
                        echo '</div>';
                    echo '</div>';
                }
            }else{
                echo '<div class="preloader">';
                    echo '<button class="as-btn style3 preloaderCls">'.esc_html__( 'Cancel Preloader', 'taxseco' ).'</button>';
                    echo '<div class="preloader-inner">';
                        echo '<span class="loader"></span>';
                    echo '</div>';
                echo '</div>';
            }
        }
    }

    // Header Hook function
    if( !function_exists('taxseco_header_cb') ) {
        function taxseco_header_cb( ) {
            get_template_part('templates/header');
            get_template_part('templates/header-menu-bottom');
        }
    }

    // back top top hook function
    if( ! function_exists( 'taxseco_back_to_top_cb' ) ) {
        function taxseco_back_to_top_cb( ) {
            $backtotop_trigger = taxseco_opt('taxseco_display_bcktotop');
            $custom_bcktotop   = taxseco_opt('taxseco_custom_bcktotop');
            $custom_bcktotop_icon   = taxseco_opt('taxseco_custom_bcktotop_icon');
            if( class_exists( 'ReduxFramework' ) ) {
                if( $backtotop_trigger ) {
                    if( $custom_bcktotop ) {
                        echo '<!-- Back to Top Button -->';
                        echo '<a href="'.esc_url('#').'" class="scrollToTop scroll-bottom  style2">';
                            echo '<i class="'.esc_attr( $custom_bcktotop_icon ).'"></i>';
                        echo '</a>';
                        echo '<!-- End of Back to Top Button -->';
                    } else {
                        echo '<!-- Back to Top Button -->';
                        echo '<a href="'.esc_url('#').'" class="scrollToTop scroll-btn">';
                            echo '<i class="far fa-arrow-up"></i>';
                        echo '</a>';
                        echo '<!-- End of Back to Top Button -->';
                    }
                }
            }

        }
    }

    // Blog Start Wrapper Function
    if( !function_exists('taxseco_blog_start_wrap_cb') ) {
        function taxseco_blog_start_wrap_cb() {
            echo '<section class="as-blog-wrapper space-top space-extra-bottom arrow-wrap">';
                echo '<div class="container">';
                    echo '<div class="row gx-60">';
        }
    }

    // Blog End Wrapper Function
    if( !function_exists('taxseco_blog_end_wrap_cb') ) {
        function taxseco_blog_end_wrap_cb() {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // Blog Column Start Wrapper Function
    if( !function_exists('taxseco_blog_col_start_wrap_cb') ) {
        function taxseco_blog_col_start_wrap_cb() {
            if( class_exists('ReduxFramework') ) {
                $taxseco_blog_sidebar = taxseco_opt('taxseco_blog_sidebar');
                if( $taxseco_blog_sidebar == '2' && is_active_sidebar('taxseco-blog-sidebar') ) {
                    echo '<div class="col-lg-8 order-lg-last">';
                } elseif( $taxseco_blog_sidebar == '3' && is_active_sidebar('taxseco-blog-sidebar') ) {
                    echo '<div class="col-lg-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }

            } else {
                if( is_active_sidebar('taxseco-blog-sidebar') ) {
                    echo '<div class="col-lg-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            }
        }
    }
    // Blog Column End Wrapper Function
    if( !function_exists('taxseco_blog_col_end_wrap_cb') ) {
        function taxseco_blog_col_end_wrap_cb() {
            echo '</div>';
        }
    }

    // Blog Sidebar
    if( !function_exists('taxseco_blog_sidebar_cb') ) {
        function taxseco_blog_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $taxseco_blog_sidebar = taxseco_opt('taxseco_blog_sidebar');
            } else {
                $taxseco_blog_sidebar = 2;
                
            }
            if( $taxseco_blog_sidebar != 1 && is_active_sidebar('taxseco-blog-sidebar') ) {
                // Sidebar
                get_sidebar();
            }
        }
    }


    if( !function_exists('taxseco_blog_details_sidebar_cb') ) {
        function taxseco_blog_details_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $taxseco_blog_single_sidebar = taxseco_opt('taxseco_blog_single_sidebar');
            } else {
                $taxseco_blog_single_sidebar = 4;
            }
            if( $taxseco_blog_single_sidebar != 1 ) {
                // Sidebar
                get_sidebar();
            }

        }
    }

    // Blog Pagination Function
    if( !function_exists('taxseco_blog_pagination_cb') ) {
        function taxseco_blog_pagination_cb( ) {
            get_template_part('templates/pagination');
        }
    }

    // Blog Content Function
    if( !function_exists('taxseco_blog_content_cb') ) {
        function taxseco_blog_content_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $taxseco_blog_grid = taxseco_opt('taxseco_blog_grid');
            } else {
                $taxseco_blog_grid = '1';
            }

            if( $taxseco_blog_grid == '1' ) {
                $taxseco_blog_grid_class = 'col-lg-12';
            } elseif( $taxseco_blog_grid == '2' ) {
                $taxseco_blog_grid_class = 'col-sm-6';
            } else {
                $taxseco_blog_grid_class = 'col-lg-4 col-sm-6';
            }

            echo '<div class="row">';
                if( have_posts() ) {
                    while( have_posts() ) {
                        the_post();
                        echo '<div class="'.esc_attr($taxseco_blog_grid_class).'">';
                            get_template_part('templates/content',get_post_format());
                        echo '</div>';
                    }
                    wp_reset_postdata();
                } else{
                    get_template_part('templates/content','none');
                }
            echo '</div>';
        }
    }

    // footer content Function
    if( !function_exists('taxseco_footer_content_cb') ) {
        function taxseco_footer_content_cb( ) {

            if( class_exists('ReduxFramework') && did_action( 'elementor/loaded' )  ){
                if( is_page() || is_page_template('template-builder.php') ) {
                    $post_id = get_the_ID();

                    // Get the page settings manager
                    $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

                    // Get the settings model for current post
                    $page_settings_model = $page_settings_manager->get_model( $post_id );

                    // Retrieve the Footer Style
                    $footer_settings = $page_settings_model->get_settings( 'taxseco_footer_style' );

                    // Footer Local
                    $footer_local = $page_settings_model->get_settings( 'taxseco_footer_builder_option' );

                    // Footer Enable Disable
                    $footer_enable_disable = $page_settings_model->get_settings( 'taxseco_footer_choice' );

                    if( $footer_enable_disable == 'yes' ){
                        if( $footer_settings == 'footer_builder' ) {
                            // local options
                            $taxseco_local_footer = get_post( $footer_local );
                            echo '<footer>';
                            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $taxseco_local_footer->ID );
                            echo '</footer>';
                        } else {
                            // global options
                            $taxseco_footer_builder_trigger = taxseco_opt('taxseco_footer_builder_trigger');
                            if( $taxseco_footer_builder_trigger == 'footer_builder' ) {
                                echo '<footer>';
                                $taxseco_global_footer_select = get_post( taxseco_opt( 'taxseco_footer_builder_select' ) );
                                $footer_post = get_post( $taxseco_global_footer_select );
                                echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                                echo '</footer>';
                            } else {
                                // wordpress widgets
                                taxseco_footer_global_option();
                            }
                        }
                    }
                } else {
                    // global options
                    $taxseco_footer_builder_trigger = taxseco_opt('taxseco_footer_builder_trigger');
                    if( $taxseco_footer_builder_trigger == 'footer_builder' ) {
                        echo '<footer>';
                        $taxseco_global_footer_select = get_post( taxseco_opt( 'taxseco_footer_builder_select' ) );
                        $footer_post = get_post( $taxseco_global_footer_select );
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                        echo '</footer>';
                    } else {
                        // wordpress widgets
                        taxseco_footer_global_option();
                    }
                }
            } else {
                echo '<div class="footer-layout1 ">';
                    echo '<div class="copyright-wrap">';
                        echo '<div class="container">';
                            echo '<p class="copyright-text text-center">'.sprintf( 'Copyright <i class="fal fa-copyright"></i> %s <a href="%s">%s</a> All Rights Reserved by <a href="%s">%s</a>',date('Y'),esc_url('#'),__( 'Taxseco.','taxseco' ),esc_url('#'),__( 'Angfuzsoft', 'taxseco' ) ).'</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }

        }
    }

    // blog details wrapper start hook function
    if( !function_exists('taxseco_blog_details_wrapper_start_cb') ) {
        function taxseco_blog_details_wrapper_start_cb( ) {
            echo '<section class="as-blog-wrapper blog-details space-top space-extra-bottom">';
                echo '<div class="container">';
                    if( is_active_sidebar( 'taxseco-blog-sidebar' ) ){
                        $taxseco_gutter_class = 'gx-60';
                    }else{
                        $taxseco_gutter_class = '';
                    }
                    echo '<div class="row '.esc_attr( $taxseco_gutter_class ).'">';
        }
    }

    // blog details column wrapper start hook function
    if( !function_exists('taxseco_blog_details_col_start_cb') ) {
        function taxseco_blog_details_col_start_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $taxseco_blog_single_sidebar = taxseco_opt('taxseco_blog_single_sidebar');
                if( $taxseco_blog_single_sidebar == '2' && is_active_sidebar('taxseco-blog-sidebar') ) {
                    echo '<div class="col-lg-8 order-last">';
                } elseif( $taxseco_blog_single_sidebar == '3' && is_active_sidebar('taxseco-blog-sidebar') ) {
                    echo '<div class="col-lg-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }

            } else {
                if( is_active_sidebar('taxseco-blog-sidebar') ) {
                    echo '<div class="col-lg-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            }
        }
    }

    // blog details post meta hook function
    if( !function_exists('taxseco_blog_post_meta_cb') ) {
        function taxseco_blog_post_meta_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $taxseco_display_post_tag   =  taxseco_opt('taxseco_display_post_tag');
                $taxseco_display_post_date      =  taxseco_opt('taxseco_display_post_date');
            } else {
                $taxseco_display_post_tag   = '1';
                $taxseco_display_post_date      = '1';
            }

            echo '<!-- Blog Meta -->';
                echo '<div class="blog-meta">';
                    echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"><i class="fas fa-user"></i>'.esc_html__('by ','taxseco').esc_html( ucwords( get_the_author() ) ).'</a>';
                    if( $taxseco_display_post_date ){
                        echo '<a href="'.esc_url( taxseco_blog_date_permalink() ).'"><i class="far fa-calendar-alt"></i>';
                            echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
                        echo '</a>';
                    }
                    if( $taxseco_display_post_tag ){
                        $categories = get_the_category();  
                        echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"><i class="fas fa-tags"></i>'.esc_html( $categories[0]->name ).'</a>';
                    }
                echo '</div>';
        }
    }

    // blog details share options hook function
    if( !function_exists('taxseco_blog_details_share_options_cb') ) {
        function taxseco_blog_details_share_options_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $taxseco_post_details_share_options = taxseco_opt('taxseco_post_details_share_options');
            } else {
                $taxseco_post_details_share_options = false;
            }
            if( function_exists( 'taxseco_social_sharing_buttons' ) && $taxseco_post_details_share_options ) {
                echo '<div class="col-md-auto text-md-end">';
                echo '<span class="share-links-title">'.__( 'Share:', 'taxseco' ).'</span>';
                    echo '<div class="social-links">';
                        echo '<ul class="social-links">';
                            echo taxseco_social_sharing_buttons();
                        echo '</ul>';
                    echo '</div>';
                    echo '<!-- End Social Share -->';
                echo '</div>';
            }
        }
    }

    // Blog Details Post Navigation hook function
    if( !function_exists( 'taxseco_blog_details_post_navigation_cb' ) ) {
        function taxseco_blog_details_post_navigation_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $taxseco_post_details_post_navigation = taxseco_opt('taxseco_post_details_post_navigation');
            } else {
                $taxseco_post_details_post_navigation = true;
            }

            $prevpost = get_previous_post();
            $nextpost = get_next_post();

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

            if( $taxseco_post_details_post_navigation && ! empty( $prevpost ) || !empty( $nextpost ) ) {
                echo '<div class="blog-navigation">';
                    echo '<div>';
                        if( ! empty( $prevpost ) ) {
                            echo '<a href="'.esc_url( get_permalink( $prevpost->ID ) ).'" class="nav-btn prev">';
                            if( class_exists('ReduxFramework') ) {
                                if (has_post_thumbnail( $prevpost->ID )) {
                                    echo get_the_post_thumbnail( $prevpost->ID, 'taxseco_80X80' );
                                };
                            }
                                echo '<span class="nav-text">'.esc_html__( ' Previous Post', 'taxseco' ).'</span>';
                            echo '</a>';
                        }
                    echo '</div>';

                    echo '<a href="'.get_permalink( get_option( 'page_for_posts' ) ).'" class="blog-btn"><i class="fa-solid fa-grid"></i></a>';

                    echo '<div>';
                        if( ! empty( $nextpost ) ) {
                            echo '<a href="'.esc_url( get_permalink( $nextpost->ID ) ).'" class="nav-btn next">';
                                if( class_exists('ReduxFramework') ) {
                                    if (has_post_thumbnail($nextpost->ID)) {
                                        echo get_the_post_thumbnail( $nextpost->ID, 'taxseco_80X80' );
                                    };
                                }
                                echo '<span class="nav-text">'.esc_html__( ' Next Post', 'taxseco' ).'</span>';
                            echo '</a>';
                        }
                    echo '</div>';
                echo '</div>';
            }
        }
    }
    
    // blog details author bio hook function
    if( !function_exists('taxseco_blog_details_author_bio_cb') ) {
        function taxseco_blog_details_author_bio_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $postauthorbox =  taxseco_opt( 'taxseco_post_details_author_desc_trigger' );
            } else {
                $postauthorbox = '1';
            }
            if( !empty( get_the_author_meta('description')  ) && $postauthorbox == '1' ) {

                echo '<div class="blog-author">';
                    echo '<div class="auhtor-img">';
                        echo taxseco_img_tag( array(
                            "url"   => esc_url( get_avatar_url( get_the_author_meta('ID'), array(
                                "size"  => '240'
                                ) ) ),
                            ) );
                    echo '</div>';
                    echo '<div class="media-body">';
                        echo '<h3 class="author-name"><a class="text-inherit" href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'">'.esc_html( ucwords( get_the_author() ) ).'</a></h3>';
                        if( ! empty( get_the_author_meta('description') ) ) {
                            echo '<p class="author-text">';
                                echo esc_html( get_the_author_meta('description') );
                            echo '</p>';
                        }

                        $taxseco_social_icons = get_user_meta( get_the_author_meta('ID'), '_taxseco_social_profile_group',true );

                        if( is_array( $taxseco_social_icons ) && !empty( $taxseco_social_icons ) ) {
                            echo '<ul class="social-links">';
                            foreach( $taxseco_social_icons as $singleicon ) {
                                if( ! empty( $singleicon['_taxseco_social_profile_icon'] ) ) {
                                    echo '<li><a href="'.esc_url( $singleicon['_taxseco_lawyer_social_profile_link'] ).'"><i class="'.esc_attr( $singleicon['_taxseco_social_profile_icon'] ).'"></i></a></li>';
                                }
                            }
                            echo '</ul>';
                        }
                    echo '</div>';
                echo '</div>';
            }

        }
    }

    // Blog Details Comments hook function
    if( !function_exists('taxseco_blog_details_comments_cb') ) {
        function taxseco_blog_details_comments_cb( ) {
            if ( ! comments_open() ) {
                echo '<div class="blog-comment-area">';
                    echo taxseco_heading_tag( array(
                        "tag"   => "h3",
                        "text"  => esc_html__( 'Comments are closed', 'taxseco' ),
                        "class" => "inner-title"
                    ) );
                echo '</div>';
            }

            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
    }

    // Blog Details Column end hook function
    if( !function_exists('taxseco_blog_details_col_end_cb') ) {
        function taxseco_blog_details_col_end_cb( ) {
            echo '</div>';
        }
    }

    // Blog Details Wrapper end hook function
    if( !function_exists('taxseco_blog_details_wrapper_end_cb') ) {
        function taxseco_blog_details_wrapper_end_cb( ) {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page start wrapper hook function
    if( !function_exists('taxseco_page_start_wrap_cb') ) {
        function taxseco_page_start_wrap_cb( ) {
            
            if( is_page( 'cart' ) ){
                $section_class = "as-cart-wrapper space-top space-extra-bottom";
            }elseif( is_page( 'checkout' ) ){
                $section_class = "as-checkout-wrapper space-top space-extra-bottom";
            }elseif( is_page('wishlist') ){
                $section_class = "wishlist-area space-top space-extra-bottom";
            }else{
                $section_class = "space-top space-extra-bottom";  
            }
            echo '<section class="'.esc_attr( $section_class ).'">';
                echo '<div class="container">';
                    echo '<div class="row">';
        }
    }

    // page wrapper end hook function
    if( !function_exists('taxseco_page_end_wrap_cb') ) {
        function taxseco_page_end_wrap_cb( ) {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page column wrapper start hook function
    if( !function_exists('taxseco_page_col_start_wrap_cb') ) {
        function taxseco_page_col_start_wrap_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $taxseco_page_sidebar = taxseco_opt('taxseco_page_sidebar');
            }else {
                $taxseco_page_sidebar = '1';
            }
            if( $taxseco_page_sidebar == '2' && is_active_sidebar('taxseco-page-sidebar') ) {
                echo '<div class="col-lg-8 order-last">';
            } elseif( $taxseco_page_sidebar == '3' && is_active_sidebar('taxseco-page-sidebar') ) {
                echo '<div class="col-lg-8">';
            } else {
                echo '<div class="col-lg-12">';
            }

        }
    }

    // page column wrapper end hook function
    if( !function_exists('taxseco_page_col_end_wrap_cb') ) {
        function taxseco_page_col_end_wrap_cb( ) {
            echo '</div>';
        }
    }

    // page sidebar hook function
    if( !function_exists('taxseco_page_sidebar_cb') ) {
        function taxseco_page_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $taxseco_page_sidebar = taxseco_opt('taxseco_page_sidebar');
            }else {
                $taxseco_page_sidebar = '1';
            }

            if( class_exists('ReduxFramework') ) {
                $taxseco_page_layoutopt = taxseco_opt('taxseco_page_layoutopt');
            }else {
                $taxseco_page_layoutopt = '3';
            }

            if( $taxseco_page_layoutopt == '1' && $taxseco_page_sidebar != 1 ) {
                get_sidebar('page');
            } elseif( $taxseco_page_layoutopt == '2' && $taxseco_page_sidebar != 1 ) {
                get_sidebar();
            }
        }
    }

    // page content hook function
    if( !function_exists('taxseco_page_content_cb') ) {
        function taxseco_page_content_cb( ) {
            if(  class_exists('woocommerce') && ( is_woocommerce() || is_cart() || is_checkout() || is_page('wishlist') || is_account_page() )  ) {
                echo '<div class="woocommerce--content">';
            } else {
                echo '<div class="page--content clearfix">';
            }

                the_content();

                // Link Pages
                taxseco_link_pages();

            echo '</div>';
            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

        }
    }

    if( !function_exists('taxseco_blog_post_thumb_cb') ) {
        function taxseco_blog_post_thumb_cb( ) {
            if( get_post_format() ) {
                $format = get_post_format();
            }else{
                $format = 'standard';
            }

            $taxseco_post_slider_thumbnail = taxseco_meta( 'post_format_slider' );

            if( !empty( $taxseco_post_slider_thumbnail ) ){
                echo '<div class="blog-img as-blog-carousel">';
                    foreach( $taxseco_post_slider_thumbnail as $single_image ){
                        echo taxseco_img_tag( array(
                            'url'   => esc_url( $single_image )
                        ) );
                    }
                echo '</div>';
            }elseif( has_post_thumbnail() && $format == 'standard' ) {
                echo '<!-- Post Thumbnail -->';
                echo '<div class="blog-img">';
                    if( ! is_single() ){
                        echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                    }

                    the_post_thumbnail();

                    if( ! is_single() ){
                        echo '</a>';
                    }
                echo '</div>';
                echo '<!-- End Post Thumbnail -->';
            }elseif( $format == 'video' ){
                if( has_post_thumbnail() && ! empty ( taxseco_meta( 'post_format_video has-post-thumbnail' ) ) ){
                    echo '<div class="blog-img">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            the_post_thumbnail();
                        if( ! is_single() ){
                            echo '</a>';
                        }
                        echo '<a href="'.esc_url( taxseco_meta( 'post_format_video' ) ).'" class="popup-video play-btn style3">';
                            echo '<i class="fas fa-play"></i>';
                        echo '</a>';
                    echo '</div>';
                }elseif( ! has_post_thumbnail() && ! is_single() ){
                    echo '<div class="blog-video">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            echo taxseco_embedded_media( array( 'video', 'iframe' ) );
                        if( ! is_single() ){
                            echo '</a>';
                        }
                    echo '</div>';
                }
            }elseif( $format == 'audio' ){
                $taxseco_audio = taxseco_meta( 'post_format_audio' );
                if( ! empty( $taxseco_audio ) ){
                    echo '<div class="blog-audio">';
                        echo wp_oembed_get( $taxseco_audio );
                    echo '</div>';
                }elseif( ! is_single() ){
                    echo '<div class="blog-audio">';
                        echo wp_oembed_get( $taxseco_audio );
                    echo '</div>';
                }
            }

        }
    }

    if( !function_exists('taxseco_blog_post_content_cb') ) {
        function taxseco_blog_post_content_cb( ) {
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
            if( class_exists( 'ReduxFramework' ) ) {
                $taxseco_excerpt_length          = taxseco_opt( 'taxseco_blog_postExcerpt' );
                $taxseco_display_post_category   = taxseco_opt( 'taxseco_display_post_category' );
            } else {
                $taxseco_excerpt_length          = '48';
                $taxseco_display_post_category   = '1';
            }

            if( class_exists( 'ReduxFramework' ) ) {
                $taxseco_blog_admin = taxseco_opt( 'taxseco_blog_post_author' );
                $taxseco_blog_readmore_setting_val = taxseco_opt('taxseco_blog_readmore_setting');
                if( $taxseco_blog_readmore_setting_val == 'custom' ) {
                    $taxseco_blog_readmore_setting = taxseco_opt('taxseco_blog_custom_readmore');
                } else {
                    $taxseco_blog_readmore_setting = __( 'Read More', 'taxseco' );
                }
            } else {
                $taxseco_blog_readmore_setting = __( 'Read More', 'taxseco' );
                $taxseco_blog_admin = true;
            }
            echo '<!-- blog-content -->';

                do_action( 'taxseco_blog_post_thumb' );
                
                echo '<div class="blog-content">';

                    // Blog Post Meta
                    do_action( 'taxseco_blog_post_meta' );

                    echo '<!-- Post Title -->';
                    echo '<h2 class="blog-title"><a href="'.esc_url( get_permalink() ).'">'.wp_kses( get_the_title( ), $allowhtml ).'</a></h2>';
                    echo '<!-- End Post Title -->';

                    echo '<!-- Post Summary -->';
                        echo taxseco_paragraph_tag( array(
                            "text"  => wp_kses( wp_trim_words( get_the_excerpt(), $taxseco_excerpt_length, '' ), $allowhtml ),
                            "class" => 'blog-text',
                        ) );

                        if( !empty( $taxseco_blog_readmore_setting ) ){
                            echo '<!-- Button -->';
                                echo '<a href="'.esc_url( get_permalink() ).'" class="as-btn">'.esc_html( $taxseco_blog_readmore_setting ).'</a>';
                            echo '<!-- End Button -->';
                        }
                    echo '<!-- End Post Summary -->';
                echo '</div>';
            echo '<!-- End Post Content -->';
        }
    }
