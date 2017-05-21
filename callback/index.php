<?php

//if we get code from Google
if(isset($_GET['code'])){

	// Google auth information
	$client_id = '1038072161700-f5p8vrgo9leuldj8lu3s2q08n5hmu6ce.apps.googleusercontent.com';
	$client_secret = 'k214sc6ujkoJr2ztmhnqPiIZ';
	// 
	$redirect_uri = 'http://fortest.dev/callback/';
	//
	$url_token = 'https://accounts.google.com/o/oauth2/token';

	$params = array(
        'client_id'     => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri'  => $redirect_uri,
        'grant_type'    => 'authorization_code',
        'code'          => $_GET['code']
    );
	$result = file_get_contents(
		$url_token, 
		false, 
		stream_context_create(
			array(
			    'http' => array(
			        'method'  => 'POST',
			        'header'  => 'Content-type: application/x-www-form-urlencoded',
			        'content' => http_build_query($params)
			    )
			)
		)
	);

	$get_obj = json_decode($result);

	$userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?access_token=' .$get_obj->access_token ), true);
	if (isset($userInfo['id'])) {
		// print_r($userInfo;)
		$html .= 'Hello '.$userInfo['name'] .'<br>';
		$html .= 'Your mail '.$userInfo['email'] .'<br>';
		$html .= '<img src="'.$userInfo['picture'] .'">';
		echo $html;
    }

}else{
	echo "Redirect";
}