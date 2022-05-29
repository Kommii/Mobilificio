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
        $products=$data['rows'];
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
                <center>
            <table>
                <tr>
                    <th>ID Prodotto</th>
                    <th>Tipo</th>
                    <th>Nome</th>
                    <th>Prezzo di acquisto</th>
                    <th>Numero fornitori</th>
                </tr>
            <?php
            foreach($products as $row)
            {
                ?>
                <tr>
                    <td><?=$row['idProdotto'];?></td>
                    <td><?=$row['tipo'];?></td>
                    <td><?=$row['nome'];?></td>
                    <td><?=$row['prezzoA'];?></td>
                    <td><?=$row['n_aziende'];?></td>
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