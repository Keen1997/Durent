<!--
  *
  * About template
  *
 -->

<style>
  .template{
    max-width: 750px;
    line-height: 32px;
    font-style: italic;
    text-align: center;
    font-size: 15px;
  }
  .col{
    margin-bottom: 75px;
  }
  a {
    color: #663096;
  }
  a:hover {
    color: #9988aa;
  }
  @media (max-width:576px){
    .template{
      width: calc(100% - 80px);
      font-size: 13px;
      padding: 0px 40px;
    }
  }
</style>

<!-- Display form about -->
<div class="container template">
  <div id="col1"></div>
  <div id="col2"></div>
  <br><br>
  <div id="col3"></div>
  <div class="col">
    Thank you
  </div>
</div>


<script type="text/babel">
  const col1 = (
    <div className="col">
      " If what you already have and can generate revenue. <br/>
      It is a property. But if it causes expenses, Or not make money It is debt. <br/>
      Would it be better if you could change your liabilities to assets? <br/>
      Try to let what you have to make money for you. "<br/><br/>
      <a href="index.php?page=rentOut">Join us for rent your item</a>
    </div>
  )
  const col2 = (
    <div className="col">
      " Have you ever wanted to use only one patch? <br/>
      You do not always have to buy a new one. <br/>
      Would it be good if you just rented it? "<br/><br/>
      <a href="index.php?page=rentOut">Join us for rent the item you want</a>
    </div>
  )
  const col3 = (
    <div className="col">
      This is not a real website.<br/>
      It's just a database and web application project.<br/>
      of SIIT Information Technology<br/><br/>
      <a href="https://github.com/Keen1997/Durent">-> See the code (html, css, javascript, jQuery, php)</a>
    </div>
  )
  ReactDOM.render(col1, document.getElementById('col1'))
  ReactDOM.render(col2, document.getElementById('col2'))
  ReactDOM.render(col3, document.getElementById('col3'))
</script>
