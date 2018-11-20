<!--
  *
  * Signup page
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
  .form{
    text-align: left;
    margin-left: 50px;
  }
  .formCenter input,textarea,select{
    width: calc(100% - 50px);
  }
  input[type="checkbox"]{
    width: auto;
    margin-left: 40px;
  }
  @media (max-width:768px) {
    .form{
      margin-left: 0px;
    }
  }
</style>

 <!-- Display form Signup -->
<div class="container formCenter smallForm">
  <h2>Create Account</h2>
  <label class="smallText">Already have an account? <a href="index.php?page=login">Log In</a></label>
  <br><br>
  <form class="" action="index.php?page=signup" method="post" onsubmit="return checkForm()">
    <div class="form">
      <input type="text" name="email" value="" placeholder="email">
      <span class="tooltip">?<span class="tooltiptext">required / valid email format</span></span>
      <br><span id="email_e" class="invalidMsg"></span>
      <br><br>
      <input type="text" name="password" value="" placeholder="password">
      <span class="tooltip">?<span class="tooltiptext">required / at least 4 characters</span></span>
      <br><span id="password_e" class="invalidMsg"></span>
      <br><br>
      <input type="text" name="confirmPassword" value="" placeholder="confirm password">
      <span class="tooltip">?<span class="tooltiptext">required</span></span>
      <br><span id="confirmPassword_e" class="invalidMsg"></span>
      <br><br>
      <input type="checkbox" name="agree" value="agree">
      <span>Agree with this condition ?</span>
      <br><br>
      <input type="submit" name="signup" value="Create Account">
      <br><br>
    </div>
    <img src="./assets/static/google_icon.png" width="45px" class="icon_signIn">
    <span style="width:40px; color:#FFF;">.</span>
    <img src="./assets/static/facebook_icon.png" width="45px" class="icon_signIn">
  </form>
</div>

<script>
  // Validate form format in client side
  function checkForm(){
    let pass = true

    $('#email_e').text('')
    $('#password_e').text('')
    $('#confirmPassword_e').text('')

    if(!isEmail($("input[name='email']").val())){
      $('#email_e').text('* invalid email format')
      pass = false
    }

    if(!$("input[name='email']").val()){
      $('#email_e').text('* email required')
      pass = false
    }

    if($("input[name='password']").val().length<4){
      $('#password_e').text('* password at least 4 characters')
      pass = false
    }

    if(!$("input[name='password']").val()){
      $('#password_e').text('* password required')
      pass = false
    }

    if($("input[name='password']").val().length>=4 && $("input[name='password']").val()!=$("input[name='confirmPassword']").val()){
      $('#confirmPassword_e').text('* password are not matches')
      pass = false
    }

    if(pass && !$("input[name='agree']").is(':checked')){
      alert('please agree with the condition')
      pass = false
    }

    return pass
  }

  function isEmail(email){
    let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }

</script>

<?php

    if(isset($_GET['email_e'])){
      if($_GET['email_e']=='used')
        echo "<script>$('#email_e').text('* email is already used')</script>";
    }
    if(isset($_GET['email'])){
      ?> <script>$("input[name='email']").val("<?php echo $_GET['email']; ?>")</script> <?php
    }

  if(isset($_POST['signup'])){

    // Set variable from form
    if(isset($_POST['email']))
      $email = $_POST['email'];
    if(isset($_POST['password']))
      $password = $_POST['password'];
    if(isset($_POST['confirmPassword']))
      $confirmPassword = $_POST['confirmPassword'];
    if(isset($_POST['agree']))
      $agree = true;
    else {
      $agree = false;
    }

    // Validate form format in server side
    if(!($email) ||
        !filter_var($email, FILTER_VALIDATE_EMAIL) ||
        !($password) ||
        $password && strlen($password)<4 ||
        !($confirmPassword) ||
        $password!=$confirmPassword ||
        !$agree
    )
    {
      $format = false;
    } else {
      $format = true;
    }


    // If format invalid, return to signup page with error message
    if(!$format){
      echo "<script>
              alert('400 : Some error happen')
              alert('Cannot Signup -.-')
              window.location = '../../index.php?page=signup'
            </script>";
    // Else check dubplicate email in server side
    } else {
      $sql = "SELECT email FROM account WHERE email='$email'";
      $result = $con->query($sql);
      // If dubplicate email, return to signup page with error message
      if($result->num_rows > 0){
        echo "<script>window.location = './index.php?page=signup&email_e=used&email=$email'</script>";
      //  If not dubplicate
      } else {
        // Hash password
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        // Insert into table
        $sql = "INSERT INTO account (email, password, type)
                VALUES ('$email', '$hashPassword', 'customer')";
        $result=$con->query($sql);
        if($result) {
          $sql = "INSERT INTO customer (accountID)
                  VALUES (LAST_INSERT_ID())";
          $result=$con->query($sql);
          if($result){
            echo "<script>
                    alert('200 : Signup Success ^^')
                    alert('welcome ! to join Durent')
                    window.location = './index.php?page=login'
                  </script>";
          }
        } else {
          echo "<script>
                  alert('500 : Some error happen')
                  alert('Cannot Signup -.-')
                  window.location = '../../index.php?page=signup'
                </script>";
        }
      }
    }

  }
