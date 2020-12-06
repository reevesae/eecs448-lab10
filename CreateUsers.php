<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "alexreeves", "Ahgeer4o", "alexreeves");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$userID = $_POST['userID'];
$userID = trim($userID);
if(empty($userID)){
    echo "<h1>The username you have entered is empty!</h1>";
}
else{
    $userSearch = "SELECT * FROM users WHERE user_id='$userID'";
    $searchRes = mysqli_query($mysqli, $userSearch);
    if(mysqli_num_rows($searchRes) > 0){
        echo "<h1>The username you have entered is already taken!</h1>";
    }
    else{
        $entry = "INSERT INTO users (user_id) VALUES ('$userID')";
        $insertID = mysqli_query($mysqli, $entry);
        echo "<h1>Username saved successfully</h1>";
    }
}

echo "<button onclick=\"history.go(-1);\">Go Back</button>";

$mysqli->close();
?>