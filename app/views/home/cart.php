<?php
include("header_3.php");
if(!isset($_SESSION['username']))
{
    ?>
    <section id="new-arrivals" class="new-arrivals">
    <div class="container">
      <div class="section-header">
        
      </div>
      <!--/.section-header-->
      <div class="new-arrivals-content">
      <div class="welcome-hero-txt"><center><b>Non sei loggato!</b></center></div>
      </div>
    </div>
</section>
<?php
include("footer_2.php");
}
else{ 
    global $data;
    $products = $data['prodotti'];
  ?>
  
  <section id="new-arrivals" class="new-arrivals">
      <div class="container">
        <!--/.section-header-->
        <div class="new-arrivals-content">
        <div class="welcome-hero-txt"><center><h2><b>Carrello</b></h2></center></div>
          <div class="row">
          <?php
          $tot = 0;
            foreach($products as $row)
            {
            $a = $row['quantita'] * $row['prezzoV'];
            $tot += $a;
            
          ?>
          <div class="col-md-3 col-sm-4">
              <div class="single-new-arrival">
              <div class="single-new-arrival-bg">
                  <img
                    src="<?=$row['immagine'];?>"
                    alt="new-arrivals images"/>
                  
                  <div class="single-new-arrival-bg-overlay"></div>
                  
                </div>
                
                <h4><a href="#"><?=$row['nome'];?></a></h4>
                <p class="arrival-product-price"><?=$row['prezzoV'];?>€ - <?=$row['quantita'];?> pz.</p>
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
    <section id="new-arrivals" class="new-arrivals">
      <div class="container">
        <!--/.section-header-->
        <div class="new-arrivals-content">
        <div class="welcome-hero-txt"><center><h4>Totale: <?=$tot;?>€</h4></center></div>
        </div>
      </div>
      </section>
    <!--/.new-arrivals-->
    <!--new-arrivals end -->
    <?php
    include("footer_2.php");  
}
 
?>



 