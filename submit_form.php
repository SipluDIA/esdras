<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $service = htmlspecialchars($_POST["service"]);

    $to = "info@esdras.in"; // Replace with your email address
    $subject = "New Service Request";
    $headers = "From: noreply@esdras.in\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $message = "<html><body>";
    $message .= "<h2>New Service Request</h2>";
    $message .= "<p><strong>Name:</strong> $name</p>";
    $message .= "<p><strong>Email:</strong> $email</p>";
    $message .= "<p><strong>Phone:</strong> $phone</p>";
    $message .= "<p><strong>Service:</strong> $service</p>";
    $message .= "</body></html>";

    if (mail($to, $subject, $message, $headers)) {
        header("Refresh: 4; url=/");
        echo "Email sent successfully. Redirecting to homepage in 5 seconds...";
        exit;

    } else {
        echo "<h2>Sorry, something went wrong. Please try again later.</h2>";
    }
} else {
    echo "Invalid request method.";
}
?>