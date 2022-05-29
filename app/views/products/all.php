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
                  <img src="<?=$row['immagine'];?>" alt="new-arrivals images" />

                  <div class="single-new-arrival-bg-overlay"></div>
                  
                    <?php
                    //$admin = $_SESSION['admin'];
                    if (isset($_SESSION['admin'])) {
                    ?>
                    <div class="new-arrival-cart">
                    <p>
                      <a href="<?= $data['base_path'] ?>/products/update/<?= $row['idProdotto']; ?>">MODIFICA</a>
                    </p>
                    <p>
                      <a href="<?= $data['base_path'] ?>/products/delete/<?= $row['idProdotto']; ?>">CANCELLA</a>
                    </p>
                    </div>
                    <?php
                    }               
                    ?>
            
                </div>
              </a>
              <h4><a href="<?= $data['base_path'] ?>/products/detail/<?= $row['idProdotto']; ?>"><?= $row['nome']; ?></a></h4>
              <!--<p class="arrival-product-price"><?php//= $row['prezzoV']; ?>€</p>-->
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
<center>
<section id="new-arrivals" class="new-arrivals">
  <div class="container">
    <div class="welcome-hero-txt">
      <div class="welcome-hero-txt">
        <center>
          <h4><b>Visualizza semilavorati di un determinato materiale</b></h4>
        </center>
        <br/>
      </div>
        <form method="get" action="<?= $data['base_path']; ?>/products/semilavorati">
        <div class="hm-foot-email">
           <select class="form-control" name="materiale" style="width: 270px; height:50px;">
          <option value="metallo">Metallo</option>
          <option value="ferro">Ferro</option>
          <option value="plastica">Plastica</option>
          <option value="Legno listellare">Legno listellare</option>
          <option value="Legno multistrato">Legno multistrato</option>
          <option value="Compensato">Compensato</option>
          <option value="Legno Tamburato">Legno Tamburato</option>
          <option value="Legno truciolare">Legno truciolare</option>
          </select>
        </div>
          <button class="btn-cart welcome-add-cart">Visualizza</button>
        </form>
    </div>
  </div>
  <!--/.container-->
</section>
    </center>
    <?php
      if (isset($_SESSION['admin'])) {
      ?>
<center>
<section id="new-arrivals" class="new-arrivals">
  <div class="container">
    <div class="welcome-hero-txt">
      <div class="welcome-hero-txt">
        <center>
          <h4><b>Aggiungi prodotto al database</b></h4>
        </center>
      </div>
        <form method="post" action="<?= $data['base_path']; ?>/products/add">
          <button class="btn-cart welcome-add-cart"><span class="lnr lnr-plus-circle"></span>aggiungi prodotto</button>
        </form>
      
    </div>
  </div>
  <!--/.container-->
</section>
    </center>
      <?php
      }
      ?>
<!--/.new-arrivals-->
<!--new-arrivals end -->
<?php
include("footer.php");
?>