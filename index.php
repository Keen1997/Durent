<!--
  *
  * Index page (main page for this website)
  *
 -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!---------------------------------------------------------------------------------------------------------------->
    <title>Durent</title>
    <!---------------------------------------------------------------------------------------------------------------->
    <meta charset="utf-8">
    <!---------------------------------------------------------------------------------------------------------------->
    <meta http-equiv="Cache-Control" content="no-cache, no-store">
    <!---------------------------------------------------------------------------------------------------------------->
    <meta http-equiv="Pragma" content="no-cache">
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

    <!-- Templates for each page -->
    <main>
      <?php
        if (isset($_GET['signup'])) require './components/signup.php';
        else if (isset($_GET['addressEdit'])) require './components/profile/addressEdit.php';
        else if (isset($_GET['basicDataEdit'])) require './components/profile/basicDataEdit.php';
        else if (isset($_GET['afterAddressEdit'])) require './components/profile/afterAddressEdit.php';
        else if (isset($_GET['afterBasicDataEdit'])) require './components/profile/afterBasicDataEdit.php';
        else if (isset($_GET['login'])) require './components/login.php';
        else if (isset($_GET['afterSignup'])) require './components/afterSignup.php';
        else if (isset($_GET['afterLogin'])) require './components/afterLogin.php';
        else if (isset($_GET['find'])) require './components/find.php';
        else if (isset($_GET['rentOut'])) require './components/rentOut/rentOut.php';
        else if (isset($_GET['afterRental'])) require './components/afterRental.php';
        else if (isset($_GET['detailItem'])) require './components/detailItem.php';
        else if (isset($_GET['confirmRent'])) require './components/confirmRent.php';
        else require './components/waterfall.php';
      ?>
    </main>

    <!-- Footer on the bottom of all pages -->
    <footer>
      <?php require './components/footer.php'; ?>
    </footer>

  </body>
</html>
