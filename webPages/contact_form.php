<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = (trim($_POST["name"]));
    $email = (trim($_POST["email"]));
    $message = (trim($_POST["message"]));

    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "ryanquiel2003@gmail.com";
        $subject = "New Contact Form Submission";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $emailContent = "<h2>Contact Form Submission</h2>";
        $emailContent .= "<p><strong>Name:</strong> $name</p>";
        $emailContent .= "<p><strong>Email:</strong> $email</p>";
        $emailContent .= "<p><strong>Message:</strong><br>$message</p>";

        if (mail($to, $subject, $emailContent, $headers)) {
            echo "<script>alert('Thank you for contacting us. Your message has been sent.'); window.location.href='../index.html';</script>";
        } else {
            echo "<script>alert('There was an error sending your message. Please try again later.'); window.location.href='../webPages/contact.html';</script>";
            $errorMessage = error_get_last()['message'];
            echo "<script>alert('Error message: $errorMessage');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields correctly.'); window.location.href='../webPages/contact.html';</script>";
    }
} else {
    header("Location: ../index.html");
    exit();
}
?>
