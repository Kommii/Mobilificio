<?php
  global $data;
  $packets = $data['rows'];
  include("header.php");
?>

<section id="new-arrivals" class="new-arrivals">
    <div class="container">
      <div class="section-header">
        
      </div>
      <!--/.section-header-->
      <div class="new-arrivals-content">
      <div class="welcome-hero-txt"><center><h2><b>Pacchetti</b></h2></center></div>
        <div class="row">
        <?php
          foreach($packets as $row)
          {
        ?>
        <div class="col-md-3 col-sm-4">
            <div class="single-new-arrival">
            <a href="<?=$data['base_path']?>/packets/detail/<?=$row['idPacchetto'];?>"><div class="single-new-arrival-bg">
                <img
                  src="<?=$row['immagine'];?>"
                  alt="new-arrivals images"/>
                
                <div class="single-new-arrival-bg-overlay"></div>
                <div class="new-arrival-cart">
                  <p>
                    <span class="lnr lnr-cart"></span>
                    <a href="#">add <span>to </span> cart</a>
                  </p>
                  <p class="arrival-review pull-right">
                    <span class="lnr lnr-heart"></span>
                    <span class="lnr lnr-frame-expand"></span>
                  </p>
                </div>
              </div>
              </a>
              <h4><a href="<?=$data['base_path']?>/packets/detail/<?=$row['idPacchetto'];?>"><?=$row['nomePa'];?></a></h4>
              <p class="arrival-product-price"><?=$row['prezzo'];?>€</p>
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
  include("footer.php");
  ?>