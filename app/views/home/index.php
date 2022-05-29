<?php
  global $data;
  include("header.php");
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
                        <h2>BENVENUTO</h2>
                          <h4>Mobilificio minatori!</h4>
                          <p style="text-transform: lowercase;">
                            Benvenuti sul sito del mobilificio minatori!
                            Su questo sito potrete comprare prodotti per la vostra casa e non solo,
                            troverete sia prodotti finiti che prodotti semilavorati
                            (potrete inoltre trovare molti prodotti in sconto...)
                            <br/>
                            Inizia visualizzando i nostri prodotti!
                            <br/>
                            ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ 
                          </p>
                          <form method="post" action="<?=$data['base_path'];?>/products/all">
                          <button
                            class="btn-cart welcome-add-cart"
                          >
                            Visualizza i prodotti!
                          </button>
                          </form>
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
                            src="assets/images/slider/slider1.png"
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
<?php
  include("footer.php");
?>