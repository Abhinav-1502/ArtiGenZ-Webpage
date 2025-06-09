<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Set your email address here
    $to = "artygenz.ai@gmail.com";

    // Get form fields and sanitize
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $company = htmlspecialchars(trim($_POST["company"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Email subject and content
    $subject = "New Contact Form Message from $name";
    $body = "You received a new message from your website contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Company: $company\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Something went wrong. Please try again.";
    }
} else {
    echo "Invalid request";
}
?>
