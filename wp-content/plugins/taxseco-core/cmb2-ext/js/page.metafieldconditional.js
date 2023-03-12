(function($){
    "use strict";
    
    let $taxseco_page_breadcrumb_area      = $("#_taxseco_page_breadcrumb_area");
    let $taxseco_page_settings             = $("#_taxseco_page_breadcrumb_settings");
    let $taxseco_page_breadcrumb_image     = $("#_taxseco_breadcumb_image");
    let $taxseco_page_title                = $("#_taxseco_page_title");
    let $taxseco_page_title_settings       = $("#_taxseco_page_title_settings");

    if( $taxseco_page_breadcrumb_area.val() == '1' ) {
        $(".cmb2-id--taxseco-page-breadcrumb-settings").show();
        if( $taxseco_page_settings.val() == 'global' ) {
            $(".cmb2-id--taxseco-breadcumb-image").hide();
            $(".cmb2-id--taxseco-page-title").hide();
            $(".cmb2-id--taxseco-page-title-settings").hide();
            $(".cmb2-id--taxseco-custom-page-title").hide();
            $(".cmb2-id--taxseco-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--taxseco-breadcumb-image").show();
            $(".cmb2-id--taxseco-page-title").show();
            $(".cmb2-id--taxseco-page-breadcrumb-trigger").show();
    
            if( $taxseco_page_title.val() == '1' ) {
                $(".cmb2-id--taxseco-page-title-settings").show();
                if( $taxseco_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--taxseco-custom-page-title").hide();
                } else {
                    $(".cmb2-id--taxseco-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--taxseco-page-title-settings").hide();
                $(".cmb2-id--taxseco-custom-page-title").hide();
    
            }
        }
    } else {
        $taxseco_page_breadcrumb_area.parents('.cmb2-id--taxseco-page-breadcrumb-area').siblings().hide();
    }


    // breadcrumb area
    $taxseco_page_breadcrumb_area.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--taxseco-page-breadcrumb-settings").show();
            if( $taxseco_page_settings.val() == 'global' ) {
                $(".cmb2-id--taxseco-breadcumb-image").hide();
                $(".cmb2-id--taxseco-page-title").hide();
                $(".cmb2-id--taxseco-page-title-settings").hide();
                $(".cmb2-id--taxseco-custom-page-title").hide();
                $(".cmb2-id--taxseco-page-breadcrumb-trigger").hide();
            } else {
                $(".cmb2-id--taxseco-breadcumb-image").show();
                $(".cmb2-id--taxseco-page-title").show();
                $(".cmb2-id--taxseco-page-breadcrumb-trigger").show();
        
                if( $taxseco_page_title.val() == '1' ) {
                    $(".cmb2-id--taxseco-page-title-settings").show();
                    if( $taxseco_page_title_settings.val() == 'default' ) {
                        $(".cmb2-id--taxseco-custom-page-title").hide();
                    } else {
                        $(".cmb2-id--taxseco-custom-page-title").show();
                    }
                } else {
                    $(".cmb2-id--taxseco-page-title-settings").hide();
                    $(".cmb2-id--taxseco-custom-page-title").hide();
        
                }
            }
        } else {
            $(this).parents('.cmb2-id--taxseco-page-breadcrumb-area').siblings().hide();
        }
    });

    // page title
    $taxseco_page_title.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--taxseco-page-title-settings").show();
            if( $taxseco_page_title_settings.val() == 'default' ) {
                $(".cmb2-id--taxseco-custom-page-title").hide();
            } else {
                $(".cmb2-id--taxseco-custom-page-title").show();
            }
        } else {
            $(".cmb2-id--taxseco-page-title-settings").hide();
            $(".cmb2-id--taxseco-custom-page-title").hide();

        }
    });

    //page settings
    $taxseco_page_settings.on("change",function(){
        if( $(this).val() == 'global' ) {
            $(".cmb2-id--taxseco-breadcumb-image").hide();
            $(".cmb2-id--taxseco-page-title").hide();
            $(".cmb2-id--taxseco-page-title-settings").hide();
            $(".cmb2-id--taxseco-custom-page-title").hide();
            $(".cmb2-id--taxseco-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--taxseco-breadcumb-image").show();
            $(".cmb2-id--taxseco-page-title").show();
            $(".cmb2-id--taxseco-page-breadcrumb-trigger").show();
    
            if( $taxseco_page_title.val() == '1' ) {
                $(".cmb2-id--taxseco-page-title-settings").show();
                if( $taxseco_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--taxseco-custom-page-title").hide();
                } else {
                    $(".cmb2-id--taxseco-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--taxseco-page-title-settings").hide();
                $(".cmb2-id--taxseco-custom-page-title").hide();
    
            }
        }
    });

    // page title settings
    $taxseco_page_title_settings.on("change",function(){
        if( $(this).val() == 'default' ) {
            $(".cmb2-id--taxseco-custom-page-title").hide();
        } else {
            $(".cmb2-id--taxseco-custom-page-title").show();
        }
    });
    
})(jQuery);