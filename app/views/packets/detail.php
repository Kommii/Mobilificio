<?php
global $data;
$products = $data['products'];
$idpa = $data['id'];
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
          <h2><b>Prodotti presenti nel pacchetto</b></h2>
        </center>
      </div>
      <div class="row">
        <?php
        foreach ($products as $row) {
        ?>
          <div class="col-md-3 col-sm-4">
            <div class="single-new-arrival">
              <div class="single-new-arrival-bg">
                <img src="<?= $row['immagine']; ?>" alt="new-arrivals images" />
              </div>
              <h4><a href="#"><?= $row['nome']; ?></a></h4>
              <p class="arrival-product-price"><?= $row['prezzoV']; ?>€</p>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
  <div class="single-welcome-hero">
    <div class="welcome-hero-txt">
      <?php
      if (isset($_SESSION['username'])) {
      ?>
        <form method="post" action="<?= $data['base_path']; ?>/home/addcartp">
          <label for="quantita">Quantità:</label>
          <input type="number" min=1 value=1 max=99 name="quantita" /><br />
          <input type="hidden" value="<?= $idpa; ?>" name="idPacchetto" />
          <button class="btn-cart welcome-add-cart"><span class="lnr lnr-plus-circle"></span>add <span>to</span> cart</button>
        </form>
      <?php
      }
      ?>
    </div>
  </div>
  <!--/.container-->
</section>
<!--/.new-arrivals-->
<!--new-arrivals end -->
<?php
include("footer_2.php");
?>