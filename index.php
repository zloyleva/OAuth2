<?php
error_reporting(E_ALL); 
ini_set("display_errors", 1); 

	// Google auth information
	$client_id = '1038072161700-f5p8vrgo9leuldj8lu3s2q08n5hmu6ce.apps.googleusercontent.com';
	$client_secret = 'k214sc6ujkoJr2ztmhnqPiIZ';

	$redirect_uri = 'http://fortest.dev/callback/';
	$url_auth = 'https://accounts.google.com/o/oauth2/auth';

	$params = array(
		'redirect_uri'  => $redirect_uri,
		'response_type' => 'code',
		'client_id'     => $client_id,
		'scope'         => 'https://www.googleapis.com/auth/userinfo.email+https://www.googleapis.com/auth/userinfo.profile'
	);

	$link = '<p><a href="' . $url_auth . '?' . urldecode(http_build_query($params)) . '">Auth from Google</a></p>';

	echo $link;
?>

