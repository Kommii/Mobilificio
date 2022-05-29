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
        <?php
            include("footer.php");
    }
?>