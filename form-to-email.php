<?php

$sCompanyName = $_POST['sCompanyName'];
$sCompanyStreet = $_POST['sCompanyStreet'];
$sCompanyNumber1 = $_POST['sCompanyNumber1'];
$sCompanyNumber2 = $_POST['sCompanyNumber2'];
$sCompanyCode = $_POST['sCompanyCode'];
$sCompanyCity = $_POST['sCompanyCity'];
$sCompanyNip = $_POST['sCompanyNip'];
$sCompanyEmail = $_POST['sCompanyEmail'];
$sCompanyPeople = $_POST['osoby'];
$sCompanyTicket = $_POST['bilety'];
$aName = $_POST['aName'];
$aSurname = $_POST['aSurname'];
$aPosition = $_POST['aPosition'];
$aEmail = $_POST['aEmail'];
$aPhone = $_POST['aPhone'];
$aCompany = $_POST['aCompany'];
$aNote = $_POST['aNote'];

if(IsInjected($sCompanyEmail))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'tomasz.m.gola@gmail.com';
$email_subject = "Konferencja 30.07.2017";
$email_body = '<html><head><meta charset="UTF-8"></head><body>';
$email_body .='<table>';
$email_body .="<tr><td><strong>Witaj $sCompanyName</strong></td><td>";
$email_body .="<tr><td>Adres Twojej firmy:</td></tr>";
$email_body .="<tr><td>Nazwa ulicy: $sCompanyStreet</td></tr>";
$email_body .="<tr><td>Numer ulicy: $sCompanyNumber1</td></tr>";
$email_body .="<tr><td>Numer lokalu: $sCompanyNumber2</td></tr>";
$email_body .="<tr><td>Kod pocztowy: $sCompanyCode</td></tr>";
$email_body .="<tr><td>Miasto: $sCompanyCity</td></tr>";
$email_body .="<tr><td>NIP: $sCompanyNip</td></tr>";
$email_body .="<tr><td>Osoba zgłoszona przez Twoją firmę</td></tr>";
$email_body .="<tr><td>Imię i nazwisko: $aName $aSurname</td></tr>";
$email_body .="<tr><td>Stanowisko: $sPosition</td></tr>";
$email_body .="<tr><td>E-mail: $aEmail</td></tr>";
$email_body .="<tr><td>Telefon: $aPhone</td></tr>";
$email_body .="<tr><td>Uwagi: $aNote</td></tr>";
$email_body .='</table>';
$email_body .='</body></html>';

$to = "$sCompanyEmail, tomasz.m.gola@gmail.com ";
$headers = "From: $email_from \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8";
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

