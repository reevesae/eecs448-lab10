<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "alexreeves", "Ahgeer4o", "alexreeves");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$search = mysqli_query($mysqli, "SELECT * FROM posts");

while($currentRow = mysqli_fetch_array($search)){
    $tempID = $currentRow['post_id'];
    if(isset($_POST["box" . $tempID])){
        $entry = "DELETE FROM posts WHERE post_id=$tempID";
        $deletePost = mysqli_query($mysqli, $entry);
        echo "<h3>Post with ID $tempID has been deleted successfully!</h3>";
    }
}

echo "<h1>Selected posts have been deleted!</h1>";
echo "<button onclick=\"history.go(-1);\">Go Back</button>";

$mysqli->close();
?>