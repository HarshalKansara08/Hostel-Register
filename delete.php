<?php

    $conn = mysqli_connect("localhost", "root", "", "project_dbs");

    if (!$conn)
    {
         die(mysqli_error($conn));
        }       
        

    if (isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];

        if ($id == 1) {
            header("Location: sysAdmin.php");
        }
        else
        {   
            $sql = "delete from `gcethostel` where id=$id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location:sysAdmin.php");
            }
            else
            {
                die(mysqli_error($conn));
            }
        }
        
    }






?>