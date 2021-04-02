<?php include "../inc/dbinfo.inc"; ?>
<?php
session_start();

/* Connect to database */
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
$database = mysqli_select_db($connection, DB_DATABASE);
$table = "users";

/* If user has been set to be add as admin, try to add them */
if (isset($_GET["add"])){
  $useradd = $_POST["useradd"];
  $result = mysqli_query($connection,
    "SELECT user_id FROM $table WHERE user_id='$useradd'");
  if(mysqli_num_rows($result) > 0){
    $error = 'User added as admin';
    mysqli_query($connection,
      "UPDATE $table SET permissions=1 WHERE user_id='$useradd'");
  }
  else{
    $error = '<p class="error">User not found</p>';
  }
}

/* Get list of users who aren't admins */
$result = mysqli_query($connection,
  "SELECT user_id, permissions FROM $table WHERE permissions=0");
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
<meta charset="UTF-8"> <title>Admin Add</title>
<link rel="stylesheet" href="../css/admin.css">
</head>

<body>

  <div class="main">
    <h2>Add an admin</h2>
    <form name="add-admin" method="post" action="admin-add.php?add=true">
      <td><input type="text" size=25 name="useradd" placeholder="Enter username" required></td>
      <td><input type="submit" value="Add"></td>
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
