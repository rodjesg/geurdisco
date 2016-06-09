

<?php
$home = false ;
$title = "Product";
require "../includes/header.php";
?>

<style>
    .productimg {
        
    }
    
    
    .block3Product {
        border-style: solid;
        border-width: 1px;
        padding: 5px;
    }
</style>




Product pagina

<div class="content">
    <div class="container">

<div class="row">
  <div class="small-2 large-4 columns">
    <img class="productimg" src="../assets/img/img-placeholder.png" title="productview">
    
  </div>
  
    <div class="small-4 large-4 columns">
        <h2>Product title</h2>
        <h5><strong>Product subtitle</strong></h5>
        <p>Product description</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    
    </div>
    
  <div class="small-6 large-4 columns">
     <div class="block3Product">
      <h4>Product title</h4>
      
      <div class="pricebox">
      <h4>&euro; PriceProductReclame</h4>
          <h5><div class="text-strike">&euro; PriceProductHistory</div></h5>    
      </div>
      <br>
      
      <div class="quantitybox">
      <p>Quantity</p>
      <form>
        <div class="row">
         <div class="medium-3 columns">
          <input type="number" name="quantity" min="1" step="1" value="1">
            </div>
          </div>
          </div>
      </form>
    
      <div class="button"><span class="fa fa-shopping-bag"></span><span>&nbsp;&nbsp;Add to shopping bag</span></div>
          <div class="wishlist"><p><span class="fa fa-star"></span><span>&nbsp;&nbsp;Add to wishlist</span></p></div>
      </div>
      </div>
        </div>

    
    
    
    
    
    
    
    </div>
</div>
        
        
        
        
        
    </div>
</div>

<?php
require "../includes/footer.php";
?>