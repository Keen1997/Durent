<!--
  *
  * Footer component
  *
-->

<style>
/* Design footer for normal width screen and default for mobile screen */
footer{
  font-size: 14px;
  margin-top: 100px;
  margin-bottom: 24px;
}
footer a{
  color: #111;
}
footer a:hover{
  color: #777;
}
#footerTop{
  border-top:1px solid #ddd;
}
#footerTop img{
  margin-top: 15px;
  margin-right: 15px;
  height: 25px;
  display: inline;
}
#footerMiddle{
  display: flex;
  margin-top: 20px;
  margin-bottom: 20px;
}
#footerMiddle div{
  float: left;
  width: 25%;
}
#footerBottom{
  display: flex;
  border-top: 1px solid #ddd;
  padding-top: 10px;
}
#footerBottom div{
  float: left;
  width: 33.3%;
}
#footerBottom a{
  margin-left: 4px;
  margin-right: 4px;
}
#footerBottomLeft{
  text-align: left;
}
#footerBottomCenter{
  text-align: center;
}
#footerBottomRight{
  text-align: right;
}

/* Design navigator for full width screen when equal or less than 992px */
@media (max-width:992px) {
  footer .container{
    max-width: 100%;
    width: auto;
  }
  #footerBottom{
    display: block;
    border-top: 1px solid #ddd;
    padding-top: 10px;
  }
  #footerBottom div{
    width: 100%;
    text-align: left;
    padding: 10px 0px;
  }
  #footerBottomLeft, #footerBottomCenter, #footerBottomRight{
    text-align: left;
  }
}

/* Design navigator for mobile width screen */
#footerToggles{
  display: none;
  margin-top: 20px;
}
#footerToggles .accordion {
  background-color: #FFF;
  cursor: pointer;
  padding: 16px 0px;
  width: 100%;
  border: none;
  border-top: 1px solid #DDD;
  text-align: left;
  outline: none;
  font-size: 14px;
  transition: 0.4s;
  font-family: 'mainFont', sans-serif;
}
#footerToggles .accordion:hover {
  background-color: #F9F9F9;
}
#footerToggles .plusIcon{
  float: right;
  font-size: 16px;
  margin-right: 10px;
}
#footerToggles .panel {
  font-size: 12px;
  padding: 10px 18px 20px 18px;
  display: none;
  background-color: #FFF;
  overflow: hidden;
}
@media (max-width:768px) {
  #footerMiddle{
    display: none;
  }
  #footerToggles{
    display: block;
  }
  footer .container{
    width: auto;
    max-width: 100%;
  }
}
</style>

<div class="container">
  <!-- On the top of footer -->
  <div id="footerTop">
    <img src="./assets/static/logo.png">
    <span>Durent</span>
  </div>
  <!-- On the middle of footer -->
  <div id="footerMiddle">
    <div>
      <p>Learn</p>
      <a href="#">How to retire</a><br>
      <a href="#">How to drop</a><br>
      <a href="#">How to get F</a>
    </div>
    <div>
      <p>For Renter</p>
      <a href="#">Make a first rent</a><br>
      <a href="#">How to get money</a><br>
      <a href="#">How to get location</a><br>
      <a href="#">How to make you rich</a>
    </div>
    <div>
      <p>For Lessor</p>
      <a href="#">Make a first lease</a><br>
      <a href="#">How to pay money</a><br>
      <a href="#">How to get location</a><br>
      <a href="#">How to save the money</a>
    </div>
    <div>
      <p>Contact Us</p>
      <a href="#">Email: durent@gmail.com</a><br>
      <a href="#">Tel: 0123456789</a><br>
      <a href="#">Line: durent</a><br>
      <a href="#">Facebook: durent</a>
    </div>
  </div>
  <!-- On the middle of footer for mobile screen -->
  <div id="footerToggles">
    <button class="accordion">Learn<div class="plusIcon"></div></button>
    <div class="panel">
      <a href="#">How to retire</a><br><br>
      <a href="#">How to drop</a><br><br>
      <a href="#">How to get F</a>
    </div>

    <button class="accordion">For Renter<div class="plusIcon"></div></button>
    <div class="panel">
      <a href="#">Make a first rent</a><br><br>
      <a href="#">How to get money</a><br><br>
      <a href="#">How to get location</a><br><br>
      <a href="#">How to make you rich</a>
    </div>

    <button class="accordion">For Lessor<div class="plusIcon"></div></button>
    <div class="panel">
      <a href="#">Make a first lease</a><br><br>
      <a href="#">How to pay money</a><br><br>
      <a href="#">How to get location</a><br><br>
      <a href="#">How to save the money</a>
    </div>

    <button class="accordion">Contact Us<div class="plusIcon"></div></button>
    <div class="panel">
      <a href="#">Email: durent@gmail.com</a><br><br>
      <a href="#">Tel: 0123456789</a><br><br>
      <a href="#">Line: durent</a><br><br>
      <a href="#">Facebook: durent</a>
    </div>
  </div>
  <!-- On the bottom of footer -->
  <div id="footerBottom">
    <div id="footerBottomLeft">
      <span>Copyright © 2018 SIIT Inc. All rights reserved.</span>
    </div>
    <div id="footerBottomCenter">
      <span>
        <a href="#">privacy</a>|
        <a href="#">legal</a>|
        <a href="#">site map</a>
      </span>
    </div>
    <div id="footerBottomRight">
      <span>SIIT Information Technology</span>
    </div>
  </div>
</div>

<script>
// Toggle between + and x of footer content list
$('.plusIcon').html('+')
$('.accordion').each(function(){
  $(this).click(function(){
    let panel = $(this).next()
    panel.slideToggle("fast",function(){
      if(panel.is(':hidden')){
        $(this).prev().children().html('+')
      } else {
        $(this).prev().children().html('x')
      }
    })
  })
})
</script>
