<?php
global $data;
include("header.php");
$aziende = $data['aziende'];
$categorie = $data['categorie'];
?>
<section id="new-arrivals" class="new-arrivals">
    <div class="container">
        <div class="section-header">

        </div>
        <!--/.section-header-->
        <div class="new-arrivals-content">
            <div class="welcome-hero-txt">
                <center>
                    <h2><b>Aggiungi un prodotto</b></h2>
                    <br>
                </center>
            </div>
            <center>
                <form method="post" action="<?= $data['base_path']; ?>/products/addact">
                <div class="hm-foot-email">
                            <label for="Tipo">Tipo (finito/semilavorato)</label>
                            <select class="form-control" name="Tipo" style="width: 270px; height:50px;" required>
                            <option value="finito" selected>Finito</option>
                            <option value="semilavorato">Semilavorato</option>
                            </select>
                            <br><br>
                        <!--/.foot-email-box-->
                    </div>
                    <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="Nome">Nome del prodotto</label>
                            <input type="text" class="form-control" name="Nome" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                    </div>
                    <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="Descrizione">Descrizione del prodotto</label>
                            <input type="text" class="form-control" name="Descrizione" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                    </div>
                    <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="Lunghezza">Lunghezza</label>
                            <input type="number" min=1 class="form-control" name="Lunghezza" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                    </div>
                    <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="Larghezza">Larghezza</label>
                            <input type="number" min=1 class="form-control" name="Larghezza" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                    </div>
                    <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="Altezza">Altezza</label>
                            <input type="number" min=1 class="form-control" name="Altezza" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                    </div>
                        <!--/.foot-email-box-->
                    <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="Forma">Forma</label>
                            <input type="text" class="form-control" name="Forma" />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                        <div class="hm-foot-email">
                            <label for="Materiale">Materiale</label>
                            <select class="form-control" name="Materiale" style="width: 270px; height:50px;">
                            <option value=""></option>
                            <option value="metallo">Metallo</option>
                            <option value="ferro">Ferro</option>
                            <option value="plastica">Plastica</option>
                            <option value="Legno listellare">Legno listellare</option>
                            <option value="Legno multistrato">Legno multistrato</option>
                            <option value="Compensato">Compensato</option>
                            <option value="Legno Tamburato">Legno Tamburato</option>
                            <option value="Legno truciolare">Legno truciolare</option>
                            </select>
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                        <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="Immagine">Link immagine</label>
                            <input type="text" class="form-control" name="Immagine" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                    </div>
                    <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="PrezzoA">Prezzo di acquisto</label>
                            <input type="number" min=1 class="form-control"name="PrezzoA" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                        <div class="hm-foot-email">
                        <div class="foot-email-box">
                            <label for="PrezzoV">Prezzo di vendita</label>
                            <input type="number" min=1 class="form-control"name="PrezzoV" required />
                            <br><br>
                        </div>
                        <!--/.foot-email-box-->
                        <div class="hm-foot-email">
                            <label for="Categoria">Categoria</label>
                            <select class="form-control" name="Categoria" style="width: 270px; height:50px;" required>
                            <?php
                            foreach($categorie as $row){
                            ?>
                            <option value="<?=$row['idCategoria'];?>" selected><?=$row['descrizione'];?></option>
                            <?php
                            }
                            ?>
                            </select>
                            <br><br>
                            </div>
                        <!--/.foot-email-box-->
                    </div>
                    <button class="btn-cart welcome-add-cart" type="submit">Inserisci</button>
                </form>
            </center>
        </div>
    </div>
</section>
<?php
include("footer.php");
?>