<?php
error_reporting(0);
$send_arr = array();
$apiKey = 'c12d113ae979025c75283f9f53beede8-us12';
$listId = 'a047e23989';
$double_optin=false;
$send_welcome=false;
$email_type = 'html';
$email = $_REQUEST['subscriber_email'];
//replace us2 with your actual datacenter
$submit_url = "http://us12.api.mailchimp.com/1.3/?method=listSubscribe";
$data = array(
'email_address'=>$email,
'merge_vars' => array(),
'apikey'=>$apiKey,
'id' => $listId,
'double_optin' => $double_optin,
'send_welcome' => $send_welcome,
'email_type' => $email_type
);
$payload = json_encode($data);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $submit_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
$result = curl_exec($ch);
curl_close ($ch);
$data = json_decode($result);
if ($data->error){
	$send_arr['response'] = 'error';
	$send_arr['message'] = $data->error;
		
} else {
	$send_arr['response'] = 'success';
	$send_arr['message'] = 'Got it, you have been added to our email list.';
}

	echo json_encode($send_arr);
	exit;
?>