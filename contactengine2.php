<?php

$EmailFrom = $_POST['email'];
$EmailTo = "jenniferkania@sbcglobal.net";
$Subject = "Contact Form from jenniferkania.com site";
$Name = Trim(stripslashes($_POST['name'])); 
$Tel = Trim(stripslashes($_POST['phone'])); 
$Email = Trim(stripslashes($_POST['email'])); 
$Message = Trim(stripslashes($_POST['message']));
$Company = Trim(stripslashes($_POST['company']));
$Re = Trim(stripslashes($_POST['subject']));

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $Tel;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";
$Body .= "Subject: ";
$Body .= $Re;
$Body .= "\n";
$Body .= "Company: ";
$Body .= $Company;
$Body .= "\n";

// Success Message
$message = "
<div class=\"row-fluid\">
    <div class=\"span12\">
        <h3>Submission successful</h3>
        <p>Thank you for taking the time to contact me. I will get back to you within 24 hours.</p>
    </div>
</div>
";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

if ($success) {
    echo "$message"; // success
} else {
    echo 'Form submission failed. Please try again...'; // failure
}

?>