<!--
  *
  * Profile page
  *
 -->

 <?php
   if(!isset($_SESSION['email']) && !isset($_SESSION['customerID'])){
     echo "<script>
            window.location = './index.php?page=login'
          </script>";
   }
 ?>

<?php
  $customerID = $_SESSION['customerID'];

  $sql = "SELECT * FROM customer WHERE customerID='$customerID'";
  $result = $con->query($sql);
  while ($row = $result->fetch_assoc()) {
    $fname = $row['fname'];
    $lname = $row['lname'];
    $tel = $row['tel'];
    $interest = $row['interest'];
    $payment = $row['payment'];
    $paymentType = strtoupper($row['paymentType']);
  }
  if(!$fname || !$lname){
    $name = 'edit your data ?';
  } else {
    $name = $fname.' '.$lname;
  }
  if(!$tel){
    $tel = 'edit your data ?';
  }
  if(!$interest){
    $interest = 'edit your data ?';
  }
  if(!$payment) {
    $payment = 'edit your data ?';
  } else {
    $payment = substr_replace($payment, 'XXXX', 0, 4);
    $payment = substr_replace($payment, 'XXXX', 5, 4);
    $payment = substr_replace($payment, 'XXXX', 10, 4);
  }
  if(!$paymentType){
    $paymentType = 'edit your data ?';
  }
?>

<?php

  if(isset($_GET['deleteID'])){
    $deleteID = $_GET['deleteID'];
    $sql = "DELETE FROM address
            WHERE addressID = $deleteID";
    $result=$con->query($sql);
  }
  if(!$result){
    echo "<script>
            alert('500 : Some error happen')
            alert('Cannot Signup -.-')
            window.location = 'index.php?page=profile'
          </script>";
  }

?>

<style>
  body{
    overflow-x: hidden;
  }
  .tab{
    margin-top: 15px;
    padding: 0px 10px;
  }
  .tab .li{
    display: inline-block;
    cursor: pointer;
    text-align: center;
    width: calc(50% - 20px);
    padding-top: 22px;
    padding-bottom: 22px;
    border-bottom: 1.5px solid #EEE;
    margin: 0px 10px;
  }
  .tab .li:hover{
    background-color: #F9F9F9;
  }
  #infoTab, #historyTab{
    border-color: #8AF;
  }
  #addressPanel, #itemPanel{
    display: none;
  }
  .panel{
    margin: 5% 7%;
    border: 1px solid #AAA;
    border-radius: 40px;
    padding: 25px 40px 45px 40px;
    font-size: 14px;
  }
  .keySide, .dataSide{
    display: inline-block;
    margin-top: 20px;
    float: left;
    line-height: 24px;
  }
  .keySide{
    width: calc(35% - 12.5px);
    text-align: right;
    padding-right: 12.5px;
  }
  .dataSide{
    width: calc(65% - 12.5px);
    text-align: left;
    padding-left: 12.5px;
  }
  .addressSubPanel{
    margin: 5% 7%;
    border: 1px solid #AAA;
    border-radius: 40px;
    font-size: 14px;
    padding: 5px 40px 10px 40px;
  }
  .addressSubPanel h3{
    font-weight: lighter;
  }
  #addressPanel{
    margin-bottom: 75px;
  }
  #addressPanel p{
    text-indent: 32px;
    text-align: left;
    line-height: 32px;
  }
  #addressPanel button{
    font-size: 24px;
    padding: 0px 10px;
  }
  .edit{
    width: 12px;
    margin-left: 10px;
    cursor: pointer;
  }
  #addAddress{
    margin-top: 40px;
  }
  #addAddressText{
    font-size: 12px;
    font-style: italic;
  }
  .deleteAddress, .deleteItem{
    float: right;
    margin-top: 12px;
    font-size: 18px;
    color: #777;
    cursor: pointer;
    font-family: cursive;
  }
  .deleteItem{
    font-weight: lighter;
    float: none;
  }
  .formCenter{
    margin-bottom: 40px;
  }
  .panel table{
    width: 100%;
    line-height: 28px;
  }
  .panelTable{
    border-radius: 12px;
    padding-top: 15px;
    padding-bottom: 0px;
    width: 800px;
    margin: auto;
    text-align: center;
  }
  th{
    line-height: 40px;
    font-weight: normal;
    border-bottom: 1px solid #CCC;
  }
  .itemName{
    font-weight: bold;
    font-family: 'mainFontLigth';
    font-size: 12px;
  }
  .itemName a:hover{
    text-decoration: underline;
  }
  .total{
    display: inline-block;
    border: 1px solid #DDD;
    border-radius: 12px;
    padding: 0px 10px;
    line-height: 30px;
    margin-top: 20px;
    margin-bottom: 20px;
  }
  @media (max-width: 992px) {
    .panelTable{
      width: calc(100% - 80px);
      margin: auto;
      padding-left: 5px;
      padding-right: 5px;
      box-sizing: border-box;
    }
  }
  @media (max-width: 768px) {
    .tab{
      font-size: 14px;
      padding: 0px 30px;
    }
    .tab .li{
      margin: 0px 15px;
      width: calc(50% - 30px);
      border: 1px solid #DDD;
      border-radius: 12px;
      box-sizing: border-box;
      padding: 10px 0px;
    }
    .panel{
      border: none;
      padding-top: 0px;
      margin-bottom: 30px;
    }
  }
  @media (max-width: 725px) {
    .panelTable{
      width: 100%;
    }
    .panelTable tr{
      margin: 40px 0px;
    }
    .addressSubPanel{
      font-size: 12px;
      padding-left: 15px;
      padding-right: 15px;
      border-radius: 12px;
    }
  }
  @media (max-width: 576px) {
    .panel{
      font-size: 12px;
    }
  }
  @media (max-width: 530px) {
    #infoPanel .keySide{
      display: none;
    }
    #infoPanel .dataSide{
      width: 100%;
      text-align: center;
    }
  }
</style>

 <!-- Display form Signup -->
<div class="formCenter">
  <h2>Your Profile</h2>
  <br>
  <!-- Info and address tab -->
  <div class="tab">
    <div class="li" id="infoTab">Info</div
    ><div class="li" id="addressTab">Address</div>
  </div>
  <!-- Info panel -->
  <div id="infoPanel" class="panel">
    <!-- Name -->
    <div class="">
      <div  class="keySide">
        <label>Name</label>
      </div
      ><div class="dataSide">
        <label><?php echo $name; ?></label>
        <a href="index.php?page=editInfo&focus=name"><img class="edit" src="./assets/static/edit.png"></a>
      </div>
    </div>
    <!-- Tel no -->
    <div class="">
      <div  class="keySide">
        <label>Tel no</label>
      </div
      ><div class="dataSide">
        <label><?php echo $tel; ?></label>
        <a href="index.php?page=editInfo&focus=tel"><img class="edit" src="./assets/static/edit.png"></a>
      </div>
    </div>
    <!-- Email -->
    <div class="">
      <div  class="keySide">
        <label>Email</label>
      </div
      ><div class="dataSide">
        <label><?php echo $_SESSION['email']; ?></label>
      </div>
    </div>
    <!-- My interest to rent -->
    <div class="">
      <div  class="keySide">
        <label>My interest of rent</label>
      </div
      ><div class="dataSide">
        <label><?php echo $interest; ?></label>
        <a href="index.php?page=editInfo&focus=interest"><img class="edit" src="./assets/static/edit.png"></a>
      </div>
    </div>
    <!-- Payment -->
    <div class="">
      <div  class="keySide">
        <label>Payment</label>
      </div
      ><div class="dataSide">
        <label><?php echo $payment; ?></label>
        <a href="index.php?page=editInfo&focus=payment"><img class="edit" src="./assets/static/edit.png"></a>
      </div>
    </div>
    <!-- Payment type -->
    <div class="">
      <div  class="keySide">
        <label>Payment type</label>
      </div
      ><div class="dataSide">
        <label><?php echo $paymentType; ?></label>
        <a href="index.php?page=editInfo&focus=paymentType"><img class="edit" src="./assets/static/edit.png"></a>
      </div>
    </div>

    <div style="clear:left"></div>
  </div>

  <!-- Address panel -->
  <div id="addressPanel">
    <?php
      $sql = "SELECT * FROM address WHERE customerID='$customerID'";
      $result = $con->query($sql);
      while ($row = $result->fetch_assoc()) {
        $addressName = $row['name'];
        $addressDetail = $row['houseNo'];
        if($row['subStreet']) $addressDetail = $addressDetail.' , '.$row['subStreet'];
        $addressDetail = $addressDetail.' , '.$row['street'];
        if($row['subDistrict']) $addressDetail = $addressDetail.' , '.$row['subDistrict'];
        $addressDetail = $addressDetail.' , '.$row['district'].' , '.$row['province'].' , '.$row['zipcode'];
        ?>
        <div class="addressSubPanel">
          <span id="<?php echo $row['addressID']; ?>" class="deleteAddress">x</span>
          <h3><?php echo $addressName; ?><a href="index.php?page=editAddress&id=<?php echo $row['addressID']; ?>"><img class="edit" src="./assets/static/edit.png"></a></h3>
          <p><?php echo $addressDetail; ?></p>
        </div>
        <?php
      }
    ?>
    <a href="index.php?page=addAddress"><button id="addAddress">+</button><br><span id="addAddressText">add address</span></a>
  </div>

  <span id="scrollHistory"></span>

  <!-- Info and address tab -->
  <div class="tab">
    <div class="li" id="historyTab">History of rent</div
    ><div class="li" id="itemTab">Your item</div>
  </div>
</div>
  <!-- History panel -->
  <div id="historyPanel" class="panel panelTable">
    <table>
      <?php
        $sql = "SELECT * FROM rental WHERE customerID='$_SESSION[customerID]'";
        $result = $con->query($sql);
        if($result && mysqli_num_rows($result)>0){
          ?>
          <tr class="tableHead">
            <th>DateFrom</th>
            <th>DateTo</th>
            <th>Item</th>
            <th>Status</th>
          </tr>
          <?php
          while($row = $result->fetch_assoc()){
            $sql_item = "SELECT * FROM item WHERE itemID='$row[itemID]'";
            $result_item = $con->query($sql_item);
            while($row_item = $result_item->fetch_assoc()){
              $itemTitle = $row_item['title'];
            ?>
              <tr>
                <td><?php echo $row['dateFrom']; ?></td>
                <td><?php echo $row['dateTo']; ?></td>
                <td class="itemName"><a href="./index.php?page=itemDetail&id=<?php echo $row['itemID']; ?>"><?php echo $itemTitle; ?></a></td>
                <td class="status"><?php echo $row_item['status']; ?></td>
              </tr>
            <?php
            }
          }
        } else {
          echo "<br><br>You never rent anything.<br><br>";
          echo "Click <u><a href='./index.php?page=find'>here</a></u> to find somethings !!<br><br><br><br>";
        }

      ?>
    </table>
    <?php if($result && mysqli_num_rows($result)>0){ ?>
      <div class="total">total <?php echo mysqli_num_rows($result); ?></div>
    <?php } ?>
  </div>
  <!-- Item panel -->
  <div id="itemPanel" class="panel panelTable">
    <table>
      <?php
        $sql = "SELECT * FROM item WHERE customerID='$_SESSION[customerID]'";
        $result = $con->query($sql);
        if(mysqli_num_rows($result)>0){
          ?>
          <tr class="tableHead">
            <th>DateFrom</th>
            <th>DateTo</th>
            <th>Item</th>
            <th>Status</th>
          </tr>
          <?php
            while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <td><?php echo $row['dateFrom']; ?></td>
                <td><?php echo $row['dateTo']; ?></td>
                <td class="itemName">
                  <a href="./index.php?page=itemDetail&id=<?php echo $row['itemID']; ?>"><?php echo $row['title']; ?></a>
                  <a href="./index.php?page=editItem&id=<?php echo $row['itemID']; ?>"><img class="edit" src="./assets/static/edit.png"></a>
                  <span id="<?php echo $row['itemID']; ?>" class="deleteItem">x</span>
                </td>
                <td class="status"><?php echo $row['status']; ?></td>
              </tr>
              <?php
            }
        } else {
          echo "<br><br>You never rent your items.<br><br>";
          echo "Click <u><a href='./index.php?page=rentOut'>here</a></u> to rent somethings !!<br><br><br><br>";
        }
      ?>
    </table>
    <?php if(mysqli_num_rows($result)>0){ ?>
      <div class="total">total <?php echo mysqli_num_rows($result); ?></div>
    <?php } ?>
  </div>


<script>

  if(window.location.search.indexOf('pos=history')>-1){
    $([document.documentElement, document.body]).animate({
      scrollTop: $("#scrollHistory").offset().top-80
    }, 500)
  }

  $('#infoTab').click(function(){
    $('#infoPanel').css({'display' : 'block'})
    $('#addressPanel').css({'display' : 'none'})
    $('#infoTab').css({'border-color' : '#8AF'})
    $('#addressTab').css({'border-color' : '#EEE'})
  })
  $('#addressTab').click(function(){
    $('#infoPanel').css({'display' : 'none'})
    $('#addressPanel').css({'display' : 'block'})
    $('#addressTab').css({'border-color' : '#8AF'})
    $('#infoTab').css({'border-color' : '#EEE'})
  })
  $('#historyTab').click(function(){
    $('#historyPanel').css({'display' : 'block'})
    $('#itemPanel').css({'display' : 'none'})
    $('#historyTab').css({'border-color' : '#8AF'})
    $('#itemTab').css({'border-color' : '#EEE'})
  })
  $('#itemTab').click(function(){
    $('#historyPanel').css({'display' : 'none'})
    $('#itemPanel').css({'display' : 'block'})
    $('#itemTab').css({'border-color' : '#8AF'})
    $('#historyTab').css({'border-color' : '#EEE'})
  })

  $('.status').each(function(){
    if($(this).html()=='returned'){
      $(this).css({'color' : '#093'})
    } else if ($(this).html()=='checking') {
      $(this).css({'color' : '#00F'})
    } else if ($(this).html()=='renting') {
      $(this).css({'color' : '#e68a00'})
    } else if ($(this).html()=='deliver') {
      $(this).css({'color' : '#CC0'})
    } else if ($(this).html()=='availiable'){
      $(this).css({'color' : '#093'})
    } else if ($(this).html()=='none availiable') {
      $(this).css({'color' : '#e68a00'})
    } else if ($(this).html()=='ban') {
      $(this).css({'color' : '#F00'})
    }
  })

  $('.deleteAddress').each(function(){
    $(this).click(function(){
      if (confirm("Do you sure to delete ?")) {
        let addressID = $(this).attr('id')
        window.location = 'index.php?page=profile&deleteID='+addressID
      }
    })
  })

  $('.deleteItem').each(function(){
    $(this).click(function(){
      if (confirm("Do you sure to unrent this item ?")) {
        let itemID = $(this).attr('id')
        window.location = 'index.php?page=afterDeleteItem&id='+itemID
      }
    })
  })

</script>
