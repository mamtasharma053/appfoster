<?php 
/*
*
*	***** Appfoster *****
*
*	Shortcodes
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
/*
*
*  Build The Custom Plugin Form
*
*  Display Anywhere Using Shortcode: [appf_custom_plugin_form]
*
*/
function appf_custom_plugin_form_display($atts, $content = NULL){
		extract(shortcode_atts(array(
      	'el_class' => '',
      	'el_id' => '',	
		),$atts));    
        
        $out ='';
        $out .= '<div id="appf_custom_plugin_form_wrap" class="appf-form-wrap">';
        $out .= 'Hey! Im a cool new plugin named <strong>Appfoster!</strong>';
        $out .= '<form id="appf_custom_plugin_form">';
        $out .= '<p><input type="text" name="myInputField" id="myInputField" placeholder="Test Field: Test Ajax Responses"></p>';
        
        // Final Submit Button
        $out .= '<p><input type="submit" id="submit_btn" value="Submit My Form"></p>';        
        $out .= '</form>';
         // Form Ends
        $out .='</div><!-- appf_custom_plugin_form_wrap -->';       
        return $out;
}
/*
Register All Shorcodes At Once
*/
add_action( 'init', 'appf_register_shortcodes');
function appf_register_shortcodes(){
	// Registered Shortcodes
	add_shortcode ('appf_custom_plugin_form', 'appf_custom_plugin_form_display' );
};