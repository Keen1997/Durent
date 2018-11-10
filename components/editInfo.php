<!--
  *
  * Basic profile template
  *
 -->

 <?php
   if(!isset($_SESSION['email']) && !isset($_SESSION['customerID'])){
     echo "<script>
            window.location = './index.php?page=login'
          </script>";
   }
 ?>

<script src="plugins/inputmark\jquery.inputmask.bundle.js"></script>

<link rel="stylesheet" href="plugins/intl-tel-input\intlTelInput.css">
<script src="plugins/intl-tel-input\intlTelInput.js"></script>
<script src="plugins/intl-tel-input\utils.js"></script>

<style>
  textarea{
    width: 100%;
  }
  .icon{
    display: inline-block;
    text-align: center;
    box-sizing: border-box;
    margin-bottom: 10px;
  }
  .payment{
    cursor: pointer;
    border: 2px solid transparent;
    border-radius: 10px;
    padding: 10px;
  }
  .payment:hover{
    box-shadow: 10px 10px 10px #F2F2F2;
  }
  #paymentType{
    margin-left: 75px;
    margin-right: -50px;
    float: left;
    margin-top: 30px;
    font-size: 14px;
  }
  #visa{
    width: 75px;
    margin-bottom: 15px;
  }
  #mastercard{
    width: 75px;
    margin-left: 25px;
    margin-right: 25px;
  }
  #paypal{
    width: 135px;
    margin-bottom: 15px;
  }
  .telContainer{
    border: 1px solid #E5E5E5;
    border-radius: 18px;
    text-align: left;
    padding-left: 12px;
    cursor: text;
  }
  .telContainer:hover{
    border-color: #CACACA;
  }
  @media (max-width:768px){
    .icon{
      display: block;
      width: 100%;
      margin-top: 0px;
      margin-bottom: 0px;
    }
    #paymentType{
      width: 100%;
      margin-left: 0px;
      margin-right: 0px;
      margin-bottom: 20px;
      margin-top: 10px;
      text-align: center;
    }
    #visa{
      width: 60px;
      margin-bottom: 0px;
    }
    #mastercard{
      width: 60px;
    }
    #paypal{
      width: 100px;
      margin-bottom: 15px;
    }
  }
</style>

<?php
  $customerID = $_SESSION['customerID'];

  $sql = "SELECT * FROM customer WHERE customerID='$customerID'";
  $result=$con->query($sql);
  while ($row = $result->fetch_assoc()) {
    $paymentType = $row['paymentType'];
?>

 <!-- Display form Signup -->
<div class="container formCenter">
  <h2>Edit your info</h2>
  <br>
  <form class="" action="index.php?page=afterInfoEdit" method="post">
    <input type="text" name="fname" value="<?php echo $row['fname']; ?>" placeholder="firstname">
    <br><br>
    <input type="text" name="lname" value="<?php echo $row['lname']; ?>" placeholder="lastname">
    <br><br>
    <div class="telContainer">
      <input style="border:none" name="tel" type="text" value="<?php echo $row['tel']; ?>" placeholder="telephone number">
    </div>
    <br><br>
    <textarea name="interest" rows="8" cols="80" value="<?php echo $row['interest']; ?>" placeholder="Discuss want do you interest to rent?"></textarea>
    <br><br>
    <input type="text" name="payment" value="<?php echo $row['payment']; ?>" placeholder="payment" id="code">
    <br><br>
    <label id="paymentType">Payment type : </label>
    <div class="icon">
      <img id="visa" class="payment" src="./assets/static/visa.png">
    </div
    ><div class="icon">
      <img id="mastercard" class="payment" src="./assets/static/mastercard.png">
    </div
    ><div class="icon">
      <img id="paypal" class="payment" src="./assets/static/paypal.png">
    </div>
    <input id="paymentTypeVal" type="hidden" name="paymentTypeVal" value="">
    <input type="submit" name="" value="Confirm">
  </form>
</div>

<?php
  }
?>

<script>
  $('#code').inputmask("9999-9999-9999-9999",{ "placeholder": "0000-0000-0000-0000" })

  $("input[name='tel']").intlTelInput({
    initialCountry: 'th'
  })

  $('.telContainer').click(function(){
    $("input[name='tel']").focus()
  })

  $("input[name='tel']").on('focusin', function() {
      $('.telContainer').css({'border-color' : '#8AF'})
  })
  .on('focusout', function(e) {
      $('.telContainer').css({'border-color' : '#E5E5E5'})
  })

  $('#visa').click(function(){
    $('#visa').css({'border-color' : '#8AF'})
    $('#mastercard').css({'border-color' : 'transparent'})
    $('#paypal').css({'border-color' : 'transparent'})
    $('#paymentTypeVal').val('visa')
  })

  $('#mastercard').click(function(){
    $('#visa').css({'border-color' : 'transparent'})
    $('#mastercard').css({'border-color' : '#8AF'})
    $('#paypal').css({'border-color' : 'transparent'})
    $('#paymentTypeVal').val('mastercard')
  })

  $('#paypal').click(function(){
    $('#visa').css({'border-color' : 'transparent'})
    $('#mastercard').css({'border-color' : 'transparent'})
    $('#paypal').css({'border-color' : '#8AF'})
    $('#paymentTypeVal').val('paypal')
  })
</script>

<?php
  if($paymentType == 'visa'){
    echo "<script>$('#visa').css({'border-color' : '#8AF'})</script>";
  } else if($paymentType == 'mastercard'){
    echo "<script>$('#mastercard').css({'border-color' : '#8AF'})</script>";
  } else if($paymentType == 'paypal'){
    echo "<script>$('#paypal').css({'border-color' : '#8AF'})</script>";
  }

  if(isset($_GET['focus'])){
    if($_GET['focus']=='name'){
      ?><script>$("input[name='fname']").focus()</script><?php
    }
    if($_GET['focus']=='tel'){
      ?><script>$("input[name='tel']").focus()</script><?php
    }
    if($_GET['focus']=='interest'){
      ?><script>$("textarea[name='interest']").focus()</script><?php
    }
    if($_GET['focus']=='payment'){
      ?><script>$("input[name='payment']").focus()</script><?php
    }
    if($_GET['focus']=='paymentType'){
      ?><script>window.scrollTo(0,500);</script><?php
    }
  }
?>
