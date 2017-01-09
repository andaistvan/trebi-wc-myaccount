<?php
// ***************************************************************
// remove MYACCOUNT navigation
// ***************************************************************
remove_action(
	'woocommerce_account_navigation',
	'woocommerce_account_navigation'
);


// ***************************************************************
// MYACCOUNT render ENTRY HEADER
// ***************************************************************
add_action ('account_header','trebi_account_header');
function trebi_account_header(){
	?>
		<div id="account-header">

			<div class="wp_account_cont">

				<div class="icon-img-cont">
					<?php echo '<img src="' . plugins_url( 'assets/img/user-icon.png', __FILE__ ) . '" > '; ?>
				</div><!-- icon-img-cont -->
					<?php
						global $woocommerce;
					    $current_user = wp_get_current_user();

					    /**
					     * @example Safe usage: $current_user = wp_get_current_user();
					     * if ( !($current_user instanceof WP_User) )
					     *     return;
					     */
					    echo '<p class="user-name">'.$current_user->user_firstname.' '.$current_user->user_lastname.'</p>';
					   //  echo 'Username: ' . $current_user->user_login . '<br />';
					   //  echo 'User email: ' . $current_user->user_email . '<br />';
					   //  echo 'User first name: ' . $current_user->user_firstname . '<br />';
					   //  echo 'User last name: ' . $current_user->user_lastname . '<br />';
					   //  echo 'User display name: ' . $current_user->display_name . '<br />';
					   //  echo 'User ID: ' . $current_user->ID . '<br />';



					?>
				<?php
				$edit_account_url = wc_get_endpoint_url( 'edit-account', '', wc_get_page_permalink( 'myaccount' ) );
				?>
				<p><a class="edit-account" href="<?php echo $edit_account_url; ?>">jelszó módosítás</a></p>
				<?php
				$customer_logout_url = wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) );
				?>
				<p><a class="customer-logout" href="<?php echo $customer_logout_url; ?>">kijelentkezés</a></p>
			</div><!-- wp_account_cont -->

			<div class="myaccoun_headline-cont">
				<h2>Az ön felhasználói fiókja</h2>
				<p>Mindössze néhány kattintással módosíthatod a felhasználói adataidat, illetve szállítási és számlázási címedet, “Nem szeretem” listádat.</p>
			</div><!-- myaccoun_headline-cont -->

		</div><!-- account-header -->
	<?php
}


// ***************************************************************
// MYACCOUNT content - hook to -> my-account.php
// ***************************************************************
add_action ('woocommerce_account_content','trebi_account_addresses');
function trebi_account_addresses(){
	global $current_user;
	?>
	<?php $edit_address_url = wc_get_endpoint_url( 'edit-address', '', wc_get_page_permalink( 'myaccount' ) ); ?>
		<table class="my_addresses">
			<thead>
				<tr>
					<td>
						<h3>Számlázási adatok</h3>
						<p><a class="edit-address" href="<?php echo $edit_address_url; ?>/szamlazas">szerkesztés</a></p>
					</td>
					<td>
						<h3>Szállítási cím</h3>
						<p><a class="edit-address" href="<?php echo $edit_address_url; ?>/szallitas">szerkesztés</a></p>
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						 <?php
							echo '<img src="' . plugins_url( 'assets/img/user_sm_icon.png', __FILE__ ) . '" >
							<p class="user-data">'.$current_user->user_firstname.' '.$current_user->user_lastname.'</p></br>';

							$customer_id = get_current_user_id();

							$wc_billing_phone = get_user_meta( $customer_id, 'billing_phone', true );
							echo '<img src="' . plugins_url( 'assets/img/phone_sm_icon.png', __FILE__ ) . '" >
							<p class="user-data">'.$wc_billing_phone.'</p></br>';

							$wc_billing_company = get_user_meta( $customer_id, 'billing_company', true );
							echo '<img src="' . plugins_url( 'assets/img/shipping_sm_icon.png', __FILE__ ) . '" >
							<p class="user-data">'.$wc_billing_company.'</p></br>';

							$wc_billing_address = get_user_meta( $customer_id, 'billing_address_1', true );
							echo '<img src="' . plugins_url( 'assets/img/address_sm_icon.png', __FILE__ ) . '" >
							<p class="user-data">'.$wc_billing_address.'</p></br>';

						?>
					</td>
					<td>
						<p>szállítási</p>
					</td>
				</tr>
			</tbody>
			<!-- nem szeretem lista -->
			<thead>
				<tr>
					<td>
						<h3>"Nem szeretem lista"</h3>
						<p><a class="edit-address" href="<?php echo $edit_address_url; ?>/szallitas">szerkesztés</a></p>
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<h2>form helye</h2>
					</td>
				</tr>
			</tbody>
		</table>
	<?php
}
