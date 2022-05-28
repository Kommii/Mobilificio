<?php
global $data;
$product = $data['row'];
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
                    <h2><b>Modifica</b></h2>
                    <br>
                </center>
            </div>
            <center>
                <form method="post" action="<?= $data['base_path']; ?>/products/updateact">
                    <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="Nome">Nome del prodotto</label>
                            <input type="text" class="form-control" placeholder="<?= $product['nome']; ?>" name="Nome" value="<?= $product['nome']; ?>" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                    </div>
                    <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="Nome">Descrizione del prodotto</label>
                            <input type="text" class="form-control" placeholder="<?= $product['descrizione']; ?>" name="Descrizione" value="<?= $product['descrizione']; ?>" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                    </div>
                    <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="Nome">Lunghezza</label>
                            <input type="number" class="form-control" placeholder="<?= $product['lunghezza']; ?>" name="Lunghezza" value="<?= $product['lunghezza']; ?>" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                    </div>
                    <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="Nome">Larghezza</label>
                            <input type="number" class="form-control" placeholder="<?= $product['larghezza']; ?>" name="Larghezza" value="<?= $product['larghezza']; ?>" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                    </div>
                    <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="Nome">Altezza</label>
                            <input type="number" class="form-control" placeholder="<?= $product['altezza']; ?>" name="Altezza" value="<?= $product['altezza']; ?>" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                    </div>
                    <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="Nome">Link immagine</label>
                            <input type="text" class="form-control" placeholder="<?= $product['immagine']; ?>" name="Immagine" value="<?= $product['immagine']; ?>" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                    </div>
                    <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="Nome">Prezzo di vendita</label>
                            <input type="number" class="form-control" placeholder="<?= $product['prezzoV']; ?>" name="PrezzoV" value="<?= $product['prezzoV']; ?>" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                    </div>
                    <input type="hidden" value="<?=$product['idProdotto'];?>" name="idProdotto">
                    <button class="btn-cart welcome-add-cart" type="submit">Modifica</button>
                </form>
            </center>
        </div>
    </div>
</section>
<?php
include("footer_2.php");
?>