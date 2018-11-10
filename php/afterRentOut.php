<?php

  if(isset($_POST['title'])){
    $title = $_POST['title'];
  }
  if(isset($_POST['category'])){
    $category = $_POST['category'];
  }
  if(isset($_POST['subCategory'])){
    $subCategory = $_POST['subCategory'];
  } else {
    $subCategory = '';
  }
  if(isset($_POST['desc'])){
    $desc = $_POST['desc'];
  }
  if(isset($_POST['dateFrom'])){
    $dateFrom = $_POST['dateFrom'];
  }
  if(isset($_POST['dateTo'])){
    $dateTo = $_POST['dateTo'];
  }
  if(isset($_POST['price'])){
    $price = $_POST['price'];
  }

  $customerID = $_SESSION['customerID'];
  $sql = "INSERT INTO item (title, category, subCategory, description, dateFrom, dateTo, price, customerID)
          VALUES ('$title', '$category', '$subCategory', '$desc', '$dateFrom', '$dateTo', '$price', '$customerID')";
  $result = $con->query($sql);
  if($result){

    $itemID = $con->insert_id;

    $name_img = $_FILES['images']['name'];
    $tmp_name_img = $_FILES['images']['tmp_name'];
    $size_img = $_FILES['images']['size'];
    $keepImgName = 1;
    $imgDir = './assets/non-static/productImages/'.$itemID;

    if (!file_exists($imgDir)) {
      mkdir($imgDir, 0777, true);
    }
    for($i = 0; $i < count($tmp_name_img); $i++){
      if(!$size_img[$i] == 0){
        $imgPath = $imgDir."/(".$keepImgName.")".$name_img[$i];
        if(move_uploaded_file($tmp_name_img[$i],$imgPath)){
          $keepImgName += 1;
          $sql = "INSERT INTO itemImage (imageSrc, itemID)
                  VALUES ('$imgPath', $itemID)";
          $result = $con->query($sql);
        }
      }
      echo "<script>
              alert('200 : thank fot rent item ^^')
              window.location = './index.php'
            </script>";
    }
  } else {
    echo $con->error;
  }



?>
