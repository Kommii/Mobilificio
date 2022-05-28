<?php
global $data;
$products = $data['rows'];
include("header.php");
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
        foreach ($products as $row) {
        ?>
          <div class="col-md-3 col-sm-4">
            <div class="single-new-arrival">
              <a href="<?= $data['base_path'] ?>/products/detail/<?= $row['idProdotto']; ?>">
                <div class="single-new-arrival-bg">
                  <img src="<?= $row['immagine']; ?>" alt="new-arrivals images" />

                  <div class="single-new-arrival-bg-overlay"></div>
                  <div class="new-arrival-cart">
                    <?php
                    $admin = $_SESSION['admin'];
                    if ($admin == 1) {
                    ?>
                    <p>
                      <span class="lnr lnr-cart"></span>
                      <a href="<?= $data['base_path'] ?>/products/update/<?= $row['idProdotto']; ?>">MODIFICA</a>
                    </p>
                    <p>
                      <span class="lnr lnr-cart"></span>
                      <a href="<?= $data['base_path'] ?>/products/delete/<?= $row['idProdotto']; ?>">CANCELLA</a>
                    </p>
                    <?php
                    }
                    ?>
                    
                  </div>
                </div>
              </a>
              <h4><a href="<?= $data['base_path'] ?>/products/detail/<?= $row['idProdotto']; ?>"><?= $row['nome']; ?></a></h4>
              <p class="arrival-product-price"><?= $row['prezzoV']; ?>€</p>
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