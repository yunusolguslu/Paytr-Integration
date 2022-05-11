<?php

	$post = $_POST;

	$merchant_key 	= '';
	$merchant_salt	= '';

	$hash = base64_encode( hash_hmac('sha256', $post['merchant_oid'].$merchant_salt.$post['status'].$post['total_amount'], $merchant_key, true) );

	if( $hash != $post['hash'] )
		die('PAYTR notification failed: bad hash');


	require_once "database/conn.php";
	require_once "models/order.php";

	$database=new Database();
	$db=$database->getConnection();
	$orders=new Order($db);

	$order=$orders->readOrder($post['merchant_oid']);

	if( $post['status'] == 'success' ) {

		echo 'PAYTR notification successful';
		$orders->updateOrder($order['paytrid'],1);
	} else {
		echo 'PAYTR notification failed';
	}

	echo "OK";
	exit;
?>