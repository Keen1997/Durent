<!--
  *
  * Waterfall in the home page
  *
 -->

<!-- Style -->
<style>
  body{
    background-color: #DDD;
  }
  .box1Top{
    background-color: #000;
    color: #FFF;
    text-align: center;
    padding-top: 70px;
  }
  .box1Bottom{
    background-color: #000;
    text-align: center;
  }
  .nextSign{
    font-family: monospace;
  }
  #beat{
    width: 700px;
  }
  #letYourThings{
    font-size: 24px;
  }
  #makeMoney{
    font-size: 40px;
  }
  #forYou{
    font-size: 24px;
  }
  #about{
    font-size: 22px;
    color: #8AF;
  }
  #about:hover{
    text-decoration: underline;
  }
  .box2 {
    display: flex;
    background-color: #000;
    color: #FFF;
  }
  .box2Toggle{
    display: none;
  }
  .box2Left {
    padding-bottom: 1%;
    flex: 1;
    background-image: linear-gradient(to bottom, #1E1F21, #161616)
  }
  .box2Right {
    flex: 1;
    padding-top: 11%;
    padding-left: 80px;
    background-image: linear-gradient(to right, #1E1F21, #000)
  }
  #camera{
    width: 100%;
  }
  #thisInvestment{
    color: #FFF;
    font-size: 24px;
  }
  #dontHave{
    font-size: 40px;
    color: #8AF;
  }
  #any{
    color: #FFF;
    font-size: 24px;
    padding-left: 6px;
    padding-right: 6px;
  }
  #risk{
    color: #FFF;
    font-size: 40px;
    color: #8AF;
  }
  #justNeedTo{
    color: #FFF;
    font-size: 24px;
  }
  #invest{
    color: #FFF;
    font-size: 40px;
    padding-left: 2px;
    color: #8FA
  }
  .box2TopToggle{
    background-image: linear-gradient(to bottom, #000, #222);
    padding-top: 50px;
    padding-bottom: 20px;
    padding-left: 20%;
  }
  .box2BottomToggle{
    margin-top: -2px;
  }
  .box3{
    margin-top: 20px;
  }
  @media (max-width: 720px) {
    .box1Bottom img{
      max-width: 100%;
      padding-top: 20px;
    }
  }
  @media (max-width: 1060px) {
    #thisInvestment, #any, #justNeedTo{
      font-size: 20px;
    }
    #dontHave, #risk, #invest{
      font-size: 36px;
    }
  }
  @media (max-width: 990px) {
    .box2Left{
      padding-top: 0;
      padding-bottom: 0%;
    }
    .box2Right{
      padding-top: 10%;
      padding-left: 30px;
    }
    #thisInvestment, #any, #justNeedTo{
      font-size: 18px;
    }
    #dontHave, #risk, #invest{
      font-size: 32px;
    }
  }
  @media (max-width: 755px) {
    .box2{
      display: none;
    }
    .box2Toggle{
      display: block;
    }
  }
  @media (max-width: 580px) {
    .box2TopToggle{
      padding-left: 16%;
    }
  }
  @media (max-width: 480px) {
    .box2TopToggle{
      padding-left: 10%;
    }
    #letYourThings, #forYou{
      font-size: 20px;
    }
    #makeMoney{
      font-size: 32px;
    }
    #dontHave, #risk, #invest{
      font-size: 28px;
    }
    #about{
      font-size: 18px;
    }
  }
</style>

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
    <a href="#" id="about">about <span class="nextSign">></span></a>
  </div>
  <div class="box1Bottom">
    <img id="beat" src="./assets/static/waterfalls/beat.jpg">
  </div>

  <!-- Second box -->
  <div class="box2">
    <!-- Camera image -->
    <div class="box2Left">
      <img id="camera" src="./assets/static/waterfalls/camera.jpg">
    </div>
    <!-- "Let the things MAKE MONEY for you" -->
    <div class="box2Right">
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

  <div class="box2Toggle">
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
    <div class="box2BottomToggle">
      <img id="camera" src="./assets/static/waterfalls/camera.jpg">
    </div>
  </div>

  <!-- Third box -->
  <div class="box3">

  </div>

  <p id='width'>test</p>

  <!-- break -->
  <div style="height:15px"></div>
</div>
<div style="height:200px"></div>

<script>
  $(window).resize(function() {
    $('#width').html($(window).width())
    if ($(window).width() < 650) {
      $("#beat").attr("src","./assets/static/waterfalls/microphone.jpg")
    } else {
      $("#beat").attr("src","./assets/static/waterfalls/beat.jpg")
    }
  })
</script>
