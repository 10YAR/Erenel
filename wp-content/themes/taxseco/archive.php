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
    // Header
    get_header();

    /**
    * 
    * Hook for Blog Start Wrapper
    *
    * Hook taxseco_blog_start_wrap
    *
    * @Hooked taxseco_blog_start_wrap_cb 10
    *  
    */
    do_action( 'taxseco_blog_start_wrap' );

    /**
    * 
    * Hook for Blog Column Start Wrapper
    *
    * Hook taxseco_blog_col_start_wrap
    *
    * @Hooked taxseco_blog_col_start_wrap_cb 10
    *  
    */
    do_action( 'taxseco_blog_col_start_wrap' );

    /**
    * 
    * Hook for Blog Content
    *
    * Hook taxseco_blog_content
    *
    * @Hooked taxseco_blog_content_cb 10
    *  
    */
    do_action( 'taxseco_blog_content' );

    /**
    * 
    * Hook for Blog Pagination
    *
    * Hook taxseco_blog_pagination
    *
    * @Hooked taxseco_blog_pagination_cb 10
    *  
    */
    do_action( 'taxseco_blog_pagination' ); 

    /**
    * 
    * Hook for Blog Column End Wrapper
    *
    * Hook taxseco_blog_col_end_wrap
    *
    * @Hooked taxseco_blog_col_end_wrap_cb 10
    *  
    */
    do_action( 'taxseco_blog_col_end_wrap' ); 

    /**
    * 
    * Hook for Blog Sidebar
    *
    * Hook taxseco_blog_sidebar
    *
    * @Hooked taxseco_blog_sidebar_cb 10
    *  
    */
    do_action( 'taxseco_blog_sidebar' );     
        
    /**
    * 
    * Hook for Blog End Wrapper
    *
    * Hook taxseco_blog_end_wrap
    *
    * @Hooked taxseco_blog_end_wrap_cb 10
    *  
    */
    do_action( 'taxseco_blog_end_wrap' );

    //footer
    get_footer();