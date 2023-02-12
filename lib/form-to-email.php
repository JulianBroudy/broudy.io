<?php
if(!isset($_POST['submit-button']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$visitor_email = $_POST['inputEmail'];
$subject = $_POST['inputSubject'];
$message = $_POST['inputMessage'];

//Validate first
if(empty($message)||empty($visitor_email))
{
    echo "Email and message must not be empty!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email!";
    exit;
}

$email_from = $visitor_email;
$email_subject = "New Form submission: $subject";
$email_body = "You have received a new message from $visitor_email.\n".
    "Here is the message:\n$message\n".

$to = "Julian@Broudy.io";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: ../lib/message_sent.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}

?>
