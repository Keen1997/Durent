<!--
  *
  * Find template
  *
 -->

<style>
  .findTap{
    width: 100%;
    margin-bottom: 40px;
  }
  .findTap input{
    width: 400px;
    border: none;
    border-radius: 0px;
    border-bottom: 1px solid #DDD;
    font-size: 18px;
    color: #888;
  }
  .findTap input::placeholder{
    color: #A9A9A9;
    font-style: italic;
    font-size: 16px;
    font-family: 'mainFontLigth', sans-serif;
  }
  .findTap input:focus{
    border-bottom: 1px solid #BBB;
  }
  .findTap img{
    cursor: pointer;
  }
  .searchTap{
    text-align: center;
  }
  #searchIcon{
    margin-right: 12px;
    margin-left: 12px;
  }
  #categoryState{
    float: left;
    color: #7a7a7a;
    margin-left: 10px;
    margin-top: 6.5px;
  }
  .categoryName{
    cursor: pointer;
  }
  .nextCategory{
    margin-left: 15px;
    margin-right: 15px;
    color: #78abff;
  }
  #filter{
    text-align: right;
    margin-right: 10px;
    margin-top: 50px;
    margin-bottom: 30px;
    cursor: pointer;
  }
  #filterState{
    color: #666;
    font-size: 15px;
  }
  .allCards{
    margin: auto;
    width: 1000px;
    text-align: center;
  }
  .cardContainer{
    box-sizing: border-box;
    width: 25%;
    padding: 10px;
    display: inline-block;
    margin: 0px;
    float: left;
  }
  .card{
    display: inline-block;
    width: 230px;
    border: 1px solid #DDD;
    border-radius: 12px;
    text-decoration: none;
    color: inherit;
    box-sizing: border-box;
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
    text-align: left;
  }
  .cardFromDate{
    margin-left: 10px;
    margin-right: 10px
  }
  .cardPricePerDay{
    text-align:right; margin-top:24px;
    color: orange;
    margin-bottom: 16px;
    font-weight: bold;
  }
  #filterToggle{
    display: none;
  }

  @media (max-width:1100px) {
    .allCards{
      width: 750px;
    }
    .cardContainer{
      width: 33.33%;
    }
  }

  @media (max-width:775px) {
    .findTap input{
      width: 308px;
    }
    .allCards{
      width: 500px;
    }
    .cf1{
      width: 500px;
      text-align: center;
    }
    .cf2{
      width: 350px;
      margin: auto;
    }
    #categoryState{
      margin-left: 0px;
    }
    #filter{
      margin-right: 0px;
    }
    .cardContainer{
      width: 100%;
    }
    .card{
      width: 350px;
    }
    .imgCard{
      padding: 7px;
      width: 48%;
      box-sizing: border-box;
      display: inline-block;
    }
    .textCard{
      width: 50%;
      box-sizing: border-box;
      padding-left: 0px;
      display: inline-block;
      font-size: 14px;
      float: right;
    }
  }

  @media (max-width:550px) {
    .allCards{
      width: 100%;
    }
    .cf1{
      width: 100%;
    }
  }


</style>

<!-- Display form login -->
<div class="findTap">
  <div class="searchTap">
    <input type="text" placeholder="search">
    <img id="searchIcon" src="./assets/static/search.png" width="20px">
  </div>
</div>

<div class="allCards">
  
  <div class="cf1">
    <div class="cf2">
      <span id="categoryState"><span class="categoryName">watch</span><span class="nextCategory">></span><span class="categoryName">health</span></span>
      <div id="filter">
        <img src="./assets/static/filter.png" width="20px" style="margin-right:8px; opacity:0.45;">
        <span id="filterState">Price</span>
      </div>
    </div>
  </div>

  <div class="cardContainer">
    <a href="index.php?detailItem" class="card">
      <div class="imgCard">
        <img src="./assets/non-static/cardImg1.jpg">
      </div>
      <div class="textCard">
        <h4>My new apple watch , buy 1 month , never use</h4>
        <p>14-10-18 <span class="cardFromDate">to</span>20-11-18</p>
        <div class="cardPricePerDay">31$ per day</div>
      </div>
    </a>
  </div>

  <div class="cardContainer">
    <a href="index.php?detailItem" class="card">
      <div class="imgCard">
        <img src="./assets/non-static/cardImg1.jpg">
      </div>
      <div class="textCard">
        <h4>My new apple watch , buy 1 month , never use</h4>
        <p>14-10-18 <span class="cardFromDate">to</span>20-11-18</p>
        <div class="cardPricePerDay">31$ per day</div>
      </div>
    </a>
  </div>

  <div class="cardContainer">
    <a href="index.php?detailItem" class="card">
      <div class="imgCard">
        <img src="./assets/non-static/cardImg1.jpg">
      </div>
      <div class="textCard">
        <h4>My new apple watch , buy 1 month , never use</h4>
        <p>14-10-18 <span class="cardFromDate">to</span>20-11-18</p>
        <div class="cardPricePerDay">31$ per day</div>
      </div>
    </a>
  </div>

  <div class="cardContainer">
    <a href="index.php?detailItem" class="card">
      <div class="imgCard">
        <img src="./assets/non-static/cardImg1.jpg">
      </div>
      <div class="textCard">
        <h4>My new apple watch , buy 1 month , never use</h4>
        <p>14-10-18 <span class="cardFromDate">to</span>20-11-18</p>
        <div class="cardPricePerDay">31$ per day</div>
      </div>
    </a>
  </div>

  <div class="cardContainer">
    <a href="index.php?detailItem" class="card">
      <div class="imgCard">
        <img src="./assets/non-static/cardImg1.jpg">
      </div>
      <div class="textCard">
        <h4>My new apple watch , buy 1 month , never use</h4>
        <p>14-10-18 <span class="cardFromDate">to</span>20-11-18</p>
        <div class="cardPricePerDay">31$ per day</div>
      </div>
    </a>
  </div>

  <div class="cardContainer">
    <a href="index.php?detailItem" class="card">
      <div class="imgCard">
        <img src="./assets/non-static/cardImg1.jpg">
      </div>
      <div class="textCard">
        <h4>My new apple watch , buy 1 month , never use</h4>
        <p>14-10-18 <span class="cardFromDate">to</span>20-11-18</p>
        <div class="cardPricePerDay">31$ per day</div>
      </div>
    </a>
  </div>

</div>

<div style="clear:left"></div>
