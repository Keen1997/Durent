<!--
  *
  * find template
  *
 -->

<style>
  .template{
    margin-top: 120px;
    text-align: center;
  }
  .searchTap{
    width: 100%;
    text-align: center;
  }
  .searchTap input{
    margin-left: 25px;
    margin-right: 10px;
    width: 400px;
    border: none;
    border-radius: 0px;
    border-bottom: 1px solid #DDD;
    font-size: 18px;
    color: #888;
  }
  .searchTap input::placeholder{
    color: #BBB;
    font-style: italic;
    font-size: 16px;
    font-family: 'mainFontLigth', sans-serif;
  }
  .searchTap input:focus{
    border-bottom: 1px solid #BBB;
  }
  .searchTap img{
    cursor: pointer;
  }
</style>

<!-- Display form login -->
<div class="container template">
  <div class="searchTap">
    <input type="text" name="" value="" placeholder="search">
    <img src="./assets/static/search.png" width="20px" style="margin-right:12px;">
    <img src="./assets/static/filter.png" width="20px" style="margin-right:12px; opacity:0.45;">
    <img src="./assets/static/category.png" width="20px" style="opacity:0.2;">
  </div>

  <br><br>
  <form class="" action="index.php?afterLogin" method="post">
    <input type="text" name="" value="" placeholder="email">
    <br><br>
    <input type="text" name="" value="" placeholder="password">
    <br><br>
    <input type="submit" name="" value="Log In">
    <br><br>
    <img src="./assets/static/google_icon.png" width="45px" class="icon_signIn">
    <span style="width:40px; color:#FFF;">.</span>
    <img src="./assets/static/facebook_icon.png" width="45px" class="icon_signIn">
  </form>
</div>
