<!--
  *
  * Admin template
  *
 -->

 <!-- Admin
 -	Edit user to staff
 -	See staff detail
 -	Delete Staff
 -	Edit staff some info
 -	Manage all table as same as staff
-->


<style>
  body{
    background-color: #11AA2255;
  }
  .template{
    text-align: center;
  }
  nav, footer{
    display: none;
  }
  .logout{
    text-align: right;
    margin-top: -120px;
  }
  .tab{
    margin-top: -25px;
  }
  .tab button{
    margin-left: 10px;
    margin-right: 10px;
    border-radius: 0px;
    border: none;
    border-bottom: 1px solid #AAA;
  }
  .tab .active{
    border: 1px solid #00F;
  }
  .panel label, .panel input, .panel select{
    float: left;
    font-size: 14px;
  }
  .panel input, .panel select{
    margin-left: 10px;
    margin-right: 25px;
    background-color: #EEE;
    border: 1px solid #000;
    padding: 2px 2px;
    border-radius: 4px;
    margin-bottom: 20px;
    color: #000;
    text-align: center;
  }
  .panel select{
    width: 125px;
    margin-left: 0px;
  }
  .shortInput{
    width: 60px;
  }
  .longInput{
    width: 150px;
  }
  .panel input[type='submit']{
    margin-left: 0px;
    background-color: #E2E2E2;
    border-radius: 10px;
    width: 80px;
    padding-top: 5px;
    padding-bottom: 5px;
  }
  .panel input[type='submit']:hover{
    background-color: #CCC;
  }
  h3{
    margin-top: 45px;
    font-weight: normal;
    margin-bottom: 30px;
    display: inline-block;
    padding-bottom: 5px;
    border-bottom: 1px solid #666;
  }
  .address, .rental, .item{
    display: none;
  }
  table{
    width: 100%;
  }
  table, th, td {
   border: 1px solid black;
   margin: auto;
   font-size: 14px;
  }
  .modal-data{
    color: #00B;
  }
  .modal-data:hover{
    text-decoration: underline;
    cursor: pointer;
  }
  th, td{
    padding: 5px 10px;
  }
  .border{
    display: inline-block;
    border: 1px solid #000;
    border-radius: 8px;
    padding: 0px 10px;
    line-height: 30px;
    margin-top: 20px;
    margin-bottom: 20px;
    font-size: 14px;
  }
  .edit{
    width: 12px;
    margin-left: 10px;
    cursor: pointer;
  }
</style>

<?php

  if(!isset($_SESSION['adminEmail']) && !isset($_SESSION['adminID'])){
    echo "<script>window.location = './index.php'</script>";
  }

?><!-- Delete table -->
<?php

  if(isset($_GET['delCustomer'])){
    $sql_acc = "SELECT accountID FROM customer WHERE customerID=$_GET[delCustomer]";
    $result_acc = $con->query($sql_acc);
    if($result_acc){
      $row = $result_acc->fetch_assoc();
      $accountID = $row['accountID'];
      $sql = "DELETE FROM customer WHERE accountID=$accountID";
      $result = $con->query($sql);
      if($result){
        $sql2 = "DELETE FROM account WHERE accountID=$accountID";
        $result2 = $con->query($sql2);
        if($result2){
          echo "<script>window.location = './index.php?page=admin'</script>";
        }
      }
    }
  }
  if(isset($_GET['delAddress'])){
    $sql = "DELETE FROM address WHERE addressID=$_GET[delAddress]";
    $result = $con->query($sql);
    if($result){
      echo "<script>window.location = './index.php?page=admin'</script>";
    }
  }
  if(isset($_GET['delItem'])){
    $sql = "DELETE FROM item WHERE itemID=$_GET[delItem]";
    $result = $con->query($sql);
    if($result){
      echo "<script>window.location = './index.php?page=admin'</script>";
    }
  }
  if(isset($_GET['delRental'])){
    $sql = "DELETE FROM rental WHERE rentalID=$_GET[delRental]";
    $result = $con->query($sql);
    if($result){
      echo "<script>window.location = './index.php?page=admin'</script>";
    }
  }
  if(isset($_GET['delStaff'])){
    $sql_acc = "SELECT accountID FROM staff WHERE staffID=$_GET[delStaff]";
    $result_acc = $con->query($sql_acc);
    if($result_acc){
      $row = $result_acc->fetch_assoc();
      $accountID = $row['accountID'];
      $sql = "DELETE FROM staff WHERE accountID=$accountID";
      $result = $con->query($sql);
      if($result){
        $sql2 = "DELETE FROM staff WHERE accountID=$accountID";
        $result2 = $con->query($sql2);
        if($result2){
          echo "<script>window.location = './index.php?page=admin'</script>";
        }
      }
    }
  }


?>

<!-- Display Admin -->
<div class="container template">

  <div class="logout">
    <a href="index.php?page=logout"><button class="border">logout</button></a>
  </div>

  <table>
    <h3>staff table</h3>
    <tr class="">
      <th>staffID</th>
      <th>first name</th>
      <th>last name</th>
      <th>tel no</th>
      <th>email</th>
      <th>gender</th>
      <th>salary</th>
      <th>DOB</th>
      <th>status</th>
      <th>role</th>
      <th>del</th>
    </tr>
    <?php
      $sql = "SELECT * FROM staff, account WHERE staff.accountID=account.accountID";
      $result = $con->query($sql);
      while($row = $result->fetch_assoc()){
        $sql_role = "SELECT name FROM role WHERE role.roleID=$row[roleID]";
        $result_role = $con->query($sql_role);
        $row_role = $result_role->fetch_assoc();
        $role = $row_role['name'];
    ?>
    <tr>
      <td><?php echo $row['staffID']; ?></td>
      <td><?php echo $row['fname']; ?></td>
      <td><?php echo $row['lname']; ?></td>
      <td><?php echo $row['tel']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['gender']; ?></td>
      <td><?php echo $row['salary']; ?></td>
      <td><?php echo $row['DOB']; ?></td>
      <td class="staff_status"><?php echo $row['status']; ?><img class="edit" src="./assets/static/edit.png"></td>
      <td><?php echo $role; ?></td>
      <td><a href="index.php?page=admin&delStaff=<?php echo $row['staffID']; ?>"><img width="15" src="./assets/static/bin.png"></a></td>
    </tr>
    <?php
      }
    ?>
  </table>
  <div class="border">total 1 records</div>

  <div style="height:150px"></div>


  <div class="tab">
    <button id="customer_btn" class="border active">customer table</button>
    <button id="address_btn" class="border">address table</button>
    <button id="item_btn" class="border">item table</button>
    <button id="rental_btn" class="border">rental table</button>
  </div>

  <div class="customer panel">
    <h3>customer table</h3>
    <form class="" action="#" method="post">
      <label>customer ID : </label>
      <input class="shortInput" type="text" name="" value="">
      <div style="clear:left"></div>
      <label>name : </label>
      <input class="longInput" type="text" name="" value="">
      <label>tel no : </label>
      <input class="longInput" type="text" name="" value="">
      <label>email : </label>
      <input class="longInput" type="text" name="" value="">
      <div style="clear:left"></div>
      <select class="" name="">
        <option value="">ID asc</option>
        <option value="">ID desc</option>
        <option value="">name asc</option>
        <option value="">name desc</option>
        <option value="">email asc</option>
        <option value="">email desc</option>
      </select>
      <select class="" name="">
        <option value="">all status</option>
        <option value="">activated</option>
        <option value="">none-activate</option>
        <option value="">ban</option>
      </select>
      <div style="clear:left"></div>
      <input type="submit" name="" value="Enter" onclick="notAvailiable()">
    </form>
    <table>
      <tr class="">
        <th>customerID</th>
        <th>first name</th>
        <th>last name</th>
        <th>tel no</th>
        <th>email</th>
        <th>payment</th>
        <th>payment type</th>
        <th>del</th>
      </tr>
      <?php
        $sql = "SELECT * FROM customer, account WHERE customer.accountID=account.accountID";
        $result = $con->query($sql);
        $count = mysqli_num_rows($result);
        while($row = $result->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $row['customerID']; ?></td>
        <td><?php echo $row['fname']; ?></td>
        <td><?php echo $row['lname']; ?></td>
        <td><?php echo $row['tel']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['payment']; ?></td>
        <td><?php echo $row['paymentType']; ?></td>
        <td><a href="index.php?page=admin&delCustomer=<?php echo $row['customerID']; ?>"><img width="15" src="./assets/static/bin.png"></a></td>
      </tr>
      <?php
        }
      ?>
    </table>
    <div class="border">total <?php echo $count; ?> records</div>
  </div>

  <div class="address panel">
    <h3>address table</h3>
    <form class="" action="#" method="post">
      <label>address ID : </label>
      <input class="shortInput" type="text" name="" value="">
      <div style="clear:left"></div>
      <label>user ID : </label>
      <input class="shortInput" type="text" name="" value="">
      <div style="clear:left"></div>
      <select class="" name="">
        <option value="">all province</option>
        <option value="">Bangkok</option>
        <option value="">Phathum Thani</option>
        <option value="">Phuket</option>
        <option value="">Surat Thani</option>
      </select>
      <select class="" name="">
        <option value="">all district</option>
        <option value="">SomeThings</option>
      </select>
      <select class="" name="">
        <option value="">all sub-district</option>
        <option value="">SomeThings</option>
      </select>
      <label>zip code : </label>
      <input class="shortInput" type="text" name="" value="">
      <div style="clear:left"></div>
      <input type="submit" name="" value="Enter" onclick="notAvailiable()">
    </form>
    <table>
      <tr class="">
        <th>addressID</th>
        <th>name</th>
        <th>houseNo</th>
        <th>alley</th>
        <th>street</th>
        <th>district</th>
        <th>sub-district</th>
        <th>province</th>
        <th>zipcode</th>
        <th>customerID</th>
        <th>del</th>
      </tr>
      <?php
        $sql = "SELECT * FROM address";
        $result = $con->query($sql);
        $count = mysqli_num_rows($result);
        while($row = $result->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $row['addressID']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['houseNo']; ?></td>
        <td><?php echo $row['subStreet']; ?></td>
        <td><?php echo $row['street']; ?></td>
        <td><?php echo $row['district']; ?></td>
        <td><?php echo $row['subDistrict']; ?></td>
        <td><?php echo $row['province']; ?></td>
        <td><?php echo $row['zipcode']; ?></td>
        <td><?php echo $row['customerID']; ?></td>
        <td><a href="index.php?page=admin&delAddress=<?php echo $row['addressID']; ?>"><img width="15" src="./assets/static/bin.png"></a></td>
      </tr>
      <?php
        }
      ?>
    </table>
    <div class="border">total <?php echo $count; ?> records</div>
  </div>

  <div class="item panel">
    <h3>item table</h3>
    <form class="" action="#" method="post">
      <label>item ID : </label>
      <input class="shortInput" type="text" name="" value="">
      <div style="clear:left"></div>
      <label>date from </label>
      <input class="longInput" type="date" name="" value="">
      <label style="margin-left:-15px">to </label>
      <input class="longInput" type="date" name="" value="">
      <div style="clear:left"></div>
      <input type="submit" name="" value="Enter" onclick="notAvailiable()">
    </form>
    <table>
      <tr class="">
        <th>itemID</th>
        <th>title</th>
        <th>description</th>
        <th>price(per day)</th>
        <th>status</th>
        <th>dateFrom</th>
        <th>dateTo</th>
        <th>customerID</th>
        <th>del</th>
      </tr>
      <?php
        $sql = "SELECT * FROM item";
        $result = $con->query($sql);
        $count = mysqli_num_rows($result);
        while($row = $result->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $row['itemID']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td>
          <form class="" action="index.php?page=afterChangeStatus" method="post">
            <input type="hidden" name="id" value="<?php echo $row['itemID']; ?>">
            <input type="hidden" name="page" value="admin">
            <select name="status" class="changeStatus">
              <option <?php if ($row['status']=='checking') echo "selected"; ?>>checking</option>
              <option <?php if ($row['status']=='availiable') echo "selected"; ?>>availiable</option>
              <option <?php if ($row['status']=='deliver') echo "selected"; ?>>deliver</option>
              <option <?php if ($row['status']=='renting') echo "selected"; ?>>renting</option>
              <option <?php if ($row['status']=='rented') echo "selected"; ?>>rented</option>
            </select>
          </form>
        </td>
        <td><?php echo $row['dateFrom']; ?></td>
        <td><?php echo $row['dateTo']; ?></td>
        <td><?php echo $row['customerID']; ?></td>
        <td><a href="index.php?page=admin&delItem=<?php echo $row['itemID']; ?>"><img width="15" src="./assets/static/bin.png"></a></td>
      </tr>
      <?php
        }
      ?>
    </table>
    <div class="border">total <?php echo $count; ?> records</div>
  </div>

  <div class="rental panel">
    <h3>rental table</h3>
    <form class="" action="#" method="post">
      <label>rental ID : </label>
      <input class="shortInput" type="text" name="" value="">
      <div style="clear:left"></div>
      <label>user ID : </label>
      <input class="shortInput" type="text" name="" value="">
      <label>staff ID : </label>
      <input class="shortInput" type="text" name="" value="">
      <label>address ID : </label>
      <input class="shortInput" type="text" name="" value="">
      <div style="clear:left"></div>
      <label>date from </label>
      <input class="longInput" type="date" name="" value="">
      <label style="margin-left:-15px">to </label>
      <input class="longInput" type="date" name="" value="">
      <div style="clear:left"></div>
      <select class="" name="">
        <option value="">all status</option>
        <option value="">returned</option>
        <option value="">checking</option>
        <option value="">deliver</option>
        <option value="">renting</option>
      </select>
      <div style="clear:left"></div>
      <input type="submit" name="" value="Enter" onclick="notAvailiable()">
    </form>
    <table>
      <tr class="">
        <th>rentalID</th>
        <th>itemID</th>
        <th>dateFrom</th>
        <th>dateTo</th>
        <th>customerID</th>
        <th>addressID</th>
        <th>status</th>
        <th>del</th>
      </tr>
      <?php
        $sql = "SELECT * FROM rental, item WHERE rental.itemID=item.itemID";
        $result = $con->query($sql);
        $count = mysqli_num_rows($result);
        while($row = $result->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $row['rentalID']; ?></td>
        <td><?php echo $row['itemID']; ?></td>
        <td><?php echo $row['dateFrom']; ?></td>
        <td><?php echo $row['dateTo']; ?></td>
        <td><?php echo $row['customerID']; ?></td>
        <td><?php echo $row['addressID']; ?></td>
        <td>
          <form action="index.php?page=afterChangeStatus" method="post">
            <input type="hidden" name="id" value="<?php echo $row['itemID']; ?>">
            <input type="hidden" name="page" value="admin">
            <select name="status" class="changeStatus">
              <option <?php if ($row['status']=='checking') echo "selected"; ?>>checking</option>
              <option <?php if ($row['status']=='availiable') echo "selected"; ?>>availiable</option>
              <option <?php if ($row['status']=='deliver') echo "selected"; ?>>deliver</option>
              <option <?php if ($row['status']=='renting') echo "selected"; ?>>renting</option>
              <option <?php if ($row['status']=='rented') echo "selected"; ?>>rented</option>
            </select>
          </form>
        </td>
        <td><a href="index.php?page=admin&delRental=<?php echo $row['rentalID']; ?>"><img width="15" src="./assets/static/bin.png"></a></td>
      </tr>
      <?php
        }
      ?>
    </table>
    <div class="border">total <?php echo $count; ?> records</div>
  </div>

</div>

<div class="modal">
  <div class="modal-content">

  </div>
</div>

<script>
  $('#customer_btn').click(function(){
    $('.customer').css({'display' : 'block'})
    $('.address').css({'display' : 'none'})
    $('.item').css({'display' : 'none'})
    $('.rental').css({'display' : 'none'})
    $('#customer_btn').addClass('active')
    $('#address_btn').removeClass('active')
    $('#item_btn').removeClass('active')
    $('#rental_btn').removeClass('active')
  })
  $('#address_btn').click(function(){
    $('.customer').css({'display' : 'none'})
    $('.address').css({'display' : 'block'})
    $('.item').css({'display' : 'none'})
    $('.rental').css({'display' : 'none'})
    $('#customer_btn').removeClass('active')
    $('#address_btn').addClass('active')
    $('#item_btn').removeClass('active')
    $('#rental_btn').removeClass('active')
  })
  $('#rental_btn').click(function(){
    $('.customer').css({'display' : 'none'})
    $('.address').css({'display' : 'none'})
    $('.item').css({'display' : 'none'})
    $('.rental').css({'display' : 'block'})
    $('#customer_btn').removeClass('active')
    $('#address_btn').removeClass('active')
    $('#item_btn').removeClass('active')
    $('#rental_btn').addClass('active')
  })
  $('#item_btn').click(function(){
    $('.customer').css({'display' : 'none'})
    $('.address').css({'display' : 'none'})
    $('.item').css({'display' : 'block'})
    $('.rental').css({'display' : 'none'})
    $('#customer_btn').removeClass('active')
    $('#address_btn').removeClass('active')
    $('#item_btn').addClass('active')
    $('#rental_btn').removeClass('active')

  })

  let imgEdit_tag = '<img class="edit" src="./assets/static/edit.png">'

  $('.status').each(function(){
    if($(this).html()=='returned'+imgEdit_tag){
      $(this).css({'color' : '#093'})
    } else if ($(this).html()=='checking'+imgEdit_tag) {
      $(this).css({'color' : '#00F'})
    } else if ($(this).html()=='renting'+imgEdit_tag) {
      $(this).css({'color' : '#e68a00'})
    } else if ($(this).html()=='deliver'+imgEdit_tag) {
      $(this).css({'color' : '#e68a00'})
    }
  })

  $('.status').each(function(){
    if($(this).html()=='returned'+imgEdit_tag){
      $(this).css({'color' : '#093'})
    } else if ($(this).html()=='checking'+imgEdit_tag) {
      $(this).css({'color' : '#00F'})
    } else if ($(this).html()=='renting'+imgEdit_tag) {
      $(this).css({'color' : '#e68a00'})
    } else if ($(this).html()=='deliver'+imgEdit_tag) {
      $(this).css({'color' : '#e68a00'})
    }
  })

  let oldValueStatus
  $('.changeStatus').mousedown(function(){
    oldValueStatus = $(this).val()
  })
  $('.changeStatus').change(function(){
    let c = confirm("Do you want to change status")
    if(c){
      $(this).closest('form').submit()
    } else {
      $(this).val(oldValueStatus)
    }
  })

  function notAvailiable(){
    alert('not availiable')
  }

</script>
