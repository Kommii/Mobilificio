<?php
  global $data;
  $products = $data['products'];
  include("header_2.php");
?>

<section id="new-arrivals" class="new-arrivals">
    <div class="container">
      <div class="section-header">
        
      </div>
      <!--/.section-header-->
      <div class="new-arrivals-content">
      <div class="welcome-hero-txt"><center><h2><b>Prodotti presenti nel pacchetto</b></h2></center></div>
        <div class="row">
        <?php
          foreach($products as $row)
          {
        ?>
        <div class="col-md-3 col-sm-4">
            <div class="single-new-arrival">
            <div class="single-new-arrival-bg">
                <img
                  src="<?=$row['immagine'];?>"
                  alt="new-arrivals images"/>
            </div>
              <h4><a href="#"><?=$row['nome'];?></a></h4>
              <p class="arrival-product-price"><?=$row['prezzoV'];?>€</p>
            </div>
          </div> 
          <?php
            }
          ?>
        </div>
      </div>
    </div>
    <!--/.container-->
  </section>
  <!--/.new-arrivals-->
  <!--new-arrivals end -->
  <?php
  include("footer_2.php");
  ?>