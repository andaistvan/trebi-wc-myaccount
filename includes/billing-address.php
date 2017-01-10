<?php
// ***************************************************************
// BILLING address - REMOVE FIELDS
// ***************************************************************
/*add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {

}*/
add_filter( 'woocommerce_billing_fields' , 'custom_override_billing_fields' );
function custom_override_billing_fields( $fields ) {
	unset($fields['billing_country']);
	unset($fields['billing_postcode']);
	unset($fields['billing_address_2']);
	unset($fields['billing_city']);
	unset($fields['billing_state']);
  return $fields;
}
