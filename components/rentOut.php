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
    border-color: #8A8A8A #E5E5E5 #E5E5E5 #8A8A8A;
    border-style: solid;
    border-width: 1px;
  }
  #dateFrom, #dateTo{
    width: 42%;
  }
  #fromText{
    margin-right: 10px;
  }
  #toText{
    margin-left: 18px;
    margin-right: 5px;
  }
  .breakLine{
    display: none;
  }
  @media (max-width:768px) {
    .formCenter{
      padding: 10px;
      width: 100%;
      box-sizing: border-box;
    }
    #dateTo, #dateFrom{
      width: 75%;
    }
    .breakLine{
      display: block;
      margin-bottom: 20px;
    }
    #toText{
      margin-right: 20px;
    }
  }
</style>

<!-- Display form login -->
<div class="container formCenter">
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
    <div>
      <span id="fromText">from</span>
      <input type="date" id="dateFrom" name=""/>
      <div class="breakLine"></div>
      <span id="toText">to</span>
      <input type="date" id="dateTo" name=""/>
      <br><br>
    </div>
    <input type="number" name="" placeholder="price per day">
    <br><br>
    <input type="submit" name="" value="Rent Out">
    <br><br>
  </form>
</div>
