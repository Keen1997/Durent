<!--
  *
  * Rent Out template
  *
 -->

 <?php
   if(!isset($_SESSION['email']) && !isset($_SESSION['customerID'])){
     echo "<script>
            window.location = './index.php?page=login'
          </script>";
   }
 ?>

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
    padding: 20px 0px;
    cursor: pointer;
    color: #777;
  }
  #uploadImages:hover{
    border-color: #CCC;
  }
  #imgPreview{
    margin-right: 50px;
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
  input[name='dateTo'], input[name='dateFrom']{
    width: calc(44% - 25px);
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
    input[name='dateTo'], input[name='dateFrom']{
      width: calc(46.5% - 50px);
    }
  }
  @media (max-width:768px) {
    input[name='dateTo'], input[name='dateFrom']{
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
  .invalidMsg{
    font-style: italic;
    color: #45D;
    float: left;
  }
</style>

<?php
  /*
   * For check some category have / no have sub-category
   *
   *
   */

  // 1. Select all categorys
  $sql = "SELECT * FROM category";
  $result = $con->query($sql);
  while ($row = $result->fetch_assoc()) {
    $categoryIDArr[] = $row['categoryID'];
    $nameArr[] = $row['name'];
  }

  // 2. Select all sub-categorys and category(parent)
  $sql = "SELECT * FROM subCategory";
  $result = $con->query($sql);
  while ($row = $result->fetch_assoc()) {
    $subCategoryIDArr[] = $row['subCategoryID'];
    $subNameArr[] = $row['name'];
    $categoryIDInSubArr[] = $row['categoryID'];
  }
?>

<script>
  // 3. Keep all categorys and sub-categorys in fontend
  let categoryIDArr = <?php echo json_encode($categoryIDArr) ?>;
  let nameArr = <?php echo json_encode($nameArr) ?>;
  let subCategoryIDarr = <?php echo json_encode($subCategoryIDArr) ?>;
  let subNameArr = <?php echo json_encode($subNameArr) ?>;
  let categoryIDInSubArr = <?php echo json_encode($categoryIDInSubArr) ?>;

  // 4.Merge all them to json
  let categoryJson = {}
  $.each(categoryIDArr, function(i){
    categoryJson[i] = {'id': categoryIDArr[i],'name': nameArr[i]}
  })
  let subCategoryJson = {}
  $.each(subCategoryIDarr, function(i){
    subCategoryJson[i] = {'id': subCategoryIDarr[i], 'name': subNameArr[i], 'categoryID': categoryIDInSubArr[i]}
  })
</script>

<?php
  $sql = "SELECT * FROM item WHERE itemID=$_GET[id]";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
?>

<!-- Display form login -->
<div class="container formCenter">
  <h2>Rent out your item</h2>
  <br>
  <form class="" action="index.php?page=afterEditItem&id=<?php echo $_GET['id']; ?>" method="post" onsubmit="">
    <input type="text" name="title" value="<?php echo $row['title']; ?>" placeholder="Item Title" pattern=".{40,}" required>
    <span class="tooltip">?<span class="tooltiptext">required / at least 40 characters</span></span>
    <br><br>
    <select class="" name="category"></select>
    <span class="tooltip">?<span class="tooltiptext">required</span></span>
    <select name="subCategory"></select>
    <textarea name="desc" rows="8" cols="80" placeholder="Description of your item" pattern=".{100,255}" required><?php echo $row['description']; ?></textarea>
    <span style="float:right;" class="tooltip">?<span class="tooltiptext">required / between 100 - 255 characters</span></span>
    <br><br>
    <span style="clear:left"></span>
    <div>
      <span id="fromText">from</span>
      <input type="date" name="dateFrom" onkeypress="return false" required/>
      <div class="breakLine"></div>
      <span id="toText">to</span>
      <input type="date" name="dateTo" onkeypress="return false" required/>
      <div id="br"></div>
      <span class="tooltip">?<span class="tooltiptext">required</span></span>
      <br><br>
    </div>
    <input type="number" name="price" value="<?php echo $row['price']; ?>" placeholder="price per day" min="1" required>
    <span class="tooltip">?<span class="tooltiptext">required</span></span>
    <br><br>
    <input type="submit" name="" value="Confirm">
    <br><br>
  </form>
</div>

<script>
  // 5. Input all category in select option
  $.each(categoryJson, function(i) {
    $("select[name='category']").append($('<option>', {
      value: categoryJson[i].id,
      text : categoryJson[i].name
    }))
  })

  $("select[name='category']").find('option[value="<?php echo $row['category']; ?>"]').attr('selected', true)

  // 6. Check if category have sub-category, show sub-category
  if($("select[name='category']").val()){
    checkSubCategory()
  }
  $("select[name='category']").change(function(){
    checkSubCategory()
  })

  // Function show sub-category (if have)
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

  <?php if($row['subCategory']) {
  ?>
    $("select[name='subCategory']").find('option[value="<?php echo $row['subCategory']; ?>"]').attr('selected', true)
  <?php } ?>

  /*
   * To limit date start from now and cannot less than 14 days
   *
   */

  // 1. Create function for prototype of date
  Date.prototype.yyyymmdd = function() {
    let yyyy = this.getFullYear().toString()
    let mm = (this.getMonth()+1).toString() // getMonth() is zero-based
    let dd  = this.getDate().toString()
    return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]) // padding
  }

  // 2. Limit date

  let startDate = new Date()
  let minDate = new Date()
  minDate.setDate(minDate.getDate()+14)

  $("input[name='dateFrom']").val(startDate.yyyymmdd())
  $("input[name='dateTo']").val(minDate.yyyymmdd())

  $("input[name='dateFrom']").attr('min' , startDate.yyyymmdd())
  $("input[name='dateTo']").attr('min' , minDate.yyyymmdd())



</script>
