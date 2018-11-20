<!--
  *
  * Login page
  *
-->

<!-- If user already logined, return to homepage -->
<?php
  if(isset($_SESSION['email'])){
    echo "<script>window.location = './index.php'</script>";
  }
?>

<style>
  body{
    overflow-x: hidden;
  }
  span{
    margin-left: 12px;
    font-size: 14px;
  }
  .invalidMsg{
    font-style: italic;
    color: #45D;
  }
</style>

<!-- Display form login -->
<div class="container formCenter smallForm">
  <h2>Log In</h2>
  <label class="smallText">Already have an account? <a href="index.php?page=signup">Create account</a></label>
  <br><br>
  <form class="" action="index.php?page=login" method="post">
    <div class="form">
      <input type="text" name="email" value="" placeholder="email">
      <br><span id="email_e" class="invalidMsg"></span>
      <br><br>
      <input type="text" name="password" value="" placeholder="password">
      <br><span id="password_e" class="invalidMsg"></span>
      <br><br>
      <input type="submit" name="login" value="Log In">
    </div>
    <br><br>
    <img src="./assets/static/google_icon.png" width="45px" class="icon_signIn">
    <span style="width:40px; color:#FFF;">.</span>
    <img src="./assets/static/facebook_icon.png" width="45px" class="icon_signIn">
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
      echo "<script>window.location = './index.php?page=login&email_e=none&password_e=none'</script>";
    } else {
      if(!$email){
        echo "<script>window.location = './index.php?page=login&email_e=none'</script>";
      }
      if(!$password){
        echo "<script>window.location = './index.php?page=login&password_e=none&email=$email'</script>";
      }
    }
    $sql = "SELECT accountID, email, password FROM account WHERE email='$email'";
    $result=$con->query($sql);
    if(mysqli_num_rows($result)==0){
      echo "<script>window.location = './index.php?page=login&email_e=notExist&email=$email'</script>";
    } else {
      while ($row = $result->fetch_assoc()) {
        $accountID = $row['accountID'];
        $hashPassword = $row['password'];
      }
      if(password_verify($password, $hashPassword)){
        $sql = "SELECT customerID FROM customer WHERE accountID='$accountID'";
        $result=$con->query($sql);
        if($result->num_rows>0){
          $customerID = mysqli_fetch_assoc($result)['customerID'];
          $_SESSION['email'] = $email;
          $_SESSION['customerID'] = $customerID;
          echo "<script>window.location = './index.php'</script>";
        } else {
          echo "<script>window.location = './index.php?page=login&email_e=notExist&email=$email'</script>";
        }

      } else {
        echo "<script>window.location = './index.php?page=login&password_e=invalid&email=$email'</script>";
      }
    }
  }

?>

<script>

</script>
