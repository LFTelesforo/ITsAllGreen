<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $to = "withitsallgreen@gmail.com";  

    // Set SMTP server configuration
    ini_set('SMTP', 'smtp.gmail.com'); 
    ini_set('587', 25);  

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $mailBody = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";

    // Send the email
    $success = mail($to, $subject, $mailBody, $headers);

    if ($success) {
        echo "The email was sent successfully!";
    } else {
        echo "There was an error sending the email. Please try again later.";
        
        echo "<br>Error details: " . error_get_last()['message'];
    }
}
?>
