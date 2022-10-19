<?php
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'sendEmail')
{
	$to = 'support@mail.com';
	$subject = 'Roxine Contact Form';
	$send_arr = array();	
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: <".$_REQUEST['con_email'].">" . "\r\n";
	$headers .= "Cc: ".$_REQUEST['con_email'] . "\r\n";
	
	$message = "First Name : ".$_REQUEST['con_fname']. "<br />";
	$message .= "Last Name : ".$_REQUEST['con_lname']. "<br />";
	$message .= "Email : ".$_REQUEST['con_email']. "<br />";
	$message .= "Phone : ".$_REQUEST['con_phone']. "<br />";
	$message .= "Message : ".$_REQUEST['con_message']. "<br />";
	
	if (mail($to,$subject,$message,$headers) ){
		
		$send_arr['response'] = 'success';
		$send_arr['message'] = 'Your message has been sent.';
		
		} else{
			
		$send_arr['response'] = 'error';
		$send_arr['message'] = "You message couldn't be sent. Please try later!";
			
			}
	echo json_encode($send_arr);
	exit;
	
}

?>