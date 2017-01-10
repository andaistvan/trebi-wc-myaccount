<?php
/**
 *REDUCE THE STRENGTH REQUIREMENT ON THE WOOCOMMERCE PASSWORD.
 *
 * Strength Settings
 * 3 = Strong (default)
 * 2 = Medium
 * 1 = Weak
 * 0 = Very Weak / Anything
 */
function reduce_woocommerce_min_strength_requirement( $strength ) {
    return 0;
}
add_filter( 'woocommerce_min_password_strength', 'reduce_woocommerce_min_strength_requirement' );


// ***************************************************************
// REGISTRATION - ADD BILLING FIELDS
// ***************************************************************
/**
 * Add new register fields for WooCommerce registration.
 */
function wooc_extra_register_fields() {
    ?>
	<div class="regform-billing-wrapper">

	    <p class="form-row form-row-first">
	    <label for="reg_billing_first_name"><?php _e( 'Vezeték név', 'woocommerce' ); ?> <span class="required">*</span></label>
	    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
	    </p>

	    <p class="form-row form-row-last">
	    <label for="reg_billing_last_name"><?php _e( 'Kereszt név', 'woocommerce' ); ?> <span class="required">*</span></label>
	    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
	    </p>

	    <div class="clear"></div>

	    <p class="form-row form-row-wide">
	    <label for="reg_billing_phone"><?php _e( 'Telefon', 'woocommerce' ); ?> <span class="required">*</span></label>
	    <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
	    </p>

		 <p class="form-row form-row-wide">
		 <label for="reg_billing_company"><?php _e( 'Cég neve', 'woocommerce' ); ?> </label>
		 <input type="text" class="input-text" name="billing_company" id="reg_billing_company" value="<?php if ( ! empty( $_POST['billing_company'] ) ) esc_attr_e( $_POST['billing_company'] ); ?>" />
		 </p>

		 <p class="form-row form-row-wide">
		 <label for="reg_billing_address_1"><?php _e( 'Számlázási cím', 'woocommerce' ); ?> </label>
		 <input type="text" class="input-text" name="billing_address_1" id="reg_billing_address_1" value="<?php if ( ! empty( $_POST['billing_address_1'] ) ) esc_attr_e( $_POST['billing_address_1'] ); ?>" />
		 </p>
	</div><!-- regform-billing-wrapper -->

    <?php
}
add_action( 'woocommerce_register_form', 'wooc_extra_register_fields' );


/**
 * Validate the extra register fields.
 *
 * @param WP_Error $validation_errors Errors.
 * @param string   $username          Current username.
 * @param string   $email             Current email.
 *
 * @return WP_Error
 */
function wooc_validate_extra_register_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: Vezetéknév megadása kötelező!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Keresznév megadása kötelező!.', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
        $errors->add( 'billing_phone_error', __( '<strong>Error</strong>: Telefonszám kötelező!.', 'woocommerce' ) );
    }
    return $errors;
}
add_filter( 'woocommerce_registration_errors', 'wooc_validate_extra_register_fields', 10, 3 );


/**
 * Save the extra register fields.
 *
 * @param int $customer_id Current customer ID.
 */
function wooc_save_extra_register_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        // WordPress default first name field.
        update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        // WooCommerce billing first name.
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        // WordPress default last name field.
        update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        // WooCommerce billing last name.
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
    }
    if ( isset( $_POST['billing_phone'] ) ) {
        // WooCommerce billing phone
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    }
	 if ( isset( $_POST['billing_company'] ) ) {

        update_user_meta( $customer_id, 'billing_company', sanitize_text_field( $_POST['billing_company'] ) );

        update_user_meta( $customer_id, 'billing_company', sanitize_text_field( $_POST['billing_company'] ) );
    }
	 if ( isset( $_POST['billing_address_1'] ) ) {

			update_user_meta( $customer_id, 'billing_address_1', sanitize_text_field( $_POST['billing_address_1'] ) );

			update_user_meta( $customer_id, 'billing_address_1', sanitize_text_field( $_POST['billing_address_1'] ) );
	  }
}
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );
