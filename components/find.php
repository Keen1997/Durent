<!--
  *
  * Find template
  *
 -->

<link rel="stylesheet" href="./css/pages/find.css">

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
      <span id="categoryState">
        <div class="dropdown">
        <button class="dropbtn" style="color:inherit; margin-top:-20px;">Categories</button>
          <div class="dropdown-content">
            <a href="index.php?page=find">all</a>
            <?php
              // Select and show all category
              $sql = "SELECT name, categoryID FROM category";
              $result = $con->query($sql);
              while($row = $result->fetch_assoc()){
                $categoryName = $row['name'];
                echo "<a class='dropdown-menu' href='index.php?page=find&menu=$categoryName'>$categoryName</a>";
                // Select and show all submenu if parent have
                $sql = "SELECT name FROM subCategory WHERE categoryID=".$row['categoryID'];
                $result2 = $con->query($sql);
                if($result2->num_rows > 0){
                  echo "<ul class='dropdown-submenu'>";
                  while($row2 = $result2->fetch_assoc()){
                    $subCategoryName = $row2['name'];
                    echo "<li><a href='?page=find&menu=$categoryName&submenu=$subCategoryName'>$subCategoryName</a></li>";
                  }
                  echo "</ul>";
                }
              }
            ?>
          </div>
        </div>
        <?php
        // Show current menu and submenu
          if(isset($_GET['menu'])){
            echo "<span class='nextCategory'>></span>
                  <span>".$_GET['menu']."</span>";
            if(isset($_GET['submenu'])){
              echo "<span class='nextCategory'>></span>
                    <span>".$_GET['submenu']."</span>";
            }
          } else {
            echo "<span class='nextCategory'>></span>
                  <span>all</span>";
          }
        ?>
      </span>
      <div id="filter">
        <img src="./assets/static/filter.png" width="20px" style="margin-right:8px; opacity:0.45;">
        <div class="dropdown dropdown2">
        <button class="dropbtn">date</button>
          <div class="dropdown-content dropdown-content2">
            <label onclick="filterUrl('price')">price</label>
            <label onclick="filterUrl('character')">character</label>
            <label onclick="filterUrl('date')">date</label>
          </div>
      </div>
    </div>
  </div>

  <?php
    $sql = "SELECT * FROM item";
    // If have category and subCategory, add into where category condition in sql
    // Category
    if(isset($_GET['menu'])){
      $menuName = str_replace('', '%20', $_GET['menu']);
      $sql_menu = "SELECT categoryID FROM category WHERE name='$menuName'";
      $result_menu = $con->query($sql_menu);
      while($row_menu = $result_menu->fetch_assoc()){
        $menuID = $row_menu['categoryID'];
      }
      $sql = $sql." WHERE category='$menuID'";
      // SubCategory
      if(isset($_GET['submenu'])){
        $submenuName = str_replace('', '%20', $_GET['submenu']);
        $sql_submenu = "SELECT subCategoryID FROM subCategory WHERE name='$submenuName'";
        $result_submenu = $con->query($sql_submenu);
        while($row_submenu = $result_submenu->fetch_assoc()){
          $submenuID = $row_submenu['subCategoryID'];
        }
        $sql = $sql." AND subCategory='$submenuID'";
      }
    }
    // If have filter, add into order condition in sql
    if(isset($_GET['order'])){

      if($_GET['order']=='priceDesc'){
        $sql = $sql." ORDER BY price DESC";

      } else if($_GET['order']=='priceAsc'){
        $sql = $sql." ORDER BY price ASC";

      } else if($_GET['order']=='dateDesc'){
        $sql = $sql." ORDER BY dateFrom DESC";

      } else if($_GET['order']=='dateAsc'){
        $sql = $sql." ORDER BY dateFrom ASC";

      } else if($_GET['order']=='characterDesc'){
        $sql = $sql." ORDER BY title DESC";

      } else if($_GET['order']=='characterAsc'){
        $sql = $sql." ORDER BY title ASC";
      }
    }

    $result = $con->query($sql);
    while($row = $result->fetch_assoc()){
      $title = $row['title'];
      $id = $row['itemID'];
      ?>
      <div class="cardContainer">
        <a href="index.php?page=itemDetail&id=<?php echo $id; ?>" class="card">
          <div class="imgCard">
            <?php
              $sql = "SELECT imageSrc FROM itemImage
                      WHERE itemID = '$id'
                      LIMIT 1";
              $resultImg = $con -> query($sql);
              while ($rowImg = $resultImg->fetch_assoc()){
                $imgSrc = $rowImg['imageSrc'];
                echo "<img src='$imgSrc'>";
              }
            ?>
          </div>
          <div class="textCard">
            <h4><?php echo $title; ?></h4>
            <p><?php echo $row['dateFrom']; ?> <span class="cardFromDate">to</span><?php echo $row['dateTo']; ?></p>
            <div class="cardPricePerDay"><?php echo $row['price']; ?>$ per day</div>
          </div>
        </a>
      </div>
      <?php
    }
  ?>

</div>

<div style="clear:left"></div>

<script>
  // To Set height of every cards equal, add line space between image and text in each cards
  $('.cardContainer').each(function(){
    let h = $(this).height()
    $(this).find('.textCard').css({'padding-top': 325-h})
  })

  // Toggle submenu when hover parent or not when no hover and set top position of submenu to equal parent
  $('.dropdown-menu').hover(function(){
    $(this).next('.dropdown-submenu')
    .css({'display':'block',
          'top': $(this).position().top
    })
  },function(){
    $(this).next('.dropdown-submenu').css({'display':'none'})
  })

  // Toggle submenu when hover submenu or not when no hover
  $('.dropdown-submenu').hover(function(){
    $(this).css({'display':'block'})
  },function(){
    $(this).css({'display':'none'})
  })

  // When click filter, send filter to order query string
  function filterUrl(filter){
    let newUrl = window.location.href
    if(window.location.href.indexOf('&order')>-1){
      newUrl = newUrl.substring(0, newUrl.indexOf('&order'))
    }
    newUrl += '&order=' + filter
    if(window.location.href.indexOf(filter)>-1){
      if(window.location.href.indexOf(filter+'Asc')>-1){
        newUrl += 'Desc'
      } else {
        newUrl += 'Asc'
      }
    } else {
      newUrl += 'Desc'
    }

    window.location = newUrl
  }
</script>
