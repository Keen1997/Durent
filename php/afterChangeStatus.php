<?php
  echo $_POST['status']."<br>";
  echo $_POST['id']."<br>";

  if(isset($_POST['id']) && isset($_POST['status']) && isset($_POST['page'])){
    $sql = "UPDATE item SET status='$_POST[status]' WHERE itemID=$_POST[id]";
    $result = $con->query($sql);
    if($result){
      echo "<script>window.location='index.php?page=$_POST[page]'</script>";
    }
  } else {
    echo "<script>window.location='index.php'</script>";
  }
