<?php
    include("header.php");
    global $data;
    if (!isset($_SESSION['admin'])) {
    ?>
      <section id="new-arrivals" class="new-arrivals">
        <div class="container">
          <div class="section-header">
    
          </div>
          <!--/.section-header-->
          <div class="new-arrivals-content">
            <div class="welcome-hero-txt">
              <center><b>non hai i permessi</b></center>
            </div>
          </div>
        </div>
      </section>
    <?php
    include("footer.php");
    }else{
        $supplies=$data['rows'];
        $zone=$data['zone'];
        ?>
        <style>
        table, th, td {
            border: 3px solid;
            padding:5px;
        }
        </style>
        <section id="new-arrivals" class="new-arrivals">
        <div class="container">
            <!--/.section-header-->
            <div class="new-arrivals-content">
                <div class="welcome-hero-txt">
                <center>
                    <h2><b>Consegne</b></h2>
                </center>
                </div>
                <center>
            <table>
                <tr>
                    <th>ID Consegna</th>
                    <th>Data</th>
                    <th>Indirizzo</th>
                    <th>CAP</th>
                    <th>Città</th>
                    <th>Cliente</th>
                    <th>Zona</th>
                    <th>Azienda di Trasporto</th>
                </tr>
            <?php
            foreach($supplies as $row)
            {
                ?>
                <tr>
                    <td> <a href="<?= $data['base_path'] ?>/deliveries/detail/<?= $row['idConsegna']; ?>"><?=$row['idConsegna'];?></a></td>
                    <td><?=$row['data'];?></td>
                    <td><?=$row['indirizzo'];?></td>
                    <td><?=$row['cap'];?></td>
                    <td><?=$row['citta'];?></td>
                    <td><?=$row['nCompleto'];?></td>
                    <td><?=$row['provincia'];?></td>
                    <td><?=$row['azienda'];?></td>
                </tr>
                <?php
            }
            ?>
            </table>
        </center>
            </div>
        </div>

        </section>
        <center>
        <form method="post" action="#">
        <div class="hm-foot-email">
            <label for="zona">Zona</label>
            <select class="form-control" name="zona" style="width: 270px; height:50px;" required>
            <?php
            foreach($zone as $row){
            ?>
            <option value="<?=$row['idZona'];?>" selected><?=$row['provincia'];?></option>
            <?php
            }
            ?>
            </select>
            <button class="btn-cart welcome-add-cart" type="submit">Cerca</button>
        </div>
        </form>
        </center>
        <br/>
        <br/>
        <br/>
        <center>
        <form method="post" action="<?=$data['base_path'];?>/deliveries/companiesnop">
            <label>aziende che forniscono sia prodotti finiti che semifiniti, i cui articoli non sono mai
                stati venduti nel negozio</label> <br/>
            <button class="btn-cart welcome-add-cart" type="submit">Visualizza</button>
        </form>
        </center>
        <?php
            include("footer.php");
    }
?>