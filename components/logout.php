<?php
  unset($_SESSION['email']);
  if(isset($_SESSION['customerID'])) unset($_SESSION['customerID']);
  echo "<script>window.location = './index.php'</script>";
