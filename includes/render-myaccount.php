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

		<?php
		if(is_user_logged_in()) {
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
					<h2>Fiók adatok</h2>
					<p>Mindössze néhány kattintással módosíthatod a felhasználói adataidat, illetve szállítási és számlázási címedet, “Nem szeretem” listádat.</p>
				</div><!-- myaccoun_headline-cont -->

			</div><!-- account-header -->
			<?php
		} else {

		} ?>

	<?php
}


// ***************************************************************
// MYACCOUNT content - hook to -> my-account.php
// ***************************************************************
add_action ('woocommerce_account_dashboard','trebi_account_addresses');
function trebi_account_addresses(){
	global $current_user;
	?>
	<?php $edit_address_url = wc_get_endpoint_url( 'edit-address', '', wc_get_page_permalink( 'myaccount' ) ); ?>

<!-- RESPONSIVE STRUCTURE -->
	<div class="my-account-data-wrapper">

		<!-- LEFT-COL - SZÁMLÁZÁS, SZÁLLÍTÁS -->
		<div class="left-col">

			<!-- SZÁMLÁZÁSI ADATOK -->
			<div class="my-account-head"><!-- left-col head -->
				<h3>Számlázási adatok</h3>
				<p><a class="edit-address" href="<?php echo $edit_address_url; ?>/szamlazas">szerkesztés</a></p>
			</div><!-- left-col head -->

			<div class="my-account-body">
				<ul class="my-account-list">
					<?php
						echo '<li><img src="' . plugins_url( 'assets/img/user_sm_icon.png', __FILE__ ) . '" >
						<p class="user-data">'.$current_user->user_firstname.' '.$current_user->user_lastname.'</p></li>';

						$customer_id = get_current_user_id();
						$wc_billing_phone = get_user_meta( $customer_id, 'billing_phone', true );
						echo '<li><img src="' . plugins_url( 'assets/img/phone_sm_icon.png', __FILE__ ) . '" >
						<p class="user-data">'.$wc_billing_phone.'</p>';

						$wc_billing_company = get_user_meta( $customer_id, 'billing_company', true );
						echo '<li><img src="' . plugins_url( 'assets/img/shipping_sm_icon.png', __FILE__ ) . '" >
						<p class="user-data">'.$wc_billing_company.'</p></li>';

						$wc_billing_address = get_user_meta( $customer_id, 'billing_address_1', true );
						echo '<li><img src="' . plugins_url( 'assets/img/address_sm_icon.png', __FILE__ ) . '" >
						<p class="user-data">'.$wc_billing_address.'</p></li>';
					?>
				</ul>

			</div><!-- my-account-body -->

			<!-- SZÁLLÍTÁSI ADATOK -->
			<div class="my-account-head"><!-- left-col head -->
				<h3>Szállítási adatok</h3>
				<p><a class="edit-address" href="<?php echo $edit_address_url; ?>/szallitas">szerkesztés</a></p>
			</div><!-- left-col head -->

			<div class="my-account-body">
				<ul class="my-account-list">
					<?php
						echo '
						<li><img src="' . plugins_url( 'assets/img/user_sm_icon.png', __FILE__ ) . '" >
						<p class="user-data">'.$current_user->user_firstname.' '.$current_user->user_lastname.'</p></li>';
					?>
				</ul><!-- my-account-list -->
			</div><!-- my-account-body -->

		</div><!-- left-col -->


		<!-- RIGHT-COL - NEM SZERETEM LISTA -->
		<div class="right-col">
			<div class="my-account-head"><!-- right-col head -->
				<h3>"Nem szeretem lista"</h3>
				<p><a class="edit-address" href="<?php echo $edit_address_url; ?>/szallitas">szerkesztés</a></p>
			</div><!-- right-col head -->

			<div class="my-account-body">
				<ul class="my-account-list">
					<?php
						echo '
						<li><img src="' . plugins_url( 'assets/img/user_sm_icon.png', __FILE__ ) . '" >
						<p class="user-data">'.$current_user->user_firstname.' '.$current_user->user_lastname.'</p></li>';
					?>
				</ul><!-- my-account-list -->
			</div><!-- my-account-body -->
		</div><!-- right-col -->

		<div class="clear"></div>

	</div><!-- my-account-data-wrapper -->
<!-- RESPONSIVE STRUCTURE -->


<!-- ********************************** -->
<!-- BUDDHISTA STYLE -->
<!-- ********************************** -->
	</br>
	<div class="my-account-data-wrapper">
		<div class="left-col">

			<div class="my-account-head-buddhista"><!-- left-col head -->
				<h3>Számlázási adatok</h3>
				<p><a class="edit-address" href="<?php echo $edit_address_url; ?>/szamlazas">szerkesztés</a></p>
			</div><!-- left-col head -->

		</div><!-- left-col -->

		<div class="right-col">
			<div class="my-account-body">
				<div class="my-account-body">
					<ul class="my-account-list">
						<?php
							echo '<li><img src="' . plugins_url( 'assets/img/user_sm_icon.png', __FILE__ ) . '" >
							<p class="user-data">'.$current_user->user_firstname.' '.$current_user->user_lastname.'</p></li>';

							$customer_id = get_current_user_id();
							$wc_billing_phone = get_user_meta( $customer_id, 'billing_phone', true );
							echo '<li><img src="' . plugins_url( 'assets/img/phone_sm_icon.png', __FILE__ ) . '" >
							<p class="user-data">'.$wc_billing_phone.'</p>';

							$wc_billing_company = get_user_meta( $customer_id, 'billing_company', true );
							echo '<li><img src="' . plugins_url( 'assets/img/shipping_sm_icon.png', __FILE__ ) . '" >
							<p class="user-data">'.$wc_billing_company.'</p></li>';

							$wc_billing_address = get_user_meta( $customer_id, 'billing_address_1', true );
							echo '<li><img src="' . plugins_url( 'assets/img/address_sm_icon.png', __FILE__ ) . '" >
							<p class="user-data">'.$wc_billing_address.'</p></li>';
						?>
					</ul>

				</div><!-- my-account-body -->

			</div><!-- my-account-body -->
		</div><!-- right-col -->

	</div><!-- my-account-data-wrapper -->

	<?php
}
