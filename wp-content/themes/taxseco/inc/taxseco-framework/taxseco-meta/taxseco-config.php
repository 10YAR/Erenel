<?php

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

 /**
 * Only return default value if we don't have a post ID (in the 'post' query variable)
 *
 * @param  bool  $default On/Off (true/false)
 * @return mixed          Returns true or '', the blank default
 */
function taxseco_set_checkbox_default_for_new_post( $default ) {
	return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}

add_action( 'cmb2_admin_init', 'taxseco_register_metabox' );

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */

function taxseco_register_metabox() {

	$prefix = '_taxseco_';

	$prefixpage = '_taxsecopage_';
	
	
	$taxseco_post_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'blog_post_control',
		'title'         => esc_html__( 'Post Thumb Controller', 'taxseco' ),
		'object_types'  => array( 'post' ), // Post type
		'closed'        => true
	) );
	$taxseco_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Video', 'taxseco' ),
		'desc' => esc_html__( 'Use This Field When Post Format Video', 'taxseco' ),
		'id'   => $prefix . 'post_format_video',
        'type' => 'text_url',
    ) );
	$taxseco_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Audio', 'taxseco' ),
		'desc' => esc_html__( 'Use This Field When Post Format Audio', 'taxseco' ),
		'id'   => $prefix . 'post_format_audio',
        'type' => 'oembed',
    ) );
	$taxseco_post_meta->add_field( array(
		'name' => esc_html__( 'Post Thumbnail For Slider', 'taxseco' ),
		'desc' => esc_html__( 'Use This Field When You Want A Slider In Post Thumbnail', 'taxseco' ),
		'id'   => $prefix . 'post_format_slider',
        'type' => 'file_list',
    ) );
	
	$taxseco_page_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_meta_section',
		'title'         => esc_html__( 'Page Meta', 'taxseco' ),
		'object_types'  => array( 'page', 'taxseco_event' ), // Post type
        'closed'        => true
    ) );

    $taxseco_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Area', 'taxseco' ),
		'desc' => esc_html__( 'check to display page breadcrumb area.', 'taxseco' ),
		'id'   => $prefix . 'page_breadcrumb_area',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','taxseco'),
            '2'     => esc_html__('Hide','taxseco'),
        )
    ) );


    $taxseco_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Settings', 'taxseco' ),
		'id'   => $prefix . 'page_breadcrumb_settings',
        'type' => 'select',
        'default'   => 'global',
        'options'   => array(
            'global'   => esc_html__('Global Settings','taxseco'),
            'page'     => esc_html__('Page Settings','taxseco'),
        )
	) );

    $taxseco_page_meta->add_field( array(
        'name'    => esc_html__( 'Breadcumb Image', 'taxseco' ),
        'desc'    => esc_html__( 'Upload an image or enter an URL.', 'taxseco' ),
        'id'      => $prefix . 'breadcumb_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => __( 'Add File', 'taxseco' ) // Change upload button text. Default: "Add or Upload File"
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );

    $taxseco_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title', 'taxseco' ),
		'desc' => esc_html__( 'check to display Page Title.', 'taxseco' ),
		'id'   => $prefix . 'page_title',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','taxseco'),
            '2'     => esc_html__('Hide','taxseco'),
        )
	) );

    $taxseco_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title Settings', 'taxseco' ),
		'id'   => $prefix . 'page_title_settings',
        'type' => 'select',
        'options'   => array(
            'default'  => esc_html__('Default Title','taxseco'),
            'custom'  => esc_html__('Custom Title','taxseco'),
        ),
        'default'   => 'default'
    ) );

    $taxseco_page_meta->add_field( array(
		'name' => esc_html__( 'Custom Page Title', 'taxseco' ),
		'id'   => $prefix . 'custom_page_title',
        'type' => 'text'
    ) );

    $taxseco_page_meta->add_field( array(
		'name' => esc_html__( 'Breadcrumb', 'taxseco' ),
		'desc' => esc_html__( 'Select Show to display breadcrumb area', 'taxseco' ),
		'id'   => $prefix . 'page_breadcrumb_trigger',
        'type' => 'switch_btn',
        'default' => taxseco_set_checkbox_default_for_new_post( true ),
    ) );

    $taxseco_layout_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_layout_section',
		'title'         => esc_html__( 'Page Layout', 'taxseco' ),
        'context' 		=> 'side',
        'priority' 		=> 'high',
        'object_types'  => array( 'page' ), // Post type
        'closed'        => true
	) );

	$taxseco_layout_meta->add_field( array(
		'desc'       => esc_html__( 'Set page layout container,container fluid,fullwidth or both. It\'s work only in template builder page.', 'taxseco' ),
		'id'         => $prefix . 'custom_page_layout',
		'type'       => 'radio',
        'options' => array(
            '1' => esc_html__( 'Container', 'taxseco' ),
            '2' => esc_html__( 'Container Fluid', 'taxseco' ),
            '3' => esc_html__( 'Fullwidth', 'taxseco' ),
        ),
	) );

	// code for body class//

    $taxseco_layout_meta->add_field( array(
	'name' => esc_html__( 'Insert Your Body Class', 'taxseco' ),
	'id'   => $prefix . 'custom_body_class',
	'type' => 'text'
    ) );

}

add_action( 'cmb2_admin_init', 'taxseco_register_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function taxseco_register_taxonomy_metabox() {

    $prefix = '_taxseco_';
	/**
	 * Metabox to add fields to categories and tags
	 */
	$taxseco_term_meta = new_cmb2_box( array(
		'id'               => $prefix.'term_edit',
		'title'            => esc_html__( 'Category Metabox', 'taxseco' ),
		'object_types'     => array( 'term' ),
		'taxonomies'       => array( 'category'),
	) );
	$taxseco_term_meta->add_field( array(
		'name'     => esc_html__( 'Extra Info', 'taxseco' ),
		'id'       => $prefix.'term_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );
	$taxseco_term_meta->add_field( array(
		'name' => esc_html__( 'Category Image', 'taxseco' ),
		'desc' => esc_html__( 'Set Category Image', 'taxseco' ),
		'id'   => $prefix.'term_avatar',
        'type' => 'file',
        'text'    => array(
			'add_upload_file_text' => esc_html__('Add Image','taxseco') // Change upload button text. Default: "Add or Upload File"
		),
	) );


	/**
	 * Metabox for the user profile screen
	 */
	$taxseco_user = new_cmb2_box( array(
		'id'               => $prefix.'user_edit',
		'title'            => esc_html__( 'User Profile Metabox', 'taxseco' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta as post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );
	$taxseco_user->add_field( array(
		'name'     => esc_html__( 'Social Profile', 'taxseco' ),
		'id'       => $prefix.'user_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$group_field_id = $taxseco_user->add_field( array(
        'id'          => $prefix .'social_profile_group',
        'type'        => 'group',
        'description' => __( 'Social Profile', 'taxseco' ),
        'options'     => array(
            'group_title'       => __( 'Social Profile {#}', 'taxseco' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Social Profile', 'taxseco' ),
            'remove_button'     => __( 'Remove Social Profile', 'taxseco' ),
            'closed'         => true
        ),
    ) );

    $taxseco_user->add_group_field( $group_field_id, array(
        'name'        => __( 'Icon Class', 'taxseco' ),
        'id'          => $prefix .'social_profile_icon',
        'type'        => 'text', // This field type
    ) );

    $taxseco_user->add_group_field( $group_field_id, array(
        'desc'       => esc_html__( 'Set social profile link.', 'taxseco' ),
        'id'         => $prefix . 'lawyer_social_profile_link',
        'name'       => esc_html__( 'Social Profile link', 'taxseco' ),
        'type'       => 'text'
    ) );
}
