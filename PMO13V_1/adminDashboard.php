<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="NGO_Logo.svg" type="image/x-icon">
    <title>Oasis Admin Dashboard</title>
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
                    <a href="dashboard.php">
                        <span class="icon">
                            <img src="NGO_Logo.svg" alt="" width="100" height="100">
                        </span>
                    </a>
                </li>

                <li class="hovered">
                    <a href="adminDashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <li>
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
                <div class="user">
                    <div>
                        <?php
                        session_start();
                        if ($_SESSION['username']) {
                            echo "<p class='user-name'>" . $_SESSION['username'] . "</p>";
                        } else {
                            header('location:login.php');
                        }
                        ?>
                    </div>
                    <div>
                        <a href="logout.php">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            include 'app/connect.php';
                            $query = "select * from projecthead";
                            $result = mysqli_query($conn, $query);
                            if ($row = mysqli_num_rows($result)) {
                                echo $row;
                            } ?>
                        </div>
                        <div class="cardName">Project Heads</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            $query = "select * from vendor";
                            $result = mysqli_query($conn, $query);
                            if ($row = mysqli_num_rows($result)) {
                                echo $row;
                            } ?>
                        </div>
                        <div class="cardName">Vendors</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="home-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            $query = "select * from product";
                            $result = mysqli_query($conn, $query);
                            if ($row = mysqli_num_rows($result)) {
                                echo $row;
                            } ?>
                        </div>
                        <div class="cardName">Total Assets</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="bag-check-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            $query = "select sum(price*quantity) as total from product";
                            $result = mysqli_query($conn, $query);
                            if ($row = mysqli_fetch_array($result)) {
                                printf("₹ %d ", $row['total']);
                            } ?>
                        </div>
                        <div align="center" class="cardName">Total Cost</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Assets</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Prohect Head</td>
                                <td>Location</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "select * from product";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['product_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['price']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['project_head']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['location']; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="main.js"></script>

    <!-- ====== ionicons ======= -->
</body>

</html>