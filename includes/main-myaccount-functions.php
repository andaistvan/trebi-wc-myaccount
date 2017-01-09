<?php
// ***************************************************************
// MY-ACCOUNT NAVIGATION ELEMENTS
// ***************************************************************
/*
 * Change the order of the endpoints that appear in My Account Page - WooCommerce 2.6
 * The first item in the array is the custom endpoint URL - ie http://mydomain.com/my-account/my-custom-endpoint
 * Alongside it are the names of the list item Menu name that corresponds to the URL, change these to suit
 */
// function wpb_woo_my_account_order() {
//  $myorder = array(
// 	// 'dashboard' => __( 'Fiók adatok összesítő', 'woocommerce' ),
// 	'edit-address' => __( 'Szállítási és számlázási címek szerkesztése', 'woocommerce' ),
// 	'edit-account' => __( 'Weboldal - felhasználói adatok', 'woocommerce' ),
// 	'nemszeretem-endpoint' => __( 'Nem szeretem lista', 'woocommerce' ),
// 	// 'payment-methods' => __( 'Fizetési módok', 'woocommerce' ),
// 	// 'orders' => __( 'Orders', 'woocommerce' ),
// 	// 'downloads' => __( 'Download MP4s', 'woocommerce' ),
// 	'customer-logout' => __( 'Logout', 'woocommerce' ),
//  );
//  return $myorder;
// }
// add_filter ( 'woocommerce_account_menu_items', 'wpb_woo_my_account_order' );

// ***************************************************************
// remove MYACCOUNT navigation
// ***************************************************************
remove_action(
	'woocommerce_account_navigation',
	'woocommerce_account_navigation'
);
