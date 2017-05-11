<?php
    
require_once('phpmailer/class.phpmailer.php');

//$host="localhost"; // Host name 
//$username="deandeve_user"; // Mysql username 
//$password="willitraintoday@12345"; // Mysql password 
//$db_name="deandeve_enquiry"; // Database name 
//$tbl_name="new-regency"; // Table name 

//// Connect to server and select database.
//mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
//mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$ch = curl_init();
$curlConfig = array (
	
	CURLOPT_URL	=> "https://docs.google.com/forms/d/1Sf2L0Y32i_0fJ9RsFDq77YVMDI1ec31gyg8uifdH02w/formResponse",
	CURLOPT_POST	=> true,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POSTFIELDS => array (
		'entry.2029678909'  => $name, 
		'entry.2010832027' => $email,
		'entry.1540899436' => $phone

	)
);
curl_setopt_array($ch, $curlConfig);
$result = curl_exec($ch);
echo curl_error($ch);
curl_close($ch);

// Insert data into mysql 
/*$sql="INSERT INTO $tbl_name(name, email, phone, form)VALUES('$name', '$email', '$phone', '$form')";*/
//$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful". 
/*if($result){*/
	//return "2";
//} 

//else {
	//$data = array("status" => "1");
	//echo json_encode($data);
//};
//// close connection 
//mysql_close();

$mail             = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
// $mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "akbariharsh111@gmail.com";  // GMAIL username
$mail->Password   = "patel6525@#";            // GMAIL password

$mail->SetFrom('akbariharsh111@gmail.com');

$mail->Subject    = $name . ", your interest in Dean's Regency Shopping Arcade has been received
";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
// $mail->AddAttachment('attachments/Dean-Regency-E-Brochure.pdf','Dean-Regency-E-Brochure.pdf');

$body = "Hi " . $name . " ,";
$body .= "Your interest for reckon has been received. For more details please refer to the brochure which is attached with the mail. Our Executive will be contacting you soon.
<br><br>";
$body .= "For any kind of assistance you can reply back to the same mail.<br><br>";
$body .= "Regards,<br><br>";
$body .= "Sales Team<br><br>";
$body .= "hfs<br><br>";
$body .= " INDIA<br><br>";
$body .= "hii";
$body .= "Please do not print this E-Mail unless you really need to – this will preserve trees on planet.";

// $body = file_get_contents('../mailer.html');
// $body = str_replace('%email%', $email, $body);
// $body = str_replace('%type%', "emp", $body);

$mail->MsgHTML($body);


$address = $email;
$mail->AddAddress($address, $address);	
// $mail -> Send();
/*
if(!$mail->Send()) {
  //echo "Mailer Error: " . $mail->ErrorInfo;
	return "2";
} else {
	$data = array("status" => "1");
	echo json_encode($data);
};
 */
?>
    
