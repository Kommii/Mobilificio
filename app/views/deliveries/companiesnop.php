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
        $aziende=$data['rows'];
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
                    <h2><b>Aziende</b></h2>
                </center>
                </div>
                <center>
            <table>
                <tr>
                    <th>ID Azienda</th>
                    <th>Nome</th>
                </tr>
            <?php
            foreach($aziende as $row)
            {
                ?>
                <tr>
                    <td><?=$row['idFornProd'];?></a></td>
                    <td><?=$row['nome'];?></td>
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