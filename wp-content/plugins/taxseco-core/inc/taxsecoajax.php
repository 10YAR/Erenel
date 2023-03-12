<?php
/**
 * @Packge     : Taxseco
 * @Version    : 1.0
 * @Author     : Taxseco
 * @Author URI : https://www.angfuzsoft.com/
 *
 */


// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function taxseco_core_essential_scripts( ) {
    wp_enqueue_script('taxseco-ajax',TAXSECO_PLUGDIRURI.'assets/js/taxseco.ajax.js',array( 'jquery' ),'1.0',true);
    wp_localize_script(
    'taxseco-ajax',
    'taxsecoajax',
        array(
            'action_url' => admin_url( 'admin-ajax.php' ),
            'nonce'	     => wp_create_nonce( 'taxseco-nonce' ),
        )
    );
}

add_action('wp_enqueue_scripts','taxseco_core_essential_scripts');


// taxseco Section subscribe ajax callback function
add_action( 'wp_ajax_taxseco_subscribe_ajax', 'taxseco_subscribe_ajax' );
add_action( 'wp_ajax_nopriv_taxseco_subscribe_ajax', 'taxseco_subscribe_ajax' );

function taxseco_subscribe_ajax( ){
  $apiKey = taxseco_opt('taxseco_subscribe_apikey');
  $listid = taxseco_opt('taxseco_subscribe_listid');
   if( ! wp_verify_nonce($_POST['security'], 'taxseco-nonce') ) {
    echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('You are not allowed.', 'taxseco').'</div>';
   }else{
       if( !empty( $apiKey ) && !empty( $listid )  ){
           $MailChimp = new DrewM\MailChimp\MailChimp( $apiKey );

           $result = $MailChimp->post("lists/{$listid}/members",[
               'email_address'    => esc_attr( $_POST['sectsubscribe_email'] ),
               'status'           => 'subscribed',
           ]);

           if ($MailChimp->success()) {
               if( $result['status'] == 'subscribed' ){
                   echo '<div class="alert alert-success mt-2" role="alert">'.esc_html__('Thank you, you have been added to our mailing list.', 'taxseco').'</div>';
               }
           }elseif( $result['status'] == '400' ) {
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('This Email address is already exists.', 'taxseco').'</div>';
           }else{
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Sorry something went wrong.', 'taxseco').'</div>';
           }
        }else{
           echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Apikey Or Listid Missing.', 'taxseco').'</div>';
        }
   }

   wp_die();

}

add_action('wp_ajax_taxseco_addtocart_notification','taxseco_addtocart_notification');
add_action('wp_ajax_nopriv_taxseco_addtocart_notification','taxseco_addtocart_notification');
function taxseco_addtocart_notification(){

    $_product = wc_get_product($_POST['prodid']);
    $response = [
        'img_url'   => esc_url( wp_get_attachment_image_src( $_product->get_image_id(),array('60','60'))[0] ),
        'title'     => wp_kses_post( $_product->get_title() )
    ];
    echo json_encode($response);

    wp_die();
}