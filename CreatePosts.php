<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "alexreeves", "Ahgeer4o", "alexreeves");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$authorID = $_POST['authorID'];
$postText = $_POST['postBody'];
$authorID = trim($authorID);
$postText = trim($postText);

if(empty($authorID)){
    echo "<h1>The username field is empty!</h1>";
}
else{
    if(empty($postText)){
        echo "<h1>The post body is empty!</h1>";
    }
    else{
        $userSearch = "SELECT * FROM users WHERE user_id='$authorID'";
        $searchRes = mysqli_query($mysqli, $userSearch);
        if(mysqli_num_rows($searchRes) > 0){
            $entry = "INSERT INTO posts (content, author_id) VALUES ('$postText', '$authorID')";
            $insertPost = mysqli_query($mysqli, $entry);
            echo "<h1>Post saved successfully!</h1>";
        }
        else{
            echo "<h1>Username entered does not exist!</h1>";
        }
    }
}

echo "<button onclick=\"history.go(-1);\">Go Back</button>";

$mysqli->close();
?>