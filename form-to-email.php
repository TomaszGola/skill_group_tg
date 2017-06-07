<?php

$name = $_POST['name'];
$visitor_email = $_POST['email'];

//Validate first
if(empty($name)||empty($visitor_email))
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'tomasz.m.gola@gmail.com';
$email_subject = "potwierdzenie konfy!!";
$email_body = "no prosze. You have received a new message from the user $name.\n with email: $visitor_email \r\n".


$to = "$visitor_email, tomasz.m.gola@gmail.com ";
$headers = "From: $email_from \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done.
$newURL = 'index.html';
header('Location: '.$newURL);
die();
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