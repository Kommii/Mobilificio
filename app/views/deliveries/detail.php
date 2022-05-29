<?php
global $data;
$products = $data['rows'];
include("header_2.php");
?>

<section id="new-arrivals" class="new-arrivals">
  <div class="container">
    <div class="section-header">

    </div>
    <!--/.section-header-->
    <div class="new-arrivals-content">
      <div class="welcome-hero-txt">
        <center>
          <h2><b>Prodotti</b></h2>
        </center>
      </div>
      <div class="row">
        <?php
        $tot = 0;
        foreach ($products as $row) {
            $tot += $row['costoTot'];
        ?>
          <div class="col-md-3 col-sm-4">
            <div class="single-new-arrival">
              <a href="<?= $data['base_path'] ?>/products/detail/<?= $row['idProdotto']; ?>">
                <div class="single-new-arrival-bg">
                  <img src="<?=$row['immagine'];?>" alt="new-arrivals images" />

                  <div class="single-new-arrival-bg-overlay"></div>
                  
                </div>
              </a>
              <h4><a href="<?= $data['base_path'] ?>/products/detail/<?= $row['idProdotto']; ?>"><?= $row['nome']; ?></a></h4>
              <p class="arrival-product-price"><?= $row['prezzoV']; ?>€ - <?=$row['quantita'];?>pz</p>
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
        <div class="welcome-hero-txt">
          <center>
            <h4>Totale: <?= $tot; ?>€</h4>
          </center>
        </div>
    </div>
  </section>
<?php
include("footer_2.php");
?>