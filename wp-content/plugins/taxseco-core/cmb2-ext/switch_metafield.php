<?php 

function taxseco_render_switch_btn( $field,$value,$object_id,$object_type,$field_type_object ){
    echo '<div class="switch-block">';
        echo $field_type_object->checkbox(array(
            'class'   => 'taxseco-swtich',
            'name'    => $field_type_object->_name(),
            'value'   => '1',
            'desc'    => ''    
        ));
    echo '</div>';
}

add_action('cmb2_render_switch_btn','taxseco_render_switch_btn',10,5);