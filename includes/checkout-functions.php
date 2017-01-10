<?php
// ***************************************************************
// ADD "VISSZA A VÁSÁRLÁSHOZ" BUTTON
// ***************************************************************
add_action( 'woocommerce_before_checkout_form', 'woo_add_continue_shopping_button_to_checkout' );
function woo_add_continue_shopping_button_to_checkout() {
 $shop_page_url = get_option('home');
/*<a href="<?php echo get_option('home'); ?>/"*/
 echo '<div class="woocommerce-message">';
 echo ' <a href="'.$shop_page_url.'" class="button">Vissza a menühöz →</a> Még vásárolnál?';
 echo '</div>';
}

// ***************************************************************
// REMOVE CHECKOUT FIELDS
// ***************************************************************
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
	// unset($fields['billing']['billing_first_name']);
	// unset($fields['billing']['billing_last_name']);
	// unset($fields['billing']['billing_company']);
	// unset($fields['billing']['billing_address_1']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_country']);
	unset($fields['billing']['billing_state']);
	// unset($fields['billing']['billing_phone']);
	unset($fields['order']['order_comments']);
	unset($fields['billing']['billing_email']);
	unset($fields['account']['account_username']);
	unset($fields['account']['account_password']);
	unset($fields['account']['account_password-2']);
    return $fields;
}
