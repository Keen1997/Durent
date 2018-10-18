<!--
  *
  * Find template
  *
 -->

<style>
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
  #filterState{
    color: #666;
    font-size: 15px;
  }
  .allCards{
    margin: auto;
    display: flex;
  }
  .card{
    flex: 1;
    margin: 10px;
    border-radius: 12px;
    border: 1px solid #DDD;
    text-decoration: none;
    color: inherit;
  }
  .card:hover{
    box-shadow: 10px 10px #F2F2F2;
  }
  .imgCard{
    text-align: center;
    padding: 15px;
    padding-bottom: 0px;
  }
  .imgCard img{
    height: 150px;
    overflow: hidden;
  }
  .textCard{
    padding: 15px;
    padding-top: 0px;
    padding-bottom: 0px;
  }
</style>

<!-- Display form login -->
<div>
  <div class="searchTap">
    <input type="text" name="" value="" placeholder="search">
    <img src="./assets/static/search.png" width="20px" style="margin-right:12px;">
    <img src="./assets/static/category.png" width="20px" style="opacity:0.2;">
    <div style="display:flex">
      <div style="flex:1;"></div>
      <div style="flex:4; text-align:right; margin-right:16px; margin-top:50px; cursor:pointer;">
        <img src="./assets/static/filter.png" width="20px" style="margin-right:8px; opacity:0.45;">
        <span id="filterState">Price</span>
      </div>
      <div style="flex:1;"></div>
    </div>
  </div>

  <br><br>
  <div >

 <!-- Card row 1 -->
  <div style="display:flex">
    <div style="flex:1;"></div>

    <div style="flex:4;" class="allCards">

      <a href="index.php?detailItem" class="card">
        <div class="imgCard">
          <img src="./assets/non-static/cardImg1.jpg">
        </div>
        <div class="textCard">
          <h4>My new apple watch , buy 1 month , never use</h4>
          <p>14-10-18 <span style="margin-left:10px;margin-right:10px">to</span>20-11-18</p>
          <div style="text-align:right; margin-top:24px;"><p style="color:orange"><b>31$ per day</b></p></div>
        </div>
      </a>

      <a href="index.php?detailItem" class="card">
        <div class="imgCard">
          <img src="./assets/non-static/cardImg1.jpg">
        </div>
        <div class="textCard">
          <h4>My new apple watch , buy 1 month , never use</h4>
          <p>14-10-18 <span style="margin-left:10px;margin-right:10px">to</span>20-11-18</p>
          <div style="text-align:right; margin-top:24px;"><p style="color:orange"><b>31$ per day</b></p></div>
        </div>
      </a>

      <a href="index.php?detailItem" class="card">
        <div class="imgCard">
          <img src="./assets/non-static/cardImg1.jpg">
        </div>
        <div class="textCard">
          <h4>My new apple watch , buy 1 month , never use</h4>
          <p>14-10-18 <span style="margin-left:10px;margin-right:10px">to</span>20-11-18</p>
          <div style="text-align:right; margin-top:24px;"><p style="color:orange"><b>31$ per day</b></p></div>
        </div>
      </a>

      <a href="index.php?detailItem" class="card">
        <div class="imgCard">
          <img src="./assets/non-static/cardImg1.jpg">
        </div>
        <div class="textCard">
          <h4>My new apple watch , buy 1 month , never use</h4>
          <p>14-10-18 <span style="margin-left:10px;margin-right:10px">to</span>20-11-18</p>
          <div style="text-align:right; margin-top:24px;"><p style="color:orange"><b>31$ per day</b></p></div>
        </div>
      </a>

    </div>


    <div style="flex:1;"></div>
  </div>

<!-- Card row 2 -->
  <div style="display:flex">
    <div style="flex:1;"></div>

    <div style="flex:4;" class="allCards">

      <a href="index.php?detailItem" class="card">
        <div class="imgCard">
          <img src="./assets/non-static/cardImg1.jpg">
        </div>
        <div class="textCard">
          <h4>My new apple watch , buy 1 month , never use</h4>
          <p>14-10-18 <span style="margin-left:10px;margin-right:10px">to</span>20-11-18</p>
          <div style="text-align:right; margin-top:24px;"><p style="color:orange"><b>31$ per day</b></p></div>
        </div>
      </a>

      <a href="index.php?detailItem" class="card">
        <div class="imgCard">
          <img src="./assets/non-static/cardImg1.jpg">
        </div>
        <div class="textCard">
          <h4>My new apple watch , buy 1 month , never use</h4>
          <p>14-10-18 <span style="margin-left:10px;margin-right:10px">to</span>20-11-18</p>
          <div style="text-align:right; margin-top:24px;"><p style="color:orange"><b>31$ per day</b></p></div>
        </div>
      </a>

      <a href="index.php?detailItem" class="card">
        <div class="imgCard">
          <img src="./assets/non-static/cardImg1.jpg">
        </div>
        <div class="textCard">
          <h4>My new apple watch , buy 1 month , never use</h4>
          <p>14-10-18 <span style="margin-left:10px;margin-right:10px">to</span>20-11-18</p>
          <div style="text-align:right; margin-top:24px;"><p style="color:orange"><b>31$ per day</b></p></div>
        </div>
      </a>

      <a href="index.php?detailItem" class="card">
        <div class="imgCard">
          <img src="./assets/non-static/cardImg1.jpg">
        </div>
        <div class="textCard">
          <h4>My new apple watch , buy 1 month , never use</h4>
          <p>14-10-18 <span style="margin-left:10px;margin-right:10px">to</span>20-11-18</p>
          <div style="text-align:right; margin-top:24px;"><p style="color:orange"><b>31$ per day</b></p></div>
        </div>
      </a>

    </div>


    <div style="flex:1;"></div>
  </div>
</div>
