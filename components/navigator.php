<!--
  *
  * Navigator component
  *
-->

<style>
/* Design navigator for normal width screen and default for mobile screen */
nav{
  width: 100%;
  position: fixed;
  top: 0px;
  background-image: linear-gradient(#000C, #292929CC);
  z-index:1000;
}
nav ul{
  width: 100%;
  margin: 0 auto;
  padding: 0;
}
.navLeft{
  float:left;
  width: 27%;
  display: inline;
}
.navCenter{
  clear: left;
  width: 46%;
  text-align: center;
  display: inline-block;
}
.navRight{
  text-align: right;
  float: right;
  width: 27%;
}
nav li{
  display: inline-block;
  padding: 14px 4px 14px;
}
nav a{
  list-style: none;
  color: #FFF;
  font-size: 15.5px;
  padding: 10px 20px;
  font-family: 'mainFontLigth', sans-serif;
}
nav a:hover{
  color: #CCC;
}
#navMedia{
  display: none;
}
#navToggle{
  width: 100%;
  padding: 10px 24px;
  text-align: right;
  box-sizing: border-box;
  font-size: 30px;
  display: none;
}
#navMenu{
  width: 20px;
  height: auto;
}
/* Dropdown */
.dropbtn {
  color: #FFF;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  min-width: 120px;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  text-align: center;
  display: none;
  position: absolute;
  background-color: #F9F9F9;
  margin-left: 10%;
  width: 80%;
  min-width: 120px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  border-radius: 12px;
  z-index: 1;
}

.dropdown-content a {
  color: #000;
  padding: 12px 16px;
  display: block;
}

.dropdown-content a:hover {
  color: #CCC;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #444;
}

/* Design navigator for full width screen when equal or less than 992px and change size */
@media (max-width:992px) {
  nav a{
    padding: 10px 14px;
    font-size: 14px;
  }
  nav li{
    display: inline-block;
    padding: 10px 3px 10px;
  }
  nav .container{
    max-width: 100%;
    width: auto;
  }
}

/* Design navigator for mobile width screen */
@media (max-width:768px) {
  #navMain{
    display: none;
    background-color: #000;
  }
  #navToggle{
    display: block;
  }
  #navMenu{
    cursor: pointer;
  }
  nav ul{
    width: 100%;
    display: none;
  }
  nav li{
    display: block;
    padding: 0px 10px 10px;
  }
  nav a{
    display: block;
  }
}
</style>

<!-- Navigator bar for computer width -->
<div class="container">
  <ul id="navMain">
    <div class="navLeft">
      <li><a style="padding-left:0px;" href="index.php">
        <img id="navLogo" style="margin:-5px;padding:0px;height:30px" src="./assets/static/logo_white.png">
      </a></li>
    </div>
    <div class="navCenter">
      <li><a href="index.php?page=about">About</a></li>
      <li><a href="index.php?page=find">Find</a></li>
      <li><a href="index.php?page=rentOut">Rent</a></li>
    </div>
    <div class="navRight">
    <?php
      if(isset($_SESSION['email'])){
        // Check email length, if > 25 add '...' instead
        if(strlen($_SESSION['email'])>25) $email = substr($_SESSION['email'],0,25).'...';
        else $email = $_SESSION['email'];
      ?>
      <div class="dropdown">
      <button class="dropbtn"><?php echo $email; ?></button>
        <div class="dropdown-content">
          <a href="index.php?page=profile">profile</a>
          <a href="index.php?page=profile">history</a>
          <a href="index.php?page=logout">logout</a>
        </div>
      </div>
      <?php
      } else {
      ?>
      <li><a href="index.php?page=login">Log In</a></li>
      <li><a style="padding-right:0px;" href="index.php?page=signup">Sign Up</a></li>
      <?php
      }
    ?>
    </div>
  </ul>
</div>
<!-- Navigator bar for mobile width -->
<div id="navToggle"><img id="navMenu" src="./assets/static/menu_white.png"></div>
<ul id="navMedia">
  <li><a href="index.php?page=signup">Sign Up</a></li>
  <li><a href="index.php?page=login">Log In</a></li>
  <li><a href="#">home</a></li>
  <li><a href="#">home</a></li>
</ul>


<script>
if($('.dropdown-content').width()<=120){
  $('.dropdown-content').css({'margin-left' : '0px'})
}

// In mobile size, when click menu icon in navigator, toggle the menu
let navMobileToggle = function(){
  $('#navMenu').click(function(){
    $('#navMedia').slideToggle("fast",function(){
      // Swap css between open and close navigator
      if($('#navMedia').is(':hidden')){
        $("#navMenu").attr("src","./assets/static/menu_white.png")
        $("nav").css({
          'background-image': 'linear-gradient(#000C, #292929CC)',
          'background-color': 'transparent'
        })
      } else {
        $("#navMenu").attr("src","./assets/static/close_white.png")
        $("nav").css({
          'background-image': 'none',
          'background-color': '#222'
        })
      }
    })
  })
  // If toggle is open, when not mobile width screen, change css to default
  function responsive(){
    if ($(window).width() > 768) {
     $("#navMenu").attr("src","./assets/static/menu_white.png")
     $('#navMedia').css({
       "display":"none"
     })
     $("nav").css({
       'background-image': 'linear-gradient(#000C, #292929CC)',
       'background-color': 'transparent'
     })
    }
  }
  responsive()
  $(window).resize(function() {
    responsive()
  })
}
// In navigator change logo to more black when mouse hover
let navLogoHover = function(){
  $("#navLogo").hover(function() {
    $(this).attr("src","./assets/static/logo_gray.png")
  }, function() {
    $(this).attr("src","./assets/static/logo_white.png")
  }
);
}
// Call the init processes after the window loads
window.onload = function(){
  // User the function
  navMobileToggle()
  navLogoHover()
}
</script>
