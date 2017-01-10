<?php
// ***************************************************************
// shipping address - REMOVE FIELDS
// ***************************************************************
add_filter( 'woocommerce_shipping_fields' , 'custom_override_shipping_fields' );
function custom_override_shipping_fields( $fields ) {
	unset($fields['shipping_country']);
	unset($fields['shipping_postcode']);
	unset($fields['shipping_address_1']);
	unset($fields['shipping_address_2']);
	unset($fields['shipping_company']);
	unset($fields['shipping_city']);
	unset($fields['shipping_state']);
	unset($fields['shipping_first_name']);
	unset($fields['shipping_last_name']);
  return $fields;
}

// ***************************************************************
// ADD CUSTOM SHIPPING FIELDS
// ***************************************************************
add_filter( 'woocommerce_shipping_fields', 'add_extra_fields' );
function add_extra_fields($checkout_fields){
// $checkout_fields['billing']['user_gender'] = array(
// 'type' => 'select',
// 'options' => array( 'male' => 'Male', 'female' => 'Female'),
// 'label' => __('Gender', 'woocommerce'),
// );
// return $checkout_fields;
	echo '
	<form method="post">
		<h3>Szállítási cím</h3>
			<p class="form-row form-row-wide   validate-required validate-required" id="shipping_myfield10_field"><label for="shipping_myfield10" class="">Szállítási cím <abbr class="required" title="required">*</abbr></label>
		<select class="" data-placeholder="" name="shipping_myfield10" id="shipping_myfield10">
			<option>1095 Budapest, Lechner Ödön fasor 6. Millennium 1 MS</option><option>1095 Budapest, Lechner Ödön fasor 6. Millennium 2 MS</option><option>1095 Budapest, Lechner Ödön fasor 8. Millennium 3 MS</option><option>1095 Budapest, Soroksári út 32-34.</option><option>1068 Budapest, Dózsa György út 84/c</option><option>1095 Budapest, Lechner Ödön fasor 6.  Vodafone.</option><option>1114 Budapest  Bartók Béla út 43-47.</option><option>1118 Bp. Gombócz Zoltán utca 14. (első em.) 02-es kapuszengő</option><option>1062 Budapest,Unisys Magyarország Kft. Váci út 1-3.  “A” irodatorony, 2. Emeleti recepció</option>
		</select>
	</p><div class="clear"></div>
		<p>
			<input type="submit" class="button" name="save_address" value="Cím mentése">
			<input type="hidden" id="_wpnonce" name="_wpnonce" value="399af97f11"><input type="hidden" name="_wp_http_referer" value="/fiokom/edit-address/szallitas/">			<input type="hidden" name="action" value="edit_address">
		</p>
	</form>
	';
}
add_action( 'woocommerce_checkout_order_processed', 'save_extra_fields', 20, 2 );
	function save_extra_fields($order_id, $posted) {
	if (isset($posted['user_gender'])) {
	$order = wc_get_order($order_id);
	update_user_meta($order->get_user_id(), 'user_gender', $posted['user_gender']);
	}
}

add_filter( 'default_checkout_user_gender', 'checkout_user_gender',10,2 );
	function checkout_user_gender($value,$input) {
	if ( is_user_logged_in()){
	$current_user = wp_get_current_user();
	$value = get_user_meta( $current_user->ID, $input, true );
	}
return $value;
}
