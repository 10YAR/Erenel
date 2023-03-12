<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : Taxseco
 * @Version    : 1.0
 * @Author     : Angfuzsoft
 * @Author URI : https://www.angfuzsoft.com/
 *
 */

// enqueue css
function taxseco_common_custom_css(){
	wp_enqueue_style( 'taxseco-color-schemes', get_template_directory_uri().'/assets/css/color.schemes.css' );

    $CustomCssOpt  = taxseco_opt( 'taxseco_css_editor' );
	if( $CustomCssOpt ){
		$CustomCssOpt = $CustomCssOpt;
	}else{
		$CustomCssOpt = '';
	}

    $customcss = "";
    
    if( get_header_image() ){
        $taxseco_header_bg =  get_header_image();
    }else{
        if( taxseco_meta( 'page_breadcrumb_settings' ) == 'page' ){
            if( ! empty( taxseco_meta( 'breadcumb_image' ) ) ){
                $taxseco_header_bg = taxseco_meta( 'breadcumb_image' );
            }
        }
    }
    
    if( !empty( $taxseco_header_bg ) ){
        $customcss .= ".breadcumb-wrapper{
            background-image:url('{$taxseco_header_bg}')!important;
        }";
    }
    
	// theme color
	$taxsecothemecolor = taxseco_opt('taxseco_theme_color');

    list($r, $g, $b) = sscanf( $taxsecothemecolor, "#%02x%02x%02x");

    $taxseco_real_color = $r.','.$g.','.$b;
	if( !empty( $taxsecothemecolor ) ) {
		$customcss .= ":root {
		  --theme-color: rgb({$taxseco_real_color});
		}";
	}

    // theme body font
    $taxsecothemebodyfont = taxseco_opt('taxseco_theme_body_typography', 'font-family');
    if( !empty( $taxsecothemebodyfont ) ) {
        $customcss .= ":root {
          --body-font: $taxsecothemebodyfont ;
        }";
    }

    // theme title font
    $taxsecothemetitlefont = taxseco_opt('taxseco_theme_title_typography', 'font-family');
    if( !empty( $taxsecothemetitlefont ) ) {
        $customcss .= ":root {
          --title-font: $taxsecothemetitlefont ;
        }";
    }

	if( !empty( $CustomCssOpt ) ){
		$customcss .= $CustomCssOpt;
	}

    wp_add_inline_style( 'taxseco-color-schemes', $customcss );
}
add_action( 'wp_enqueue_scripts', 'taxseco_common_custom_css', 100 );