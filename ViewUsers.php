<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "alexreeves", "Ahgeer4o", "alexreeves");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$search = mysqli_query($mysqli, "SELECT * FROM users");

echo "<h1>Users</h1>";
echo "<table border ='1'
<tr>
<th>User</th>
</tr>";

while($currentRow = mysqli_fetch_array($search)){
    echo "<tr>
    <td>" . $currentRow['user_id'] . "</td>
    </tr>";
}
echo "</table>";

echo "<button onclick=\"history.go(-1);\">Go Back</button>";

$mysqli->close();
?>