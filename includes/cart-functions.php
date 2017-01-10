<?php

// ***************************************************************
// ADD "VISSZA A VÁSÁRLÁSHOZ" BUTTON
// ***************************************************************
add_action( 'woocommerce_before_cart_table', 'woo_add_continue_shopping_button_to_cart' );
function woo_add_continue_shopping_button_to_cart() {
 $shop_page_url = get_option('home');
/*<a href="<?php echo get_option('home'); ?>/"*/
 echo '<div class="woocommerce-message">';
 echo ' <a href="'.$shop_page_url.'" class="button">Vissza a menühöz →</a> Még vásárolnál?';
 echo '</div>';
}
