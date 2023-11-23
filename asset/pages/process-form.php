<?php
$errors = array(); // Initialize an array to store errors

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitForm"])) {
    // Collect form data
    $name = isset($_POST["name"]) ? $_POST["name"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $subject = isset($_POST["subject"]) ? $_POST["subject"] : '';
    $message = isset($_POST["message"]) ? $_POST["message"] : '';

    // Check if required fields are empty
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $errors[] = "Please fill out all fields.";
    }

    // Set recipient email address (replace with your actual email address)
    $to = "iubat21103033@gmail.com";

    // Compose the email message
    $emailMessage = "Name: $name\n";
    $emailMessage .= "Email: $email\n";
    $emailMessage .= "Subject: $subject\n";
    $emailMessage .= "Message:\n$message";

    // Set additional headers
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Set up MailHog configuration
    ini_set("SMTP", "localhost");
    ini_set("smtp_port", "1025");

    // Send the email
    if (empty($errors) && mail($to, $subject, $emailMessage, $headers)) {
        // Successful email sending
        $successMessage = "Your message has been sent successfully.";
    } else {
        // Handle email sending failure
        $errors[] = "There was an issue sending the email. Please try again later.";
    }
}
?>