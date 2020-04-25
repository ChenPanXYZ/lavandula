<?php

$domain = $_SERVER['HTTP_HOST'];
if (substr($domain, 0, 4) == 'www.') 
{
    $domain = substr($_SERVER['HTTP_HOST'], 4);
} 

else if (in_array(substr($domain, 0, 3), array('cn.', 'tw.'))) 
{
    $domain = substr($_SERVER['HTTP_HOST'], 3);
}
$counterType = $_POST['counterType'];
// Need to set like dislike cookie for the root domain since it's a multilanguage website...
if (isset($_COOKIE['like-dislike']) == false) {
    require_once '../../../config.php';
    $sql = "UPDATE counters SET counter_value = counter_value + 1 WHERE counter_type = '$counterType'";
    $result = $conn->query($sql);
    $conn->close();
    setcookie("like-dislike", $counterType, time() + (86400), "/", $domain);
    echo 0;
}
else {
    echo 1;
}
?>