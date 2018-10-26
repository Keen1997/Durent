<!--
  *
  * Signup address template
  *
 -->

 <style>
  #map {
    border-radius: 20px;
    margin-top: 20px;
    height: 100%;
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
  <h2>Edit your address</h2>
  <br>
  <form class="" action="index.php?afterAddressEdit" method="post">
    <input type="number" name="" value="" placeholder="้house no">
    <br><br>
    <input type="text" name="" value="" placeholder="sub street">
    <br><br>
    <input type="text" name="" value="" placeholder="street">
    <br><br>
    <input type="text" name="" value="" placeholder="sub district">
    <br><br>
    <input type="text" name="" value="" placeholder="district">
    <br><br>
    <input type="text" name="" value="" placeholder="province">
    <br><br>
    <input type="number" name="" value="" placeholder="ZIP code">
    <br><br>
    <input type="submit" name="" value="Confirm">
  </form>
  <div id="map" style="height:400px;"></div>

</div>

<script>
  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 8
    })
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXrbSh7c1Je4sw4yx6hIzHG9d1HTTEXFc&callback=initMap" async defer></script>
