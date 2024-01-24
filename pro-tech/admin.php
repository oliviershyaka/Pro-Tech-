<?php
session_start();
include("include/connect.php");

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Set default admin credentials
    $defaultUsername = "admin1";
    $defaultPassword = "admin123"; 

    if ($username == $defaultUsername && $password == $defaultPassword) {
        // Check the database for the provided username and password
        $query = "select * from accounts where username='$username' and password='$password'";
        $result = mysqli_query($con, $query);

        // If there is a match in the database
        if (mysqli_num_rows($result) > 0) {
            // Grant access to the admin panel
            echo "<script> window.open('inventory.php', '_blank') </script>";
        } else {
            // If no match found, show an error message
            echo "<script> alert('Wrong credentials') </script>";
        }
    } else {
        // If the submitted username or password is incorrect, show an error message
        echo "<script> alert('Wrong credentials') </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pro-Tech</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="style.css" />

</head>

<body>
    <section id="header">
        <!-- <a href="index.php"><img src="img/logo.png" class="logo" alt="" /></a> -->
        <b>Pro-Tech</b>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>

                <?php

        if ($_SESSION['aid'] < 0) {
          echo "   <li><a href='login.php'>login</a></li>
            <li><a href='signup.php'>SignUp</a></li>
            ";
        } else {
          echo "   <li><a href='profile.php'>profile</a></li>
          ";
        }
        ?>
                <li><a class="active" href="admin.php">Admin</a></li>
                <li id="lg-bag">
                    <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
                </li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>


    <form method="post" id="form">
        <h3 style="color: darkred; margin: auto"></h3>
        <input class="input1" id="user" name="username" type="text" placeholder="Username *">
        <input class="input1" id="pass" name="password" type="password" placeholder="Password *">
        <button type="submit" class="btn" name="submit">login</button>

    </form>


    <footer class="section-p1">
        <div class="col">
            <!-- <img class="logo" src="img/logo.png" /> -->
            <b>Pro-Tech</b>
            
            <h4>Contact</h4>
            <p>
                <strong>Address: </strong> Ngarama Rwanda

            </p>
            <p>
                <strong>Phone: </strong> 0786493966
            </p>
            <p>
                <strong>Hours: </strong> 9am-5pm
            </p>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="cart.php">View Cart</a>
            <a href="wishlist.php">My Wishlist</a>
        </div>
        <div class="col install">
            <p>Secured Payment Gateways</p>
            <img src="img/pay/pay.png" />
        </div>
        <div class="copyright">
            <p>2024. Pro-Tech. </p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>
