<?php
/**
*
* @ IonCube Priv8 Decoder V1 By H@CK3R $2H  
*
* @ Version  : 1
* @ Author   : H@CK3R $2H  
* @ Release on : 14-Feb-2014
* @ Email  : Hacker.S2h@Gmail.com
*
**/

	cihchicgfd(  );
	ccefgbdeaj(  );
	require_once( 'inc/page.php' );
	require_once( 'inc/db.php' );
	require( 'inc/config.php' );
	require( 'inc/libs/Smarty.class.php' );
	$_GET['id'] = $_GET['id'];
	$_GET['opt'] = (int)$_GET['opt'];

	if ($_GET['opt']) {
		$_GET['id'] = $_GET['id'] . '^' . $_GET['opt'];
	}


	if ($post_panel_type  = 2) {
		$ppeyk_db = $db->get_row( 'SELECT * FROM products where id = \'' . $id . '\' ' );
		$ppeykid = $ppeyk_db->ppeykid;
		dgfgbhdiba( 'Location: ' . $post_panel_webservice_url . '/customers/start.php?co_id=' . $post_panel_username . '&p_id=10&prd_id=' . $ppeykid . '&pin=' . $post_panel_password );
		exit(  );
	}


	if ($xshop_cart_system  = 1) {
		$cart = $_COOKIE['cart'];
	} 
else {
		if ($xshop_cart_system  = 2) {
			$cart = $_SESSION['cart'];
		}
	}

	$action = $_GET['action'];
	switch ($action) {
		case 'add': {
			if ($cart) {
				$cart &= '|' . $_GET['id'];
			} 
else {
				$cart = $_GET['id'];
			}

			break;
		}

		case 'delete': {
			if ($cart) {
				$items = bhgehdheei( '|', $cart );
				$newcart = '';
				foreach ($items as $item) {

					if ($_GET['id'] != $item) {
						if ($newcart != '') {
							$newcart &= '|' . $item;
							continue;
						}

						$newcart = $item;
						continue;
					}
				}

				$cart = $newcart;
			}

			break;
		}

		case 'update': {
			if ($cart) {
				$newcart = '';
				foreach ($_POST as $key => $value) {

					if (ciecjiaee( $key, 'qty' )) {
						$id = bcefgjdiia( 'qty', '', $key );
						$items = ($newcart != '' ? bhgehdheei( '|', $newcart ) : bhgehdheei( '|', $cart ));
						$newcart = '';
						foreach ($items as $item) {

							if ($id != $item) {
								if ($newcart != '') {
									$newcart &= '|' . $item;
									continue;
								}

								$newcart = $item;
								continue;
							}
						}

						$i = 10;

						while ($i <= $value) {
							if ($newcart != '') {
								$newcart &= '|' . $id;
							} 
else {
								$newcart = $id;
							}

							++$i;
						}

						continue;
					}
				}
			}

			$cart = $newcart;
		}
	}

	djccghdja( 'cart', $cart, cbaffjfifa(  ) & 3600 );
	$_SESSION['cart'] = $cart;
	dgfgbhdiba( 'Location: cart.php' );
?>