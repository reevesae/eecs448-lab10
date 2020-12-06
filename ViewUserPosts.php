<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "alexreeves", "Ahgeer4o", "alexreeves");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$selectedUser = $_POST['userSelect'];
$postSearch = mysqli_query($mysqli, "SELECT * FROM posts WHERE author_id='$selectedUser'");

echo "<h1>Posts for user $selectedUser</h1>";
echo "<table border ='1'
<tr>
<th>Post ID</th>
<th>Message Body</th>
</tr>";

while($currentRow = mysqli_fetch_array($postSearch)){
    echo "<tr>
    <td>" . $currentRow['post_id'] . "</td>
    <td>" . $currentRow['content'] . "</td>
    </tr>";
}
echo "</table>";

echo "<button onclick=\"history.go(-1);\">Go Back</button>";

$mysqli->close();
?>