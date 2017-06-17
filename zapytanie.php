<?php

$ContactName = $_POST['ContactName'];
$ContactSecondName = $_POST['ContactSecondName'];
$ContactEmail = $_POST['ContactEmail'];
$ContactPhone = $_POST['ContactPhone'];
$ContactText = $_POST['ContactText'];

if(IsInjected($ContactEmail))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'tomasz.m.gola@gmail.com';
$email_subject = "Konferencja 30.07.2017";
$email_body = '<html><body>';
$email_body .='<table>';
$email_body .="<tr><td><strong>Witaj $ContactName $ContactSecondName</strong></td><td>";
$email_body .="<tr><td>W najbliższym czasie skontaktujemy się z Tobą</td></tr>";
$email_body .="<tr><td>To są dane jakie zostawiłeś nam do kontaktu:</td></tr>";
$email_body .="<tr><td>Twój email to: $ContactEmail</td></tr>";
$email_body .="<tr><td>Twój numer telefonu to: $ContactPhone</td></tr>";
$email_body .="<tr><td>Treść Twojej wiadomości: </td></tr>";
$email_body .="<tr><td>$ContactText</td></tr>";
$email_body .='</table>';
$email_body .='</body></html>';

$to = "$ContactEmail, tomasz.m.gola@gmail.com ";
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

