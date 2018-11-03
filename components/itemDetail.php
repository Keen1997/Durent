<!--
  *
  * Detail Item template
  *
-->

<!-- Plugin -->
<link href="plugins/xzoom/xzoom.css" rel="stylesheet" type="text/css">
<script src="plugins/xzoom/xzoom.min.js"></script>
<script src="plugins/inputmark\jquery.inputmask.bundle.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="./css/itemDetail.css">

<!-- Display form login -->
<div class="template">
  <div class="image">
    <!-- Show all item image with xzoom plugin -->
    <div class="xzoom-container">
        <img class="xzoom" width="400" src="assets/non-static/gallery/appleWatch.jpg" xoriginal="assets/non-static/gallery/appleWatch.jpg" />
        <div class="xzoom-thumbs">
            <a href="assets/non-static/gallery/appleWatch.jpg"><img class="xzoom-gallery" width="80" src="assets/non-static/gallery/appleWatch.jpg" title="apple watch"></a>
            <a href="assets/non-static/gallery/chopper.jpg"><img class="xzoom-gallery" width="80" src="assets/non-static/gallery/chopper.jpg" title="chopper"></a>
            <a href="assets/non-static/gallery/tony.png"><img class="xzoom-gallery" width="80" src="assets/non-static/gallery/tony.png" title="chopper"></a>
            <a href="assets/non-static/gallery/onepiece.jpg"><img class="xzoom-gallery" width="80" src="assets/non-static/gallery/onepiece.jpg" title="stawhat"></a>
            <a href="assets/non-static/gallery/mc.png"><img class="xzoom-gallery" width="80" src="assets/non-static/gallery/mc.png" title="mindcare"></a>
            <a href="assets/non-static/gallery/e.png"><img class="xzoom-gallery" width="80" src="assets/non-static/gallery/e.png" title="enemy"></a>
        </div>
    </div>
  </div>
  <div class="text">
    <!-- Item title -->
    <h1>My new apple watch , buy 1 month , never use</h1>
    <!-- Item description -->
    <div class="description">
      <h3>Description</h3>
      <p>The Apple Watch is designed to pair, or connect, with another Apple iOS device like the iPhone to push Apple Watch-specific content to the device.</p>
      <p>In fact, users will need to have an iPhone 5 or later connected to the smartwatch in order to access Apple Watch's full set of features.</p>
    </div>
    <!-- Date -->
    <label>between <span class="date">14-10-2018</span> to <span class="date">21-11-2018</span></label>
    <!-- Price -->
    <div id="price">
      <label>$31 per day</label>
    </div>
    <!-- Rent btn -->
    <div id="label">
      <button id="rent_btn" class="btn">Rent</button>
    </div>
  </div>

  <div style="clear:both"></div>

</div>

<!-- Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" id="modal-content1">
    <span class="close">&times;</span>
    <div style="clear:right"></div>
    <!-- Info section -->
    <div class="info section">
      <h3>Your info</h3>
      <!-- Name -->
      <div class="">
        <div  class="keySide">
          <label>Name</label>
        </div
        ><div class="dataSide">
          <label>Narongchai Jaroonpipatkul</label>
        </div>
      </div>
      <!-- Tel no -->
      <div class="">
        <div  class="keySide">
          <label>Tel no</label>
        </div
        ><div class="dataSide">
          <label>063-191-3467</label>
        </div>
      </div>
      <!-- Email -->
      <div class="">
        <div  class="keySide">
          <label>Email</label>
        </div
        ><div class="dataSide">
          <label>narongchaioioi@gmail.com</label>
        </div>
      </div>
      <div style="clear:left"></div>
    </div>

    <div class="lineBreak"></div>

    <!-- Address section -->
    <div class="address section">
      <div class="">
        <div  class="keySide">
          <label>Address</label>
        </div
        ><div class="dataSide">
          <select class="" name="">
            <option value="">My Home</option>
            <option value="">My Condo</option>
          </select>
        </div>
        <div class="addressDetail">
          <p>12/34, my road 12, my road, my sub district, my district, my province, my zipcode</p>
        </div>
      </div>
    </div>
    <div style="clear:left"></div>

    <div class="lineBreak"></div>

    <div style="text-align:center">
      <button id="next_btn" class="btn">Next</button>
    </div>

  </div>

  <div class="modal-content" id="modal-content2">
    <span class="close">&times;</span>
    <div style="clear:right"></div>
    <!-- Item section -->
    <div class="item section">
      <h3>Item Detail</h3>
      <!-- Item title -->
      <h1>My new apple watch , buy 1 month , never use</h1>
      <!-- Item description -->
      <div class="description">
        <h3>Description :</h3>
        <p>The Apple Watch is designed to pair, or connect, with another Apple iOS device like the iPhone to push Apple Watch-specific content to the device.</p>
        <p>In fact, users will need to have an iPhone 5 or later connected to the smartwatch in order to access Apple Watch's full set of features.</p>
      </div>
      <!-- Price -->
      <div id="price_modal">
        <label>$31 per day</label>
      </div>
      <!-- Date -->
      <div class="date_modal">
        <label>Rent From</label>
        <input type="date" name="" value="">
        <label> to </label>
        <input type="date" name="" value="">
      </div>
      <div class="date_modal_toggle">
        <div class="">
          <div class="left">
            <label>from</label>
          </div
          ><div class="right">
            <input type="date" name="" value="">
          </div>
        </div>
        <div class="">
          <div class="left">
            <label>to</label>
          </div
          ><div class="right">
            <input type="date" name="" value="">
          </div>
        </div>

      </div>

    </div>
    <div style="clear:left"></div>

    <div style="text-align:center">
      <p>total $65</p>
    </div>

    <div class="lineBreak"></div>

    <div style="text-align:center">
      <button id="next2_btn" class="btn">Next</button>
    </div>

  </div>

  <div class="modal-content" id="modal-content3">
    <span class="close">&times;</span>
    <div style="clear:right"></div>

    <!-- Payment section -->
    <div class="payment section">
      <h3>Payment</h3>
      <!-- Payment -->
      <div class="">
        <div  class="keySide">
          <label>Payment</label>
        </div
        ><div class="dataSide">
          <label>XXXX-XXXX-XXXX-1234</label>
        </div>
      </div>
      <!-- Payment type -->
      <div class="">
        <div  class="keySide">
          <label>Payment type</label>
        </div
        ><div class="dataSide">
          <label>VISA</label>
        </div>
      </div>
      <!-- CCV -->
      <div class="">
        <div  class="keySide">
          <label>ccv</label>
        </div
        ><div class="dataSide">
          <input id="ccv" type="text" name="" value="">
        </div>
      </div>
      <!-- Price -->
      <div class="">
        <div  class="keySide">
          <label>Price</label>
        </div
        ><div class="dataSide">
          <label>$65</label>
        </div>
      </div>
    </div>

    <div style="clear:left"></div>

    <div class="lineBreak"></div>

    <div style="text-align:center">
      <button id="confirm_btn" class="btn">Confirm</button>
    </div>

  </div>

</div>

<script type="text/javascript">
  // Xzoom plugin link
  $('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#FFF', Xoffset: 15})
  // CCV input inputmark
  $('#ccv').inputmask("999",{ "placeholder": "CCV" })

  // ------------------------ Modal ---------------------- //
  // When the user clicks the button, open the modal
  $('#rent_btn').click(function(){
    $('#myModal').css({'display':'block'})
    $('#modal-content1').css({'display':'block'})
    $('#modal-content2').css({'display':'none'})
    $('#modal-content3').css({'display':'none'})
  })
  $('#next_btn').click(function(){
    $('#modal-content1').css({'display':'none'})
    $('#modal-content2').css({'display':'block'})
    $('#modal-content3').css({'display':'none'})
  })
  $('#next2_btn').click(function(){
    $('#modal-content1').css({'display':'none'})
    $('#modal-content2').css({'display':'none'})
    $('#modal-content3').css({'display':'block'})
  })
  // When the user clicks on <span> (x), close the modal
  $('.close').click(function(){
    $('#myModal').css({'display':'none'})
  })
  // When the user clicks anywhere outside of the modal, close it
  $(window).click(function(event) {
    if(event.target.id == 'myModal'){
      $('#myModal').css({'display':'none'})
    }
  })
</script>
