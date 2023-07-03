<?php

    $conn = mysqli_connect("localhost", "root", "", "project_dbs");
    session_start();
    if (!isset($_SESSION['ID'])) {
        header("Location: login.php");
        die();
    }

      $id = $_SESSION['ID'];
      $sql="select * from `gcethostel` where id=$id"; 
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      $name=$row['name'];
      $email=$row['email'];
      $mobile=$row['mobile'];
      $password=$row['password'];


?>


<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link rel="stylesheet" href="loggedInPageStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h1>Welcome <?php echo $_SESSION['USER_NAME'] ?></h1>
    <h3><a href="logout.php" style="text-decoration:none;">Logout</a></h3>
</div>

<div class="container">

<table class="table">
  <thead>
    <tr>
    <th scope="col" class="table-warning">ID</th>
      <th scope="col" class="table-warning">UserName</th>
      <th scope="col" class="table-warning">Email</th>
      <th scope="col" class="table-warning">Mobile</th>
      <th scope="col" class="table-warning">Password</th>
    </tr>
  </thead>
  
  <tbody>
    <tr>
    <th scope="row" class="table-info"><?php echo $id?></th>
      <td class="table-info"><?php echo $name?></td>
      <td class="table-info"><?php echo $email?></td>
      <td class="table-info"><?php echo $mobile?></td>
      <td class="table-info"><?php echo $password?></td>
    </tr>
  </tbody>
</table>

<?php
    echo '
        <center>
        <button class="btn btn-outline-warning"><a href="studentUpdate.php?updateid='.$id.'" class="text-dark" style="text-decoration:none;">Update Details</a></button>
        </center>
    ';
?>
</div>

</body>
</html>