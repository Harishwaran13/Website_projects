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
       
                <li class="hovered">
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
                        <span class="title">Add Clients</span>
                    </a>
                </li>

                
                <li>
                    <a href="Vendor.php">
                        <span class="icon">
                            <ion-icon name="duplicate-outline"></ion-icon>
                        </span>
                        <span class="title">Add Projects</span>
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


                <li>
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

        <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            include 'app/connect.php';
                            $loc = $_SESSION['location'];
                            $query = "select * from projecthead where location='$loc'";
                            $result = mysqli_query($conn, $query);
                            if ($row = mysqli_num_rows($result)) {
                                echo $row;
                            } ?>
                        </div>
                        <div class="cardName">Add Client</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="add-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            $loc = $_SESSION['location'];
                            $query = "select * from vendor where location='$loc'";
                            $result = mysqli_query($conn, $query);
                            if ($row = mysqli_num_rows($result)) {
                                echo $row;
                            } ?>
                        </div>
                        <div class="cardName">Add Project</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="duplicate-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            #echo  $_SESSION['location'];
                            #$loc = $_SESSION['location'];
                            #$query = "select * from product where location = '$loc'";
                            #$result = mysqli_query($conn, $query);
                            #if ($row = mysqli_num_rows($result)) {
                                #   echo $row;
                            #} ?>
                        </div>
                        <div class="cardName">Checklist</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="checkbox-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                           # $loc = $_SESSION['location'];
                            #$query = "select sum(price*quantity) as total from product where location = '$loc'";
                            #$result = mysqli_query($conn, $query);
                            #if ($row = mysqli_fetch_array($result)) {
                             #   printf("₹ %d ", $row['total']);
                            #} ?>
                        </div>
                        <div class="cardName">Questionnaire</div>
                    </div>
                    <div class="iconBx">
                    <ion-icon name="document-outline"></ion-icon>
                    </div>
                </div>
            </div> 
        </div>               
    </div> 
    <script src="main.js"></script>
</body>
</html>