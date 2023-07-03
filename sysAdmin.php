<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Admin Page</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Lobster+Two&family=Maven+Pro&family=Orbitron&family=Righteous&family=Special+Elite&display=swap');
          *
          {
             font-family: 'Orbitron', sans-serif;
          }
    </style>
    <link rel="stylesheet" href="sysAdminStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button class="btn btn-primary" id="addUserBtn"><a href="./addUser.php" class="text-light">Add User</a></button>
                    </li>   
                    <li class="nav-item">
                        <h3 id="lgt"><a href="logout.php">Logout</a></h3>
                </li>
            </ul>
        </div>
    </nav>
    
<div class="container">

  <table class="table">
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">UserName</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>

  <tbody>

    <?php

      $conn = mysqli_connect("localhost", "root", "", "project_dbs");

      if (!$conn) {
        die(mysqli_error($conn));
      }

      $sql = "select * from `gcethostel`";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        while ($row=mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $name = $row['name'];
          $email = $row['email'];
          $mobile = $row['mobile']; 
          $password = $row['password'];

          echo '
          
          <tr>
            <th scope="row">'.$id.'</th>
            <td>'.$name.'</td>
            <td>'.$email.'</td>
            <td>'.$mobile.'</td>
            <td>'.$password.'</td>
            <td>
              <button class="btn btn-outline-warning"><a href="update.php?updateid='.$id.'" class="text-dark">Update</a></button>
              <button class="btn btn-outline-danger"><a href="delete.php?deleteid='.$id.'" class="text-dark">Delete</a></button>
              </td>
              </tr>
          ';
        }

      }
    
    
    ?>

    



  </tbody>
  
</table>

</div>



    
</body>
</html>