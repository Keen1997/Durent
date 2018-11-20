<!--
  *
  * admin / Admin login template
  *
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
  span{
    margin-left: 12px;
    font-size: 14px;
  }
  .invalidMsg{
    font-style: italic;
    color: #45D;
  }
  h2{
    font-size: 20px;
    margin-bottom: 50px;
  }
</style>

<div class="container template">
  <h2>Admin log In</h2>
  <form class="" action="index.php?page=adminLogin" method="post">
    <div class="form">
      <input type="text" name="email" placeholder="email">
      <br><span id="email_e" class="invalidMsg"></span>
      <br><br>
      <input type="text" name="password" placeholder="password">
      <br><span id="password_e" class="invalidMsg"></span>
      <br><br>
      <input type="submit" name="login" value="Log In">
    </div>
  </form>
</div>

<?php

if(isset($_GET['email_e'])){
  if($_GET['email_e']=='none')
    echo "<script>$('#email_e').text('* email required')</script>";
  else if($_GET['email_e']=='notExist')
    echo "<script>$('#email_e').text('* email is not existed')</script>";
}
if(isset($_GET['password_e'])){
  if($_GET['password_e']=='invalid')
    echo "<script>$('#password_e').text('* password invalid')</script>";
  if($_GET['password_e']=='none')
    echo "<script>$('#password_e').text('* password required')</script>";
}
if(isset($_GET['email'])){
  ?> <script>$("input[name='email']").val("<?php echo $_GET['email']; ?>")</script> <?php
}

$email = '';
$password = '';

if(isset($_POST['email']))
  $email = $_POST['email'];
if(isset($_POST['password']))
  $password = $_POST['password'];

if(isset($_POST['login'])){
  if(!$email && !$password){
    echo "<script>window.location = './index.php?page=adminLogin&email_e=none&password_e=none'</script>";
  } else {
    if(!$email){
      echo "<script>window.location = './index.php?page=adminLogin&email_e=none'</script>";
    }
    if(!$password){
      echo "<script>window.location = './index.php?page=adminLogin&password_e=none&email=$email'</script>";
    }
  }
  $sql = "SELECT accountID, email, password FROM account WHERE email='$email'";
  $result=$con->query($sql);
  if(mysqli_num_rows($result)==0){
    echo "<script>window.location = './index.php?page=adminLogin&email_e=notExist&email=$email'</script>";
  } else {
    while ($row = $result->fetch_assoc()) {
      $accountID = $row['accountID'];
      $hashPassword = $row['password'];
    }
    if(password_verify($password, $hashPassword)){
      $sql = "SELECT adminID FROM admin WHERE accountID='$accountID'";
      $result=$con->query($sql);
      if($result->num_rows>0){
        $customerID = mysqli_fetch_assoc($result)['adminID'];
        $_SESSION['adminEmail'] = $email;
        $_SESSION['adminID'] = $adminID;
        echo "<script>window.location = './index.php?page=admin'</script>";
      } else {
        echo "<script>window.location = './index.php?page=adminLogin&email_e=notExist&email=$email'</script>";
      }

    } else {
      echo "<script>window.location = './index.php?page=adminLogin&password_e=invalid&email=$email'</script>";
    }
  }
}
