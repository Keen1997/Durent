<?php
  if(isset($_POST['email']))
    $email = $_POST['email'];
  if(isset($_POST['password']))
    $password = $_POST['password'];
  echo '<div style="margin-top:100px; margin-left:500px;">'.$email.'<br><br>'.$password.'</div>';
