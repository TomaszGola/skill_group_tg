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
$email_subject = "Konferencja 30.07.2017";
$email_body = '<html><body>';
$email_body .='<table rules="all" style="bottom-border: 2px solid #123;" cellpadding="10">';
$email_body .="<tr style='background: #eee;'><td><strong>Witaj $name</strong></td><td>";
$email_body .="<tr><td>wymysl jakiś tekst tutaj i nie udalo mi sie jeszcze ustawic polskich znaków....</td></tr>";
$email_body .='</table>';
$email_body .='</body></html>';

$to = "$visitor_email, tomasz.m.gola@gmail.com ";
$headers = "From: $email_from \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
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