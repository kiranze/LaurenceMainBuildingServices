<?php
$Email = Trim(stripslashes($_POST['Email'])); // Collecting the users email
$EmailTo = "jessegudgeon@gmail.com"; // Your email address to receive the message.
$Subject = "Website"; // Subject of the email
$Name = Trim(stripslashes($_POST['Name'])); // Collecting the users Name

// If statement checking whether the users email is valid
if (strpos($Email, '@') === false && strpos($Email, '.') === false) {
header("Location: #"); // Web address of your contact page
exit();
}

$Message = Trim(stripslashes($_POST['Message'])); // Collecting users message

// Validation
$validationOK=true;
if (!$validationOK) {
print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
exit;
}

// Prepare email body text.
// Can be concatenated but this is easier to read.
echo'

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Thank you for contacting me. I will get back to you as soon as possible!</h1>
        <p class="back">Go back to the <a href="index.htm">homepage</a>.</p>
        
    </div>
</body>
</html>



';
// Function to send the email.
// Attached to a variable so it can it can be checked in an if statement later.
$success = mail($EmailTo, $Subject, $Body, "From: <$Email>");

// If statement to check if the email was sent.
// Redirect to the url you will enter on line 47 instead of the #.
if ($success){
print "<meta http-equiv=\"refresh\" content=\"0;URL=#.php\">";
}
else{
print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}

?>