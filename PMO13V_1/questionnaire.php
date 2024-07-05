<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="NGO_Logo.svg" type="image/x-icon">
    <title>Dashboard1</title>
    <!-- ======= Styles ====== -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="projecthead.css">
</head>
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="dashboard1.php">
                        
                        <img id=logo src="img/logo.jpg"  alt="" width="100" height="90" >
                        
                    </a>
                </li>
       
                <li>
                    <a href="dashboard1.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="ProjectHead.php"> 
                        <span class="icon">
                            <ion-icon name="add-outline"></ion-icon>
                        </span>
                        <span class="title">Add Projects</span>
                    </a>
                </li>

                
                <li>
                    <a href="Vendor.php">
                        <span class="icon">
                            <ion-icon name="duplicate-outline"></ion-icon>
                        </span>
                        <span class="title">Add Project Details</span>
                    </a>
                </li>

                <li>
                    <a href="AddProducts.php">
                        <span class="icon">
                            <ion-icon name="checkbox-outline"></ion-icon>
                        </span>
                        <span class="title">Checklist</span>
                    </a>
                </li>


                <li class="hovered">
                    <a href="questionnaire.php">
                        <span class="icon">
                            <ion-icon name="document-outline"></ion-icon>
                        </span>
                        <span class="title">Questionnaire</span>
                    </a>
                    
                </li>
          
                
                            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="user">
                    <div>
                        <?php
                        session_start();
                        
                        if ($_SESSION['username']) {
                            echo "<p class='user-name'>".$_SESSION['username']."</p>";
                        } else {
                            header('location:login.php');
                        }
                        ?>
                    </div>
                    <div class=logout>
                        <a href="logout.php">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>
            <div class="wrapper">
            <div class="title">
               Questionnaire
              </div><br>
              <form method="post" action="user.php">
              <div class="form">
                 <div class="inputfield">
                    <label for="product">Organisation Name</label>
                    <input type="text" class="input" id="user" name="uname" required><small style="color: red;">*</small>&nbsp&nbsp&nbsp&nbsp
                    <label for="product">Baseline Year</label><br><br><br><br>
                    <input type="password" class="input" id="pass" name="upass" required><small style="color: red;">*</small>
                 </div> 
                 
                 <div class="inputfield">
                    <label for="product">Total Production</label>
                    <input type="email" class="input" id="user" name="uemail" required><small style="color: red;">*</small>&nbsp&nbsp&nbsp&nbsp
                    <label for="product">Total Revenue</label>
                    <input type="text" class="input" id="user" name="userid" required><small style="color: red;">*</small>
                 </div> 
                 <div class="title1">
               Fuel Combustion in plants
              </div><br>
                <div class="inputfield">
                <label for="cars">Fuel Type:</label>
              <select name="utype" id="utype" class="input">
               <option value="user">Fuel 1</option>
               <option value="admin">Fuel 2</option>
               <option value="admin">Fuel 3</option>

              </select><small style="color: red;">*</small><br><br>&nbsp&nbsp&nbsp&nbsp

              <label for="cars">Fuel Name</label>
              <select name="utype" id="utype" class="input">
               <option value="user">Diesel</option>
                <option value="admin">Petrol Garden - Equipements</option>
                <option value="admin">Petrol - Cleaning</option>



              </select><small style="color: red;">*</small>
                    </div>
              
              <div class="inputfield">
              <label for="phone">Quantity</label>
                    <input type="tel" class="input" id="phone" name="uphone" pattern="[0-9]{10}" required><br><br>
                    &nbsp&nbsp&nbsp&nbsp
                    <label for="cars">Unit</label>
                    <select name="utype" id="utype" class="input">
                <option value="admin">KL</option>
                <option value="admin">MT</option>
              </select><small style="color: red;">*</small>
                    
         </div>
         <div class="title1">
               Company Owned Vehicle
              </div><br>
         <div class="inputfield">
                <label for="cars"> Vehicle</label>
              <select name="utype" id="utype" class="input">
               <option value="user">Type 1</option>
               <option value="admin">Type 2</option>
               <option value="admin">Type 3</option>

              </select><small style="color: red;">*</small>
              &nbsp&nbsp&nbsp&nbsp
              <label for="cars">Fuel Name</label>
              <select name="utype" id="utype" class="input">
               <option value="user">Diesel</option>
                <option value="admin">Petrol</option>
                
                
              </select><small style="color: red;">*</small>
              </div>
              <div class="inputfield">
              <label for="phone">Quantity</label>
                    <input type="tel" class="input" id="phone" name="uphone" pattern="[0-9]{10}" required><br><br>
                    &nbsp&nbsp&nbsp&nbsp
                    <label for="cars">Unit</label>
                    <select name="utype" id="utype" class="input">
                <option value="admin">KL</option>
                <option value="admin">MT</option>
              </select><small style="color: red;">*</small>

         </div>


            <div class="inputfield">
                    <label for="phone">Phone Number</label>
                    <input type="tel" class="input" id="phone" name="uphone" pattern="[0-9]{10}" required><br><br>
                    &nbsp&nbsp&nbsp&nbsp
                <label for="cars">Choose Location:</label>
              <select name="location" id="loc" class="input">
              <option value="none" selected disabled hidden>Select an Option</option>
               <option value="Nalasopara">Nalasopara</option>
               <option value="Kalwa">Kalwa</option>
               <option value="Bandra">Bandra</option>
               <option value="Kamathipura">Kamathipura</option>
               <option value="Grant Road">Grant Road</option>
              </select><small style="color: red;">*</small><br><br>
            </div><br>
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
