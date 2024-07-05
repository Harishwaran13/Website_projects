<?php
include 'app/connect.php';

if(isset($_POST['user'])){
	$uname = $_POST['uname'];
    $upass = $_POST['upass'];
	$uemail = $_POST['uemail'];
	$eid = $_POST['userid'];
    $uaccess = $_POST['utype'];
	$umobile = $_POST['uphone'];
    $ulocation = $_POST['location'];

    $hashpass = password_hash($upass, PASSWORD_DEFAULT);
    
    $sql = " INSERT into admins (username,pass,email,employeeid,access_type,phone_num,location) values (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssis",$uname,$hashpass,$uemail,$eid,$uaccess,$umobile,$ulocation);
    $result=$stmt->execute();

    if($result){
        ?>
    	  <script type="text/javascript">
    	  	alert('User Added Succesfully');
    	  </script>
    	  <?php
    }
    else{
        ?>
        <script type="text/javascript">
            alert('Error in Adding');
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="NGO_Logo.svg" type="image/x-icon">
    <title>Oasis Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="projecthead.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
        <ul>
                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                            <img src="NGO_Logo.svg" alt="" width="100" height="100">
                        </span>
                    </a>
                </li>

                <li>
                    <a href="adminDashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <li class="hovered">
                    <a href="user.php">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="title">Add User</span>
                    </a>
                </li>

                <li>
                    <a href="assetTransfer.php">
                        <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Asset Transfer</span>
                    </a>
                </li>

                <li>
                    <a href="approveData.php">
                        <span class="icon">
                            <ion-icon name="analytics-outline"></ion-icon>
                        </span>
                        <span class="title">Approve Data</span>
                    </a>
                </li>

                <li>
                    <a href="adminBill.php">
                        <span class="icon">
                            <ion-icon name="newspaper-outline"></ion-icon>
                        </span>
                        <span class="title">Get Product Bill</span>
                    </a>
                </li>
                <li>
                    <a href="deleted_data.php">
                        <span class="icon">
                            <ion-icon name="newspaper-outline"></ion-icon>
                        </span>
                        <span class="title">Deleted Data</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="user2">
                <?php
                    session_start();
                    if($_SESSION['username']){
                    echo $_SESSION['username'];
                        }
                    else{
                        header('location:login.php');
                        }
			    ?>
                </div>
            </div>
            <div class="wrapper">
            <div class="title">
               User Details
              </div><br>
              <form method="post" action="user.php">
              <div class="form">
                 <div class="inputfield">
                    <label for="product">Username</label>
                    <input type="text" class="input" id="user" name="uname" required><small style="color: red;">*</small>
                 </div> 
                 <div class="inputfield">
                    <label for="product">Password</label>
                    <input type="password" class="input" id="pass" name="upass" required><small style="color: red;">*</small>
                 </div> 
                 <div class="inputfield">
                    <label for="product">Email</label>
                    <input type="email" class="input" id="user" name="uemail" required><small style="color: red;">*</small>
                 </div> 
                 <div class="inputfield">
                    <label for="product">Employee ID</label>
                    <input type="text" class="input" id="user" name="userid" required><small style="color: red;">*</small>
                 </div> 
          <div class="inputfield">
                <label for="cars">Access Type:</label>
              <select name="utype" id="utype" class="input">
               <option value="user">User</option>
               <option value="admin">Admin</option>
              </select><small style="color: red;">*</small><br><br>
          </div>
            <div class="inputfield">
                    <label for="phone">Phone Number</label>
                    <input type="tel" class="input" id="phone" name="uphone" pattern="[0-9]{10}" required><br><br>
            </div>
            <div class="inputfield">
                <label for="cars">Choose Location:</label>
              <select name="location" id="loc" class="input">
              <option value="none" selected disabled hidden>Select an Option</option>
               <option value="Nalasopara">Nalasopara</option>
               <option value="Kalwa">Kalwa</option>
               <option value="Bandra">Bandra</option>
               <option value="Kamathipura">Kamathipura</option>
               <option value="Grant Road">Grant Road</option>
              </select><small style="color: red;">*</small><br><br>
            </div>
                  <div class="inputfield">
                    <input name="user" type="submit" value="Add" class="btn">
                  </div>
                    </form>
                </div>
            </div>
        </div>     
    <!-- =========== Scripts =========  -->
    <script src="main.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>