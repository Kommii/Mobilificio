<?php
include("header_3.php");
if (!isset($_SESSION['username'])) {
?>
  <section id="new-arrivals" class="new-arrivals">
    <div class="container">
      <div class="section-header">

      </div>
      <!--/.section-header-->
      <div class="new-arrivals-content">
        <div class="welcome-hero-txt">
          <center><b>Non sei loggato!</b></center>
        </div>
      </div>
    </div>
  </section>
<?php
  include("footer_2.php");
} else {
  global $data;
  $products = $data['prodotti'];
  $packets = $data['pacchetti'];
?>

  <section id="new-arrivals" class="new-arrivals">
    <div class="container">
      <!--/.section-header-->
      <div class="new-arrivals-content">
        <div class="welcome-hero-txt">
          <center>
            <h2><b>Prodotti nel carrello</b></h2>
          </center>
        </div>
        <div class="row">
          <?php
          $tot = 0;
          foreach ($products as $row) {
            $a = $row['quantita'] * $row['prezzoV'];
            $tot += $a;

          ?>
            <div class="col-md-3 col-sm-4">
              <div class="single-new-arrival">
                <div class="single-new-arrival-bg">
                  <img src="<?= $row['immagine']; ?>" alt="new-arrivals images" />

                  <div class="single-new-arrival-bg-overlay"></div>
                  <div class="new-arrival-cart">
                    <div class="new-arrival-cart">
                    <p>
                      <a href="<?= $data['base_path'] ?>/products/removepr/<?= $row['idProdotto']; ?>">RIMUOVI</a>
                    </p>
                    </div>
                  </div>
                </div>

                <h4><a href="#"><?= $row['nome']; ?></a></h4>
                <p class="arrival-product-price"><?= $row['prezzoV']; ?>€ - <?= $row['quantita']; ?> pz.</p>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <section id="new-arrivals" class="new-arrivals">
  <div class="container">
    <div class="new-arrivals-content">
      <div class="welcome-hero-txt">
        <center>
          <h2><b>Pacchetti nel carrello</b></h2>
        </center>
      </div>
      <div class="row">
        <?php
        foreach ($packets as $row) {
          $tot += $row['prezzo'];
        ?>
          <div class="col-md-3 col-sm-4">
            <div class="single-new-arrival">
                <div class="single-new-arrival-bg">
                  <img src="<?= $row['immagine']; ?>" alt="new-arrivals images" />

                  <div class="single-new-arrival-bg-overlay"></div>
                  <div class="new-arrival-cart">
                    <p>
                      <a href="<?= $data['base_path'] ?>/packets/removepa/<?= $row['idPacchetto']; ?>">RIMUOVI</a>
                    </p>
                  </div>
                </div>
              </a>

              <p class="arrival-product-price"><?= $row['prezzo']; ?>€ - <?= $row['quantita']; ?> pz.</p>
            </div>
          </div>
        <?php
        }
        ?>
        <!--/.container-->
        </div>
      </div>
    </div>
  </section>
  <section id="new-arrivals" class="new-arrivals">
    <div class="container">
      <!--/.section-header-->
      <div class="new-arrivals-content">
        <div class="welcome-hero-txt">
          <center>
            <h4>Totale: <?= $tot; ?>€</h4>
          </center>
        </div>
      </div>
    </div>
  </section>
  <!--/.new-arrivals-->
  <!--new-arrivals end -->
<?php
  include("footer_2.php");
}

?>