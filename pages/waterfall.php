<!--
  *
  * Waterfall in the home page
  *
 -->
<!-- Slideshow Script
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script> -->

<!-- Style -->
<style>
  .flex {
    display: flex;
    overflow: hidden;
  }
  .divLeft1 {
    flex: 1;
    background-image:linear-gradient(to bottom, #000, #161616)
  }
  .divRight1 {
    flex: 1;
    padding-top: 13%;
    padding-left: 80px;
    background-image:linear-gradient(to right, #1e1f21, #000)
  }
  .divLeft2 {
    flex: 1.1;
    text-align:right;
    padding-top:13%;
    padding-right:2%;
    margin-left:0px;
    background-image:linear-gradient(to left, #000, #222);
  }
  .divRight2 {
    flex: 1.5;
    padding-top: 0px;
    padding-left: 0px;
  }
  .display-container{
    width:100%;
    display:flex;
    overflow:none;
  }
</style>

<!-- Display -->
<div>
  <!-- Second waterfall -->
  <div class="flex" style="background-color:#000;">
    <div class="divLeft2">
      <span style="color:#FFF;font-size:24px;">Let your things<br></span>
      <div style="height:13px;"></div>
      <span style="color:#fff;font-size:40px;">MAKE MONEY </span>
      <span style="color:#fff;font-size:24px;">for you</span>
    </div>
    <div class="divRight2">
      <img src="./assets/static/waterfalls/beat.jpg" width="100%">
    </div>
  </div>
  <!-- break -->
  <div style="height:15px;"></div>
  <!-- Background black in the top of page for opcity -->
  <div style="background-color:#000;"></div>
  <!-- First waterfall -->
  <div class="flex" style=";">
    <!-- Camera image -->
    <div class="divLeft1">
      <img src="./assets/static/waterfalls/camera.jpg" width="100%">
    </div>
    <!-- "Let the things MAKE MONEY for you" -->
    <div class="divRight1">
      <span style="color:#FFF;font-size:24px;">This investment<br></span>
      <div style="height:13px;"></div>
      <span style="color:#fff;font-size:40px;color:#88aaff;">DON'T HAVE</span>
      <span style="color:#fff;font-size:24px;padding-left:6px;padding-right:6px;">any</span>
      <span style="color:#fff;font-size:40px;color:#88aaff;">RISK</span><br>
      <div style="height:8px;"></div>
      <span style="color:#fff;font-size:24px;">just need to</span>
      <span style="color:#fff;font-size:40px;padding-left:2px;color:#88ff88">INVEST</span>
    </div>
  </div>
  <!-- break -->
  <div style="height:15px;"></div>
  <!-- Slideshow -->
  <!-- <div class="display-container">
    <div style="flex:1.5"></div>
    <div style="flex:3; display:flex; overflow:none;">
      <div style="flex:0.2;float:left;padding-top:15%;">
        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
      </div>
      <div style="flex:1">
        <img class="mySlides" src="./assets/static/waterfalls/nb1.jpg" style="width:100%;">
        <img class="mySlides" src="./assets/static/waterfalls/nb2.jpg" style="width:100%">
        <img class="mySlides" src="./assets/static/waterfalls/nb3.jpg" style="width:100%">
        <img class="mySlides" src="./assets/static/waterfalls/nb4.jpg" style="width:100%">
      </div>
      <div style="flex:0.2"></div>
      <div style="flex:0.2;padding-top:15%;">
        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
      </div>
    </div>
    <div style="flex:1"></div>
  </div> -->

</div>
