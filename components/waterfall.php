<!--
  *
  * Waterfall in the home page
  *
 -->

<!-- Style -->
<style>
  .flex {
    display: flex;
    overflow: hidden;
  }
  .divLeft1 {
    padding-bottom: 50px;
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
<div class="fluidTop">
  <!-- Second waterfall -->
  <div class="flex" style="background-color:#000;">
    <div class="divLeft2">
      <span style="color:#FFF;font-size:24px;">Let your things<br></span>
      <div style="height:13px;"></div>
      <span style="color:#FFF;font-size:40px;">MAKE MONEY </span>
      <span style="color:#FFF;font-size:24px;">for you</span>
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
      <span style="color:#FFF; font-size:24px;">This investment<br></span>
      <div style="height:13px;"></div>
      <span style="color:#FFF; font-size:40px;color:#88aaff;">DON'T HAVE</span>
      <span style="color:#FFF; font-size:24px;padding-left:6px;padding-right:6px;">any</span>
      <span style="color:#FFF; font-size:40px;color:#88aaff;">RISK</span><br>
      <div style="height:8px;"></div>
      <span style="color:#FFF; font-size:24px;">just need to</span>
      <span style="color:#FFF; font-size:40px;padding-left:2px;color:#88ffaa">INVEST</span>
    </div>
  </div>
  <!-- break -->
  <div style="height:15px;"></div>
</div>
<div style="height:200px;"></div>

<script type="text/javascript">

  window.onscroll = function() {
    scrollTop = document.documentElement.scrollTop
    if(scrollTop>=450 && scrollTop<=750){
      imgHeight = 100-(scrollTop-450)/20
      paddingLeft = 80+(scrollTop-450)*1.5
      $('#camera').width(imgHeight+'%')
      $('.divRight1').css({"padding-left" : paddingLeft+"px"})
    }
  }
</script>
