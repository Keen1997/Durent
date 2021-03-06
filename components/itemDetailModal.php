<!-- Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" id="modal-content1">

    <?php
      if(isset($_SESSION['email']) && isset($_SESSION['customerID'])){

        if(isset($_GET['id'])){

          $sql_checkOwner = "SELECT * FROM item WHERE itemID=$_GET[id]";
          $result_checkOwner = $con->query($sql_checkOwner);
          $row_checkOwner = $result_checkOwner->fetch_assoc();
          if ($row_checkOwner['customerID']==$_SESSION['customerID']){
            echo "this is your item";
          } else {
            // Select customer and keep data in variable

            $sql = "SELECT * FROM customer WHERE customerID='".$_SESSION['customerID']."'";
            $result = $con->query($sql);
            while ($row = $result->fetch_assoc()) {
              $fname = $row['fname'];
              $lname = $row['lname'];
              $tel = $row['tel'];
              $payment = $row['payment'];
              $paymentType = strtoupper($row['paymentType']);
            }

            $sql = "SELECT * FROM address WHERE customerID='".$_SESSION['customerID']."'";
            $result = $con->query($sql);
            while ($row = $result->fetch_assoc()) {
              $addressName = $row['name'];
              $addressDetail = $row['houseNo'];
              if($row['subStreet']) $addressDetail = $addressDetail.' , '.$row['subStreet'];
              $addressDetail = $addressDetail.' , '.$row['street'];
              if($row['subDistrict']) $addressDetail = $addressDetail.' , '.$row['subDistrict'];
              $addressDetail = $addressDetail.' , '.$row['district'].' , '.$row['province'].' , '.$row['zipcode'];

              $addressIDArr[] = $row['addressID'];
              $addressNameArr[] = $addressName;
              $addressDetailArr[] = $addressDetail;
            }

            $sql = "SELECT * FROM item WHERE itemID = '".$_GET['id']."'";
            $result = $con->query($sql);
            while ($row = $result->fetch_assoc()) {
              $title = $row['title'];
              $description = $row['description'];
              $status = $row['status'];
              $dateFrom = $row['dateFrom'];
              $dateTo = $row['dateTo'];
              $price = $row['price'];
            }

              if($status=='availiable'){
                ?>
                <form class="" action="index.php?page=itemDetail&id=<?php echo $_GET['id']; ?>" method="post">
                  <span class="close">&times;</span>
                  <div style="clear:right"></div>


                  <!-- Info section -->
                  <div class="info section">
                    <h3>Your info</h3>
                    <!-- Name -->
                    <div class="">
                      <div  class="keySide">
                        <label>Name</label>
                      </div
                      ><div class="dataSide">
                        <label><?php echo $fname." ".$lname; ?></label>
                      </div>
                    </div>
                    <!-- Tel no -->
                    <div class="">
                      <div  class="keySide">
                        <label>Tel no</label>
                      </div
                      ><div class="dataSide">
                        <label><?php echo $tel; ?></label>
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
                    <div style="clear:left"></div>
                  </div>

                  <div class="lineBreak"></div>

                  <!-- Address section -->
                  <div class="address section">
                    <div class="">
                      <div  class="keySide">
                        <label>Address</label>
                      </div
                      ><div class="dataSide">
                        <select class="" name="address">
                          <?php
                            for ($i = 0; $i<count($addressNameArr); $i++){
                              echo "<option value='$i'>$addressNameArr[$i]</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="addressDetail">
                        <p id="addressDetail"></p>
                      </div>
                      <input type="text" name="address" style="display:none">
                    </div>
                  </div>
                  <div style="clear:left"></div>

                  <div class="lineBreak"></div>

                  <div style="text-align:center">
                    <button type="button" id="next_btn" class="btn">Next</button>
                  </div>

                </div>

                <div class="modal-content" id="modal-content2">
                  <span class="close">&times;</span>
                  <div style="clear:right"></div>
                  <!-- Item section -->
                  <div class="item section">
                    <h3>Item Detail</h3>
                    <!-- Item title -->
                    <h1><?php echo $title; ?></h1>
                    <!-- Item description -->
                    <div class="description">
                      <h3>Description :</h3>
                      <p><?php echo $description; ?></p>
                    </div>
                    <!-- Price -->
                    <div id="price_modal">
                      <label>$<?php echo $price; ?> per day</label>
                    </div>

                    <!-- Old Date -->
                    <div class="date_modal">
                      <label><i>(<?php echo $dateFrom; ?>)<i></label>
                      <label> - </label>
                      <label><i>(<?php echo $dateTo; ?>)<i></label>
                    </div>
                    <div class="date_modal_toggle">
                      <div class="">
                        <div class="left">
                          <label>from</label>
                        </div
                        ><div class="right">
                          <label><i>(<?php echo $dateFrom; ?>)<i></label>
                        </div>
                      </div>
                      <div class="">
                        <div class="left">
                          <label>to</label>
                          </div
                          ><div class="right">
                            <label><i>(<?php echo $dateTo; ?>)<i></label>
                          </div>
                        </div>

                      </div>
                    <!-- New Date -->
                    <div class="date_modal">
                      <label>Rent From</label>
                      <input type="date" name="dateFrom">
                      <label> to </label>
                      <input type="date" name="dateTo">
                    </div>
                    <div class="date_modal_toggle">
                      <div class="">
                        <div class="left">
                          <label>from</label>
                        </div
                        ><div class="right">
                          <input type="date" name="dateFromToggle">
                        </div>
                      </div>
                      <div class="">
                        <div class="left">
                          <label>to</label>
                          </div
                          ><div class="right">
                            <input type="date" name="dateToToggle">
                          </div>
                        </div>

                      </div>

                    </div>
                    <div style="clear:left"></div>


                    <div class="lineBreak"></div>

                    <div style="text-align:center">
                      <button type="button" id="next2_btn" class="btn">Next</button>
                    </div>

                  </div>

                  <div class="modal-content" id="modal-content3">
                    <span class="close">&times;</span>
                    <div style="clear:right"></div>

                    <!-- Payment section -->
                    <div class="payment section">
                      <h3>Payment</h3>
                      <!-- Payment -->
                      <div class="">
                        <div  class="keySide">
                          <label>Payment</label>
                        </div
                        ><div class="dataSide">
                          <label>XXXX-XXXX-XXXX-1234</label>
                        </div>
                      </div>
                      <!-- Payment type -->
                      <div class="">
                        <div  class="keySide">
                          <label>Payment type</label>
                        </div
                        ><div class="dataSide">
                          <label>VISA</label>
                        </div>
                      </div>
                      <!-- CCV -->
                      <div class="">
                        <div  class="keySide">
                          <label>ccv</label>
                        </div
                        ><div class="dataSide">
                          <input id="ccv" type="text" name="" value="">
                        </div>
                      </div>
                      <!-- Deposit -->
                      <div class="">
                        <div  class="keySide">
                          <label>deposit</label>
                        </div
                        ><div class="dataSide">
                          <label>$<?php echo $price*10; ?></label>
                        </div>
                      </div>
                      <!-- Price -->
                      <div class="">
                        <div  class="keySide">
                          <label>Price</label>
                        </div
                        ><div class="dataSide">
                          <label id="calPrice">$65</label>
                        </div>
                      </div>
                      <!-- Total Price -->
                      <div class="">
                        <div  class="keySide">
                          <label>Price</label>
                        </div
                        ><div class="dataSide">
                          <label id="totalPrice">$65</label>
                        </div>
                      </div>
                    </div>

                    <div style="clear:left"></div>

                    <div class="lineBreak"></div>

                    <div style="text-align:center">
                      <input type="submit" id="confirm_btn" class="btn" value="Confirm" style="color:#FFF; padding:10px 20px; width:auto; font-size:16px;">
                    </div>
                <?php
              } else {
                echo "<br><br><i>this item is not availiable -.-</i><br><br>";
              }
          }

          } else {
            echo "<script>window.location='index.php?page=find'</script>";
          }
        } else {
        echo "<br><br><i>please login -.-</i><br><br>";
      }
      ?>

      </div>
    </form>

  </div>

  <script>


    let addressID = <?php echo json_encode($addressIDArr) ?>;
    let addressDetail = <?php echo json_encode($addressDetailArr) ?>;
    $('#addressDetail').text(addressDetail[0])
    $('input[name="address"]').val(addressID[0])

    $('select[name="address"]').change(function(){
      let i = $('select[name="address"] option:selected').val()
      $('#addressDetail').text(addressDetail[i])
      $('input[name="address"]').val(addressID[i])
    })

    let inputDateFrom = new Date()
    let inputDateTo = new Date()
    let diffDays = 0;
    $('input[name="dateFrom"]').change(function(){
        inputDateFrom = new Date(this.value)
        let oneDay = 24*60*60*1000
        diffDays = Math.round(Math.abs((inputDateTo.getTime() - inputDateFrom.getTime())/(oneDay)))
        document.getElementById('calPrice').innerHTML = "$"+<?php echo $price; ?>*diffDays
        document.getElementById('totalPrice').innerHTML = "$"+(<?php echo $price; ?>*diffDays+<?php echo $price; ?>*10)
    })
    $('input[name="dateTo"]').change(function(){
        inputDateTo = new Date(this.value)
        let oneDay = 24*60*60*1000
        diffDays = Math.round(Math.abs((inputDateTo.getTime() - inputDateFrom.getTime())/(oneDay)))
        document.getElementById('calPrice').innerHTML = "$"+<?php echo $price; ?>*diffDays
        document.getElementById('totalPrice').innerHTML = "$"+(<?php echo $price; ?>*diffDays+<?php echo $price; ?>*10)
    })

    // CCV input inputmark
    $('#ccv').inputmask("999",{ "placeholder": "CCV" })
</script>

<?php

  if(isset($_POST['address']) && isset($_POST['dateFrom']) && isset($_POST['dateTo'])){
    if(strtotime($dateFrom)<=strtotime($_POST['dateFrom']) && strtotime($dateTo)>=strtotime($_POST['dateTo'])){
      if(strtotime($_POST['dateTo'])>strtotime($_POST['dateFrom'])){
        $sql = "INSERT INTO rental (itemID, dateFrom, dateTo, customerID, addressID)
                VALUES ('$_GET[id]', '$_POST[dateFrom]', '$_POST[dateTo]', '$_SESSION[customerID]', '$_POST[address]')";
        $result = $con -> query($sql);
        if($result){
          $sql = "UPDATE item SET status='renting' WHERE itemID='$_GET[id]'";
          $result = $con -> query($sql);
          if($result){
            echo "<script>
                    alert('200 : you are already rent ^^')
                    window.location = './index.php?page=find'
                  </script>";
          } else {
            echo $con->error;
          }
        }
      } else {
        echo "<script>
                alert('date wrong (from $_POST[dateTo] to $_POST[dateFrom])')
              </script>";
      }
    } else {
        echo "<script>
                alert('date must be between $dateFrom - $dateTo')
              </script>";
    }
  }


?>
