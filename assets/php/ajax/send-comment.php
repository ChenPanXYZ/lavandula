<?php
require_once '../../../config.php';

$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$content = $conn->real_escape_string($_POST['content']);
$recaptchaResponse = $_POST['recaptchaResponse'];


$secretKey = "6Le3GbwUAAAAAFM3PJKOa6HtlzcbGkEHMCGRmK18";
$ip = $_SERVER['REMOTE_ADDR'];
// post request to server
$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($recaptchaResponse);
$response = file_get_contents($url);
$responseKeys = json_decode($response,true);


if($responseKeys["success"]) {
    $sql = "INSERT INTO comments (comment_author, comment_email, comment_content, comment_date, comment_date_gmt) VALUES('$name', '$email', '$content', CURRENT_TIMESTAMP(), UTC_TIMESTAMP())";
    if($result = $conn->query($sql)) {
        echo "<span><strong>" . $name . "</strong>, </span>";
    }
    $content = nl2br($content);
    $to = 'pan@panchen.xyz';
    $subject = $name . ' leaves a message!';
    $message = $name . " leaves a message: \n" . $content;
    mail($to, $subject, $message);
    mysqli_close($conn);
}
else {
    echo -1;
}
?>