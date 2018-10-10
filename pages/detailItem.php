<!--
  *
  * Detail Item template
  *
 -->

<link href="plugins/xzoom/xzoom.css" rel="stylesheet" type="text/css">
<script src="plugins/xzoom/xzoom.min.js"></script>

<style>
  .template{
    margin-top: 120px;
  }
  .left{
    float: left;
    /* border: 1px solid red; */
    width: 400px;
  }
  .right{
    float: left;
    /* border: 1px solid red; */
    width: 600px;
    margin-left: 100px;
  }
  .right h1{
    margin-bottom: 50px;
  }
  .right h3{
    font-family: "mainFontLigth";
    margin-bottom: 30px;
  }
  .right p{
    text-indent: 40px;
    margin-bottom: 20px;
  }
  .right p:last-child{
    margin-bottom: 50px;
  }
  .right span{
    margin: 0px 10px 0px;
  }
  #price{
    text-align: right;
    margin-top: 50px;
  }
  #price label{
    font-size: 18px;
    color: orange;
    font-weight: bold;
  }
  #label{
    margin-top: 50px;
    text-align: right;
  }
  #label img:hover{
    width: 200px;
    cursor: pointer;
  }
</style>

<!-- Display form login -->
<div class="container template">
  <div class="left">
    <!-- Show all item image with xzoom plugin -->
    <div class="xzoom-container">
        <img class="xzoom" src="assets/non-static/gallery/preview/appleWatch.jpg" xoriginal="assets/non-static/gallery/original/appleWatch.jpg" />
        <div class="xzoom-thumbs">
            <a href="assets/non-static/gallery/original/appleWatch.jpg"><img class="xzoom-gallery" width="80" src="assets/non-static/gallery/preview/appleWatch.jpg" title="apple watch"></a>
            <a href="assets/non-static/gallery/original/chopper_o.jpg"><img class="xzoom-gallery" width="80" src="assets/non-static/gallery/preview/chopper_p.jpg" title="chopper"></a>
            <a href="assets/non-static/gallery/original/tony_o.png"><img class="xzoom-gallery" width="80" src="assets/non-static/gallery/preview/tony_p.png" title="chopper"></a>
            <a href="assets/non-static/gallery/original/onepiece_o.jpg"><img class="xzoom-gallery" width="80" src="assets/non-static/gallery/preview/onepiece_p.jpg" title="stawhat"></a>
        </div>
    </div>
  </div>
  <div class="right">
    <!-- Item title -->
    <h1>My new apple watch , buy 1 month , never use</h1>
    <!-- Item description -->
    <div class="description">
      <h3>Description</h3>
      <p>The Apple Watch is designed to pair, or connect, with another Apple iOS device like the iPhone to push Apple Watch-specific content to the device.</p>
      <p>In fact, users will need to have an iPhone 5 or later connected to the smartwatch in order to access Apple Watch's full set of features.</p>
    </div>
    <!-- Date -->
    <label>between <span>14-10-2018</span> to <span>21-11-2018</span></label>
    <!-- Price -->
    <div id="price">
      <label>$31 per day</label>
    </div>
    <!-- Rent btn -->
    <div id="label">
      <img src="assets/static/label.png" width="150px;">
    </div>
  </div>


  <div style="clear:both"></div>

</div>

<script type="text/javascript">
  // Xzoom plugin link
  $('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#FFF', Xoffset: 15})
</script>
