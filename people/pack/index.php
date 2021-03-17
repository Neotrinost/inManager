<?php

$server = "localhost";
$user = "narbon";
$passwd = "narbon";
$db = "narbon";

$conn = mysqli_connect($server, $user, $passwd, $db);

$getip = "SELECT * FROM development";
$res = mysqli_query($conn, $getip);

while ($row = mysqli_fetch_assoc($res)) {
    $ip = $row['ip'];
}

session_start();

if ($_SESSION['status'] == true) {
    if ($_SESSION['person'] == "student") {
        header("Location: http://$ip/Narbon/people/student");
    }
    if ($_SESSION['person'] == "teacher") {
        header("Location: http://$ip/Narbon/people/teacher");
    }
    if ($_SESSION['person'] == "agent") {
        header("Location: http://$ip/Narbon/people/agent");
    }
}
else {
    header("Location: http://$ip/Narbon");
}
