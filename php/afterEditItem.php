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
  if(isset($_GET['id'])){
    $sql = "UPDATE item SET title='$_POST[title]', category='$_POST[category]', subCategory='$_POST[subCategory]',
                            description='$_POST[desc]', dateFrom='$_POST[dateFrom]', dateTo='$_POST[dateTo]', price='$_POST[price]'
            WHERE customerID=$_SESSION[customerID] AND itemID = $_GET[id]";
    $result = $con->query($sql);
    if($result && mysqli_num_rows($result)>0){
      echo "<script>
              alert('200 : you are already edit your item ^^')
              window.location = './index.php?page=profile'
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
