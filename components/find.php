<!--
  *
  * Find template
  *
 -->

<link rel="stylesheet" href="./css/pages/find.css">

<!-- Display form login -->
<div class="findTap">
  <div class="searchTap">
    <?php
      if(isset($_GET['search'])){
        if($_GET['search']!=''){
          $search = $_GET['search'];
        } else {
          $search = '';
        }
      } else {
        $search = '';
      }
    ?>
    <input type="text" placeholder="search" name="search" value="<?php echo $search; ?>">
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
              // If url have filter, keep filter
              if(isset($_GET['order'])){
                $keepOrder = '&order='.$_GET['order'];
              } else {
                $keepOrder = '';
              }
              // Select and show all category
              $sql = "SELECT name, categoryID FROM category";
              $result = $con->query($sql);
              while($row = $result->fetch_assoc()){
                $categoryName = $row['name'];
                echo "<a class='dropdown-menu' href='index.php?page=find&menu=$categoryName$keepOrder'>$categoryName</a>";
                // Select and show all submenu if parent have
                $sql = "SELECT name FROM subCategory WHERE categoryID=".$row['categoryID'];
                $result2 = $con->query($sql);
                if($result2->num_rows > 0){
                  echo "<ul class='dropdown-submenu'>";
                  while($row2 = $result2->fetch_assoc()){
                    $subCategoryName = $row2['name'];
                    echo "<li><a href='?page=find&menu=$categoryName&submenu=$subCategoryName$keepOrder'>$subCategoryName</a></li>";
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
      <?php
        if(isset($_GET['order'])){
          if(strpos($_GET['order'],'Desc')){
            $order = str_replace('Desc', '', $_GET['order']);
          }
          else if(strpos($_GET['order'],'Asc')){
            $order = str_replace('Asc', '', $_GET['order']);
          } else {
            $order = $_GET['order'];
          }
        }
      ?>
      <div id="filter">
        <img src="./assets/static/filter.png" width="20px" style="margin-right:20px; opacity:0.45;">
        <div class="dropdown dropdown2">
        <button class="dropbtn" style="color:#777"><?php echo $order; ?></button>
          <div class="dropdown-content dropdown-content2">
            <label onclick="filterUrl('price')" style="padding-right:30px;"><img src="./assets/static/da.png" class="sort">price</label>
            <label onclick="filterUrl('character')"><img src="./assets/static/da.png" class="sort">character</label>
            <label onclick="filterUrl('date')" style="padding-right:30px;"><img src="./assets/static/da.png" class="sort">date</label>
            <label onclick="filterUrl('old')" style="padding-right:16px;">old</label>
            <label onclick="filterUrl('new')" style="padding-right:12px;">new</label>
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

    // If have search, add like condition in title column
    if(isset($_GET['search'])){
      if(strpos($sql, 'WHERE')){
        $sql = $sql." AND title LIKE '%$_GET[search]%'";
      } else{
        $sql = $sql." WHERE title LIKE '%$_GET[search]%'";
      }
    }

    // If have filter, add into order condition in title column
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

      } else if($_GET['order']=='old'){
        $sql = $sql." ORDER BY itemID ASC";

      } else if($_GET['order']=='new'){
        $sql = $sql." ORDER BY itemID DESC";
      }
    }

    $result = $con->query($sql);
    $cardCount = mysqli_num_rows($result);
    if($cardCount > 0){
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
              <?php if($row['status']=='availiable') { ?>
                <p><?php echo $row['dateFrom']; ?> <span class="cardFromDate">to</span><?php echo $row['dateTo']; ?></p>
              <?php } else {
                echo "<p class='status'>($row[status])</p>";
              } ?>
              <div class="cardPricePerDay"><?php echo $row['price']; ?>$ per day</div>
            </div>
          </a>
        </div>
        <?php
      }
    } else {
      echo "<br><br><i>not found items<i>";
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

  if(window.location.href.indexOf('&order')==-1){
    filterUrl('new')
  }

  // When click filter, send filter to order query string
  function filterUrl(filter){
    let newUrl = window.location.href
    if(window.location.href.indexOf('&search=')>-1){
      newUrl = newUrl.substring(0, newUrl.indexOf('&order'))
      let sinceQueryStringSearch = newUrl.slice(newUrl.indexOf('&search='),newUrl.length)
      sinceQueryStringSearch = sinceQueryStringSearch.substring(0, newUrl.indexOf('&order='))
      newUrl += sinceQueryStringSearch
    } else {
      if(window.location.href.indexOf('&order=')>-1){
        newUrl = newUrl.substring(0, newUrl.indexOf('&order'))
      }
    }
    newUrl += '&order=' + filter
    if(filter!='old' && filter!='new'){
      if(window.location.href.indexOf(filter)>-1){
        if(window.location.href.indexOf(filter+'Asc')>-1){
          newUrl += 'Desc'
        } else {
          newUrl += 'Asc'
        }
      } else {
        newUrl += 'Desc'
      }
    }
    window.location = newUrl
  }

  // Search function
  $('#searchIcon').click(function(){
    let newUrl = window.location.href
    if($('input[name="search"]').val()!=''){
      if(window.location.href.indexOf('&search=')>-1){
        let queryStringOrder = newUrl.slice(newUrl.indexOf('&order='),newUrl.length)
        newUrl = newUrl.substring(0, newUrl.indexOf('&search='))
        newUrl += '&search=' + $('input[name="search"]').val() + queryStringOrder
      } else {
        let queryStringOrder = newUrl.slice(newUrl.indexOf('&order='),newUrl.length)
        newUrl = newUrl.substring(0, newUrl.indexOf('&order='))
        newUrl += '&search=' + $('input[name="search"]').val() + queryStringOrder
      }
    } else {
      if(window.location.href.indexOf('&search=')>-1){
        let queryStringOrder = newUrl.slice(newUrl.indexOf('&order='),newUrl.length)
        newUrl = newUrl.substring(0, newUrl.indexOf('&search='))
        newUrl += queryStringOrder
      }
    }
    window.location = newUrl
  })

  // When focus on input search then press enter, equal to click on search icon
  $('input[name="search"]').keypress(function(event){
    if(event.keyCode == 13){
      $('#searchIcon').click()
    }
  })
</script>
