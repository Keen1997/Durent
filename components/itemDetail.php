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
<link rel="stylesheet" href="./css/pages/itemDetail.css">

<!-- Display form login -->
<div class="template">
  <div class="image">
    <!-- Show all item image with xzoom plugin -->
    <div class="xzoom-container">
      <?php
        if(isset($_GET['id'])){
          $sql_mainImg = "SELECT imageSrc FROM itemImage WHERE itemID=".$_GET['id']." LIMIT 1";
          $result_mainImg = $con -> query($sql_mainImg);
          while($row_mainImg = $result_mainImg->fetch_assoc()){
      ?>
      <img class="xzoom" width="400" src="<?php echo $row_mainImg['imageSrc']; ?>" xoriginal="<?php echo $row_mainImg['imageSrc']; ?>" />
      <?php
          }
          $sql = "SELECT imageSrc FROM itemImage WHERE itemID=".$_GET['id'];
          $result = $con -> query($sql);
      ?>
      <div class="xzoom-thumbs">
      <?php
        while($row = $result->fetch_assoc()){
      ?>
          <a href="<?php echo $row['imageSrc']; ?>"><img class="xzoom-gallery" width="80" src="<?php echo $row['imageSrc']; ?>" title="apple watch"></a>
      <?php
        }
      echo "</div>";
      }
      ?>
    </div>
  </div>
  <div class="text">
    <?php
      if(isset($_GET['id'])){
        $sql = "SELECT * FROM item WHERE itemID=".$_GET['id'];
        $result = $con -> query($sql);

        while($row = $result->fetch_assoc()){
    ?>
    <!-- Item title -->
    <h1><?php echo $row['title']; ?></h1>
    <!-- Item description -->
    <div class="description">
      <h3>Description</h3>
      <p><?php echo $row['description']; ?></p>
    </div>
    <!-- Date -->
    <label>between <span class="date"><?php echo $row['dateFrom']; ?></span> to <span class="date"><?php echo $row['dateTo']; ?></span></label>
    <!-- Price -->
    <div id="price">
      <label>$<?php echo $row['price']; ?> per day</label>
    </div>
    <!-- Rent btn -->
    <div id="label">
      <button id="rent_btn" class="btn">Rent</button>
    </div>
  </div>

  <?php
      }
    }
  ?>

  <div style="clear:both"></div>

  <?php require './components/itemDetailModal.php'; ?>

</div>

<script type="text/javascript">
  // Xzoom plugin link
  $('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#FFF', Xoffset: 15})

  // ------------ Modal --------------
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
