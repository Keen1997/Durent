<!--
  *
  * Add address template
  *
 -->

 <?php
   if(!isset($_SESSION['email']) && !isset($_SESSION['customerID'])){
     echo "<script>
            window.location = './index.php?page=login'
          </script>";
   }
 ?>

 <style>
  #map{
   width: 100%;
   border-radius: 20px;
   margin-top: 20px;
  }
  @media (max-width:768px) {
    .formCenter{
      padding: 0px;
      width: 100%;
    }
    .formCenter input{
      width: 400px;
      margin: auto;
    }
    #map{
      width: 100%;
      border-radius: 6px;
    }
  }
  @media (max-width:576px) {
    .formCenter input{
      width: 325px;
      margin: auto;
    }
  }
 </style>

 <!-- Display form Signup -->
<div class="container formCenter">
  <h2>Add your address</h2>
  <br>
  <form class="" action="index.php?page=addAddress" method="post" onsubmit="return checkForm()">
    <input type="text" name="name" placeholder="name *">
    <br><br>
    <input type="text" name="houseNo" placeholder="้house no *">
    <br><br>
    <input type="text" name="subStreet" placeholder="sub street">
    <br><br>
    <input type="text" name="street" placeholder="street *">
    <br><br>
    <input type="text" name="subDistrict" placeholder="sub district">
    <br><br>
    <input type="text" name="district" placeholder="district *">
    <br><br>
    <input type="text" name="province" placeholder="province *">
    <br><br>
    <input type="number" name="zipcode" placeholder="ZIP code *">
    <div id="map" style="height:400px"></div>
    <br><br>
    <input type="submit" name="add" value="Add">
  </form>
</div>

<script>
  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 8
    })
  }

  // Validate form format in client side
  function checkForm(){
    let pass = true

    $("input[name='houseNo']").css({'border-color' : '#E5E5E5'})
    $("input[name='street']").css({'border-color' : '#E5E5E5'})
    $("input[name='district']").css({'border-color' : '#E5E5E5'})
    $("input[name='province']").css({'border-color' : '#E5E5E5'})
    $("input[name='zipcode']").css({'border-color' : '#E5E5E5'})

    if(!$("input[name='name']").val()){
      $("input[name='name']").css({'border-color' : '#F9B'})
      pass = false
    }

    if(!$("input[name='houseNo']").val()){
      $("input[name='houseNo']").css({'border-color' : '#F9B'})
      pass = false
    }

    if(!$("input[name='street']").val()){
      $("input[name='street']").css({'border-color' : '#F9B'})
      pass = false
    }

    if(!$("input[name='district']").val()){
      $("input[name='district']").css({'border-color' : '#F9B'})
      pass = false
    }

    if(!$("input[name='province']").val()){
      $("input[name='province']").css({'border-color' : '#F9B'})
      pass = false
    }

    if(!$("input[name='zipcode']").val()){
      $("input[name='zipcode']").css({'border-color' : '#F9B'})
      pass = false
    }

    return pass
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXrbSh7c1Je4sw4yx6hIzHG9d1HTTEXFc&callback=initMap" async defer></script>

<?php
  if(isset($_POST['add'])){

    if(isset($_POST['name'])) $name = $_POST['name'];
    if(isset($_POST['houseNo'])) $houseNo = $_POST['houseNo'];
    if(isset($_POST['subStreet'])) $subStreet = $_POST['subStreet'];
    if(isset($_POST['street'])) $street = $_POST['street'];
    if(isset($_POST['subDistrict'])) $subDistrict = $_POST['subDistrict'];
    if(isset($_POST['district'])) $district = $_POST['district'];
    if(isset($_POST['province'])) $province = $_POST['province'];
    if(isset($_POST['zipcode'])) $zipcode = $_POST['zipcode'];

    if( !$name ||
        !$houseNo ||
        !$street||
        !$district ||
        !$province ||
        !$zipcode ) {
          $format = false;
        } else {
          $format = true;
        }

    // If format invalid, return to signup page with error message
    if(!$format){
      echo "<script>
              alert('400 : Some error happen')
              alert('Cannot add address -.-')
              window.location = 'index.php?page=addAddress'
            </script>";
    } else {
      $customerID = $_SESSION['customerID'];
      $sql = "INSERT INTO address (name, houseNo, subStreet, street, subDistrict, district, province, zipcode, customerID)
              VALUES ('$name', '$houseNo', '$subStreet', '$street', '$subDistrict', '$district', '$province', '$zipcode', '$customerID')";
      $result=$con->query($sql);
      if(!$result){
        echo "<script>
                alert('500 : Some error happen')
                alert('Cannot add address -.-')
                window.location = 'index.php?page=addAddress'
              </script>";
      } else {
        echo "<script>
                alert('200 : Add address success ^^')
                window.location = './index.php?page=profile'
              </script>";
      }
    }
  }
?>
