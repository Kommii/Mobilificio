<?php 
   global $data;
   $product = $data['row'];
   include("header_2.php");
?>
            <!--/.carousel-inner -->
            <div class="carousel-inner" role="listbox">
          <!-- .item -->
          <div class="item active">
            <div class="single-slide-item slide1">
              <div class="container">
                <div class="welcome-hero-content">
                  <div class="row">
                    <div class="col-sm-7">
                      <div class="single-welcome-hero">
                        <div class="welcome-hero-txt">
                          <h4>Tipo di prodotto: <?=$product['tipo'];?></h4>
                          <h2><?=$product['nome'];?></h2>
                          <p><b>
                            <?=$product['descrizione'];?>
                          </b></p>
                          <p>Lunghezza: <?=$product['lunghezza'];?> cm <br />
                          Larghezza: <?=$product['larghezza'];?> cm <br />
                          Altezza: <?=$product['altezza'];?> cm</p>
                          <div class="packages-price">
                            <p>
                              <?=$product['prezzoV'];?>€
                            </p>
                          </div>
                          <br/>
                          <?php
                          if(isset($_SESSION['username']))
                          {
                            ?>
                          <form method="post" action="<?=$data['base_path']; ?>/home/addcart">
                          <label for="quantita">Quantità:</label>
                          <input type="number" min=1 value=1 max=99 name="quantita"/><br/>
                          <input type="hidden" value="<?=$product['idProdotto'];?>" name="idProdotto"/>
                          <button class="btn-cart welcome-add-cart"><span class="lnr lnr-plus-circle"></span>add <span>to</span> cart</button>
                          </form>
                          <?php
                          }
                          ?>
                        </div>
                        <!--/.welcome-hero-txt-->
                      </div>
                      <!--/.single-welcome-hero-->
                    </div>
                    <!--/.col-->
                    <div class="col-sm-5">
                      <div class="single-welcome-hero">
                        <div class="welcome-hero-img">
                          <img
                            src="<?=$product['immagine'];?>"
                            alt="slider image"
                          />
                        </div>
                        <!--/.welcome-hero-txt-->
                      </div>
                      <!--/.single-welcome-hero-->
                    </div>
                    <!--/.col-->
                  </div>
                  <!--/.row-->
                </div>
                <!--/.welcome-hero-content-->
              </div>
              <!-- /.container-->
            </div>
            <!-- /.single-slide-item-->
          </div>
          <!-- /.item .active-->
        </div>
        <!-- /.carousel-inner-->
      </div>
      <!--/#header-carousel-->

<!--/.header-area-->
<div class="clearfix"></div>
</div>
<!-- /.top-area-->
<!-- top-area End -->
<?php
include("footer_2.php");
?>