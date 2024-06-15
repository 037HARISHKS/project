<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Government Scheme Services</title>
<style>
/* CSS Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f3f3f3;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"], input[type="email"], textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.contact-info {
    margin-top: 50px;
}

.contact-info p {
    margin-bottom: 10px;
}
</style>
</head>
<body>

<div class="container">
    <h2>Contact Government Scheme Services</h2>
    <form id="contactForm" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <input type="submit" value="Submit">
    </form>

    <div class="contact-info">
        <h3>Contact Information</h3>
        <p><strong>Address:</strong> 123 Main Street, City, State, Zip Code</p>
        <p><strong>Phone:</strong> +1 (123) 456-7890</p>
        <p><strong>Email:</strong> info@govschemes.tn.gov</p>
    </div>
</div>

<?php
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Recipient email address
    $to = "recipient@example.com"; // Replace with your recipient email address

    // Email subject
    $subject = "New Contact Form Submission";

    // Email body
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    // Email headers
    $headers = "From: $email";

    // SMTP configuration
    $smtpHost = "smtp.gmail.com";
    $smtpUsername = "your_email@gmail.com"; // Replace with your Gmail email address
    $smtpPassword = "your_app_password"; // Replace with your Gmail app password
    $smtpPort = 587;
    $smtpSecure = 'tls'; // Use TLS encryption

    // Set SMTP settings using ini_set()
    ini_set("SMTP", $smtpHost);
    ini_set("smtp_port", $smtpPort);
    ini_set("sendmail_from", $smtpUsername);
    ini_set("SMTPSecure", $smtpSecure); // Set TLS encryption

    // Send email using Gmail SMTP
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Thank you for contacting us! We will get back to you soon.');</script>";
    } else {
        echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
    }
}
?>




</body>
</html>
