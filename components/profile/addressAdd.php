<!--
  *
  * Signup address template
  *
 -->

 <style>
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
  <h2>Add your address</h2>
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
    <input type="submit" name="" value="Add">
  </form>
</div>
