<?php

echo "test";

$menu = $_POST['text'];
$name = $_POST['user_name'];

echo $_POST['user_name'];
$servername = "172.16.20.113";
$username = "thanuphon";
$password = "thanuphon";
$dbname = "thanuphon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connect success";
}



 $today = date("Y-m-d");

if ($menu == "order") {
    header("location:https://slack.com/api/chat.postMessage?token=xoxp-18929953686-19035559206-19139930727-5a795443c2&channel=C0K11K9B4&text=วันนี้กินน้ำอะไร&username=jenny");
} elseif ($menu == 'list') {

    $sql = "SELECT drink_name name FROM drink where date_time like '$today'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "รายการ : " . $row["drink_name"] . " -- " . $row["name"] .  " \n";
        }
    }

} else {
    $sql = "INSERT INTO drink (user_name, name, date_time)
    VALUES ('$menu', '$name', '$today')";

    if ($conn->query($sql) === TRUE) {
        echo "รายการ ". $menu ."เรียบร้อย \n";
    } else {
        echo "Error: " . $sql  . $conn->error;
    }

}