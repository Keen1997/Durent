<!--
  *
  * Delete item logic
  *
 -->

<?php

if(!isset($_SESSION['email']) && !isset($_SESSION['customerID'])){
  echo "<script>
         window.location = './index.php'
       </script>";
} else {
  // Check id in query string
  if($_GET['id']){
    // Check customer is owner of item
    $sql = "SELECT customerID FROM item WHERE customerID=$_SESSION[customerID] AND itemID = $_GET[id]";
    $result=$con->query($sql);
    if($result && mysqli_num_rows($result)>0){
      // Delete item
      $sql = "DELETE FROM item
              WHERE itemID = $_GET[id]";
      $result=$con->query($sql);
      // Delete item image from database
      $sql = "DELETE FROM itemImage
              WHERE itemID = $_GET[id]";
      $result=$con->query($sql);
      // Delete image file
      $imgDir = './assets/non-static/productImages/'.$_GET['id'];
      array_map('unlink', glob("$imgDir/*.*"));
      rmdir($imgDir);
      // Return to profile
      echo "<script>
              alert('200 : You already delete')
              window.location = 'index.php?page=profile'
            </script>";
    } else {
      echo "<script>
              window.location = 'index.php'
            </script>";
    }
  } else {
    echo "<script>
            window.location = './index.php'
          </script>";
  }
}
