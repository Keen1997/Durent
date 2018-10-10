<!--
  *
  * Rent Out template
  *
 -->

<link href="plugins/datedropper/datedropper.css" rel="stylesheet" type="text/css">
<script src="plugins/datedropper/datedropper.js"></script>
<link href="plugins/datedropper/Keen-Style.css" rel="stylesheet" type="text/css" />

<style>
  .template{
    margin-top: 120px;
    text-align: center;
    width: 700px;
  }
  .template input, .template textarea, .template select{
    width: 100%;
    border-radius: 12px;
  }
  select{
    margin-bottom: 20px;
    width: 100%;
  }
  option{
    outline:none;
    border-color: #8A8A8A #E5E5E5 #E5E5E5 #8A8A8A;
    border-style: solid;
    border-width: 1px;
  }
</style>

<!-- Display form login -->
<div class="container template">
  <h2>Rent out your item</h2>
  <br>
  <form class="" action="index.php?afterRental" method="post">
    <input type="text" name="" value="" placeholder="Item Title">
    <br><br>
    <select class="" name="">
      <option value="">type 1</option>
      <option value="">type 2</option>
      <option value="">type 3</option>
    </select>
    <textarea name="name" rows="8" cols="80" placeholder="Description of your item"></textarea>
    <br><br>
    <input type="file" name="" value="">
    <br><br>
    <div style="text-align">
      <span style="margin-right:5px;">from</span>
      <input type="text"
        id="dateFrom"
        class="form-control"
        data-format="m-d-Y"
        data-large-default="true"
        data-large-mode="true"
        data-translate-mode="true"
        data-theme="Keen-Style"
        style="width:40%"
      />
      <span style="margin-left: 18px; margin-right:5px;"> to</span>
      <input type="text"
        id="dateTo"
        class="form-control"
        data-format="m-d-Y"
        data-large-default="true"
        data-large-mode="true"
        data-translate-mode="true"
        data-theme="Keen-Style"
        style="width:40%"
      />
      <br><br>
    </div>
    <input type="number" name="" placeholder="price per day">
    <br><br>
    <input type="submit" name="" value="Rent Out">
    <br><br>
  </form>
</div>

<script type="text/javascript">
  //----dateDropper----
  $('#dateFrom').dateDropper()
  $('#dateTo').dateDropper()
</script>
