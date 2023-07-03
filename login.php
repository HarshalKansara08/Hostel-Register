<?php
  session_start();
  $conn = mysqli_connect("localhost", "root", "", "project_dbs");
  $msg1="";
  $msg2="";
  if (isset($_POST['login'])) {

    $sysadminSql = mysqli_query($conn, "select * from gcethostel where id=1");
    $sysadminRow = mysqli_fetch_assoc($sysadminSql);



     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $password = mysqli_real_escape_string($conn, $_POST['password']);

     $sql = mysqli_query($conn, "select * from gcethostel where email='$email' && password='$password'"); 
     $num = mysqli_num_rows($sql);


     if ($email == $sysadminRow['email'] && $password == $sysadminRow['password']) {
      $_SESSION['ID'] = $row['id'];
      $_SESSION['USER_NAME'] = $row['name'];
      $_SESSION['USER_EMAIL'] = $row['email'];
      $_SESSION['USER_MOBILE'] = $row['mobile'];
      header("Location: sysAdmin.php");
     }

     else 
     {
        if ($num > 0) { 
          $row = mysqli_fetch_assoc($sql);
          $_SESSION['ID'] = $row['id'];
          $_SESSION['USER_NAME'] = $row['name'];
          $_SESSION['USER_EMAIL'] = $row['email'];
          $_SESSION['USER_MOBILE'] = $row['mobile'];
          header("Location: loggedInPage.php");
        }
        else
        {
            $msg1 = "No such record found in database !!";
            $msg2 = "Please re-enter credentials.";
        }
     }
  }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="./loginStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   


</head>
<body>

    <img src="./img/symbol.png" alt="" srcset="" id="image">
    
    <center>    
        <h1>HOSTEL LOGIN</h1>
    </center>

    <div class="container">

    <form action="login.php" method="post">
  <div class="formElt">
    <label for="eml">Email address</label>
    <input type="email" class="form-control" name="email" id="eml" aria-describedby="emailHelp" placeholder="Enter your registered email">
  </div>
  <div class="formElt">
    <label for="ps">Password</label>
    <input type="password" class="form-control" name="password" id="ps" placeholder="Password">
  </div>
  <div class="sbDiv">
      <button type="submit" class="btn btn-primary" id="sb" name="login" value="login">Login</button>
  </div>
  
    <div class="error">
      <?php echo $msg1?>
      <?php echo $msg2?>
    </div>
</form>


</div>


    
</body>
</html>