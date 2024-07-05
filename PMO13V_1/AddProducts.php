<?php
include 'app/connect.php';
session_start();
if (isset($_POST['productdetails'])) {
    $pname = $_POST['pname'];
    $productid = $_POST['productid'];
    $voucher = $_POST['vouchercode'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $depvalue = $_POST['depvalue'];
    $user=$_SESSION['username'];
    $vendor = $_POST['vendor'];
    $location = $_POST['location'];
    $projhead = $_POST['projhead'];
    $ledger = $_POST['ledger'];
    $assetcode = $_POST['assetcode'];
    $description = $_POST['description'];
    $remark = $_POST['remark'];
    $purdate = $_POST['purdate'];
    $warrdate = $_POST['warrdate'];

    $pdf1 = $_FILES['billpdf']['name'];
    $pdf2 = $_FILES['warrpdf']['name'];

    $pdf1_type = $_FILES['billpdf']['type'];
    $pdf2_type = $_FILES['warrpdf']['type'];

    $pdf1_size = $_FILES['billpdf']['size'];
    $pdf2_size = $_FILES['warrpdf']['size'];

    $pdf1_tem_loc = $_FILES['billpdf']['tmp_name'];
    $pdf2_tem_loc = $_FILES['warrpdf']['tmp_name'];

    $pdf1_store = "files_folder/" . $pdf1;
    $pdf2_store = "files_folder/" . $pdf2;

    move_uploaded_file($pdf1_tem_loc, $pdf1_store);
    move_uploaded_file($pdf2_tem_loc, $pdf2_store);

    $sql = " INSERT into product (product_name,productid,voucher_code,price,quantity,depvalue,user,vendor,location,project_head,ledger,asset_code,description,remark,pur_date,warr_date,billpdf,warrpdf) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisdidssssssssssss", $pname, $productid, $voucher, $price, $quantity, $depvalue,$user, $vendor, $location, $projhead, $ledger,$assetcode, $description, $remark, $purdate, $warrdate, $pdf1, $pdf2);
    $result = $stmt->execute();

    if ($result) {
        ?>
        <script type="text/javascript">
            alert('Product Added Succesfully');
        </script>
        <?php
    } else {
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
    <title>Add Product</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="pstyles.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                            <img src="NGO_Logo.svg" alt="" width="100" height="100"></span>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <li>
                    <a href="ProjectHead.php">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="title">Add Project Head</span>
                    </a>
                </li>

                <li>
                    <a href="accounts.php">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Add Accounts Ledger</span>
                    </a>
                </li>

                <li>
                    <a href="Vendor.php">
                        <span class="icon">
                            <ion-icon name="add-outline"></ion-icon>
                        </span>
                        <span class="title">Add Vendor Details</span>
                    </a>
                </li>

                <li class="hovered">
                    <a href="AddProducts.php">
                        <span class="icon">
                            <ion-icon name="bag-add-outline"></ion-icon>
                        </span>
                        <span class="title">Add Products</span>
                    </a>
                </li>

                <li>
                    <a href="disposeData.php">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="title">Add Disposal Data</span>
                    </a>
                </li>

                <li>
                    <a href="bill.php">
                        <span class="icon">
                            <ion-icon name="newspaper-outline"></ion-icon>
                        </span>
                        <span class="title">Get Product Bill</span>
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
                    
                    if ($_SESSION['username']) {
                        echo $_SESSION['username'];
                    } else {
                        header('location:login.php');
                    }
                    ?>
                </div>
            </div>
            <div class="wrapper">
                <div class="title">
                    Product Details
                </div><br>
                <form method="post" action="AddProducts.php" enctype="multipart/form-data">
                    <div class="form">
                        <div class="inputfield">
                            <label for="product">Product Name</label>
                            <input type="text" class="input" id="product" name="pname" required><small
                                style="color: red;">*</small>
                        </div>
                        <div class="inputfield">
                            <label for="id">Product ID</label>
                            <input type="text" class="input" id="id" name="productid" required><small
                                style="color: red;">*</small>
                        </div>
                        <div class="inputfield">
                            <label for="id">Voucher Code</label>
                            <input type="text" class="input" id="vouchercode" name="vouchercode" required><small
                                style="color: red;">*</small>
                        </div>
                            <div class="inputfield">
                                <label for="head">Choose Project Head:</label>

                                <select name="projhead" id="head" class="input">
                                    <option value="none" selected disabled hidden>Select an Option</option>
                                    <?php
                                    $loc = $_SESSION['location'];
                                    $query = "select * from projecthead where location='$loc'";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <option value="<?php echo $row['headname']; ?>">
                                            <?php echo $row['headname']; ?>
                                        </option>
                                    <?php } ?>
                                </select><small style="color: red;">*</small><br><br>
                            </div>
                        <div class="inputfield">
                            <label for="price">Price</label>
                            <input type="text" class="input" id="price" name="price" placeholder="in Rupees"
                                required><small style="color: red;">*</small>
                        </div>
                        <div class="inputfield">
                            <label for="quantity">Quantity</label>
                            <input type="tel" class="input" id="phone" name="quantity" required><br><br><small
                                style="color: red;">*</small>
                        </div>
                        <div class="inputfield">
                            <label for="price">Depriciation Value</label>
                            <input type="text" class="input" id="depvalue" name="depvalue" placeholder="in Rupees"
                                required><small style="color: red;">*</small>
                        </div>
                        <div class="inputfield">
                            <label for="cars">Choose Vendor:</label>

                            <select name="vendor" id="vendor" class="input">
                                <option value="none" selected disabled hidden>Select an Option</option>
                                <?php
                                $loc = $_SESSION['location'];
                                $query = "select * from vendor where location='$loc'";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['vendorname']; ?>">
                                        <?php echo $row['vendorname']; ?>
                                    </option>
                                <?php } ?>
                            </select><small style="color: red;">*</small><br><br>
                        </div>

                        <div class="inputfield">
                            <label for="cars">Choose Location:</label>
                            <select name="location" id="loc" class="input">
                                <option value="none" selected disabled hidden>Select an Option</option>
                                <option value="<?php echo $_SESSION['location']; ?>"><?php echo $_SESSION['location']; ?></option>
                            </select><small style="color: red;">*</small><br><br>
                        </div>

                        <div class="inputfield">
                            <label for="ledger">Choose Ledger:</label>

                            <select name="ledger" id="ledger" class="input">
                                    <option value="none" selected disabled hidden>Select an Option</option>
                                    <?php
                                    $loc = $_SESSION['location'];
                                    $query = "select * from accountsledger where location='$loc'";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <option value="<?php echo $row['account_ledger']; ?>">
                                            <?php echo $row['account_ledger']; ?>
                                        </option>
                                    <?php } ?>
                                </select><small style="color: red;">*</small><br><br>
                        </div>

                        <div class="inputfield">
                            <label for="disc">Asset Code</label>
                            <input type="text" class="input" id="asset" name="assetcode" required><small style="color: red;">*</small><br><br>
                        </div>

                        <div class="inputfield">
                            <label for="disc">Discription</label>
                            <input type="text" class="input" id="disc" name="description" required>
                        </div>

                        <div class="inputfield">
                            <label for="remark">Remark</label>
                            <input type="text" class="input" id="remark" name="remark" required>
                        </div>

                        <div class="inputfield">
                            <label>Purchase Date</label>
                            <input name="purdate" type="date" class="input" required><small
                                style="color: red;">*</small>
                        </div>
                        <div class="inputfield">
                            <label>Warrant Expiry</label>
                            <input type="date" class="input" name="warrdate" required><small
                                style="color: red;">*</small>
                        </div>

                        <div class="inputfield">
                            <label>Bill document</label>
                            <input name="billpdf" type="file" id="real-file1" hidden="hidden" required><small
                                style="color: red;">*</small>
                            <button type="button" id="custom-button1">CHOOSE A FILE</button>&nbsp;
                            <span id="custom-text1">No file chosen</span>
                        </div>
                        <script>const realFileBtn = document.getElementById("real-file1");
                            const customBtn = document.getElementById("custom-button1");
                            const customTxt = document.getElementById("custom-text1");

                            customBtn.addEventListener("click", function () {
                                realFileBtn.click();
                            });

                            realFileBtn.addEventListener("change", function () {
                                if (realFileBtn.value) {
                                    customTxt.innerHTML = realFileBtn.value.match(
                                        /[\/\\]([\w\d\s\.\-\(\)]+)$/
                                    )[1];
                                } else {
                                    customTxt.innerHTML = "No file chosen, yet.";
                                }
                            });

                        </script><br>

                        <div class="inputfield">
                            <label>Warranty document</label>
                            <input name="warrpdf" type="file" id="real-file2" hidden="hidden" required><small
                                style="color: red;">*</small>
                            <button type="button" id="custom-button2">CHOOSE A FILE</button>&nbsp;
                            <span id="custom-text2">No file chosen</span>
                        </div>
                        <script>const realFileBtnW = document.getElementById("real-file2");
                            const customBtnW = document.getElementById("custom-button2");
                            const customTxtW = document.getElementById("custom-text2");

                            customBtnW.addEventListener("click", function () {
                                realFileBtnW.click();
                            });

                            realFileBtnW.addEventListener("change", function () {
                                if (realFileBtnW.value) {
                                    customTxtW.innerHTML = realFileBtnW.value.match(
                                        /[\/\\]([\w\d\s\.\-\(\)]+)$/
                                    )[1];
                                } else {
                                    customTxtW.innerHTML = "No file chosen, yet.";
                                }
                            });

                        </script><br>

                        <div class="inputfield">
                            <input name="productdetails" type="submit" value="Add" class="btn">
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