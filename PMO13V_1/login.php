<?php

    include('App/connect.php');
 
  
    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        session_start();
        
      

        #$sql = "select * from login where username = '$username' and password = '$password'";
        #$sql = "select * from tbl_register where email = '$username' and password = '$password'";
        $sql="SELECT username,pass,email,access_type,location from admins where username = '$username'and pass = '$password'";

        $result = mysqli_query($conn,$sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
       // if($count == 1){  
         //   header("Location: welcome.php");
        //}  
         if($row["access_type"]== "user"){ 
            $_SESSION['username'] = $row["username"];
            $_SESSION['location'] = $row["location"];
                header('location: dashboard1.php');
            
        } 

        if($row["access_type"]== "admin"){  
            $_SESSION['username'] = $row["username"];
            $_SESSION['location'] = $row["location"];
                header('location: adminDashboard1.php');
         }  
         if($row["usertype"]== "admin"){  
            $_SESSION['una'] = $username;  
            
            header("Location: Admin/admin/index.php");
         }   
         if($row["usertype"]== "parent"){  
            header("Location: Parent/parent/parentindex.html");
         }  
        else{  
            echo  '<script>
                        window.location.href = "index.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
    ?>