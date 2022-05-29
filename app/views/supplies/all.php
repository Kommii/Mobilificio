<?php
    include("header.php");
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
                    <h2><b>Forniture</b></h2>
                </center>
                </div>
            <table style="width:100%">
                <tr>
                    <th>ID Fornitura</th>
                    <th>Quantità</th>
                    <th>Data</th>
                    <th>Costo</th>
                    <th>Azienda Fornitrice</th>
                    <th>Prodotto</th>
                </tr>
            <?php
            foreach($supplies as $row)
            {
                ?>
                <tr>
                    <td><?=$row['idFornitura'];?></td>
                    <td><?=$row['quantita'];?></td>
                    <td><?=$row['data'];?></td>
                    <td><?=$row['costo'];?></td>
                    <td><?=$row['azienda'];?></td>
                    <td><?=$row['prodotto'];?></td>
                </tr>
                <?php
            }
            ?>
            </table>
            </div>
        </div>
        </section>
        <?php
            include("footer.php");
    }
?>
