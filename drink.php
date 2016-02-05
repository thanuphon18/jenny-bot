<?php

$menu = $_POST['text'];
echo $_POST['user_name'];
$servername = "localhost";
$username = "root";
$password = "22012016";
$dbname = "drink";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



 $today = date("Y-m-d");

if ($menu == "order") {
    header("location:https://slack.com/api/chat.postMessage?token=xoxp-18929953686-19035559206-19139930727-5a795443c2&channel=C0K11K9B4&text=วันนี้กินน้ำอะไร&username=jenny");
} elseif ($menu == 'list') {

    $sql = "SELECT name FROM drink where date_time like '$today'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "รายการ : " . $row["name"]." \n";
        }
    }


} else {
    $sql = "INSERT INTO drink (name,date_time)
    VALUES ('$menu', '$today')";

    if ($conn->query($sql) === TRUE) {
        echo "รายการ ". $menu ."เรียบร้อย \n";
    } else {
        echo "Error: " . $sql  . $conn->error;
    }

}