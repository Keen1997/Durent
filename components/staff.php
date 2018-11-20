<!--
  *
  * Staff template
  *
 -->

 <!-- Staff
 -	Deliver
   o	See address of rental
   o	Deliver the item
   o	Change status of rental from deliver to rented
   o	Change status of rental from rented to deliver
   o	Change status of rental from deliver to return
   o	See customer detail
 -	Specialist
   o	See item detail
   o	Activate the item to availiable
   o	Keep the image of item before rent
   o	Keep the image of item after rent
   o	Check the item
 -	Operator
   o	See customer detail
   o	See address detail
   o	See item detail
   o	See rental detail
   o	Activate status of customer
   o	Update status of rental
   o	Contact with customer
   o	Contact between staff
   o	Check the payment
   o	Enroll the item have been rent
 -->


<style>
  body{
    background-color: lightblue;
  }
  .template{
    text-align: center;
  }
  nav, footer{
    display: none;
  }
  .logout{
    text-align: right;
    /* margin-top: -120px; */
  }
  .tab{
    /* margin-top: -25px; */
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
  .keySide, .dataSide{
    display: inline-block;
    float: left;
    font-size: 14px;
    line-height: 32px;
  }
  .keySide{
    width: calc(50% - 12.5px);
    text-align: right;
    padding-right: 12.5px;
  }
  .dataSide{
    width: calc(50% - 12.5px);
    text-align: left;
    padding-left: 12.5px;
    font-style: italic;
  }
  .special{
    margin-bottom: 100px;
  }
  .special span{
    font-size: 14px;
  }
  .spacial h3{
    margin-bottom: 20px;
  }
  .special span{
    margin-top: 20px;
  }
  .special input[type='submit']{
    padding: 5px 10px;
  }
  .special input[type='file']{
    width: 300px;
    padding: 2px 5px;
  }
  .special textarea{
    width: 400px;
  }
</style>

<?php

  if(!isset($_SESSION['staffID']) || !isset($_SESSION['staffEmail'])){
    echo "<script>window.location = './index.php'</script>";
  }

?>

<!-- Display staff -->
<div class="container template">

  <div class="logout">
    <a href="index.php?page=logout"><button class="border">logout</button></a>
  </div>
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
      <input type="submit" name="" value="Enter">
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
      </tr>
      <?php
        $sql = "SELECT * FROM customer, account WHERE customer.accountID=account.accountID";
        $result = $con->query($sql);
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
      </tr>
      <?php
        }
      ?>
    </table>
    <div class="border">total 1 records</div>
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
      <input type="submit" name="" value="Enter">
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
      </tr>
      <?php
        $sql = "SELECT * FROM address";
        $result = $con->query($sql);
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
      </tr>
      <?php
        }
      ?>
    </table>
    <div class="border">total 1 records</div>
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
      <input type="submit" name="" value="Enter">
    </form>
    <table>
      <tr class="">
        <th>itemID</th>
        <th>title</th>
        <th>description</th>
        <th>price(per day)</th>
        <th>dateFrom</th>
        <th>dateTo</th>
        <th>customerID</th>
      </tr>
      <?php
        $sql = "SELECT * FROM item";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $row['itemID']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['dateFrom']; ?></td>
        <td><?php echo $row['dateTo']; ?></td>
        <td><?php echo $row['customerID']; ?></td>
      </tr>
      <?php
        }
      ?>
    </table>
    <div class="border">total 1 records</div>
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
      <input type="submit" name="" value="Enter">
    </form>
    <table>
      <tr class="">
        <th>rentalID</th>
        <th>itemID</th>
        <th>dateFrom</th>
        <th>dateTo</th>
        <th>status</th>
        <th>customerID</th>
        <th>staffID</th>
        <th>addressID</th>
      </tr>
      <?php
        $sql = "SELECT * FROM rental";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $row['rentalID']; ?></td>
        <td><?php echo $row['itemID']; ?></td>
        <td><?php echo $row['dateFrom']; ?></td>
        <td><?php echo $row['dateTo']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><?php echo $row['customerID']; ?></td>
        <td><?php echo $row['staffID']; ?></td>
        <td><?php echo $row['addressID']; ?></td>
      </tr>
      <?php
        }
      ?>
    </table>
    <div class="border">total 4 records</div>
  </div>

  <div class="special">
    <h3>Check Item</h3>
    <br>
    <span>(only specialist)</span>
    <div style="height:50px;"></div>

    <div class="">
      <div  class="keySide">
        <label>rentalID</label>
      </div
      ><div class="dataSide">
        <label>397</label>
      </div>
    </div>

    <div class="">
      <div  class="keySide">
        <label>itemID</label>
      </div
      ><div class="dataSide">
        <label>43</label>
      </div>
    </div>

    <div class="">
      <div  class="keySide">
        <label>dateFrom</label>
      </div
      ><div class="dataSide">
        <label>10-20-2018</label>
      </div>
    </div>

    <div class="">
      <div  class="keySide">
        <label>dateTo</label>
      </div
      ><div class="dataSide">
        <label>11-14-2018</label>
      </div>
    </div>

    <div class="">
      <div  class="keySide">
        <label>status</label>
      </div
      ><div class="dataSide">
        <label class="status">renting<img class="edit" src="./assets/static/edit.png"></label>
      </div>
    </div>

    <div class="">
      <div  class="keySide">
        <label>customerID</label>
      </div
      ><div class="dataSide">
        <label>63</label>
      </div>
    </div>

    <div class="">
      <div  class="keySide">
        <label>staffID</label>
      </div
      ><div class="dataSide">
        <label>7</label>
      </div>
    </div>

    <div class="">
      <div  class="keySide">
        <label>addressID</label>
      </div
      ><div class="dataSide">
        <label>62</label>
      </div>
    </div>

    <form class="" action="#" method="post">

      <div class="">
        <div  class="keySide">
          <label>before rent</label>
        </div
        ><div class="dataSide">
          <a href="#">img</a>
        </div>
      </div>

      <div class="">
        <div  class="keySide">
          <label>after rent</label>
        </div
        ><div class="dataSide">
          <input type="file" name="" value="">
        </div>
      </div>

      <div class="">
        <div  class="keySide">
          <label>detail check</label>
        </div
        ><div class="dataSide">
          <textarea name="name" rows="7" cols="30"></textarea>
        </div>
      </div>

      <div class="">
        <div  class="keySide">
          <label>already checked</label>
        </div
        ><div class="dataSide">
          <input type="checkbox" name="" value="">
        </div>
      </div>

      <input type="submit" name="" value="submit">

    </form>
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
    }
  })
  $('.item_status').each(function(){
    if($(this).html()=='availiable'+imgEdit_tag){
      $(this).css({'color' : '#093'})
    } else if ($(this).html()=='none availiable'+imgEdit_tag) {
      $(this).css({'color' : '#e68a00'})
    } else if ($(this).html()=='ban'+imgEdit_tag) {
      $(this).css({'color' : '#F00'})
    }
  })
  $('.customer_status').each(function(){
    if($(this).html()=='activated'+imgEdit_tag){
      $(this).css({'color' : '#093'})
    } else if ($(this).html()=='none-activate'+imgEdit_tag) {
      $(this).css({'color' : '#e68a00'})
    } else if ($(this).html()=='ban'+imgEdit_tag) {
      $(this).css({'color' : '#F00'})
    }
  })
</script>
