<?php

$conn = mysqli_connect("localhost", "root", "", "project_dbs");

    if (!$conn) {
        echo "Error Connecting To Database";
      }
      
      $id = $_GET['updateid'];
      $sql="select * from `gcethostel` where id=$id"; 
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      $name=$row['name'];
      $email=$row['email'];
      $mobile=$row['mobile'];
      $password=$row['password'];


      if (isset($_POST['addUser'])) {
      $name=$_POST['name'];
      $email=$_POST['email'];
      $mobile=$_POST['mob'];
      $password=$_POST['password'];

        $sql = "update `gcethostel` set id=$id, name='$name', email='$email', mobile='$mobile', password='$password' 
        where id=$id";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
          echo "<h3>Data Updated Succesfully</h3>";
          header("Location: loggedInPage.php");
        }
        else{
          echo "<h3>Error Connecting To Database</h3>";
        }
      
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Details</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Lobster+Two&family=Maven+Pro&family=Orbitron&family=Righteous&family=Special+Elite&display=swap');
          *
          {
              font-family: 'Orbitron', sans-serif;
          }
    </style>
    <link rel="stylesheet" href="./addUserStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
    

<form action="" method="post">
  <div class="formElt">
    <label for="nm">UserName</label>
    <input type="text" class="form-control" name="name" id="nm" placeholder="Enter name" autocomplete="off" value=<?php echo $name?>>
  </div>

  <div class="formElt">
    <label for="eml">Email</label>
    <input type="email" class="form-control" name="email" id="eml" placeholder="Enter email" autocomplete="off" value=<?php echo $email?>>
  </div>

  <div class="formElt">
  <label for="mb">Mobile</label>
    <input type="tel" class="form-control" name="mob" id="mb" placeholder="Enter mobile no." autocomplete="off" value=<?php echo $mobile?>>
  </div>

  <div class="formElt">
  <label for="ps">Password</label>
    <input type="password" class="form-control" name="password" id="ps" placeholder="Password" autocomplete="off" value=<?php echo $password?>>
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-primary" name="addUser" value="added">Update</button>
    <button type="button" class="btn btn-primary"><a href="./loggedInPage.php" class="text-light">Back</a></button>
  </div>





</form>




</body> 
</html>