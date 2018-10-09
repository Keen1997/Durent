<!--
  *
  * Rent Out template
  *
 -->

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
  <form class="" action="index.php?afterLogin" method="post">
    <input type="text" name="" value="" placeholder="Product Name">
    <br><br>
    <select class="" name="">
      <option value="">type 1</option>
      <option value="">type 2</option>
      <option value="">type 3</option>
    </select>
    <textarea name="name" rows="8" cols="80"></textarea>
    <br><br>
    <input type="file" name="" value="">
    <br><br>
    <input type="submit" name="" value="Rent Out">
    <br><br>
    <img src="./assets/static/google_icon.png" width="45px" class="icon_signIn">
    <span style="width:40px; color:#FFF;">.</span>
    <img src="./assets/static/facebook_icon.png" width="45px" class="icon_signIn">
  </form>
</div>
