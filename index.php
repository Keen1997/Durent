<!--
  *
  * Index page (main page for this website)
  *
 -->

<?php
  require './db_connect.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!---------------------------------------------------------------------------------------------------------------->
    <title>Durent</title>
    <!---------------------------------------------------------------------------------------------------------------->
    <meta charset="utf-8">
    <!---------------------------------------------------------------------------------------------------------------->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---------------------------------------------------------------------------------------------------------------->
    <script src="./js/app.js" charset="utf-8"></script>
    <!---------------------------------------------------------------------------------------------------------------->
    <script src="./js/jQuery.js" charset="utf-8"></script>
    <!---------------------------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="./css/main.css">
    <!---------------------------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="./css/default.css">
    <!---------------------------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="./css/util.css">
    <!---------------------------------------------------------------------------------------------------------------->
    <link rel="icon" href="./assets/static/logo.png">
    <!---------------------------------------------------------------------------------------------------------------->
  </head>

  <body>

    <!-- Navigator on the top of all pages -->
    <nav>
      <?php require './components/navigator.php'; ?>
    </nav>

    <!-- Templates for each page and after form page -->
    <main>
      <?php
        $page = '';
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }
        // Signup / login component
        if ($page=='signup') require './components/signup.php';
        else if ($page=='login') require './components/login.php';
        else if ($page=='logout') require './components/logout.php';
        // Profile component
        else if ($page=='profile') require './components/profile.php';
        else if ($page=='addAddress') require './components/addAddress.php';
        else if ($page=='editAddress') require './components/editAddress.php';
        else if ($page=='editInfo') require './components/editInfo.php';
        // Rental component
        else if ($page=='find') require './components/find.php';
        else if ($page=='rentOut') require './components/rentOut.php';
        else if ($page=='itemDetail') require './components/itemDetail.php';
        else if ($page=='editItem') require './components/editItem.php';
        else if ($page=='confirmRent') require './components/confirmRent.php';
        // Staff and Admin component
        else if ($page=='staff') require './components/staff.php';
        else if ($page=='admin') require './components/admin.php';
        else if ($page=='staffLogin') require './components/staffLogin.php';
        else if ($page=='adminLogin') require './components/adminLogin.php';
        // Php logic
        else if ($page=='afterRentOut') require './php/afterRentOut.php';
        else if ($page=='afterRentItem') require './php/afterRentItem.php';
        else if ($page=='afterInfoEdit') require './php/afterInfoEdit.php';
        else if ($page=='afterAddressEdit') require './php/afterAddressEdit.php';
        else if ($page=='afterEditItem') require './php/afterEditItem.php';
        else if ($page=='afterDeleteItem') require './php/afterDeleteItem.php';
        // Waterfall component in homepage
        else if ($page=='about') require './components/about.php';
        else if ($page=='structure') require './components/structure.php';
        else require './components/waterfall.php';
      ?>
    </main>

    <!-- Footer on the bottom of all pages -->
    <footer>
      <?php require './components/footer.php'; ?>
    </footer>

  </body>
</html>
