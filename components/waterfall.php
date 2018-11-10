<!--
  *
  * Waterfall in the home page
  *
 -->

<!-- Style -->
<link rel="stylesheet" href="./css/pages/Waterfall.css">

<!-- Display -->
<div class="fluidTop">
  <!-- Background black in the top of page for opcity -->
  <div class="navBackground"></div>

  <!-- First box -->
  <div class="box1Top">
    <span id="letYourThings">Let your things</span>
    <div style="height:13px"></div>
    <span id="makeMoney">MAKE MONEY </span>
    <span id="forYou">for you</span>
    <div style="height:30px"></div>
    <a href="index.php?page=about" id="about">about <span class="nextSign">></span></a>
  </div>
  <div class="box1Bottom">
    <img id="beat" src="./assets/static/waterfalls/beat.jpg">
  </div>

  <!-- Second box -->
  <div class="box2">
    <!-- Camera image -->
    <div class="box2Left">
      <img id="camera" src="./assets/static/waterfalls/camera.jpg">
    </div
    ><div class="box2Right">
      <!-- "Let the things MAKE MONEY for you" -->
      <span id="thisInvestment">This investment<br></span>
      <div style="height:13px"></div>
      <span id="dontHave">DON'T HAVE</span>
      <span id="any">any</span>
      <span id="risk">RISK</span><br>
      <div style="height:8px"></div>
      <span id="justNeedTo">just need to</span>
      <span id="invest">INVEST</span>
    </div>
  </div>

  <!-- Second box toggle -->
  <div class="box2Toggle">
    <!-- "Let the things MAKE MONEY for you" -->
    <div class="box2TopToggle">
      <span id="thisInvestment">This investment<br></span>
      <div style="height:13px"></div>
      <span id="dontHave">DON'T HAVE</span>
      <span id="any">any</span>
      <span id="risk">RISK</span><br>
      <div style="height:8px"></div>
      <span id="justNeedTo">just need to</span>
      <span id="invest">INVEST</span>
    </div>
    <!-- Camera image -->
    <div class="box2BottomToggle">
      <img id="camera2" src="./assets/static/waterfalls/camera.jpg">
    </div>
  </div>

  <!-- Third box -->
  <div class="box3">
    <!-- "Or do you want to rent " -->
    <p id="orDoYouWantToRent">Or do you want to rent ?</p>
    <!-- Have you ever use only ONE TIME -->
    <div class="leftBox3">
      <span id="haveYouEverOnly">Have you ever use only</span>
      <div style="height:13px"></div>
      <span id="oneTime">ONE TIME</span>
      <div style="height:20px"></div>
      <a href="index.php?page=about" class="about2">about <span class="nextSign">></span></a>
      <div style="height:30px"></div>
      <img id="suit" src="./assets/static/waterfalls/suit.jpg">
    </div>
    <!-- You don't always have to buy a NEW ONE -->
    <div class="rightBox3">
      <span id="youDoNotAlwaysHaveToBuyA">You don't always have to buy a</span>
      <div style="height:13px"></div>
      <span id="newOne">NEW ONE</span>
      <div style="height:20px"></div>
      <a href="index.php?page=find" class="about2">find the things you want <span class="nextSign">></span></a>
      <div style="height:30px"></div>
      <img id="bag" src="./assets/static/waterfalls/bag.jpeg">
    </div>
  </div>

  <!-- Forth box -->
  <div class="box4">
    <!-- Create a inteligent social exchange Start by your own -->
    <span id="createAInteligent">Create a inteligent social exchange</span>
    <div style="height:20px"></div>
    <span id="yourOwn">Start by your own</span>
    <div style="height:20px"></div>
    <img src="./assets/static/waterfalls/exchange.jpg">
  </div>

  <p id='width'>test</p>
</div>

<script>
  // Swap image for responsive
  function responsive() {
    $('#width').html($(window).width())
    if ($(window).width() < 650) {
      $("#beat").attr("src","./assets/static/waterfalls/microphone.jpg")
    } else {
      $("#beat").attr("src","./assets/static/waterfalls/beat.jpg")
    }
  }
  responsive()
  $(window).resize(function() {
    responsive()
  })
</script>
