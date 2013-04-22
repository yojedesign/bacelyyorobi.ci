   <?php 
   header('content-type: application/json; charset=utf-8');
   if (isset($_GET["firstname"])) {
	$firstname = strip_tags($_GET['firstname']);
	$surname = strip_tags($_GET['surname']);
	$email = strip_tags($_GET['email']);
	$message = strip_tags($_GET['message']);
	$header = "De: ". $firstname ." " . $surname ." <" . $email . ">rn"; 
	$ip = $_SERVER['REMOTE_ADDR']; 
	$httpref = $_SERVER['HTTP_REFERER']; 
	$httpagent = $_SERVER['HTTP_USER_AGENT']; 
	$today = date("F j, Y, g:i a");    
	$recipient = 'yorogoule@gmail.com';
	$subject = '';
	$mailbody = "
	Nom: $firstname 
	Prenoms: $surname 
	contacts: $email 
	Message: $message
    Adresse Ip: $ip
    Navigateur : $httpagent
    Envoye le: $today
    ";
	$result = 'success';

	if (mail($recipient, $subject, $mailbody, $header)) {
		echo json_encode($result);
	}
}
?>