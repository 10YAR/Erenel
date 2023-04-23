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
    exit;
}

 // theme option callback
function taxseco_opt( $id = null, $url = null ){
    global $taxseco_opt;

    if( $id && $url ){

        if( isset( $taxseco_opt[$id][$url] ) && $taxseco_opt[$id][$url] ){
            return $taxseco_opt[$id][$url];
        }
    }else{
        if( isset( $taxseco_opt[$id] )  && $taxseco_opt[$id] ){
            return $taxseco_opt[$id];
        }
    }
}

// theme logo
function taxseco_theme_logo() {
    // escaping allow html
    $allowhtml = array(
        'a'    => array(
            'href' => array()
        ),
        'span' => array(),
        'i'    => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $siteLogo = '';
        $siteLogo .= '<a class="logo" href="'.esc_url( $siteUrl ).'">';
        $siteLogo .= taxseco_img_tag( array(
            "class" => "img-fluid",
            "url"   => esc_url( wp_get_attachment_image_url( $custom_logo_id, 'full') )
        ) );
        $siteLogo .= '</a>';

        return $siteLogo;
    } elseif( !taxseco_opt('taxseco_text_title') && taxseco_opt('taxseco_site_logo', 'url' )  ){

        $siteLogo = '<img class="img-fluid" src="'.esc_url( taxseco_opt('taxseco_site_logo', 'url' ) ).'" alt="'.esc_attr__( 'logo', 'taxseco' ).'" />';
        return '<a class="logo" href="'.esc_url( $siteUrl ).'">'.$siteLogo.'</a>';


    }elseif( taxseco_opt('taxseco_text_title') ){
        return '<h2 class="mb-0"><a class="logo" href="'.esc_url( $siteUrl ).'">'.wp_kses( taxseco_opt('taxseco_text_title'), $allowhtml ).'</a></h2>';
    }else{
        return '<h2 class="mb-0"><a class="logo" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2>';
    }
}

// custom meta id callback
function taxseco_meta( $id = '' ){
    $value = get_post_meta( get_the_ID(), '_taxseco_'.$id, true );
    return $value;
}


// Blog Date Permalink
function taxseco_blog_date_permalink() {
    $year  = get_the_time('Y');
    $month_link = get_the_time('m');
    $day   = get_the_time('d');
    $link = get_day_link( $year, $month_link, $day);
    return $link;
}

//audio format iframe match
function taxseco_iframe_match() {
    $audio_content = taxseco_embedded_media( array('audio', 'iframe') );
    $iframe_match = preg_match("/\iframe\b/i",$audio_content, $match);
    return $iframe_match;
}


//Post embedded media
function taxseco_embedded_media( $type = array() ){
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );


    if( in_array( 'audio' , $type) ){
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }

    }else{
        if( count( $embed ) > 0 ){
            $output = $embed[0];
        }else{
           $output = '';
        }
    }
    return $output;
}


// WP post link pages
function taxseco_link_pages(){
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'taxseco' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'taxseco' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


// Data Background image attr
function taxseco_data_bg_attr( $imgUrl = '' ){
    return 'data-bg-img="'.esc_url( $imgUrl ).'"';
}

// image alt tag
function taxseco_image_alt( $url = '' ){
    if( $url != '' ){
        // attachment id by url
        $attachmentid = attachment_url_to_postid( esc_url( $url ) );
       // attachment alt tag
        $image_alt = get_post_meta( esc_html( $attachmentid ) , '_wp_attachment_image_alt', true );
        if( $image_alt ){
            return $image_alt ;
        }else{
            $filename = pathinfo( esc_url( $url ) );
            $alt = str_replace( '-', ' ', $filename['filename'] );
            return $alt;
        }
    }else{
       return;
    }
}


// Flat Content wysiwyg output with meta key and post id

function taxseco_get_textareahtml_output( $content ) {
    global $wp_embed;

    $content = $wp_embed->autoembed( $content );
    $content = $wp_embed->run_shortcode( $content );
    $content = wpautop( $content );
    $content = do_shortcode( $content );

    return $content;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

function taxseco_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'taxseco_pingback_header' );


// Excerpt More
function taxseco_excerpt_more( $more ) {
    return '...';
}

add_filter( 'excerpt_more', 'taxseco_excerpt_more' );


// taxseco comment template callback
function taxseco_comment_callback( $comment, $args, $depth ) {
        $add_below = 'comment';
    ?>
    <li <?php comment_class( array('as-comment-item') ); ?>>
        <div id="comment-<?php comment_ID() ?>" class="as-post-comment">
            <?php
                if( get_avatar( $comment, 100 )  ) :
            ?>
            <!-- Author Image -->
            <div class="comment-avater">
                <?php
                    if ( $args['avatar_size'] != 0 ) {
                        echo get_avatar( $comment, 110 );
                    }
                ?>
            </div>
            <!-- Author Image -->
            <?php
                endif;
            ?>
            <!-- Comment Content -->
            <div class="comment-content">
                <span class="commented-on"> <i class="fal fa-calendar-alt"></i> <?php printf( esc_html__('%1$s', 'taxseco'), get_comment_date() ); ?> </span>
                <h3 class="name"><?php echo esc_html( ucwords( get_comment_author() ) ); ?></h3>
                <?php comment_text(); ?>
                <div class="reply_and_edit">
                    <?php
                        $reply_text = wp_kses_post( '<i class="fas fa-reply"></i> Reply', 'taxseco' );

                        $edit_reply_text = wp_kses_post( '<i class="fas fa-pencil-alt"></i> Edit', 'taxseco' );

                        comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 3, 'max_depth' => 5, 'reply_text' => $reply_text ) ) );
                        edit_comment_link( $edit_reply_text, '  ', '' );
                    ?>  
                </div>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'taxseco' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <!-- Comment Content -->
<?php
}

//body class
add_filter( 'body_class', 'taxseco_body_class' );
function taxseco_body_class( $classes ) {
    if( class_exists('ReduxFramework') ) {
        $taxseco_blog_single_sidebar = taxseco_opt('taxseco_blog_single_sidebar');
        if( ($taxseco_blog_single_sidebar != '2' && $taxseco_blog_single_sidebar != '3' ) || ! is_active_sidebar('taxseco-blog-sidebar') ) {
            $classes[] = 'no-sidebar';
        }
        $new_class = is_page() ? taxseco_meta('custom_body_class') : null;

        if ( $new_class ) {
            $classes[] = $new_class;
        }

    } else {
        if( !is_active_sidebar('taxseco-blog-sidebar') ) {
            $classes[] = 'no-sidebar';
        }
    }
    return $classes;
}


function taxseco_footer_global_option(){
    // Taxseco Widget Enable Disable
    if( class_exists( 'ReduxFramework' ) ){
        $taxseco_footer_widget_enable = taxseco_opt( 'taxseco_footerwidget_enable' );
        $taxseco_footer_bottom_active = taxseco_opt( 'taxseco_disable_footer_bottom' );
    }else{
        $taxseco_footer_widget_enable = '';
        $taxseco_footer_bottom_active = '1';
    }
    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'i'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array(),
            'class'     => array(),
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
    );
    if( $taxseco_footer_widget_enable == '1' || $taxseco_footer_bottom_active == '1' ){
        echo '<!-- Footer Area -->';
        echo '<footer class="footer-wrapper footer-layout1">';
            echo '<div class="widget-area">';
                echo '<div class="container">';
                    echo '<div class="row justify-content-between">';
                            if( is_active_sidebar( 'taxseco-footer-1' )){
                                dynamic_sidebar( 'taxseco-footer-1' ); 
                            }
                            if( is_active_sidebar( 'taxseco-footer-2' )){
                                dynamic_sidebar( 'taxseco-footer-2' ); 
                            }
                            if( is_active_sidebar( 'taxseco-footer-3' )){
                                dynamic_sidebar( 'taxseco-footer-3' ); 
                            }
                            if( is_active_sidebar( 'taxseco-footer-4' )){
                                dynamic_sidebar( 'taxseco-footer-4' ); 
                            }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<div class="copyright-wrap">';
                echo '<div class="container">';
                    echo '<p class="copyright-text">'.wp_kses( taxseco_opt( 'taxseco_copyright_text' ), $allowhtml ).'</p>';
                echo '</div>';
            echo '</div>';
        echo '</footer>';
    }
}

function taxseco_social_icon(){
    $taxseco_social_icon = taxseco_opt( 'taxseco_social_links' );
    if( ! empty( $taxseco_social_icon ) && isset( $taxseco_social_icon ) ){
        foreach( $taxseco_social_icon as $social_icon ){
            if( ! empty( $social_icon['title'] ) ){
                echo '<a href="'.esc_url( $social_icon['url'] ).'"><i class="'.esc_attr( $social_icon['title'] ).'"></i></a> ';
            }
        }
    }
}

// global header
function taxseco_global_header_option() {
    if( class_exists( 'ReduxFramework' ) ){
        // Taxseco Widget Enable Disable
        if( class_exists( 'ReduxFramework' ) ){
            $taxseco_menu_background = taxseco_opt('taxseco_menu_background', 'url' );
            $taxseco_header_btn_text = taxseco_opt('taxseco_header_btn_text');
            $taxseco_btn_url = taxseco_opt('taxseco_btn_url');
            $taxseco_search_enable = taxseco_opt( 'taxseco_search_enable' );
            $taxseco_booktaxi_enable = taxseco_opt( 'taxseco_booktaxi_enable' );
            $taxseco_sidemenu_enable = taxseco_opt( 'taxseco_sidemenu_enable' );
        }else{
            $taxseco_menu_background = '';
            $taxseco_header_btn_text = '';
            $taxseco_btn_url = '';
            $taxseco_search_enable = '';
            $taxseco_booktaxi_enable = '';
            $taxseco_sidemenu_enable = '';
        }
        echo taxseco_search_box();
        echo taxseco_mobile_menu();
        echo '<header class="as-header header-layout1">';
            taxseco_header_topbar();
            echo '<div class="sticky-wrapper">';
                echo '<div class="sticky-active">';
                    echo '<!-- Main Menu Area -->';
                        if(!empty($taxseco_menu_background)){
                            $menu_bg_src = 'data-bg-src="'.esc_url($taxseco_menu_background).'"';
                        } else {
                            $menu_bg_src = '';
                        };
                        echo '<div class="menu-area" '. $menu_bg_src .'>';
                            echo '<div class="container">';
                                echo '<div class="row align-items-center justify-content-between">';
                                echo '<div class="col-auto">';
                                    echo '<div class="header-logo">';
                                        echo taxseco_theme_logo();
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="col-auto">';
                                    echo '<div class="row align-items-center" style="position:relative;">';
                                            echo '<a href="tel:33608174245" class="nav-phone" aria-current="page">
                                                      <i class="fa-solid fa-phone phone-icon-header"></i> &nbsp; 06 08 17 42 45
                                                  </a>';
                                        echo '<div class="col-auto">';
                                            echo '<nav class="main-menu d-none d-lg-inline-block">';
                                            wp_nav_menu( array(
                                                "theme_location"    => 'primary-menu',
                                                "container"         => '',
                                                "menu_class"        => ''
                                            ) );
                                            echo '</nav>';
                                            echo '<button type="button" class="as-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>';
                                        echo '</div>';
                                        echo '<div class="col-auto d-none d-xxl-block">';
                                            echo '<div class="header-button">';
                                                    if(!empty($taxseco_search_enable)){
                                                        echo '<button type="button" class="icon-style2 searchBoxToggler"><i class="fas fa-search"></i></button>';
                                                    }
                                                    if(!empty($taxseco_booktaxi_enable)){
                                                        if(!empty($taxseco_header_btn_text)){
                                                            echo '<a href="'.esc_url($taxseco_btn_url).'" class="as-btn style3 style-skew"><span class="btn-text">'.esc_html($taxseco_header_btn_text).'</span></a>';
                                                        }
                                                    }
                                                    if( is_active_sidebar( 'taxseco-offcanvas' ) && $taxseco_sidemenu_enable == 1 ){
                                                        echo '<a href="'.esc_url('#').'" class="simple-icon sideMenuToggler"><i class="fa-solid fa-grid"></i></a>';
                                                    }
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '<div class="logo-shape"></div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';      
        echo '</header>';


        //offcanvas start 

        if( is_active_sidebar( 'taxseco-offcanvas' ) ){
            echo '<!-- Side menu start -->';
            echo '<div class="sidemenu-wrapper d-none d-lg-block">';
                echo '<div class="sidemenu-content bg-title">';
                    echo '<button class="closeButton sideMenuCls"><i class="fas fa-times"></i></button>';
                    if( is_active_sidebar( 'taxseco-offcanvas' ) ) :
                        dynamic_sidebar( 'taxseco-offcanvas' );
                    endif; 
                echo '</div>';
            echo '</div>';
            echo '<!-- Side menu end -->';
        }

    }else{
        taxseco_global_header();
    }
}





// taxseco woocommerce breadcrumb
function taxseco_woo_breadcrumb( $args ) {
    return array(
        'delimiter'   => '',
        'wrap_before' => '<ul class="breadcumb-menu">',
        'wrap_after'  => '</ul>',
        'before'      => '<li>',
        'after'       => '</li>',
        'home'        => _x( 'Home', 'breadcrumb', 'taxseco' ),
    );
}

add_filter( 'woocommerce_breadcrumb_defaults', 'taxseco_woo_breadcrumb' );

function taxseco_custom_search_form( $class ) {
    echo '<!-- Search Form -->';

    echo '<form role="search" method="get" action="'.esc_url( home_url( '/' ) ).'" class="'.esc_attr( $class ).'">';
        echo '<label class="searchIcon">';
            echo taxseco_img_tag( array(
                "url"   => esc_url( get_theme_file_uri( '/assets/img/search-2.svg' ) ),
                "class" => "svg"
            ) );
            echo '<input value="'.esc_html( get_search_query() ).'" name="s" required type="search" placeholder="'.esc_attr__('What are you looking for?', 'taxseco').'">';
        echo '</label>';
    echo '</form>';
    echo '<!-- End Search Form -->';
}



//Fire the wp_body_open action.
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

//Remove Tag-Clouds inline style
add_filter( 'wp_generate_tag_cloud', 'taxseco_remove_tagcloud_inline_style',10,1 );
function taxseco_remove_tagcloud_inline_style( $input ){
   return preg_replace('/ style=("|\')(.*?)("|\')/','',$input );
}

function taxseco_setPostViews( $postID ) {
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    }else{
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function taxseco_getPostViews( $postID ){
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return __( '0', 'taxseco' );
    }
    return $count;
}


/* This code filters the Categories archive widget to include the post count inside the link */
add_filter( 'wp_list_categories', 'taxseco_cat_count_span' );
function taxseco_cat_count_span( $links ) {
    $links = str_replace('</a> (', '</a> <span class="category-number">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

/* This code filters the Archive widget to include the post count inside the link */
add_filter( 'get_archives_link', 'taxseco_archive_count_span' );
function taxseco_archive_count_span( $links ) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="category-number">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}
//header search box
if(! function_exists('taxseco_search_box')){
    function taxseco_search_box(){
        echo '<div class="popup-search-box d-none d-lg-block  ">';
            echo '<button class="searchClose border-theme text-theme"><i class="fal fa-times"></i></button>';
            echo '<form role="search" method="get" action="'.esc_url( home_url( '/' ) ).'">';
                echo '<input value="'.esc_html( get_search_query() ).'" class="border-theme" name="s" required type="search" placeholder="'.esc_attr__('What are you looking for?', 'taxseco').'">';
                echo '<button type="submit"><i class="fal fa-search"></i></button>';
            echo '</form>';
        echo '</div>';
    }
}
//header mobile menu
if(! function_exists('taxseco_mobile_menu')){
    function taxseco_mobile_menu(){
        echo '<!--==========Mobile Menu============= -->';
        echo '<div class="as-menu-wrapper">';
            echo '<div class="as-menu-area text-center">';
                echo '<button class="as-menu-toggle"><i class="fal fa-times"></i></button>';
                echo '<div class="mobile-logo">';
                    echo taxseco_theme_logo();
                echo '</div>';
                echo '<div class="as-mobile-menu">';
                    if( has_nav_menu( 'primary-menu' ) ) {
                        echo '<div class="as-mobile-menu">';
                            wp_nav_menu( array(
                                "theme_location"    => 'primary-menu',
                                "container"         => '',
                                "menu_class"        => ''
                            ) );
                            echo '<a href="tel:33608174245" class="mobile-nav-phone"><i class="fa-solid fa-phone phone-icon-header"></i> &nbsp; 06 08 17 42 45</a>';
                        echo '</div>';                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}


// Taxseco Default Header for unit test
if( ! function_exists( 'taxseco_global_header' ) ){
    function taxseco_global_header(){
        echo taxseco_search_box();
        echo taxseco_mobile_menu();

        if( class_exists( 'ReduxFramework' ) ){ 
            $class = '';
        } else {
            $class = 'unittest-header';
        }

        echo '<!--======== Header ========-->';
        echo '<header class="as-header header-layout2 ' . esc_attr($class) . ' ">';
           echo ' <div class="sticky-wrapper">';
                echo '<div class="sticky-active">';
                    echo '<div class="menu-area">';
                        echo '<div class="container">';
                            echo '<div class="row gx-20 align-items-center justify-content-between">';
                                echo '<div class="col-auto">';
                                    echo '<div class="header-logo">';
                                        echo taxseco_theme_logo();
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="col-auto">';
                                    if( has_nav_menu( 'primary-menu' ) ) {
                                        echo '<nav class="main-menu d-none d-lg-inline-block">';
                                            wp_nav_menu( array(
                                                "theme_location"    => 'primary-menu',
                                                "container"         => '',
                                                "menu_class"        => ''
                                            ) );
                                        echo '</nav>';
                                    }                                    
                                    echo '</nav>';
                                    echo '<button type="button" class="as-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>';
                                echo '</div>';
                                echo '<div class="col-auto d-none d-xl-block">';
                                    echo '<div class="header-button">';
                                        echo '<button type="button" class="icon-style2 searchBoxToggler"><i class="fas fa-search"></i></button>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</header>';
    }
}

if( ! function_exists( 'taxseco_header_topbar' ) ){
    function taxseco_header_topbar(){
        if( class_exists( 'ReduxFramework' ) ){
            $taxseco_show_header_topbar      = taxseco_opt( 'taxseco_header_topbar_switcher' );
            $taxseco_show_social_icon        = taxseco_opt( 'taxseco_header_topbar_social_icon_switcher' );
            $taxseco_menu_topbar_phone      = taxseco_opt( 'taxseco_menu_topbar_phone' );
            $taxseco_header_topbar_phone_switcher       = taxseco_opt( 'taxseco_header_topbar_phone_switcher' );
            $taxseco_header_topbar_address_switcher       = taxseco_opt( 'taxseco_header_topbar_address_switcher' );            
            $taxseco_topbar_office_address       = taxseco_opt( 'taxseco_topbar_office_address' );
            $taxseco_menu_topbar_email       = taxseco_opt( 'taxseco_menu_topbar_email' );
            $taxseco_header_topbar_mail_switcher       = taxseco_opt( 'taxseco_header_topbar_mail_switcher' );
            $taxseco_header_topbar_language_switcher       = taxseco_opt( 'taxseco_header_topbar_language_switcher' );



        }else{
            $taxseco_show_header_topbar      = '';
            $taxseco_show_social_icon        = '';
            $taxseco_menu_topbar_phone      = '';
            $taxseco_header_topbar_phone_switcher      = '';
            $taxseco_topbar_office_address       = '';
            $taxseco_header_topbar_address_switcher       = '';
            $taxseco_menu_topbar_email       = '';
            $taxseco_header_topbar_mail_switcher       = '';
            $taxseco_header_topbar_language_switcher       = '';
        }

        $phone      = $taxseco_menu_topbar_phone;

        $replace        = array(' ','-',' - ');
        $with           = array('','','');

        $phoneurl       = str_replace( $replace, $with, $phone );

        if( $taxseco_show_header_topbar ){
            $allowhtml = array(
                'a'    => array(
                    'href' => array(),
                    'class' => array()
                ),
                'u'    => array(
                    'class' => array()
                ),
                'span' => array(
                    'class' => array()
                ),
                'i'    => array(
                    'class' => array()
                )
            );
            echo '<!--header-top-wrapper start-->';
            echo '<div class="header-top">';
                echo '<div class="container">';
                    echo '<div class="row justify-content-center justify-content-md-between align-items-center gy-2">';
                       echo '<div class="col-auto d-none d-md-block">';
                            echo '<div class="header-links">';
                                echo '<ul>';
                                    if( $taxseco_header_topbar_phone_switcher ){
                                        if( $phone ){
                                            echo '<li><i class="fa fa-phone"></i><a href="'.esc_attr( 'tel:'.$phoneurl ).'">'.esc_html( $phone ).'</a></li>';
                                        }
                                    }                                    
                                    if( $taxseco_header_topbar_address_switcher){
                                        if( $taxseco_topbar_office_address ){
                                            echo ' <li class="d-none d-xl-inline-block"><i class="fas fa-location-dot"></i>'.esc_html( $taxseco_topbar_office_address ).'</li>';
                                        }
                                    }
                                    if( $taxseco_header_topbar_mail_switcher ){
                                        if( $taxseco_menu_topbar_email ){
                                            echo ' <li><i class="fas fa-envelope"></i><a href="mailto:'.esc_attr( $taxseco_menu_topbar_email ).'">'.esc_html( $taxseco_menu_topbar_email ).'</a></li>';
                                        }
                                    }
                                echo '</ul>';
                            echo '</div>';
                        echo '</div>';
                        if( $taxseco_show_social_icon || $taxseco_header_topbar_language_switcher ){
                            echo '<div class="col-auto">';
                                    echo '<div class="header-links">';
                                        echo '<ul>';
                                                if( $taxseco_header_topbar_language_switcher){
                                                    echo '<li class="d-none d-lg-inline-block">';
                                                        echo '<div class="dropdown-link">';
                                                            echo '<a class="dropdown-toggle" href="'.esc_url('#').'" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">'.esc_html__('Language', 'taxseco').'</a> ';
                                                                echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">';
                                                                    echo ' <li>';
                                                                    echo do_shortcode('[gtranslate]');
                                                                    echo ' </li>';
                                                            echo ' </ul>';
                                                        echo ' </div>';
                                                    echo '</li>';
                                                }
                                                if( $taxseco_show_social_icon ){
                                                    echo '<li>';
                                                        echo '<div class="header-social">';
                                                            echo '<span class="social-title">'.esc_html__('Follow Us:', 'taxseco').'</span>';
                                                            taxseco_social_icon();
                                                        echo '</div>';
                                                    echo '</li>';
                                                }
                                        echo '</ul>';
                                    echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<!--header-top-wrapper end-->';
        }
    }
}

// Add Extra Class On Comment Reply Button
function taxseco_custom_comment_reply_link( $content ) {
    $extra_classes = 'reply-btn';
    return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
}

add_filter('comment_reply_link', 'taxseco_custom_comment_reply_link', 99);

// Add Extra Class On Edit Comment Link
function taxseco_custom_edit_comment_link( $content ) {
    $extra_classes = 'reply-btn';
    return preg_replace( '/comment-edit-link/', 'comment-edit-link ' . $extra_classes, $content);
}

add_filter('edit_comment_link', 'taxseco_custom_edit_comment_link', 99);


function taxseco_post_classes( $classes, $class, $post_id ) {
    if ( get_post_type() === 'post' ) {
        $classes[] = "as-blog blog-single";
    }elseif( get_post_type() === 'product' ){
        // Return Class
    }elseif( get_post_type() === 'page' ){
        $classes[] = "page--item";
    }
    
    return $classes;
}
add_filter( 'post_class', 'taxseco_post_classes', 10, 3 );