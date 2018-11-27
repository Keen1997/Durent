<!--
  *
  * System template
  *
 -->

<style>
  .template{
    max-width: 750px;
    line-height: 32px;
    text-align: center;
    font-size: 15px;
  }
  .col{
    margin-bottom: 75px;
  }
  .insideCol{
    text-align: left;
    font-size: 14px;
    display: inline-block;
  }
  a {
    color: #663096;
  }
  @media (max-width:768px){
    .template{
      max-width: 100%;
      width: calc(100% - 20px);
      font-size: 13px;
    }
    .insideCol{
      text-align: left;
      font-size: 12px;
    }
  }
</style>

<!-- Display form about -->
<div class="container template">
  <p style="font-size:21px;">Structure</p><br>

  <div id="footerToggles" style="display:block;">

    <button class="accordion">Step of renting the item<div class="plusIcon"></div></button>
    <div class="panel">
      <div class="insideCol">
        1. User write own item detail in rent page it will display in find page and status will show checking <br>
        2. User sent item to durent <br>
        3. When item arrive, staff role specialist will check the item and detail that user has writen <br>
        4. If it pass, specialist will change status from checking to availiable <br>
        5. Another user rent item, pay expenses and deposit <br>
        6. Status will change to deliver. Staff role deliver will take the item to customer <br>
        7. When item arrive, status change to renting <br>
        8. User return the item to durent <br>
        9. Staff role specialist check the defective of item <br>
        10. Durent will return deposit following the defective of item <br>
        11. Staff role deliver send the item to the owner, and status will change to rented <br>
      </div>
    </div>

    <button class="accordion">Staff Role<div class="plusIcon"></div></button>
    <div class="panel">
      <button class="accordion">Operator<div class="plusIcon"></div></button>
      <div class="panel">
        <div class="insideCol">
          <p>->	See some customer detail</p>
          <p>->	See address detail</p>
          <p>->	See item detail</p>
          <p>->	See rental detail</p>
          <p>->	Update status of rental</p>
          <p>->	Contact with customer</p>
          <p>->	Contact between staff</p>
          <p>->	Check the payment</p>
          <p>->	Enroll the item have been rent</p>
        </div>
      </div>
      <button class="accordion">Specialist<div class="plusIcon"></div></button>
      <div class="panel">
        <div class="insideCol">
          <p>->	See item detail</p>
          <p>->	Activate the item to availiable</p>
          <p>->	Keep the image of item before rent</p>
          <p>->	Keep the image of item after rent</p>
          <p>->	Check the item</p>
        </div>
      </div>
      <button class="accordion">Deliver<div class="plusIcon"></div></button>
      <div class="panel">
        <div class="insideCol">
          <p>->	See address of rental</p>
          <p>->	Deliver the item</p>
          <p>->	Change status of rental from deliver to rented</p>
          <p>->	Change status of rental from rented to deliver</p>
          <p>->	Change status of rental from deliver to return</p>
          <p>->	See some customer detail</p>
        </div>
      </div>
    </div>

    <button class="accordion">Admin Role<div class="plusIcon"></div></button>
    <div class="panel">
      <div class="insideCol">
        <p>->	See some staff detail</p>
        <p>->	Edit account to staff</p>
        <p>->	Delete Staff</p>
        <p>->	Edit staff some info</p>
        <p>->	Manage all data as same as staff</p>
      </div>
    </div>

  </div>

  <br><br>
  Mark<div style="height:18px;"></div>

  <div class="col" style="text-align:left; font-size:14px">
    - &nbsp;&nbsp;&nbsp;This is not a real website, so we assume the item will availiable when user rent their own item <br>
    - &nbsp;&nbsp;&nbsp;Staff did not seperate role in this website, because this is not a real website <br>
  </div>

  <div class="col" style="text-align:left; font-size:14px">
    -> &nbsp;<a href="index.php?page=staffLogin">Link to staff login</a><br>
    -> &nbsp;<a href="index.php?page=adminLogin">Link to admin login</a><br>
  </div>


</div>
</div>
