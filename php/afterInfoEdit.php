<?php

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $tel = $_POST['tel'];
  $interest = $_POST['interest'];
  $payment = $_POST['payment'];
  $paymentType = $_POST['paymentTypeVal'];
  $customerID = $_SESSION['customerID'];

  $sql = "UPDATE customer
          SET fname = '$fname',
              lname = '$lname',
              tel = '$tel',
              interest = '$interest',
              payment = '$payment',
              paymentType = '$paymentType'
          WHERE customerID = '$customerID'";

  $result=$con->query($sql);

  if(!$result){
    echo "<script>
            alert('500 : Some error happen')
            alert('Cannot edit info -.-')
            window.location = 'index.php?page=editInfo'
          </script>";
  } else {
    echo "<script>
            alert('200 : Edit info success ^^')
            window.location = './index.php?page=profile'
          </script>";
  }

?>
