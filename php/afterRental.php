<?php
  if(isset($_FILES['images'])){
    $name_img = $_FILES['images']['name'];
    $tmp_name_img = $_FILES['images']['tmp_name'];
    $size_img = $_FILES['images']['size'];
    for($i = 0; $i < count($tmp_name_img); $i++){

      if(!$size_img[$i] == 0){
        // if(move_upload_file($tmp_name_img[$i],))
        echo $name_img[$i]."<br>";
      }

    }
  }
  if(isset($_POST['category'])){
    echo $_POST['category'];
  }
?>
