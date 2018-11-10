<?php

  if(isset($_POST['dateFrom']) && isset($_POST['dateTo']) && isset($_POST['address'])){
  //   $sql = "INSERT INTO rental (itemID, dateFrom, dateTo, status, customerID, addressID, staffID)
  //           VALUES ('$_GET[id]', '$_POST[dateFrom]', '$_POST[dateTo]', 'checking', '$_SESSION[customerID]', '$_POST[address]', 1)";
  //   $result = $con -> query($sql);
  //   if($result){
  //     echo "<script>
  //             alert('you are already rent ^^')
  //             window.location = './index.php?page=find'
  //           </script>";
  //   }
    echo $_POST['dateFrom'];
  }


?>
