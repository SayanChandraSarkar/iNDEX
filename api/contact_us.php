<?php
$json = file_get_contents('php://input');
$data = json_decode($json, true);
	
 
if(isset($data['name']) && isset($data['phone']) && isset($data['email']) && isset($data['message'])){
	$email = $data['email'];

	$body = "<br><br>
	Name : ".$data['name']."<br>
	Phone : ".$data['phone']."<br>
	Email : ".$email."<br>
	message : ".$data['message'];


	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: Tanzim website<no-reply@ariyansdesigns.in>' . "\r\n";
	$headers .= "Reply-To: ".$email;


	
	$success = mail('sledgecoder@gmail.com','Contact us form',$body,$headers);
    if ($success) {
        echo '{"success":"OK"}';
        	exit();
    }
    else {
        $errorMessage = error_get_last()['message'];
        echo '{"err":"'.$errorMessage.'"}';
    }
	
}



echo '{"err":"FAIL"}';
?>

