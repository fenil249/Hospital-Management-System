<?php
$to_email = "mas07112000@gmail.com";
$subject = "JADIYAAA";
$body = "Hi,baby";
$headers = "From:aabcxxyz1123@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
?>