<!--
  *
  * Rent Out template
  *
 -->

<style>
  input{
    margin-bottom: 15px;
  }
  textarea{
    margin-bottom: 15px;
  }
  select{
    margin-bottom: 35px;
    width: 100%;
  }
  option{
    outline:none;
    border-color: #8A8A8A;
    border-style: solid;
    border-width: 1px;
  }
  #uploadImages{
    width: calc(100% - 50px);
    border: 1px solid #E5E5E5;
    border-radius: 18px;
    margin-bottom: 15px;
    display: inline-block;
    padding: 50px 0px;
    cursor: pointer;
    color: #777;
  }
  #uploadImages:hover{
    border-color: #CCC;
  }
  #dateFrom, #dateTo{
    width: calc(44% - 25px);
  }
  #fromText{
    margin-right: 10px;
  }
  #toText{
    margin-left: 10px;
    margin-right: 5px;
  }
  .breakLine{
    display: none;
  }
  .formCenter input,textarea,select{
    width: calc(100% - 50px);
  }
  input[type='submit']{
    width: 100%;
  }
  span{
    margin-left: 12px;
    font-size: 14px;
  }
  #br{
    margin-top: 12px;
    display: none;
  }
  @media (max-width:992px) {
    #dateTo, #dateFrom{
      width: calc(46.5% - 50px);
    }
  }
  @media (max-width:768px) {
    #dateTo, #dateFrom{
      width: calc(50%);
    }
    .formCenter{
      padding: 10px;
      width: 100%;
      box-sizing: border-box;
    }
    .breakLine{
      display: block;
      margin-bottom: 20px;
    }
    select[name="subCategory"]{
      margin-left: 0px;
    }
    #toText{
      margin-right: 20px;
    }
    #br{
      display: block;
    }
  }
</style>

<?php
  $sql = "SELECT * FROM category";
  $result = $con->query($sql);
  while ($row = $result->fetch_assoc()) {
    $categoryIDArr[] = $row['categoryID'];
    $nameArr[] = $row['name'];
  }

  $sql = "SELECT * FROM subCategory";
  $result = $con->query($sql);
  while ($row = $result->fetch_assoc()) {
    $subCategoryIDArr[] = $row['subCategoryID'];
    $subNameArr[] = $row['name'];
    $categoryIDInSubArr[] = $row['categoryID'];
  }
?>

<script>
  let categoryIDArr = <?php echo json_encode($categoryIDArr) ?>;
  let nameArr = <?php echo json_encode($nameArr) ?>;
  let subCategoryIDarr = <?php echo json_encode($subCategoryIDArr) ?>;
  let subNameArr = <?php echo json_encode($subNameArr) ?>;
  let categoryIDInSubArr = <?php echo json_encode($categoryIDInSubArr) ?>;

  let categoryJson = {}
  $.each(categoryIDArr, function(i){
    categoryJson[i] = {'id': categoryIDArr[i],'name': nameArr[i]}
  })

  let subCategoryJson = {}
  $.each(subCategoryIDarr, function(i){
    subCategoryJson[i] = {'id': subCategoryIDarr[i], 'name': subNameArr[i], 'categoryID': categoryIDInSubArr[i]}
  })
</script>

<!-- Display form login -->
<div class="container formCenter">
  <h2>Rent out your item</h2>
  <br>
  <form class="" action="index.php?page=afterRental" method="post" enctype="multipart/form-data">
    <input type="text" name="title" value="" placeholder="Item Title">
    <span class="tooltip">?<span class="tooltiptext">required / valid email format</span></span>
    <br><br>
    <select class="" name="category"></select>
    <span class="tooltip">?<span class="tooltiptext">required / valid email format</span></span>
    <select name="subCategory"></select>
    <textarea name="desc" rows="8" cols="80" placeholder="Description of your item"></textarea>
    <span style="float:right;" class="tooltip">?<span class="tooltiptext">required / valid email format</span></span>
    <br><br>
    <div id="uploadImages">upload images here</div>
    <span class="tooltip">?<span class="tooltiptext">required / valid email format</span></span>
    <div id="imgPreview"></div>
    <div id="images"></div>
    <br><br>
    <div>
      <span id="fromText">from</span>
      <input type="date" id="dateFrom" name="dateFrom" onkeypress="return false"/>
      <div class="breakLine"></div>
      <span id="toText">to</span>
      <input type="date" id="dateTo" name="dateTo" onkeypress="return false"/>
      <div id="br"></div>
      <span class="tooltip">?<span class="tooltiptext">required / valid email format</span></span>
      <br><br>
    </div>
    <input type="number" name="price" placeholder="price per day">
    <span class="tooltip">?<span class="tooltiptext">required / valid email format</span></span>
    <br><br>
    <input type="submit" name="" value="Rent Out">
    <br><br>
  </form>
</div>

<script>
  $.each(categoryJson, function(i) {
    $("select[name='category']").append($('<option>', {
      value: categoryJson[i].id,
      text : categoryJson[i].name
    }))
  })

  if($("select[name='category']").val()){
    checkSubCategory()
  }

  $("select[name='category']").change(function(){
    checkSubCategory()
  })

  function checkSubCategory(){
    $("select[name='subCategory']").empty()
    $("select[name='subCategory']").css({'display' : 'none'})
    $.each(subCategoryJson, function(i) {
      if(subCategoryJson[i].categoryID == $("select[name='category']").val()){
        $("select[name='subCategory']").css({'display' : 'block'})
        $("select[name='subCategory']").append($('<option>', {
          value: subCategoryJson[i].id,
          text : subCategoryJson[i].name
        }))
      }
    })
  }

  Date.prototype.yyyymmdd = function() {
    let yyyy = this.getFullYear().toString()
    let mm = (this.getMonth()+1).toString() // getMonth() is zero-based
    let dd  = this.getDate().toString()
    return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]) // padding
  }

  let startDate = new Date()
  let minDate = new Date()
  minDate.setDate(minDate.getDate()+14)

  $("input[name='dateFrom']").val(startDate.yyyymmdd())
  $("input[name='dateTo']").val(minDate.yyyymmdd())

  $("input[name='dateFrom']").attr('min' , startDate.yyyymmdd())
  $("input[name='dateTo']").attr('min' , minDate.yyyymmdd())

  let imgCount = 0
  $('#uploadImages').click(function(){
    imgCount += 1
    let imgEle = '<input type="file" name="images[]" value="" accept="image/*" id="'+imgCount+'img" style="display:none" onChange="showImage(this)">'
    $('#images').append(imgEle)
    $('#'+imgCount+'img').click()
  })

  let image_arr = []
  function showImage(input){
    let exist = false
    for(let i=0; i<image_arr.length; i++){
      if(image_arr[i]==input.value){
        alert('you already upload this image !')
        $(input).remove();
        exist = true
      }
    }
    if(!exist){
      image_arr.push(input.value)
      alert(image_arr)
      let fr = new FileReader()
      fr.onload = function(e){
        let imgPre = '<img src="'+e.target.result+'" width="200" style="margin:0px 20px">'
        $('#imgPreview').append(imgPre)
      }
      fr.readAsDataURL(input.files[0])
    }
  }



</script>
