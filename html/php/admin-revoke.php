<?php include "../inc/dbinfo.inc"; ?>
<?php
session_start();

/* Connect to database */
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
$database = mysqli_select_db($connection, DB_DATABASE);
$table = "users";

/* If user has been set to be removed as admin, try to remove them */
if (isset($_GET["add"])){
  $userrevoke = $_POST["userrevoke"];
  $result = mysqli_query($connection,
    "SELECT user_id FROM $table WHERE user_id='$userrevoke'");
  if(mysqli_num_rows($result) > 0){
    $error = 'User removed as admin';
    mysqli_query($connection,
      "UPDATE $table SET permissions=0 WHERE user_id='$userrevoke'");
  }
  else{
    $error = '<p class="error">User not found</p>';
  }
}

/* Get list of users who are admins (owner not included) */
$result = mysqli_query($connection,
  "SELECT user_id, permissions FROM $table WHERE permissions=1");
$users = [];
$i = 0;
while ($row = mysqli_fetch_object($result)){
  $users[$i] = $row->user_id;
  $i = $i + 1;
}
sort($users);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"> <title>Admin Revoke</title>
<link rel="stylesheet" href="../css/admin.css">
</head>

<body>

  <div class="main">
    <h2>Revoke an admin</h2>
    <form name="revoke-admin" method="post" action="admin-revoke.php?add=true">
      <td><input type="text" size=25 name="userrevoke" placeholder="Enter username" required></td>
      <td><input type="submit" value="Revoke"></td>
      <?php echo $error; ?>
    </form>
    <table>
      <?php foreach ($users as $user) : ?>
      <tr>
        <td><?php echo "$user"; ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <?php include "template-admin.php" ?>

</body>

</html>
