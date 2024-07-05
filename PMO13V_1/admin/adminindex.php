<?php 


/*require_once('config/db.php');
$query = "select * from users";
$result = mysqli_query($con,$query);
*/

require_once '../connection.php';
//require_once 'config/functions.php';
session_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="coursedetails/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

  
   <style>
     @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

*{
    list-style: none;
    text-decoration: none;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif;
}

body{
    background: #f5f6fa;
}

.wrapper .sidebar{
    background: rgb(5, 68, 104);
    position: fixed;
    top: 0;
    left: 0;
    width: 220px;
    height: 100%;
    padding: 10px;
    transition: all 0.5s ease;
}


.wrapper .sidebar .profile{
    margin-bottom: 30px;
    text-align:left;
    background: blue;
    padding: 20px;
  
}

.wrapper .sidebar .profile img{
    display: block;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 0 auto;
}

.wrapper .sidebar .profile h3{
    color: #ffffff;
    margin: 20px 0 5px;
}

.wrapper .sidebar .profile p{
    color: rgb(206, 240, 253);
    font-size: 14px;
}
.wrapper .sidebar ul li a{
    display: block;
    padding: 13px 20px;
    border-bottom: 1px solid #10558d;
    color: rgb(241, 237, 237);
    font-size: 14px;
    position:center;
}

.wrapper .sidebar ul li a .icon{
    color: #dee4ec;
    width: 20px;
    display: inline-block;
}
.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
    color: #0c7db1;

    background:white;
    border-right: 2px solid rgb(5, 68, 104);
}

.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
    color: #0c7db1;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
    display: block;
}
</style>

<style>
table, th, td {
  border: 1px solid;
}
th, td {
  padding: 15px;
  text-align: left;
}
</style>

</head>
<body>

<div class="wrapper">
   
        <div class="sidebar">
     
             <div class="profile">
                <img src="https://1.bp.blogspot.com/-vhmWFWO2r8U/YLjr2A57toI/AAAAAAAACO4/0GBonlEZPmAiQW4uvkCTm5LvlJVd_-l_wCNcBGAsYHQ/s16000/team-1-2.jpg" alt="profile_picture">
                <h3><center>Ms Swetha</center></h3>
                <ul>
                    <li>
                        <a href="Dashboard.php" >
                            <span class="icon"><i class="fas fa-user-friends"></i></span>
                            <span class="item">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="Clients.php">
                            <span class="icon"><i class='fas fa-clipboard'></i></span>
                            <span class="item">Clients</span>
                        </a>
                    </li>
                    <li>
                        <a href="Tutorialview.php">
                            <span class="icon"><i class="fas fa-chart-line"></i></span>
                            <span class="item">Dashboard</span>
                        </a>
                    </li>
                      <li>
                        <a href="Mentor.php">
                            <span class="icon"><i class="fas fa-chart-line"></i></span>
                            <span class="item">Dashboard</span>
                        </a>
                    </li>
                </li>
                <li>
                  <a href="notifications/view.php">
                      <span class="icon"><i class="fas fa-chart-line"></i></span>
                      <span class="item">Dashboard</span>
                  </a>
              </li>
              </li>
                <li>
                  <a href="submission/index.php">
                      <span class="icon"><i class="fas fa-chart-line"></i></span>
                      <span class="item">Dashboard</span>
                  </a>
              </li>
              <li>
                <a href="logout.php" >
                    <span class="icon"><i class="fas fa-user-friends"></i></span>
                    <span class="item">log out</span>
                </a>
            </li>
           
                </ul>
        </div>
            
            </div>
        </div>

    </div>

    <div class="card mt-5">
        <div class="card-header">
            <br><br>
          <h2 class="display-8 text-center"><center>Welcome Admin</center></h2>
        </div>
    <div>
        <p align="right">
                <a href="../../index.html">Home</a>
        </p>
    </div>
    </div>

    -->
    
</body>
</html>